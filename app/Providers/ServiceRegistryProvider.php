<?php

namespace App\Providers;

use App\Services\Auth\AuthInterface;
use App\Services\Auth\AuthService;
use App\Services\Booking\BookingInterface;
use App\Services\Booking\BookingService;
use App\Services\Dashboard\DashboardInterface;
use App\Services\Dashboard\DashboardService;
use App\Services\Gallery\GalleryInterface;
use App\Services\Gallery\GalleryService;
use App\Services\Home\HomeInterface;
use App\Services\Home\HomeService;
use App\Services\Layanan\LayananInterface;
use App\Services\Layanan\LayananService;
use App\Services\News\NewsInterface;
use App\Services\News\NewsService;
use App\Services\Notification\NotificationInterface;
use App\Services\Notification\NotificationService;
use App\Services\Package\PackageInterface;
use App\Services\Package\PackageService;
use App\Services\Review\ReviewInterface;
use App\Services\Review\ReviewService;
use App\Services\SpecialOffer\SpecialOfferInterface;
use App\Services\SpecialOffer\SpecialOfferService;
use App\Services\User\UserInterface;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;

class ServiceRegistryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthService::class);
        $this->app->bind(BookingInterface::class, BookingService::class);
        $this->app->bind(DashboardInterface::class, DashboardService::class);
        $this->app->bind(GalleryInterface::class, GalleryService::class);
        $this->app->bind(HomeInterface::class, HomeService::class);
        $this->app->bind(LayananInterface::class, LayananService::class);
        $this->app->bind(NewsInterface::class, NewsService::class);
        $this->app->bind(NotificationInterface::class, NotificationService::class);
        $this->app->bind(PackageInterface::class, PackageService::class);
        $this->app->bind(ReviewInterface::class, ReviewService::class);
        $this->app->bind(SpecialOfferInterface::class, SpecialOfferService::class);
        $this->app->bind(UserInterface::class, UserService::class);
    }

    public function boot(): void {}
}
