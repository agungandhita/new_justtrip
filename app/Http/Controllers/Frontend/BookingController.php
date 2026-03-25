<?php

namespace App\Http\Controllers\Frontend;

use App\DTOs\Booking\CreateBookingDTO;
use App\DTOs\Booking\CreateGuestBookingDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Requests\Booking\StoreGuestBookingRequest;
use App\Services\Booking\BookingInterface;
use App\Services\Layanan\LayananInterface;
use App\Services\SpecialOffer\SpecialOfferInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class BookingController extends Controller
{
    public function __construct(
        private BookingInterface $bookingService,
        private LayananInterface $layananService,
        private SpecialOfferInterface $offerService,
    ) {}

    public function create(string $layananId): Response
    {
        $layanan = $this->layananService->findById($layananId);

        return Inertia::render('Booking/Create', compact('layanan'));
    }

    public function createFromOffer(string $slug): Response
    {
        $offer   = $this->offerService->getOffer($slug);
        $layanan = $offer->layanan;

        return Inertia::render('Booking/Create', compact('layanan', 'offer'));
    }

    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $dto = new CreateBookingDTO(
            userId: Auth::id(),
            layananId: $request->layanan_id,
            jumlahPeserta: (int) $request->jumlah_peserta,
            tanggalKeberangkatan: $request->tanggal_keberangkatan,
            specialOfferId: $request->special_offer_id,
            catatanKhusus: $request->catatan_khusus,
        );

        $booking = $this->bookingService->createRegularBooking($dto);

        return redirect()->route('booking.success', $booking->booking_number)
            ->with('success', 'Booking berhasil dibuat!');
    }

    public function success(string $bookingNumber): Response
    {
        $booking = $this->bookingService->getBookingByNumber($bookingNumber);

        return Inertia::render('Booking/Success', compact('booking'));
    }

    public function index(): Response
    {
        $bookings = $this->bookingService->getUserBookings(Auth::id());

        return Inertia::render('Booking/Index', compact('bookings'));
    }

    public function show(string $bookingId): Response
    {
        $booking = $this->bookingService->getBookingDetail($bookingId, Auth::id());

        return Inertia::render('Booking/Show', compact('booking'));
    }

    public function cancel(string $bookingId): RedirectResponse
    {
        $this->bookingService->cancelBooking($bookingId, Auth::id());

        return redirect()->route('booking.index')
            ->with('success', 'Booking berhasil dibatalkan.');
    }
}
