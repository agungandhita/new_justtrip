<?php

use App\Enums\UserRole;
use App\Models\Content\SpecialOffer;
use App\Models\Trip\Layanan;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => UserRole::Admin]);
    $this->actingAs($this->admin);
});

// ── Index ─────────────────────────────────────────────────────────────────────

test('admin can view special offers index', function () {
    SpecialOffer::factory()->count(3)->create();

    $this->get(route('admin.special-offers.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/SpecialOffers/Index'));
});

test('guest is redirected from special offers index', function () {
    auth()->logout();
    $this->get(route('admin.special-offers.index'))->assertRedirect(route('login'));
});

// ── Create / Store ─────────────────────────────────────────────────────────────

test('admin can view special offer create form', function () {
    $this->get(route('admin.special-offers.create'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/SpecialOffers/Create'));
});

test('admin can create a special offer', function () {
    $payload = [
        'title'               => 'Promo Lebaran 2026',
        'original_price'      => 5_000_000,
        'discounted_price'    => 3_500_000,
        'discount_percentage' => 30,
        'valid_from'          => now()->toDateString(),
        'valid_until'         => now()->addDays(30)->toDateString(),
        'is_active'           => true,
        'is_featured'         => false,
    ];

    $this->post(route('admin.special-offers.store'), $payload)
        ->assertRedirect(route('admin.special-offers.index'));

    $this->assertDatabaseHas('special_offers', ['title' => 'Promo Lebaran 2026']);
});

test('store validates required fields', function () {
    $this->post(route('admin.special-offers.store'), [])
        ->assertSessionHasErrors(['title', 'original_price', 'discounted_price', 'discount_percentage', 'valid_from', 'valid_until']);
});

test('store validates valid_until must be after valid_from', function () {
    $this->post(route('admin.special-offers.store'), [
        'title'               => 'Promo Test',
        'original_price'      => 5_000_000,
        'discounted_price'    => 4_000_000,
        'discount_percentage' => 20,
        'valid_from'          => now()->addDays(10)->toDateString(),
        'valid_until'         => now()->addDays(5)->toDateString(),
    ])->assertSessionHasErrors(['valid_until']);
});

test('store validates discount_percentage max 100', function () {
    $this->post(route('admin.special-offers.store'), [
        'title'               => 'Promo Test',
        'original_price'      => 5_000_000,
        'discounted_price'    => 0,
        'discount_percentage' => 110,
        'valid_from'          => now()->toDateString(),
        'valid_until'         => now()->addDays(30)->toDateString(),
    ])->assertSessionHasErrors(['discount_percentage']);
});

// ── Edit / Update ─────────────────────────────────────────────────────────────

test('admin can update a special offer', function () {
    $offer = SpecialOffer::factory()->create();

    $this->put(route('admin.special-offers.update', $offer), [
        'title'               => 'Promo Diperbarui',
        'original_price'      => 6_000_000,
        'discounted_price'    => 4_500_000,
        'discount_percentage' => 25,
        'valid_from'          => now()->toDateString(),
        'valid_until'         => now()->addDays(30)->toDateString(),
        'is_active'           => true,
        'is_featured'         => false,
    ])->assertRedirect(route('admin.special-offers.index'));

    $this->assertDatabaseHas('special_offers', ['title' => 'Promo Diperbarui']);
});

// ── Destroy ───────────────────────────────────────────────────────────────────

test('admin can delete a special offer', function () {
    $offer = SpecialOffer::factory()->create();

    $this->delete(route('admin.special-offers.destroy', $offer))
        ->assertRedirect(route('admin.special-offers.index'));

    $this->assertDatabaseMissing('special_offers', ['id' => $offer->id]);
});
