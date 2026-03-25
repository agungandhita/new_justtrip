<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HasPaginationResource;
use App\Http\Controllers\Controller;
use App\Services\Booking\BookingInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class GuestBookingController extends Controller
{
    use HasPaginationResource;
    public function __construct(private BookingInterface $bookingService) {}

    public function index(Request $request): Response
    {
        $guestBookings = $this->bookingService->getAdminGuestBookings($request->only(['search', 'status', 'type']));

        return Inertia::render('Admin/GuestBookings/Index', [
            'guestBookings' => $this->paginateToResource($guestBookings),
            'filters'       => $request->only(['search', 'status', 'type']),
        ]);
    }

    public function show(string $id): Response
    {
        $guestBooking = $this->bookingService->getAdminGuestBookingDetail($id);

        return Inertia::render('Admin/GuestBookings/Show', compact('guestBooking'));
    }

    public function updateStatus(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'status'      => ['required', 'string'],
            'admin_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $this->bookingService->updateGuestBookingStatus($id, $request->status, $request->admin_notes);

        return back()->with('success', 'Status berhasil diperbarui.');
    }
}
