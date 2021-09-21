<?php

namespace App\Http\Controllers;
use App\Models\Distributor;
use App\Models\Stockin;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function getDistributorPurchases($id){


        $distributorPurchase = Purchase::where('distributor_id', $id)
    ->leftJoin('stock_in', 'purchase.purchase_id', '=', 'stock_in.purchase_id')
    ->orderBy('purchase.purchase_id', 'DESC')->first();
    //dd($user_with_organization);

        return view('/purchase');
    }
}
