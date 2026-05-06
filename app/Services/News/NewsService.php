<?php

namespace App\Services\News;

use App\Models\Content\News;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class NewsService implements NewsInterface
{
    public function getArticles(array $filters): LengthAwarePaginator
    {
        return News::published()
            ->when(
                isset($filters['kategori']) && $filters['kategori'],
                fn ($q) => $q->where('kategori', $filters['kategori'])
            )
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('judul', $filters['search'])
            )
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();
    }

    public function getArticle(string $slug): News
    {
        return News::where('slug', $slug)->published()->firstOrFail();
    }

    public function getRelated(string $id, int $limit): Collection
    {
        $article = $this->findById($id);

        return News::published()
            ->where('id', '!=', $id)
            ->where('kategori', $article->kategori)
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }

    public function getAll(array $filters): LengthAwarePaginator
    {
        return News::query()
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('judul', $filters['search'])
            )
            ->when(
                isset($filters['is_published']) && $filters['is_published'] !== null,
                fn ($q) => $q->where('is_published', $filters['is_published'])
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();
    }

    public function findById(string $id): News
    {
        return News::findOrFail($id);
    }

    public function create(array $data): News
    {
        if (! empty($data['is_published']) && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        return News::create($data);
    }

    public function update(string $id, array $data): News
    {
        $news = $this->findById($id);

        // Set published_at only when first time publishing
        if (! empty($data['is_published']) && ! $news->published_at) {
            $data['published_at'] = now();
        }

        $news->update($data);

        return $news->fresh();
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }
}
