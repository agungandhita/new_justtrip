<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Home\HomeInterface;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __construct(private HomeInterface $homeService) {}

    public function index(): Response
    {
        return Inertia::render('Frontend/Home/Index', $this->homeService->getHomeData(Auth::user()));
    }
}
