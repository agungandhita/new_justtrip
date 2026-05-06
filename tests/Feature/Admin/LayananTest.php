<?php

use App\Enums\JenisLayanan;
use App\Enums\LayananStatus;
use App\Enums\UserRole;
use App\Models\Trip\Layanan;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => UserRole::Admin]);
    $this->actingAs($this->admin);
});

// ── Index ─────────────────────────────────────────────────────────────────────

test('admin can view layanan index', function () {
    Layanan::factory()->count(3)->create();

    $this->get(route('admin.layanan.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Layanan/Index'));
});

test('guest is redirected from layanan index', function () {
    auth()->logout();
    $this->get(route('admin.layanan.index'))->assertRedirect(route('login'));
});

// ── Create / Store ─────────────────────────────────────────────────────────────

test('admin can view layanan create form', function () {
    $this->get(route('admin.layanan.create'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Layanan/Create'));
});

test('admin can create layanan open trip', function () {
    $this->post(route('admin.layanan.store'), [
        'nama_layanan'      => 'Trip Raja Ampat 4D3N',
        'jenis_layanan'     => 'open_trip',
        'wilayah'           => 'domestik',
        'lokasi_tujuan'     => 'Raja Ampat, Papua Barat',
        'status'            => 'aktif',
        'deskripsi'         => 'Paket wisata premium ke Raja Ampat.',
        'durasi_hari'       => 4,
        'harga_per_orang'   => 3_500_000,
        'fasilitas_include' => "Hotel\nTransport\nMakan",
        'fasilitas_exclude' => 'Tiket pesawat',
        'itinerary'         => [],
        'syarat_ketentuan'  => [],
    ])->assertRedirect(route('admin.layanan.index'));

    $this->assertDatabaseHas('layanan', ['nama_layanan' => 'Trip Raja Ampat 4D3N']);
});

test('store validates required fields', function () {
    $this->post(route('admin.layanan.store'), [])
        ->assertSessionHasErrors(['nama_layanan', 'jenis_layanan', 'lokasi_tujuan']);
});

// ── Edit / Update ─────────────────────────────────────────────────────────────

test('admin can update layanan', function () {
    $layanan = Layanan::factory()->create();

    $this->put(route('admin.layanan.update', $layanan->id), [
        'nama_layanan'     => 'Trip Labuan Bajo Updated',
        'jenis_layanan'    => JenisLayanan::OpenTrip->value,
        'wilayah'          => 'domestik',
        'lokasi_tujuan'    => 'Labuan Bajo, NTT',
        'status'           => LayananStatus::Aktif->value,
        'deskripsi'        => 'Deskripsi diperbarui.',
        'durasi_hari'      => 3,
        'harga_per_orang'  => 2_500_000,
        'fasilitas_include' => "Hotel\nTransport",
        'fasilitas_exclude' => 'Tiket',
        'itinerary'         => [],
        'syarat_ketentuan'  => [],
    ])->assertRedirect(route('admin.layanan.index'));

    $this->assertDatabaseHas('layanan', ['nama_layanan' => 'Trip Labuan Bajo Updated']);
});

// ── Destroy ───────────────────────────────────────────────────────────────────

test('admin can delete layanan (soft delete)', function () {
    $layanan = Layanan::factory()->create();

    $this->delete(route('admin.layanan.destroy', $layanan->id))
        ->assertRedirect(route('admin.layanan.index'));

    $this->assertSoftDeleted('layanan', ['id' => $layanan->id]);
});
