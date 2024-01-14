<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class ReciptsServices
{
    protected $baseUrl = 'https://openapi.etsy.com/v3/application/';

    public function getShopRecipts($shopId)
    {
        $endpoint = "shops/{$shopId}/receipts";
        $apiKey = config('etsy.api_key');

        try {
            $response = Http::withHeaders([
                'x-api-key' => $apiKey,
            ])->get($this->baseUrl . $endpoint);

            if ($response->ok()) {
                if(isset($response['result'])) {
                    return view('order-details', ['orderData' => $response['result']]);
                }
                return $response->json();
            }
        } catch (\Exception $e) {
            Log::error('Error in Etsy API request', [
                'message' => $e->getMessage(),
            ]);
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
