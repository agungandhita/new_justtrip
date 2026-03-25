<?php

namespace App\Mail;

use App\Models\Booking\GuestBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GuestBookingAdminMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public readonly GuestBooking $guestBooking) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[PERMINTAAN BARU] #' . $this->guestBooking->booking_number . ' - JustTrip',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-guest-booking',
        );
    }
}
