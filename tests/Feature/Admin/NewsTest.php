<?php

use App\Enums\UserRole;
use App\Models\Content\News;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => UserRole::Admin]);
    $this->actingAs($this->admin);
});

// ── Index ─────────────────────────────────────────────────────────────────────

test('admin can view news index', function () {
    News::factory()->count(3)->published()->create();

    $this->get(route('admin.news.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/News/Index'));
});

test('guest is redirected from news index', function () {
    auth()->logout();
    $this->get(route('admin.news.index'))->assertRedirect(route('login'));
});

// ── Create / Store ─────────────────────────────────────────────────────────────

test('admin can view news create form', function () {
    $this->get(route('admin.news.create'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/News/Create'));
});

test('admin can create a news article', function () {
    $this->post(route('admin.news.store'), [
        'judul'        => 'Artikel Test Wisata',
        'konten'       => 'Konten artikel yang sangat panjang dan informatif tentang wisata.',
        'is_published' => false,
    ])->assertRedirect(route('admin.news.index'));

    $this->assertDatabaseHas('news', ['judul' => 'Artikel Test Wisata']);
});

test('published_at is set when creating a published article', function () {
    $this->post(route('admin.news.store'), [
        'judul'        => 'Artikel Langsung Publish',
        'konten'       => 'Konten artikel.',
        'is_published' => true,
    ]);

    $this->assertDatabaseHas('news', [
        'judul'        => 'Artikel Langsung Publish',
        'is_published' => true,
    ]);

    $news = News::where('judul', 'Artikel Langsung Publish')->first();
    expect($news->published_at)->not->toBeNull();
});

test('store validates required fields', function () {
    $this->post(route('admin.news.store'), [])
        ->assertSessionHasErrors(['judul', 'konten']);
});

// ── Edit / Update ─────────────────────────────────────────────────────────────

test('admin can update a news article', function () {
    $news = News::factory()->create();

    $this->put(route('admin.news.update', $news), [
        'judul'        => 'Judul Diperbarui',
        'konten'       => 'Konten yang diperbarui.',
        'is_published' => false,
    ])->assertRedirect(route('admin.news.index'));

    $this->assertDatabaseHas('news', ['judul' => 'Judul Diperbarui']);
});

test('update validates required fields', function () {
    $news = News::factory()->create();

    $this->put(route('admin.news.update', $news), [])
        ->assertSessionHasErrors(['judul', 'konten']);
});

// ── Destroy ───────────────────────────────────────────────────────────────────

test('admin can delete a news article', function () {
    $news = News::factory()->create();

    $this->delete(route('admin.news.destroy', $news))
        ->assertRedirect(route('admin.news.index'));

    $this->assertDatabaseMissing('news', ['id' => $news->id]);
});
