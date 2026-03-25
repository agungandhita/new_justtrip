<?php

namespace App\Services\Package;

use App\Models\Trip\Layanan;
use Illuminate\Pagination\LengthAwarePaginator;

interface PackageInterface
{
    public function getPackages(array $filters): LengthAwarePaginator;

    public function getPackage(string $slug): Layanan;
}
