<?php

namespace App\Services\Notification;

use App\Models\Booking\Booking;
use App\Models\Booking\GuestBooking;

interface NotificationInterface
{
    public function sendBookingConfirmationToCustomer(Booking $booking): void;

    public function sendNewBookingToAdmin(Booking $booking): void;

    public function sendGuestBookingConfirmationToCustomer(GuestBooking $guestBooking): void;

    public function sendGuestBookingToAdmin(GuestBooking $guestBooking): void;
}
