<?php

namespace App\Services\Gallery;

use App\Models\Content\Gallery;
use Illuminate\Pagination\LengthAwarePaginator;

class GalleryService implements GalleryInterface
{
    public function getGalleries(array $filters): LengthAwarePaginator
    {
        return Gallery::active()
            ->when(
                isset($filters['kategori']) && $filters['kategori'],
                fn ($q) => $q->where('kategori', $filters['kategori'])
            )
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('judul', $filters['search'])
                    ->orWhereLike('lokasi_tujuan', $filters['search'])
            )
            ->latest()
            ->paginate(12)
            ->withQueryString();
    }

    public function getGallery(string $slug): Gallery
    {
        return Gallery::where('slug', $slug)->active()->firstOrFail();
    }

    public function getAll(array $filters): LengthAwarePaginator
    {
        return Gallery::query()
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('judul', $filters['search'])
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();
    }

    public function findById(string $id): Gallery
    {
        return Gallery::findOrFail($id);
    }

    public function create(array $data): Gallery
    {
        return Gallery::create($data);
    }

    public function update(string $id, array $data): Gallery
    {
        $gallery = $this->findById($id);
        $gallery->update($data);

        return $gallery->fresh();
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }

    public function deleteImage(string $id, string $imageUrl): Gallery
    {
        $gallery = $this->findById($id);
        $images  = collect($gallery->images ?? [])->reject(fn ($img) => $img === $imageUrl)->values()->toArray();
        $gallery->update(['images' => $images]);

        return $gallery->fresh();
    }
}
