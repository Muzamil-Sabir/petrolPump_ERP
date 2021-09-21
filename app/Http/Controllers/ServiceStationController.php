<?php

namespace App\Http\Controllers;
use App\Models\ServiceStation;
use Illuminate\Http\Request;
use DB; 
class ServiceStationController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $result=  DB::select(DB::raw("
            SELECT sum(sales) as sales,datetime from servicestation WHERE MONTH(datetime)=MONTH(now()) group by datetime
            "));
        return view('ServiceStationSale',['result'=>$result]);
    }
    public function store(){
        $data = new ServiceStation();
        $data->sales = request('sales');
        $data->datetime = request('datetime');
        $data->save();
        return redirect('/ServiceStationSale')->with('Sales Added Successfully');

    }
}
