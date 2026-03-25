<?php

namespace App\Services\Booking;

use App\DTOs\Booking\CreateBookingDTO;
use App\DTOs\Booking\CreateGuestBookingDTO;
use App\Models\Booking\Booking;
use App\Models\Booking\GuestBooking;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BookingInterface
{
    public function createRegularBooking(CreateBookingDTO $dto): Booking;

    public function createGuestBooking(CreateGuestBookingDTO $dto): GuestBooking;

    public function getUserBookings(string $userId): Collection;

    public function getBookingDetail(string $bookingId, string $userId): Booking;

    public function getBookingByNumber(string $bookingNumber): Booking;

    public function cancelBooking(string $bookingId, string $userId): void;

    public function approveBooking(string $bookingId, string $adminId, ?string $notes): void;

    public function rejectBooking(string $bookingId, string $adminId, string $reason): void;

    public function completeBooking(string $bookingId, string $adminId): void;

    public function getAdminBookings(array $filters): LengthAwarePaginator;

    public function getAdminBookingDetail(string $bookingId): Booking;

    public function getAdminGuestBookings(array $filters): LengthAwarePaginator;

    public function getAdminGuestBookingDetail(string $id): GuestBooking;

    public function updateGuestBookingStatus(string $id, string $status, ?string $notes): GuestBooking;
}
