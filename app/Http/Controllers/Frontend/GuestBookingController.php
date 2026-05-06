<?php

namespace App\Http\Controllers\Frontend;

use App\DTOs\Booking\CreateGuestBookingDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreGuestBookingRequest;
use App\Models\Booking\GuestBooking;
use App\Services\Booking\BookingInterface;
use App\Services\Layanan\LayananInterface;
use App\Services\SpecialOffer\SpecialOfferInterface;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class GuestBookingController extends Controller
{
    public function __construct(
        private BookingInterface $bookingService,
        private LayananInterface $layananService,
        private SpecialOfferInterface $offerService,
    ) {}

    public function create(): Response
    {
        $layananList   = $this->layananService->getActiveList();
        $specialOffers = $this->offerService->getFeatured(10);

        return Inertia::render('Frontend/CustomTrip/Index', compact('layananList', 'specialOffers'));
    }

    public function store(StoreGuestBookingRequest $request): RedirectResponse
    {
        $dto = new CreateGuestBookingDTO(
            destinasiDicari: $request->destinasi_dicari,
            namaLengkap: $request->nama_lengkap,
            email: $request->email,
            nomorTelepon: $request->nomor_telepon,
            alamat: $request->alamat,
            kota: $request->kota,
            provinsi: $request->provinsi,
            jumlahPeserta: (int) $request->jumlah_peserta,
            tanggalKeberangkatan: $request->tanggal_keberangkatan,
            isCustomRequest: (bool) $request->is_custom_request,
            layananId: $request->layanan_id,
            budgetEstimasi: $request->budget_estimasi ? (float) $request->budget_estimasi : null,
            catatanTambahan: $request->catatan_tambahan,
        );

        $guestBooking = $this->bookingService->createGuestBooking($dto);

        return redirect()->route('guest-booking.success', $guestBooking->booking_number)
            ->with('success', 'Permintaan trip berhasil dikirim!');
    }

    public function success(string $bookingNumber): Response
    {
        $guestBooking = GuestBooking::where('booking_number', $bookingNumber)->firstOrFail();

        return Inertia::render('Frontend/Other/Index', compact('guestBooking'));
    }
}
