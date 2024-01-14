<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class ReciptsServices
{
    protected $baseUrl = 'https://openapi.etsy.com/v3/application/';

    public function getShopRecipts($shopId, $page = 1, $limit = 25)
    {
        $endpoint = "shops/{$shopId}/receipts";
        $apiKey = config('etsy.api_key');

        try {
            $offset = ($page - 1) * $limit;
            $response = Http::withHeaders([
                'x-api-key' => $apiKey,
            ])->get($this->baseUrl . $endpoint,[
                'limit' => $limit,
                'offset' => $offset,
            ]);

            if ($response->ok()) {
                if(isset($response['result'])) {
                    return view('order-details', ['orderData' => $response['result'],'page' => $page, 'limit' => $limit]);
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
