<?php

namespace App\Services\SpecialOffer;

use App\Models\Content\SpecialOffer;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SpecialOfferService implements SpecialOfferInterface
{
    public function getOffers(array $filters): LengthAwarePaginator
    {
        return SpecialOffer::with('layanan')
            ->active()
            ->valid()
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('title', $filters['search'])
            )
            ->latest()
            ->paginate(12)
            ->withQueryString();
    }

    public function getOffer(string $slug): SpecialOffer
    {
        return SpecialOffer::where('slug', $slug)
            ->with('layanan')
            ->firstOrFail();
    }

    public function getFeatured(int $limit): Collection
    {
        return SpecialOffer::with('layanan')
            ->active()
            ->featured()
            ->valid()
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function getAll(array $filters): LengthAwarePaginator
    {
        return SpecialOffer::with('layanan')
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('title', $filters['search'])
            )
            ->when(
                isset($filters['is_active']) && $filters['is_active'] !== null,
                fn ($q) => $q->where('is_active', $filters['is_active'])
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();
    }

    public function findById(string $id): SpecialOffer
    {
        return SpecialOffer::with('layanan')->findOrFail($id);
    }

    public function create(array $data): SpecialOffer
    {
        return SpecialOffer::create($data);
    }

    public function update(string $id, array $data): SpecialOffer
    {
        $offer = $this->findById($id);
        $offer->update($data);

        return $offer->fresh();
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }
}
