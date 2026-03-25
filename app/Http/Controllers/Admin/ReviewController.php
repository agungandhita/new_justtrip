<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HasPaginationResource;
use App\Http\Controllers\Controller;
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
        $reviews = $this->reviewService->getAll($request->only(['search']));

        return Inertia::render('Admin/Reviews/Index', [
            'reviews' => $this->paginateToResource($reviews),
            'filters' => $request->only(['search']),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Reviews/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_reviewer' => ['required', 'string', 'max:255'],
            'rating'        => ['required', 'integer', 'min:1', 'max:5'],
            'komentar'      => ['required', 'string'],
            'destinasi'     => ['nullable', 'string', 'max:255'],
            'is_active'     => ['boolean'],
            'order_column'  => ['nullable', 'integer'],
        ]);

        $this->reviewService->create($request->all());

        return redirect()->route('admin.reviews.index')->with('success', 'Review berhasil ditambahkan.');
    }

    public function edit(string $id): Response
    {
        $review = $this->reviewService->findById($id);

        return Inertia::render('Admin/Reviews/Edit', compact('review'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_reviewer' => ['required', 'string', 'max:255'],
            'rating'        => ['required', 'integer', 'min:1', 'max:5'],
            'komentar'      => ['required', 'string'],
        ]);

        $this->reviewService->update($id, $request->all());

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
