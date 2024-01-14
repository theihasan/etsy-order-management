<?php

namespace App\Http\Controllers;

use App\Constant\Limit;
use Illuminate\Http\Request;
use App\Services\ReciptsServices;
use App\Http\Requests\ShopRequest;

class OrderController extends Controller
{
    public function index(ReciptsServices $reciptsServices, Request $request, $shopId)
    {
        $page = $request->query('page');
        $recipts = $reciptsServices->getShopRecipts($shopId, $page);
        return view('orders.index',['orderData' => $recipts, 'page' => $page]);
    }
}
