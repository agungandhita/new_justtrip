<?php

namespace App\Http\Controllers;

use App\Services\Review\ReviewInterface;
use Inertia\Inertia;
use Inertia\Response;

class AboutController extends Controller
{
    public function __construct(private ReviewInterface $reviewService) {}

    public function index(): Response
    {
        $reviews = $this->reviewService->getActive(6);

        return Inertia::render('About', compact('reviews'));
    }
}
