<?php

namespace App\Http\Controllers;
use App\Models\nozzelReadings;
use App\Models\LubricantItems;
use App\Models\stockin;
use App\Models\LubricantStockin;
use App\Models\DailyLubStock;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $current_stock =(new nozzeltypeController)->show();
        return view('dashboard',['current_stock'=>$current_stock]);
    }

public function index2()
    {
        $nozzelsData = nozzelReadings::where('isActive','1')->get();

        $serviceStationData = DB::select(DB::raw("SELECT sales , datetime FROM `servicestation` ORDER By serviceStation_id desc limit 1"));

            $lubricantSales = DB::select(DB::raw("select lubricant_items.lubricant_item_id, lubricant_items.item_name, (SELECT lubricant_sales.quantity*lubricant_sales.current_price from lubricant_sales where lubricant_sales.item_id = lubricant_items.lubricant_item_id ORDER by lubricant_sales.lubricant_sales_id DESC LIMIT 1) as sale,(SELECT lubricant_sales.sale_date from lubricant_sales where lubricant_sales.item_id = lubricant_items.lubricant_item_id ORDER by lubricant_sales.lubricant_sales_id DESC LIMIT 1) as sale_date FROM lubricant_items where isActive =1"));

            return view('/mainDashboard',['nozzelsData'=>$nozzelsData,'serviceStationData'=>$serviceStationData,'lubricantSales'=>$lubricantSales]);
    }
}
