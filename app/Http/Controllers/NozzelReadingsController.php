<?php

namespace App\Http\Controllers;
use App\Models\nozzelReadings;
use App\Models\Tariff;
use App\Models\Stockin;
use App\Models\Nozzeltype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class NozzelReadingsController extends Controller
{

        public $hsdN1oldReading=0;
        public $hsdN2oldReading=0;
        public $hsdN3oldReading=0;
        public $hsdN4oldReading=0;


        public $superN1oldReading=0;
        public $superN2oldReading=0;
        public $superN3oldReading=0;
        public $superN4oldReading=0;

        public $hsdN1totalReading = 0;
        public $hsdN2totalReading = 0;
        public $hsdN3totalReading = 0;
        public $hsdN4totalReading = 0;

        public $superN1totalReading = 0;
        public $superN2totalReading = 0;
        public $superN3totalReading = 0;
        public $superN4totalReading = 0;

    public function __construct()
    {
        $this->middleware('auth');
        //$nozzelPrice = Tariff::where('isActive',1)->get();
    }

    public function index(){
     $nozzelsData = nozzelReadings::where('isActive','1')->get();
     foreach($nozzelsData as $value){
            if($value['nozzel_type']==1 && $value['nozzel_number']=='N1'){
                $this->hsdN1totalReading = $value['total_readings'];
            }
            if($value['nozzel_type']==1 && $value['nozzel_number']=='N2'){
                $this->hsdN2totalReading = $value['total_readings'];
            }

            if($value['nozzel_type']==1 && $value['nozzel_number']=='N3'){
                 $this->hsdN3totalReading = $value['total_readings'];
            }
            if($value['nozzel_type']==1 && $value['nozzel_number']=='N4'){
                $this->hsdN4totalReading = $value['total_readings'];
            }
            if($value['nozzel_type']==2 && $value['nozzel_number']=='N1'){
               $this->superN1totalReading = $value['total_readings'];
            }

            if($value['nozzel_type']==2 && $value['nozzel_number']=='N2'){
               $this->superN2totalReading = $value['total_readings'];
            }
            if($value['nozzel_type']==2 && $value['nozzel_number']=='N3'){
               $this->superN3totalReading = $value['total_readings'];
            }
            if($value['nozzel_type']==2 && $value['nozzel_number']=='N4'){
               $this->superN4totalReading = $value['total_readings'];
            }
         }
      return view('nozzleReadings',['hsdN1totalReading'=>$this->hsdN1totalReading,'hsdN2totalReading'=>$this->hsdN2totalReading,'hsdN3totalReading'=>$this->hsdN3totalReading,'hsdN4totalReading'=>$this->hsdN4totalReading,'superN1totalReading'=>$this->superN1totalReading,'superN2totalReading'=>$this->superN2totalReading,'superN3totalReading'=>$this->superN3totalReading,'superN4totalReading'=>$this->superN4totalReading]);

    }


    public function uploadReadings(Request $request){

        $rules = [

            'hsdn1' => 'required|numeric',
             'hsdn2' => 'required|numeric',
             'hsdn3' => 'required|numeric',
             'hsdn4' => 'required|numeric',
             'supern1' => 'required|numeric',
             'supern2' => 'required|numeric',
             'supern3' => 'required|numeric',
             'supern4' => 'required|numeric',
             'readingdate' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('/nozzleReadings')
            ->withInput()
            ->withErrors($validator);
        }else{

      $nozzelPrice = Tariff::where('isActive',1)->get();
        foreach($nozzelPrice as $Currentprice){
            if($Currentprice->nozzel_type==1){
                $hsdPrice = $Currentprice->price;
            }
            else{
                 $superPrice = $Currentprice->price;
            }

        }

        $nozzelsData = nozzelReadings::where('isActive','1')->get();
         // $hsdN1Data = nozzelReadings::where('isActive','1')->get();



         foreach($nozzelsData as $value){
            if($value['nozzel_type']==1 && $value['nozzel_number']=='N1'){
                $this->hsdN1oldReading = $value['total_readings'];
                $this->hsdN1totalReading = $value['total_readings'];
            }
            if($value['nozzel_type']==1 && $value['nozzel_number']=='N2'){
               $this->hsdN2oldReading = $value['total_readings'];
                $this->hsdN2totalReading = $value['total_readings'];
            }

            if($value['nozzel_type']==1 && $value['nozzel_number']=='N3'){
               $this->hsdN3oldReading = $value['total_readings'];
                 $this->hsdN3totalReading = $value['total_readings'];
            }
            if($value['nozzel_type']==1 && $value['nozzel_number']=='N4'){
               $this->hsdN4oldReading = $value['total_readings'];
                $this->hsdN4totalReading = $value['total_readings'];
            }
            if($value['nozzel_type']==2 && $value['nozzel_number']=='N1'){
               $this->superN1oldReading = $value['total_readings'];
               $this->superN1totalReading = $value['total_readings'];
            }

            if($value['nozzel_type']==2 && $value['nozzel_number']=='N2'){
               $this->superN2oldReading = $value['total_readings'];
               $this->superN2totalReading = $value['total_readings'];
            }
            if($value['nozzel_type']==2 && $value['nozzel_number']=='N3'){
               $this->superN3oldReading = $value['total_readings'];
               $this->superN3totalReading = $value['total_readings'];
            }
            if($value['nozzel_type']==2 && $value['nozzel_number']=='N4'){
               $this->superN4oldReading = $value['total_readings'];
               $this->superN4totalReading = $value['total_readings'];
            }
         }
         // $hsdId=0;$hsdIndentPrice=0;$hsdStock=0;
         // $superId=0;$superIndentPrice=0;$superStock=0;
        // for($i=1;$i<=2;$i++){
        //     $result = (new IndentPriceTrackController)->currentIndent($i);
        //     //dd($result);
        //     foreach($result as $row){
        //         if($i==1){
        //             $hsdId = $row->id;
        //             $hsdIndentPrice = $row->indent_price;
        //             $hsdStock = $row->stock;
        //         }else{
        //             $superId = $row->id;
        //             $superIndentPrice = $row->indent_price;
        //             $superStock = $row->stock;
        //         }
        //     }

        // }
        //dd($superStock);



       $form_data = array(

            0 => array(
                    'nozzel_type'=>'1',
                    'nozzel_number' => 'N1',
                    
                    'current_nozzle_price' =>$hsdPrice,
                    'old_reading' =>$this->hsdN1oldReading,
                    'current_reading' => $request['hsdn1'],
                     'total_readings' =>($request['hsdn1']-$this->hsdN1oldReading)+$this->hsdN1totalReading,

                    'added_by'=>auth()->user()->user_id,
                    'reading_date'=>$request['readingdate']
                ),

            1 => array(
                    'nozzel_type' =>'1',
                    'nozzel_number' => 'N2',
                   
                    'current_nozzle_price' =>$hsdPrice,
                    'old_reading' =>$this->hsdN2oldReading,
                    'current_reading' => $request['hsdn2'],
                     'total_readings' => ($request['hsdn2']-$this->hsdN2oldReading)+$this->hsdN2totalReading,

                    'added_by'=>auth()->user()->user_id,
                    'reading_date'=>$request['readingdate']
                ),

             2 => array(
                    'nozzel_type' =>'1',
                    'nozzel_number' => 'N3',
                    
                    'current_nozzle_price' =>$hsdPrice,
                    'old_reading' =>$this->hsdN3oldReading,
                    'current_reading' => $request['hsdn3'],
                     'total_readings' => ($request['hsdn3']-$this->hsdN3oldReading)+$this->hsdN3totalReading,

                    'added_by'=>auth()->user()->user_id,
                    'reading_date'=>$request['readingdate']
                ),

             3 => array(
                    'nozzel_type' =>'1',
                    'nozzel_number' => 'N4',
                   
                    'current_nozzle_price' =>$hsdPrice,
                    'old_reading' =>$this->hsdN4oldReading,
                    'current_reading' => $request['hsdn4'],
                     'total_readings' => ($request['hsdn4']-$this->hsdN4oldReading)+$this->hsdN4totalReading,

                    'added_by'=>auth()->user()->user_id,
                    'reading_date'=>$request['readingdate']
                ),
              4 => array(
                        'nozzel_type' =>'2',
                        'nozzel_number' => 'N1',
                        
                        'current_nozzle_price' =>$superPrice,
                        'old_reading' =>$this->superN1oldReading,
                         'current_reading' => $request['supern1'],
                        'total_readings' => ($request['supern1']-$this->superN1oldReading)+$this->superN1totalReading,

                        'added_by'=>auth()->user()->user_id,
                    'reading_date'=>$request['readingdate']
                    ),
                 5 => array(
                        'nozzel_type' =>'2',
                        'nozzel_number' => 'N2',
                        
                        'current_nozzle_price' =>$superPrice,
                        'old_reading' =>$this->superN2oldReading,
                        'current_reading' => $request['supern2'],
                         'total_readings' => ($request['supern2']-$this->superN2oldReading)+$this->superN2totalReading,

                        'added_by'=>auth()->user()->user_id,
                    'reading_date'=>$request['readingdate']
                    ),
                  6 => array(
                        'nozzel_type' =>'2',
                        'nozzel_number' => 'N3',
                        
                        'current_nozzle_price' =>$superPrice,
                        'old_reading' =>$this->superN3oldReading,
                        'current_reading' => $request['supern3'],
                         'total_readings' => ($request['supern3']-$this->superN3oldReading)+$this->superN3totalReading,

                        'added_by'=>auth()->user()->user_id,
                    'reading_date'=>$request['readingdate']
                    ),
                   7 => array(
                        'nozzel_type' =>'2',
                        'nozzel_number' => 'N4',
                        
                        'current_nozzle_price' =>$superPrice,
                        'old_reading' =>$this->superN4oldReading,
                        'current_reading' => $request['supern4'],
                         'total_readings' => ($request['supern4']-$this->superN4oldReading)+$this->superN4totalReading,

                        'added_by'=>auth()->user()->user_id,
                    'reading_date'=>$request['readingdate']
                    )




     );
        nozzelReadings::where("isActive", 1)->update(["isActive" =>0]);

        for($i=0;$i<sizeof($form_data);$i++){

            nozzelReadings::create($form_data[$i]);
        }
               // Tariff::create($form_data);

                $this->updateStock();
            return redirect('/viewNozzelReadings');
            }


    }


    public function show(Request $request)
    {

        //$nozzelsData = nozzelReadings::where('isActive',1)->get();
        // $nozzelsData = nozzelReadings::select('*')
        //     ->whereMonth('reading_date', Carbon::now()->month)
        //     ->get();
            //dd($data);
        if($request->method()=='POST')
       {
        
        $from = $request['from'];
        $to = $request['to'];;
        $nozzelsData= nozzelReadings::whereBetween('reading_date', [$from, $to])->get();
       }else{

        $nozzelsData = nozzelReadings::all();
        }
        return view('viewNozzelReadings',['nozzelReadings'=>$nozzelsData]);
    }



    public function updateStock(){

      //dd($SuperActiveStock);

      $ActiveNozzelReadings  = NozzelReadings::where('isActive',1)->get();
      $HsdCum = 0;
      $SuperCum=0;
      foreach($ActiveNozzelReadings as $row){
            if($row->nozzel_type==1)
            {
                $HsdCum+=$row->current_reading-$row->old_reading;
            }
             if($row->nozzel_type==2)
            {
                $SuperCum+=$row->current_reading-$row->old_reading;
            }
      }

    

    
      

       for($i=1;$i<=2;$i++){

         $PrevStockObj = Nozzeltype::where('nozzel_id',$i)->pluck('quantity');
        $PreviousStock = $PrevStockObj[0];
        if($i==1){
            
            $updatedStock = $PreviousStock-$HsdCum;

        }else{

            $updatedStock = $PreviousStock-$SuperCum;
        }

         Nozzeltype::where("nozzel_id", $i)->update(["quantity" =>$updatedStock]);

        }

    }
}
