<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HasPaginationResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSpecialOfferRequest;
use App\Http\Requests\Admin\UpdateSpecialOfferRequest;
use App\Services\Layanan\LayananInterface;
use App\Services\SpecialOffer\SpecialOfferInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SpecialOfferController extends Controller
{
    use HasPaginationResource;

    public function __construct(
        private SpecialOfferInterface $offerService,
        private LayananInterface $layananService,
    ) {}

    public function index(Request $request): Response
    {
        $offers = $this->offerService->getAll($request->only(['search', 'is_active']));

        return Inertia::render('Admin/SpecialOffers/Index', [
            'offers'  => $this->paginateToResource($offers),
            'filters' => $request->only(['search', 'is_active']),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/SpecialOffers/Create', [
            'layananList' => $this->layananService->getActiveList(),
        ]);
    }

    public function store(StoreSpecialOfferRequest $request): RedirectResponse
    {
        $this->offerService->create($request->validated());

        return redirect()->route('admin.special-offers.index')->with('success', 'Special offer berhasil ditambahkan.');
    }

    public function edit(string $id): Response
    {
        $offer = $this->offerService->findById($id);

        return Inertia::render('Admin/SpecialOffers/Edit', [
            'offer'       => $offer,
            'layananList' => $this->layananService->getActiveList(),
        ]);
    }

    public function update(UpdateSpecialOfferRequest $request, string $id): RedirectResponse
    {
        $this->offerService->update($id, $request->validated());

        return redirect()->route('admin.special-offers.index')->with('success', 'Special offer berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->offerService->delete($id);

        return redirect()->route('admin.special-offers.index')->with('success', 'Special offer berhasil dihapus.');
    }
}
