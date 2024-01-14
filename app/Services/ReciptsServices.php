<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class ReciptsServices
{
    public function getShopRecipts($shopId, $page = 1, $limit = 25)
    {
        $endpoint = "shops/{$shopId}/receipts";
        $offset = ($page - 1) * $limit;
        try {
            $response = Http::etsy()
                ->get($endpoint,[
                'limit' => $limit,
                'offset' => $offset,
            ]);
            if ($response->ok()) {
                $result = ['success' => true];
                if(isset($response['result'])) {
                    $result['data'] = $response['result'];
                } else {
                    $result['data'] = [];
                }
                return $result;
            }
        } catch (\Exception $e) {
            Log::error('Error in Etsy API request', [
                'message' => $e->getMessage(),
            ]);
           return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
