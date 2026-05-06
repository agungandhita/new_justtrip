<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Review\ReviewInterface;
use Inertia\Inertia;
use Inertia\Response;

class AboutController extends Controller
{
    public function __construct(private ReviewInterface $reviewService) {}

    public function index(): Response
    {
        $reviews = $this->reviewService->getActive(6);

        return Inertia::render('Frontend/About/Index', compact('reviews'));
    }
}
