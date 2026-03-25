<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\Layanan\LayananDTO;
use App\Http\Controllers\Concerns\HasPaginationResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LayananRequest;
use App\Services\Layanan\LayananInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LayananController extends Controller
{
    use HasPaginationResource;
    public function __construct(private LayananInterface $layananService) {}

    public function index(Request $request): Response
    {
        $layananList = $this->layananService->getAll($request->only(['search', 'status', 'jenis_layanan']));

        return Inertia::render('Admin/Layanan/Index', [
            'layananList' => $this->paginateToResource($layananList),
            'filters'     => $request->only(['search', 'status', 'jenis_layanan']),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Layanan/Create');
    }

    public function store(LayananRequest $request): RedirectResponse
    {
        $dto = LayananDTO::fromRequest($request);

        $this->layananService->create($dto);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(string $id): Response
    {
        $layanan = $this->layananService->findById($id);

        return Inertia::render('Admin/Layanan/Edit', compact('layanan'));
    }

    public function update(LayananRequest $request, string $id): RedirectResponse
    {
        $dto = LayananDTO::fromRequest($request);

        $this->layananService->update($id, $dto);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->layananService->delete($id);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }

    public function toggleStatus(string $id): RedirectResponse
    {
        $this->layananService->toggleStatus($id);

        return back()->with('success', 'Status layanan berhasil diubah.');
    }
}
