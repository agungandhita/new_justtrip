<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HasPaginationResource;
use App\Http\Controllers\Controller;
use App\Services\News\NewsInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class NewsController extends Controller
{
    use HasPaginationResource;
    public function __construct(private NewsInterface $newsService) {}

    public function index(Request $request): Response
    {
        $newsList = $this->newsService->getAll($request->only(['search', 'is_published']));

        return Inertia::render('Admin/News/Index', [
            'newsList' => $this->paginateToResource($newsList),
            'filters'  => $request->only(['search', 'is_published']),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/News/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul'        => ['required', 'string', 'max:255'],
            'konten'       => ['required', 'string'],
            'ringkasan'    => ['nullable', 'string', 'max:500'],
            'kategori'     => ['nullable', 'string', 'max:100'],
            'is_published' => ['boolean'],
        ]);

        $data = $request->except(['_token']);
        if ($data['is_published'] ?? false) {
            $data['published_at'] = now();
        }

        $this->newsService->create($data);

        return redirect()->route('admin.news.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(string $id): Response
    {
        $news = $this->newsService->findById($id);

        return Inertia::render('Admin/News/Edit', compact('news'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'judul'    => ['required', 'string', 'max:255'],
            'konten'   => ['required', 'string'],
        ]);

        $data = $request->except(['_token', '_method']);
        if (($data['is_published'] ?? false) && ! $this->newsService->findById($id)->published_at) {
            $data['published_at'] = now();
        }

        $this->newsService->update($id, $data);

        return redirect()->route('admin.news.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->newsService->delete($id);

        return redirect()->route('admin.news.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
