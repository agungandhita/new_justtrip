<?php

namespace App\Services\Layanan;

use App\DTOs\Layanan\CreateLayananDTO;
use App\DTOs\Layanan\UpdateLayananDTO;
use App\Models\Trip\Layanan;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface LayananInterface
{
    public function getAll(array $filters): LengthAwarePaginator;

    public function findById(string $id): Layanan;

    public function findBySlug(string $slug): Layanan;

    public function getActiveList(): Collection;

    public function create(CreateLayananDTO $dto): Layanan;

    public function update(string $id, UpdateLayananDTO $dto): Layanan;

    public function delete(string $id): void;

    public function toggleStatus(string $id): Layanan;
}
