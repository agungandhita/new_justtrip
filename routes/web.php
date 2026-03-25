<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuestBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SpecialOfferController;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

// ── Public ───────────────────────────────────────────────────────────────────

Route::get('/', [HomeController::class, 'index'])->name('home');

// Packages (trips)
Route::prefix('paket-wisata')->name('packages.')->group(function () {
    Route::get('/', [PackageController::class, 'index'])->name('index');
    Route::get('{slug}', [PackageController::class, 'show'])->name('show');
});

// Special Offers
Route::prefix('promo')->name('special-offers.')->group(function () {
    Route::get('/', [SpecialOfferController::class, 'index'])->name('index');
    Route::get('{slug}', [SpecialOfferController::class, 'show'])->name('show');
});

// Gallery
Route::prefix('galeri')->name('gallery.')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('{slug}', [GalleryController::class, 'show'])->name('show');
});

// Articles / News
Route::prefix('artikel')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('{slug}', [ArticleController::class, 'show'])->name('show');
});

// About
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');

// Guest Booking (trip request form — anyone can use)
Route::prefix('request-trip')->name('guest-booking.')->group(function () {
    Route::get('/', [GuestBookingController::class, 'create'])->name('create');
    Route::post('/', [GuestBookingController::class, 'store'])->name('store');
    Route::get('sukses/{bookingNumber}', [GuestBookingController::class, 'success'])->name('success');
});

// ── Auth ─────────────────────────────────────────────────────────────────────

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/daftar', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/daftar', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// ── Authenticated User ────────────────────────────────────────────────────────

Route::middleware('auth')->prefix('booking')->name('booking.')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('buat/{layananId}', [BookingController::class, 'create'])->name('create');
    Route::get('promo/{slug}', [BookingController::class, 'createFromOffer'])->name('create-from-offer');
    Route::post('/', [BookingController::class, 'store'])->name('store');
    Route::get('sukses/{bookingNumber}', [BookingController::class, 'success'])->name('success');
    Route::get('{bookingId}', [BookingController::class, 'show'])->name('show');
    Route::post('{bookingId}/batal', [BookingController::class, 'cancel'])->name('cancel');
});

// ── Admin ─────────────────────────────────────────────────────────────────────

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // Bookings
    Route::prefix('bookings')->name('bookings.')->group(function () {
        Route::get('/', [Admin\BookingController::class, 'index'])->name('index');
        Route::get('{bookingId}', [Admin\BookingController::class, 'show'])->name('show');
        Route::post('{bookingId}/approve', [Admin\BookingController::class, 'approve'])->name('approve');
        Route::post('{bookingId}/reject', [Admin\BookingController::class, 'reject'])->name('reject');
        Route::post('{bookingId}/complete', [Admin\BookingController::class, 'complete'])->name('complete');
        Route::post('{bookingId}/cancel', [Admin\BookingController::class, 'cancel'])->name('cancel');
    });

    // Guest Bookings
    Route::prefix('guest-bookings')->name('guest-bookings.')->group(function () {
        Route::get('/', [Admin\GuestBookingController::class, 'index'])->name('index');
        Route::get('{id}', [Admin\GuestBookingController::class, 'show'])->name('show');
        Route::post('{id}/status', [Admin\GuestBookingController::class, 'updateStatus'])->name('update-status');
    });

    // Layanan (Packages)
    Route::prefix('layanan')->name('layanan.')->group(function () {
        Route::get('/', [Admin\LayananController::class, 'index'])->name('index');
        Route::get('buat', [Admin\LayananController::class, 'create'])->name('create');
        Route::post('/', [Admin\LayananController::class, 'store'])->name('store');
        Route::get('{id}/edit', [Admin\LayananController::class, 'edit'])->name('edit');
        Route::put('{id}', [Admin\LayananController::class, 'update'])->name('update');
        Route::delete('{id}', [Admin\LayananController::class, 'destroy'])->name('destroy');
        Route::post('{id}/toggle-status', [Admin\LayananController::class, 'toggleStatus'])->name('toggle-status');
    });

    // Special Offers
    Route::prefix('special-offers')->name('special-offers.')->group(function () {
        Route::get('/', [Admin\SpecialOfferController::class, 'index'])->name('index');
        Route::get('buat', [Admin\SpecialOfferController::class, 'create'])->name('create');
        Route::post('/', [Admin\SpecialOfferController::class, 'store'])->name('store');
        Route::get('{id}/edit', [Admin\SpecialOfferController::class, 'edit'])->name('edit');
        Route::put('{id}', [Admin\SpecialOfferController::class, 'update'])->name('update');
        Route::delete('{id}', [Admin\SpecialOfferController::class, 'destroy'])->name('destroy');
    });

    // Galleries
    Route::prefix('galleries')->name('galleries.')->group(function () {
        Route::get('/', [Admin\GalleryController::class, 'index'])->name('index');
        Route::get('buat', [Admin\GalleryController::class, 'create'])->name('create');
        Route::post('/', [Admin\GalleryController::class, 'store'])->name('store');
        Route::get('{id}/edit', [Admin\GalleryController::class, 'edit'])->name('edit');
        Route::put('{id}', [Admin\GalleryController::class, 'update'])->name('update');
        Route::delete('{id}', [Admin\GalleryController::class, 'destroy'])->name('destroy');
        Route::post('{id}/delete-image', [Admin\GalleryController::class, 'deleteImage'])->name('delete-image');
    });

    // News / Articles
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [Admin\NewsController::class, 'index'])->name('index');
        Route::get('buat', [Admin\NewsController::class, 'create'])->name('create');
        Route::post('/', [Admin\NewsController::class, 'store'])->name('store');
        Route::get('{id}/edit', [Admin\NewsController::class, 'edit'])->name('edit');
        Route::put('{id}', [Admin\NewsController::class, 'update'])->name('update');
        Route::delete('{id}', [Admin\NewsController::class, 'destroy'])->name('destroy');
    });

    // Reviews
    Route::prefix('reviews')->name('reviews.')->group(function () {
        Route::get('/', [Admin\ReviewController::class, 'index'])->name('index');
        Route::get('buat', [Admin\ReviewController::class, 'create'])->name('create');
        Route::post('/', [Admin\ReviewController::class, 'store'])->name('store');
        Route::get('{id}/edit', [Admin\ReviewController::class, 'edit'])->name('edit');
        Route::put('{id}', [Admin\ReviewController::class, 'update'])->name('update');
        Route::delete('{id}', [Admin\ReviewController::class, 'destroy'])->name('destroy');
        Route::post('{id}/toggle-active', [Admin\ReviewController::class, 'toggleActive'])->name('toggle-active');
    });

    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [Admin\UserController::class, 'index'])->name('index');
        Route::get('buat', [Admin\UserController::class, 'create'])->name('create');
        Route::post('/', [Admin\UserController::class, 'store'])->name('store');
        Route::get('{id}/edit', [Admin\UserController::class, 'edit'])->name('edit');
        Route::put('{id}', [Admin\UserController::class, 'update'])->name('update');
        Route::delete('{id}', [Admin\UserController::class, 'destroy'])->name('destroy');
        Route::post('{id}/toggle-active', [Admin\UserController::class, 'toggleActive'])->name('toggle-active');
    });
});
