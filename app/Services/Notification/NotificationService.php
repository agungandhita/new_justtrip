<?php

namespace App\Services\Notification;

use App\Mail\BookingConfirmationMail;
use App\Mail\GuestBookingAdminMail;
use App\Mail\GuestBookingConfirmationMail;
use App\Mail\NewBookingAdminMail;
use App\Models\Booking\Booking;
use App\Models\Booking\GuestBooking;
use Illuminate\Support\Facades\Mail;

class NotificationService implements NotificationInterface
{
    public function sendBookingConfirmationToCustomer(Booking $booking): void
    {
        $email = $booking->customer_info['email'] ?? null;

        if ($email) {
            Mail::to($email)->queue(new BookingConfirmationMail($booking));
        }
    }

    public function sendNewBookingToAdmin(Booking $booking): void
    {
        Mail::to('justtrip20@gmail.com')->queue(new NewBookingAdminMail($booking));
    }

    public function sendGuestBookingConfirmationToCustomer(GuestBooking $guestBooking): void
    {
        Mail::to($guestBooking->email)->queue(new GuestBookingConfirmationMail($guestBooking));
    }

    public function sendGuestBookingToAdmin(GuestBooking $guestBooking): void
    {
        Mail::to('justtrip20@gmail.com')->queue(new GuestBookingAdminMail($guestBooking));
    }
}
