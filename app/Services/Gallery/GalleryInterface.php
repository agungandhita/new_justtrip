<?php

namespace App\Services\Gallery;

use App\Models\Content\Gallery;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface GalleryInterface
{
    public function getGalleries(array $filters): LengthAwarePaginator;

    public function getGallery(string $slug): Gallery;

    public function getAll(array $filters): LengthAwarePaginator;

    public function findById(string $id): Gallery;

    public function create(array $data): Gallery;

    public function update(string $id, array $data): Gallery;

    public function delete(string $id): void;

    public function deleteImage(string $id, string $imageUrl): Gallery;
}
