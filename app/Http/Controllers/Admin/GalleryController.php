<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HasPaginationResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGalleryRequest;
use App\Http\Requests\Admin\UpdateGalleryRequest;
use App\Services\Gallery\GalleryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class GalleryController extends Controller
{
    use HasPaginationResource;

    public function __construct(private GalleryInterface $galleryService) {}

    public function index(Request $request): Response
    {
        $galleries = $this->galleryService->getAll($request->only(['search']));

        return Inertia::render('Admin/Galleries/Index', [
            'galleries' => $this->paginateToResource($galleries),
            'filters'   => $request->only(['search']),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Galleries/Create');
    }

    public function store(StoreGalleryRequest $request): RedirectResponse
    {
        $this->galleryService->create($request->validated());

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(string $id): Response
    {
        $gallery = $this->galleryService->findById($id);

        return Inertia::render('Admin/Galleries/Edit', compact('gallery'));
    }

    public function update(UpdateGalleryRequest $request, string $id): RedirectResponse
    {
        $this->galleryService->update($id, $request->validated());

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->galleryService->delete($id);

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil dihapus.');
    }

    public function deleteImage(Request $request, string $id): RedirectResponse
    {
        $request->validate(['image_url' => ['required', 'string']]);
        $this->galleryService->deleteImage($id, $request->image_url);

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
