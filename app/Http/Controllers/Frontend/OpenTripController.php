<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Layanan\LayananInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class OpenTripController extends Controller
{
    public function __construct(private LayananInterface $layananService) {}

    public function index(Request $request): Response
    {
        // We fetch active Open Trips via LayananService using 'jenis_layanan' => 'open_trip'
        $openTrips = $this->layananService->getAll(['jenis_layanan' => 'open_trip', 'status' => 'aktif']);

        return Inertia::render('Frontend/OpenTrip/Index', [
            'openTrips' => $openTrips,
        ]);
    }
}
