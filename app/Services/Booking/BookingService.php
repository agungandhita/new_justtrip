<?php

namespace App\Services\Booking;

use App\DTOs\Booking\CreateBookingDTO;
use App\DTOs\Booking\CreateGuestBookingDTO;
use App\Enums\BookingStatus;
use App\Enums\GuestBookingStatus;
use App\Enums\JenisLayanan;
use App\Models\Booking\Booking;
use App\Models\Booking\GuestBooking;
use App\Models\Content\SpecialOffer;
use App\Models\Trip\Layanan;
use App\Services\Notification\NotificationInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BookingService implements BookingInterface
{
    public function __construct(private NotificationInterface $notificationService) {}

    public function createRegularBooking(CreateBookingDTO $dto): Booking
    {
        $layanan = Layanan::findOrFail($dto->layananId);
        $user    = \App\Models\User::findOrFail($dto->userId);

        $originalAmount = $this->calculatePrice($layanan, $dto->jumlahPeserta);
        $discountAmount = 0.0;
        $specialOffer   = null;

        if ($dto->specialOfferId) {
            $specialOffer   = SpecialOffer::findOrFail($dto->specialOfferId);
            $discountAmount = ($originalAmount * (float) $specialOffer->discount_percentage) / 100;
        }

        $totalAmount = $originalAmount - $discountAmount;

        $booking = Booking::create([
            'booking_number'        => $this->generateBookingNumber(),
            'user_id'               => $dto->userId,
            'layanan_id'            => $dto->layananId,
            'special_offer_id'      => $dto->specialOfferId,
            'status'                => BookingStatus::Pending,
            'jumlah_peserta'        => $dto->jumlahPeserta,
            'tanggal_keberangkatan' => $dto->tanggalKeberangkatan,
            'total_amount'          => $totalAmount,
            'original_amount'       => $originalAmount,
            'discount_amount'       => $discountAmount,
            'catatan_khusus'        => $dto->catatanKhusus,
            'customer_info'         => [
                'name'    => $user->name,
                'email'   => $user->email,
                'phone'   => $user->phone ?? '',
                'address' => $user->address ?? '',
            ],
        ]);

        $this->notificationService->sendBookingConfirmationToCustomer($booking);
        $this->notificationService->sendNewBookingToAdmin($booking);

        return $booking;
    }

    public function createGuestBooking(CreateGuestBookingDTO $dto): GuestBooking
    {
        $guestBooking = GuestBooking::create([
            'booking_number'                  => $this->generateBookingNumber('GB'),
            'layanan_id'                       => $dto->layananId,
            'destinasi_dicari'                => $dto->destinasiDicari,
            'nama_lengkap'                    => $dto->namaLengkap,
            'email'                           => $dto->email,
            'nomor_telepon'                   => $dto->nomorTelepon,
            'alamat'                          => $dto->alamat,
            'kota'                            => $dto->kota,
            'provinsi'                        => $dto->provinsi,
            'jumlah_peserta'                  => $dto->jumlahPeserta,
            'tanggal_keberangkatan_diinginkan'=> $dto->tanggalKeberangkatan,
            'budget_estimasi'                 => $dto->budgetEstimasi,
            'is_custom_request'               => $dto->isCustomRequest,
            'status'                          => GuestBookingStatus::Baru,
            'catatan_tambahan'                => $dto->catatanTambahan,
        ]);

        $this->notificationService->sendGuestBookingConfirmationToCustomer($guestBooking);
        $this->notificationService->sendGuestBookingToAdmin($guestBooking);

        return $guestBooking;
    }

    public function getUserBookings(string $userId): Collection
    {
        return Booking::where('user_id', $userId)
            ->with('layanan')
            ->latest()
            ->get();
    }

    public function getBookingDetail(string $bookingId, string $userId): Booking
    {
        return Booking::where('booking_id', $bookingId)
            ->where('user_id', $userId)
            ->with(['layanan', 'specialOffer'])
            ->firstOrFail();
    }

    public function getBookingByNumber(string $bookingNumber): Booking
    {
        return Booking::where('booking_number', $bookingNumber)
            ->with(['layanan', 'specialOffer'])
            ->firstOrFail();
    }

    public function cancelBooking(string $bookingId, string $userId): void
    {
        $booking = $this->getBookingDetail($bookingId, $userId);

        abort_if($booking->status !== BookingStatus::Pending, 422, 'Hanya booking dengan status pending yang bisa dibatalkan.');

        $booking->update([
            'status'       => BookingStatus::Cancelled,
            'cancelled_at' => now(),
        ]);
    }

    public function approveBooking(string $bookingId, string $adminId, ?string $notes): void
    {
        $booking = $this->getAdminBookingDetail($bookingId);

        $booking->update([
            'status'      => BookingStatus::Approved,
            'admin_notes' => $notes,
            'approved_by' => $adminId,
            'approved_at' => now(),
        ]);
    }

    public function rejectBooking(string $bookingId, string $adminId, string $reason): void
    {
        $booking = $this->getAdminBookingDetail($bookingId);

        $booking->update([
            'status'           => BookingStatus::Rejected,
            'rejection_reason' => $reason,
            'approved_by'      => $adminId,
            'rejected_at'      => now(),
        ]);
    }

    public function completeBooking(string $bookingId, string $adminId): void
    {
        $booking = $this->getAdminBookingDetail($bookingId);

        $booking->update([
            'status'       => BookingStatus::Completed,
            'completed_at' => now(),
        ]);
    }

    public function getAdminBookings(array $filters): LengthAwarePaginator
    {
        return Booking::with(['layanan', 'user'])
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->where('booking_number', 'like', "%{$filters['search']}%")
                    ->orWhereJsonContains('customer_info->name', $filters['search'])
            )
            ->when(
                isset($filters['status']) && $filters['status'],
                fn ($q) => $q->where('status', $filters['status'])
            )
            ->when(
                isset($filters['date_from']) && $filters['date_from'],
                fn ($q) => $q->where('tanggal_keberangkatan', '>=', $filters['date_from'])
            )
            ->when(
                isset($filters['date_to']) && $filters['date_to'],
                fn ($q) => $q->where('tanggal_keberangkatan', '<=', $filters['date_to'])
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();
    }

    public function getAdminBookingDetail(string $bookingId): Booking
    {
        return Booking::with(['layanan', 'specialOffer', 'user', 'approvedBy'])
            ->findOrFail($bookingId);
    }

    public function getAdminGuestBookings(array $filters): LengthAwarePaginator
    {
        return GuestBooking::with('layanan')
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('nama_lengkap', $filters['search'])
                    ->orWhereLike('email', $filters['search'])
                    ->orWhereLike('booking_number', $filters['search'])
            )
            ->when(
                isset($filters['status']) && $filters['status'],
                fn ($q) => $q->where('status', $filters['status'])
            )
            ->when(
                isset($filters['type']) && $filters['type'] === 'custom',
                fn ($q) => $q->where('is_custom_request', true)
            )
            ->when(
                isset($filters['type']) && $filters['type'] === 'package',
                fn ($q) => $q->where('is_custom_request', false)
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();
    }

    public function getAdminGuestBookingDetail(string $id): GuestBooking
    {
        return GuestBooking::with('layanan')->findOrFail($id);
    }

    public function updateGuestBookingStatus(string $id, string $status, ?string $notes): GuestBooking
    {
        $guestBooking = $this->getAdminGuestBookingDetail($id);
        $guestBooking->update([
            'status'      => $status,
            'admin_notes' => $notes,
        ]);

        return $guestBooking->fresh();
    }

    // ── Private helpers ──────────────────────────────────────────────────────

    private function generateBookingNumber(string $prefix = 'JT'): string
    {
        return $prefix . strtoupper(date('ymd')) . strtoupper(Str::random(5));
    }

    private function calculatePrice(Layanan $layanan, int $jumlahPeserta): float
    {
        if ($layanan->jenis_layanan === JenisLayanan::OpenTrip) {
            return (float) $layanan->harga_per_orang * $jumlahPeserta;
        }

        if ($layanan->jenis_layanan === JenisLayanan::PrivateTrip) {
            $price = $layanan->getHargaForGroup($jumlahPeserta);

            return $price !== null ? $price : 0.0;
        }

        return 0.0;
    }
}
