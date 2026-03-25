<?php

namespace App\Services\Dashboard;

use App\Enums\BookingStatus;
use App\Enums\GuestBookingStatus;
use App\Models\Booking\Booking;
use App\Models\Booking\GuestBooking;
use App\Models\Content\Review;
use App\Models\Trip\Layanan;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DashboardService implements DashboardInterface
{
    public function getStatistics(): array
    {
        return [
            'total_bookings'       => Booking::count(),
            'pending_bookings'     => Booking::where('status', BookingStatus::Pending)->count(),
            'approved_bookings'    => Booking::where('status', BookingStatus::Approved)->count(),
            'completed_bookings'   => Booking::where('status', BookingStatus::Completed)->count(),
            'total_guest_bookings' => GuestBooking::count(),
            'new_guest_bookings'   => GuestBooking::where('status', GuestBookingStatus::Baru)->count(),
            'total_users'          => User::count(),
            'total_revenue'        => (float) Booking::where('status', BookingStatus::Completed)->sum('total_amount'),
            'total_layanan'        => Layanan::count(),
            'total_reviews'        => Review::where('is_active', true)->count(),
        ];
    }

    public function getRecentBookings(int $limit): Collection
    {
        return Booking::with(['layanan', 'user'])
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function getTopServices(int $limit): Collection
    {
        return Layanan::withCount('bookings')
            ->orderByDesc('bookings_count')
            ->limit($limit)
            ->get();
    }
}
