<?php

namespace App\Services\Home;

use App\Enums\BookingStatus;
use App\Enums\LayananStatus;
use App\Models\Booking\Booking;
use App\Models\Content\News;
use App\Models\Content\Review;
use App\Models\Content\SpecialOffer;
use App\Models\Trip\Layanan;
use App\Models\User;

class HomeService implements HomeInterface
{
    public function getHomeData(?User $user): array
    {
        $featuredOffers = SpecialOffer::with('layanan')
            ->active()
            ->featured()
            ->valid()
            ->latest()
            ->limit(3)
            ->get();

        $popularPackages = Layanan::aktif()
            ->latest()
            ->limit(6)
            ->get();

        $latestNews = News::published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        $reviews = Review::active()
            ->limit(6)
            ->get();

        $pendingBooking = null;
        if ($user) {
            $pendingBooking = Booking::where('user_id', $user->id)
                ->where('status', BookingStatus::Approved)
                ->latest()
                ->with('layanan')
                ->first();
        }

        return [
            'featuredOffers'  => $featuredOffers,
            'popularPackages' => $popularPackages,
            'latestNews'      => $latestNews,
            'reviews'         => $reviews,
            'pendingBooking'  => $pendingBooking,
        ];
    }
}
