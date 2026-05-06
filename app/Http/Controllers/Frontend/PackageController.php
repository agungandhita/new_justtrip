<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

        return Inertia::render('Frontend/Destinasi/Index', [
            'packages' => $packages,
            'filters'  => $request->only(['jenis_layanan', 'wilayah', 'search']),
        ]);
    }

    public function show(string $slug): Response
    {
        $layanan = $this->packageService->getPackage($slug);

        return Inertia::render('Frontend/Destinasi/Show', compact('layanan'));
    }
}
