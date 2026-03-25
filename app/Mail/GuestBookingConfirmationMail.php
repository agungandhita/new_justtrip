<?php

namespace App\Mail;

use App\Models\Booking\GuestBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GuestBookingConfirmationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public readonly GuestBooking $guestBooking) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Permintaan Booking #' . $this->guestBooking->booking_number . ' - JustTrip',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.guest-booking-confirmation',
        );
    }
}
