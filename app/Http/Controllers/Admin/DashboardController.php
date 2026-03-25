<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\DashboardInterface;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __construct(private DashboardInterface $dashboardService) {}

    public function index(): Response
    {
        return Inertia::render('Admin/Dashboard', [
            'statistics'     => $this->dashboardService->getStatistics(),
            'recentBookings' => $this->dashboardService->getRecentBookings(5),
            'topServices'    => $this->dashboardService->getTopServices(5),
        ]);
    }
}
