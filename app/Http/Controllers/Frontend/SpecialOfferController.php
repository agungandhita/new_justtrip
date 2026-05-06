<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SpecialOffer\SpecialOfferInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SpecialOfferController extends Controller
{
    public function __construct(private SpecialOfferInterface $offerService) {}

    public function index(Request $request): Response
    {
        $offers = $this->offerService->getOffers($request->only(['search']));

        return Inertia::render('Frontend/Promo/Index', [
            'offers'  => $offers,
            'filters' => $request->only(['search']),
        ]);
    }

    public function show(string $slug): Response
    {
        $offer = $this->offerService->getOffer($slug);

        return Inertia::render('Frontend/Promo/Index', compact('offer'));
    }
}
