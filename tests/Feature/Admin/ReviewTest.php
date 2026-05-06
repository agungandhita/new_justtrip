<?php

use App\Enums\UserRole;
use App\Models\Content\Review;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => UserRole::Admin]);
    $this->actingAs($this->admin);
});

// ── Index ─────────────────────────────────────────────────────────────────────

test('admin can view reviews index', function () {
    Review::factory()->count(3)->create();

    $this->get(route('admin.reviews.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Reviews/Index'));
});

test('guest is redirected from reviews index', function () {
    auth()->logout();
    $this->get(route('admin.reviews.index'))->assertRedirect(route('login'));
});

// ── Create / Store ─────────────────────────────────────────────────────────────

test('admin can view review create form', function () {
    $this->get(route('admin.reviews.create'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Reviews/Create'));
});

test('admin can create a review', function () {
    $this->post(route('admin.reviews.store'), [
        'nama_reviewer' => 'Budi Santoso',
        'rating'        => 5,
        'komentar'      => 'Trip yang luar biasa! Sangat merekomendasikan.',
        'destinasi'     => 'Raja Ampat',
        'is_active'     => true,
    ])->assertRedirect(route('admin.reviews.index'));

    $this->assertDatabaseHas('reviews', ['nama_reviewer' => 'Budi Santoso', 'rating' => 5]);
});

test('store validates required fields', function () {
    $this->post(route('admin.reviews.store'), [])
        ->assertSessionHasErrors(['nama_reviewer', 'rating', 'komentar']);
});

test('store validates rating range 1-5', function () {
    $this->post(route('admin.reviews.store'), [
        'nama_reviewer' => 'Test',
        'rating'        => 6,
        'komentar'      => 'Test komentar.',
    ])->assertSessionHasErrors(['rating']);

    $this->post(route('admin.reviews.store'), [
        'nama_reviewer' => 'Test',
        'rating'        => 0,
        'komentar'      => 'Test komentar.',
    ])->assertSessionHasErrors(['rating']);
});

// ── Edit / Update ─────────────────────────────────────────────────────────────

test('admin can update a review', function () {
    $review = Review::factory()->create();

    $this->put(route('admin.reviews.update', $review), [
        'nama_reviewer' => 'Siti Updated',
        'rating'        => 4,
        'komentar'      => 'Komentar yang diperbarui.',
        'is_active'     => true,
    ])->assertRedirect(route('admin.reviews.index'));

    $this->assertDatabaseHas('reviews', ['nama_reviewer' => 'Siti Updated']);
});

test('update validates required fields', function () {
    $review = Review::factory()->create();

    $this->put(route('admin.reviews.update', $review), [])
        ->assertSessionHasErrors(['nama_reviewer', 'rating', 'komentar']);
});

// ── Destroy ───────────────────────────────────────────────────────────────────

test('admin can delete a review', function () {
    $review = Review::factory()->create();

    $this->delete(route('admin.reviews.destroy', $review))
        ->assertRedirect(route('admin.reviews.index'));

    $this->assertDatabaseMissing('reviews', ['id' => $review->id]);
});

// ── Toggle Active ─────────────────────────────────────────────────────────────

test('admin can toggle review active status', function () {
    $review = Review::factory()->create(['is_active' => true]);

    $this->post(route('admin.reviews.toggle-active', $review))
        ->assertRedirect();
});
