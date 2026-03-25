<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Collection;

interface DashboardInterface
{
    public function getStatistics(): array;

    public function getRecentBookings(int $limit): Collection;

    public function getTopServices(int $limit): Collection;
}
