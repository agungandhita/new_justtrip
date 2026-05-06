<?php

use App\Enums\BookingStatus;
use App\Enums\UserRole;
use App\Models\Booking\Booking;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => UserRole::Admin]);
    $this->actingAs($this->admin);
});

// ── Index ─────────────────────────────────────────────────────────────────────

test('admin can view bookings index', function () {
    Booking::factory()->count(3)->create();

    $this->get(route('admin.bookings.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Bookings/Index'));
});

test('guest is redirected from bookings index', function () {
    auth()->logout();
    $this->get(route('admin.bookings.index'))->assertRedirect(route('login'));
});

// ── Show ─────────────────────────────────────────────────────────────────────

test('admin can view booking detail', function () {
    $booking = Booking::factory()->create();

    $this->get(route('admin.bookings.show', $booking))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Bookings/Show'));
});

// ── Approve ─────────────────────────────────────────────────────────────────

test('admin can approve a booking', function () {
    $booking = Booking::factory()->create(['status' => BookingStatus::Pending]);

    $this->post(route('admin.bookings.approve', $booking), [
        'admin_notes' => 'Booking disetujui, silakan lanjutkan pembayaran.',
    ])->assertRedirect();

    $this->assertDatabaseHas('bookings', [
        'id'     => $booking->id,
        'status' => BookingStatus::Approved->value,
    ]);
});

test('approve validates admin_notes field type', function () {
    $booking = Booking::factory()->create(['status' => BookingStatus::Pending]);

    // admin_notes is nullable, so empty post should pass
    $this->post(route('admin.bookings.approve', $booking), [])
        ->assertRedirect(); // no session errors expected
});

// ── Reject ─────────────────────────────────────────────────────────────────

test('admin can reject a booking', function () {
    $booking = Booking::factory()->create(['status' => BookingStatus::Pending]);

    $this->post(route('admin.bookings.reject', $booking), [
        'rejection_reason' => 'Kuota penuh untuk tanggal tersebut.',
    ])->assertRedirect();

    $this->assertDatabaseHas('bookings', [
        'id'     => $booking->id,
        'status' => BookingStatus::Rejected->value,
    ]);
});

test('reject validates rejection_reason is required', function () {
    $booking = Booking::factory()->create(['status' => BookingStatus::Pending]);

    $this->post(route('admin.bookings.reject', $booking), [])
        ->assertSessionHasErrors(['rejection_reason']);
});

// ── Complete ─────────────────────────────────────────────────────────────────

test('admin can complete a booking', function () {
    $booking = Booking::factory()->approved()->create();

    $this->post(route('admin.bookings.complete', $booking))
        ->assertRedirect();

    $this->assertDatabaseHas('bookings', [
        'id'     => $booking->id,
        'status' => BookingStatus::Completed->value,
    ]);
});

// ── Cancel ─────────────────────────────────────────────────────────────────

test('admin can cancel a booking', function () {
    $booking = Booking::factory()->create(['status' => BookingStatus::Pending]);

    $this->post(route('admin.bookings.cancel', $booking))
        ->assertRedirect();

    $this->assertDatabaseHas('bookings', [
        'id'     => $booking->id,
        'status' => BookingStatus::Cancelled->value,
    ]);
});
