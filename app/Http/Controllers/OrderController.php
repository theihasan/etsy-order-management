<?php

namespace App\Http\Controllers;

use App\Constant\Limit;
use Illuminate\Http\Request;
use App\Services\ReciptsServices;
use App\Http\Requests\ShopRequest;

class OrderController extends Controller
{
    public function index(ReciptsServices $reciptsServices, $shopId, $page, Request $request){
        $result = $reciptsServices->getShopRecipts($shopId, $page, Limit::LIMIT);
        return $result;
    }
}
