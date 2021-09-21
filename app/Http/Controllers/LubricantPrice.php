<?php

namespace App\Http\Controllers;
use App\Models\LubricantPrice;
use Illuminate\Http\Request;

class LubricantPrice extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function setPrice($item_id,$price){

        LubricantPrice::where('fk_lubricant_item_id', $item_id)->update(["isActive" =>'0']);
        $LubricantObj = new LubricantPrice();
        $LubricantObj->fk_lubricant_item_id=$item_id;
        $LubricantObj->price=$price;
        $LubricantObj->save();

    }
}
