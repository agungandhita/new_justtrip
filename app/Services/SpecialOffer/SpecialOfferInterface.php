<?php

namespace App\Services\SpecialOffer;

use App\Models\Content\SpecialOffer;
use Illuminate\Pagination\LengthAwarePaginator;

interface SpecialOfferInterface
{
    public function getOffers(array $filters): LengthAwarePaginator;

    public function getOffer(string $slug): SpecialOffer;

    public function getFeatured(int $limit): \Illuminate\Support\Collection;

    public function getAll(array $filters): LengthAwarePaginator;

    public function findById(string $id): SpecialOffer;

    public function create(array $data): SpecialOffer;

    public function update(string $id, array $data): SpecialOffer;

    public function delete(string $id): void;
}
