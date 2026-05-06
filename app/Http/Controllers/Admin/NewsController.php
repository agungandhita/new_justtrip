<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HasPaginationResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
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

    public function store(StoreNewsRequest $request): RedirectResponse
    {
        $this->newsService->create($request->validated());

        return redirect()->route('admin.news.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(string $id): Response
    {
        $news = $this->newsService->findById($id);

        return Inertia::render('Admin/News/Edit', compact('news'));
    }

    public function update(UpdateNewsRequest $request, string $id): RedirectResponse
    {
        $this->newsService->update($id, $request->validated());

        return redirect()->route('admin.news.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->newsService->delete($id);

        return redirect()->route('admin.news.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
