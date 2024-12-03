<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OYService
{
    public static function createDisbursement(array $data)
    {
        $response = Http::withHeaders([
            'x-api-key' => env('OY_API_KEY'),
            'x-oy-username' => env('OY_USERNAME'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post(env('OY_BASE_URL') . '/api/remit', $data);

        return $response->json();
    }
}
