<?php

namespace App\Services\Review;

use App\Models\Content\Review;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ReviewInterface
{
    public function getActive(int $limit): Collection;

    public function getAll(array $filters): LengthAwarePaginator;

    public function findById(string $id): Review;

    public function create(array $data): Review;

    public function update(string $id, array $data): Review;

    public function delete(string $id): void;

    public function toggleActive(string $id): Review;
}
