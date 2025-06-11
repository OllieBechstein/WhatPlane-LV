<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/capture', function () {
    try {
        $adsbService = app(\App\Services\AdsbService::class);
        return $adsbService->fetchPlanes(51.7, -0.45);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
})->name('adsb.closest');

//, function ($lat, $lon) 