<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AdsbService;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
    protected $adsbService;
    
    public function __construct(AdsbService $adsbService)
    {
        $this->adsbService = $adsbService;
    }
    
    public function nearby(Request $request)
    {
        $request->validate([
            'lat' => 'required|numeric|between:-90,90',
            'lon' => 'required|numeric|between:-180,180',
        ]);
        
        $planes = $this->adsbService->fetchPlanes(
            $request->lat,
            $request->lon
        );
        
        return response()->json([
            'success' => true,
            'count' => count($planes),
            'planes' => $planes
        ]);
    }
}
