<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Gallery\GalleryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class GalleryController extends Controller
{
    public function __construct(private GalleryInterface $galleryService) {}

    public function index(Request $request): Response
    {
        $galleries = $this->galleryService->getGalleries($request->only(['kategori', 'search']));

        return Inertia::render('Frontend/Galeri/Index', [
            'galleries' => $galleries,
            'filters'   => $request->only(['kategori', 'search']),
        ]);
    }

    public function show(string $slug): Response
    {
        $gallery = $this->galleryService->getGallery($slug);

        return Inertia::render('Frontend/Galeri/Show', compact('gallery'));
    }
}
