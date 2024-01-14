<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReciptsServices;
use App\Http\Requests\ShopRequest;

class OrderController extends Controller
{
    public function index(ShopRequest $request, ReciptsServices $reciptsServices){
        $validatedData = $this->validated();
        $reciptsServices->getShopRecipts($validatedData['shop_id']);
    }
}
