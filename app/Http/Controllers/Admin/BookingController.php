<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HasPaginationResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApproveBookingRequest;
use App\Http\Requests\Admin\RejectBookingRequest;
use App\Services\Booking\BookingInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class BookingController extends Controller
{
    use HasPaginationResource;
    public function __construct(private BookingInterface $bookingService) {}

    public function index(Request $request): Response
    {
        $bookings = $this->bookingService->getAdminBookings($request->only(['search', 'status', 'date_from', 'date_to']));

        return Inertia::render('Admin/Bookings/Index', [
            'bookings' => $this->paginateToResource($bookings),
            'filters'  => $request->only(['search', 'status', 'date_from', 'date_to']),
        ]);
    }

    public function show(string $bookingId): Response
    {
        $booking = $this->bookingService->getAdminBookingDetail($bookingId);

        return Inertia::render('Admin/Bookings/Show', compact('booking'));
    }

    public function approve(ApproveBookingRequest $request, string $bookingId): RedirectResponse
    {
        $this->bookingService->approveBooking($bookingId, Auth::id(), $request->admin_notes);

        return back()->with('success', 'Booking disetujui.');
    }

    public function reject(RejectBookingRequest $request, string $bookingId): RedirectResponse
    {
        $this->bookingService->rejectBooking($bookingId, Auth::id(), $request->rejection_reason);

        return back()->with('success', 'Booking ditolak.');
    }

    public function complete(string $bookingId): RedirectResponse
    {
        $this->bookingService->completeBooking($bookingId, Auth::id());

        return back()->with('success', 'Booking diselesaikan.');
    }

    public function cancel(string $bookingId): RedirectResponse
    {
        $this->bookingService->cancelBooking($bookingId, Auth::id());

        return back()->with('success', 'Booking dibatalkan.');
    }
}
