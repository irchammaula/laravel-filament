<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OyDisbursementService
{
    protected $client;
    protected $baseUrl;
    protected $username;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = env('OY_API_URL');  // Pastikan sudah mengonfigurasi URL di .env
        $this->username = env('OY_USERNAME'); // Pastikan sudah mengonfigurasi username di .env
        $this->apiKey = env('OY_API_KEY'); // Pastikan sudah mengonfigurasi API key di .env
    }

    public function createDisbursement($data)
    {
        try {
            $response = $this->client->post("{$this->baseUrl}/api/remit", [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'x-oy-username' => $this->username,
                    'x-api-key' => $this->apiKey,
                ],
                'json' => $data,
            ]);

            $responseBody = json_decode($response->getBody()->getContents(), true);
            return $responseBody;
        } catch (RequestException $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}
