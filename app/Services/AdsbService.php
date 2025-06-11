<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AdsbService
{
    protected $baseUrl = 'https://api.adsb.lol';
    protected $radius = 100; // Default radius in km
    
    public function __construct()
    {  
    }

    public function fetchPlanes($lat, $lon)
    {
     
        try {
                $url = $this->baseUrl . "/v2/closest/{$lat}/{$lon}/{$this->radius}";
                $response = Http::get($url);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('ADSB API Error: ' . $response->status() . ' - ' . $response->body());
                return [];
            }
        } catch (\Exception $e) {
            Log::error('ADSB API Exception: ' . $e->getMessage());
            return [];
        }
    }
}
