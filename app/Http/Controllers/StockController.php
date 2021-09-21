<?php

namespace App\Http\Controllers;
use App\Models\Stockin;
use App\Models\DiprodReadings;

use Illuminate\Http\Request;

class StockController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }
  
  public function index()
  {
     return view("/stocking");
  }

 public function currentStock(Request $request)
 {
      $from="";
       $to="";
      $hsd=0;
      $super=0;
    $current_stock=(new nozzeltypeController)->show();
    foreach($current_stock as $row)
    {
        if($row->nozzel_id ==1){
            $hsd=$row->quantity;
        }else{
            $super = $row->quantity;
        }
    }
     




       if($request->method()=='POST')
       {
        $from = $request['from'];
        $to = $request['to'];
            $stock_details= DiprodReadings::whereBetween('reading_date', [$from, $to])->get();
       }else{
        $stock_details = DiprodReadings::latest()->take(2)->get();
       }
    
    return view('currentstock',['stock_details'=>$stock_details,'hsd'=>$hsd,'super'=>$super]);
 }


}
