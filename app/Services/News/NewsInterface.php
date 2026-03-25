<?php

namespace App\Services\News;

use App\Models\Content\News;
use Illuminate\Pagination\LengthAwarePaginator;

interface NewsInterface
{
    public function getArticles(array $filters): LengthAwarePaginator;

    public function getArticle(string $slug): News;

    public function getRelated(string $id, int $limit): \Illuminate\Support\Collection;

    public function getAll(array $filters): LengthAwarePaginator;

    public function findById(string $id): News;

    public function create(array $data): News;

    public function update(string $id, array $data): News;

    public function delete(string $id): void;
}
