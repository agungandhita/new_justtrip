<?php

namespace App\Services\Package;

use App\Enums\JenisLayanan;
use App\Enums\LayananStatus;
use App\Enums\WilayahLayanan;
use App\Models\Trip\Layanan;
use Illuminate\Pagination\LengthAwarePaginator;

class PackageService implements PackageInterface
{
    public function getPackages(array $filters): LengthAwarePaginator
    {
        return Layanan::query()
            ->aktif()
            ->when(
                isset($filters['jenis_layanan']) && $filters['jenis_layanan'],
                fn ($q) => $q->where('jenis_layanan', $filters['jenis_layanan'])
            )
            ->when(
                isset($filters['wilayah']) && $filters['wilayah'],
                fn ($q) => $q->where('wilayah', $filters['wilayah'])
            )
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('nama_layanan', $filters['search'])
                    ->orWhereLike('lokasi_tujuan', $filters['search'])
            )
            ->latest()
            ->paginate(12)
            ->withQueryString();
    }

    public function getPackage(string $slug): Layanan
    {
        return Layanan::where('slug', $slug)
            ->aktif()
            ->with('specialOffers')
            ->firstOrFail();
    }
}
