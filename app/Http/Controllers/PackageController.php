<?php

namespace App\Http\Controllers;

use App\Services\Package\PackageInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PackageController extends Controller
{
    public function __construct(private PackageInterface $packageService) {}

    public function index(Request $request): Response
    {
        $packages = $this->packageService->getPackages($request->only(['jenis_layanan', 'wilayah', 'search']));

        return Inertia::render('Packages/Index', [
            'packages'  => $packages,
            'filters'   => $request->only(['jenis_layanan', 'wilayah', 'search']),
        ]);
    }

    public function show(string $slug): Response
    {
        $layanan = $this->packageService->getPackage($slug);

        return Inertia::render('Packages/Show', compact('layanan'));
    }
}
