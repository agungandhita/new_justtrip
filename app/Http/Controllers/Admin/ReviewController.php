<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HasPaginationResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReviewRequest;
use App\Http\Requests\Admin\UpdateReviewRequest;
use App\Services\Review\ReviewInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ReviewController extends Controller
{
    use HasPaginationResource;

    public function __construct(private ReviewInterface $reviewService) {}

    public function index(Request $request): Response
    {
        $reviews = $this->reviewService->getAll($request->only(['search', 'is_active']));

        return Inertia::render('Admin/Reviews/Index', [
            'reviews' => $this->paginateToResource($reviews),
            'filters' => $request->only(['search', 'is_active']),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Reviews/Create');
    }

    public function store(StoreReviewRequest $request): RedirectResponse
    {
        $this->reviewService->create($request->validated());

        return redirect()->route('admin.reviews.index')->with('success', 'Review berhasil ditambahkan.');
    }

    public function edit(string $id): Response
    {
        $review = $this->reviewService->findById($id);

        return Inertia::render('Admin/Reviews/Edit', compact('review'));
    }

    public function update(UpdateReviewRequest $request, string $id): RedirectResponse
    {
        $this->reviewService->update($id, $request->validated());

        return redirect()->route('admin.reviews.index')->with('success', 'Review berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->reviewService->delete($id);

        return redirect()->route('admin.reviews.index')->with('success', 'Review berhasil dihapus.');
    }

    public function toggleActive(string $id): RedirectResponse
    {
        $this->reviewService->toggleActive($id);

        return back()->with('success', 'Status review berhasil diubah.');
    }
}
