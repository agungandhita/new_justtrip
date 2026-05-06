<?php

use App\Enums\UserRole;
use App\Models\Content\Gallery;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => UserRole::Admin]);
    $this->actingAs($this->admin);
});

// ── Index ─────────────────────────────────────────────────────────────────────

test('admin can view galleries index', function () {
    Gallery::factory()->count(3)->create();

    $this->get(route('admin.galleries.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Galleries/Index'));
});

test('guest is redirected from galleries index', function () {
    auth()->logout();
    $this->get(route('admin.galleries.index'))->assertRedirect(route('login'));
});

// ── Create / Store ─────────────────────────────────────────────────────────────

test('admin can view gallery create form', function () {
    $this->get(route('admin.galleries.create'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Galleries/Create'));
});

test('admin can create a gallery', function () {
    $this->post(route('admin.galleries.store'), [
        'judul'         => 'Album Raja Ampat 2026',
        'lokasi_tujuan' => 'Raja Ampat, Papua Barat',
        'is_active'     => true,
    ])->assertRedirect(route('admin.galleries.index'));

    $this->assertDatabaseHas('galleries', ['judul' => 'Album Raja Ampat 2026']);
});

test('store validates required fields', function () {
    $this->post(route('admin.galleries.store'), [])
        ->assertSessionHasErrors(['judul', 'lokasi_tujuan']);
});

// ── Edit / Update ─────────────────────────────────────────────────────────────

test('admin can update a gallery', function () {
    $gallery = Gallery::factory()->create();

    $this->put(route('admin.galleries.update', $gallery), [
        'judul'         => 'Album Diperbarui',
        'lokasi_tujuan' => 'Labuan Bajo, NTT',
        'is_active'     => true,
    ])->assertRedirect(route('admin.galleries.index'));

    $this->assertDatabaseHas('galleries', ['judul' => 'Album Diperbarui']);
});

test('update validates required fields', function () {
    $gallery = Gallery::factory()->create();

    $this->put(route('admin.galleries.update', $gallery), [])
        ->assertSessionHasErrors(['judul', 'lokasi_tujuan']);
});

// ── Destroy ───────────────────────────────────────────────────────────────────

test('admin can delete a gallery', function () {
    $gallery = Gallery::factory()->create();

    $this->delete(route('admin.galleries.destroy', $gallery))
        ->assertRedirect(route('admin.galleries.index'));

    $this->assertDatabaseMissing('galleries', ['id' => $gallery->id]);
});
