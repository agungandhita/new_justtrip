<?php

namespace App\Services\Review;

use App\Models\Content\Review;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ReviewService implements ReviewInterface
{
    public function getActive(int $limit): Collection
    {
        return Review::active()->limit($limit)->get();
    }

    public function getAll(array $filters): LengthAwarePaginator
    {
        return Review::query()
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('nama_reviewer', $filters['search'])
                    ->orWhereLike('komentar', $filters['search'])
            )
            ->orderBy('order_column')
            ->paginate(15)
            ->withQueryString();
    }

    public function findById(string $id): Review
    {
        return Review::findOrFail($id);
    }

    public function create(array $data): Review
    {
        return Review::create($data);
    }

    public function update(string $id, array $data): Review
    {
        $review = $this->findById($id);
        $review->update($data);

        return $review->fresh();
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }

    public function toggleActive(string $id): Review
    {
        $review = $this->findById($id);
        $review->update(['is_active' => ! $review->is_active]);

        return $review->fresh();
    }
}
