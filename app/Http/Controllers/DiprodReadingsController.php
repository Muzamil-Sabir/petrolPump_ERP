<?php
namespace App\Http\Controllers;
use App\Models\DiprodReadings;
use App\Models\diprodScale;
use App\Models\Nozzeltype;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;


class DiprodReadingsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
         $diproad = DiprodReadings::where('isActive',1)->get();
        return view('diprodReadings',['diprodReadings'=>$diproad]);
    }
    public function store(Request $request){

        $rules = [

            'hsd' => 'required|numeric',
             'super' => 'required|numeric',
             'date' => 'required',

        ];
       $validator = Validator::make($request->all(),$rules);
       if ($validator->fails()) {
            return redirect('/diprodReadings')
            ->withInput()
            ->withErrors($validator);
        }else{

            $hsd = $request['hsd']/1000;
            $super = $request['super']/1000;

    $hsdFill = diprodScale::where('fill',$hsd)->where('fk_nozzel_type',1)->pluck('LT');
    $superFill = diprodScale::where('fill',$super)->where('fk_nozzel_type',2)->pluck('LT');

    $hsdCurrentStock = Nozzeltype::where('nozzel_id',1)->get();
    $superCurrentStock = Nozzeltype::where('nozzel_id',2)->get();
    foreach($hsdCurrentStock as $row){
        $HsdBookStock=$row['quantity'];
        $HsdOpeningStock=$row['opening_stock'];
    }
    foreach($superCurrentStock as $row){
        $SuperBookStock=$row['quantity'];
        $SuperOpeningStock=$row['opening_stock'];
    }
   // dd($hsdCurrentStock);

    $form_data = array(

        0 => array(
                'fillReading' => $request['hsd'],
                'nozzel_type' => '1',
                'opening_stock'=>round($HsdOpeningStock,2),
                'physical_stock' => round($hsdFill[0],3),
                'book_stock'=>round($HsdBookStock,3),
                'reading_date'=>$request['date']
            ),

        1 => array(
                'fillReading' => $request['super'],
                'nozzel_type' => '2',
                'opening_stock'=>round($SuperOpeningStock,3),
                'book_stock'=>round($SuperBookStock,3),
                'physical_stock' => round($superFill[0],3),
                'reading_date'=>$request['date']

            )

);
     DiprodReadings::where("isActive", 1)->update(["isActive" =>0]);

        for($i=0;$i<sizeof($form_data);$i++){
            DiprodReadings::create($form_data[$i]);
}
    Nozzeltype::where("nozzel_id", 1)->update(["quantity" =>round($hsdFill[0],3),'opening_stock'=>round($hsdFill[0],3)]);
    Nozzeltype::where("nozzel_id", 2)->update(["quantity" =>round($superFill[0],3),'opening_stock'=>round($superFill[0],3)]);


    session()->flash("success","Stock Addedd Successfully");
    return redirect('/diprodReadings');
        }



    }


    public function getTodaysReadings(Request $request)
    {
       $from="";
       $to="";
       if($request->method()=='POST')
       {
       $from = $request['from'];
       $to = $request['to'];
       $result=  DB::select(DB::raw("
           SELECT diprod_readings.reading_date, diprod_readings.nozzel_type,diprod_readings.opening_stock,stock_in.quantity,(SELECT SUM(nozzel_readings.current_reading-nozzel_readings.old_reading) from nozzel_readings WHERE nozzel_readings.nozzel_type=diprod_readings.nozzel_type and DATE_FORMAT(diprod_readings.reading_date,'%y%m%d')=DATE_FORMAT(nozzel_readings.reading_date,'%y%m%d') ) as sale,diprod_readings.book_stock,diprod_readings.physical_stock from diprod_readings LEFT JOIN stock_in on DATE_FORMAT(diprod_readings.reading_date,'%y%m%d')=DATE_FORMAT(stock_in.created_at,'%y%m%d') and diprod_readings.nozzel_type=stock_in.product_id  where diprod_readings.reading_date between '".$from."' AND '".$to."'   ORDER BY `diprod_readings`.`reading_date` ASC

            "));
       }else{
        $result=  DB::select(DB::raw("
          SELECT diprod_readings.reading_date, diprod_readings.nozzel_type,diprod_readings.opening_stock,stock_in.quantity,(SELECT SUM(nozzel_readings.current_reading-nozzel_readings.old_reading) from nozzel_readings WHERE nozzel_readings.nozzel_type=diprod_readings.nozzel_type and DATE_FORMAT(diprod_readings.reading_date,'%y%m%d')=DATE_FORMAT(nozzel_readings.reading_date,'%y%m%d') ) as sale,diprod_readings.book_stock,diprod_readings.physical_stock from diprod_readings LEFT JOIN stock_in on DATE_FORMAT(diprod_readings.reading_date,'%y%m%d')=DATE_FORMAT(stock_in.created_at,'%y%m%d') and diprod_readings.nozzel_type=stock_in.product_id  where  MONTH(diprod_readings.reading_date)= MONTH(now()) ORDER BY `diprod_readings`.`reading_date` ASC

            "));

       }

        // $currentReadings =DiprodReadings::select('*')
        //     ->whereMonth('reading_date', Carbon::now()->month)
        //     ->get();

        // return view('viewDiprodReadings',['currentReadings'=>$currentReadings]);

        // $users = DB::table('diprod_readings')
        //     ->leftJoin('stock_in',DB::raw('DATE_FORMAT(diprod_readings.reading_date, "%d-%b-%Y")'), '=',DB::raw('DATE_FORMAT(stock_in.created_at, "%d-%b-%Y")'))->select('*')
        //     ->where('diprod_readings.nozzel_type','=','stock_in.product_id')->get();
        //     dd($users);

      // $result=  DB::select(DB::raw("
      //      SELECT diprod_readings.reading_date, diprod_readings.nozzel_type,diprod_readings.opening_stock,stock_in.quantity,(SELECT SUM(nozzel_readings.current_reading-nozzel_readings.old_reading) from nozzel_readings WHERE nozzel_readings.nozzel_type=diprod_readings.nozzel_type and DATE_FORMAT(diprod_readings.reading_date,'%y%m%d')=DATE_FORMAT(nozzel_readings.reading_date,'%y%m%d') ) as sale,diprod_readings.book_stock,diprod_readings.physical_stock from diprod_readings LEFT JOIN stock_in on DATE_FORMAT(diprod_readings.reading_date,'%y%m%d')=DATE_FORMAT(stock_in.created_at,'%y%m%d') and diprod_readings.nozzel_type=stock_in.product_id  where  MONTH(diprod_readings.reading_date)= MONTH(now()) ORDER BY `diprod_readings`.`reading_date` ASC

      //       "));



     // dd($result);
      return view('viewDiprodReadings',['result'=>$result,"from"=>$from,'to'=>$to]);
    }

}

