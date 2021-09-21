<?php
namespace App\Http\Controllers;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DataTables;

class TariffController extends Controller
{
public function tariff(){

}

     public function __construct()
    {
        $this->middleware('auth');
    }


    public function getTariffList(Request $request)
    {
        if ($request->ajax()) {
            $data = Tariff::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
                return view('tariffLog');

    }
    


    public function index(){
        $allTariff = Tariff::all();
        $tariff = Tariff::where('isActive',1)->get();
        //dd($tariff);
        return view('/tariff',['tariff'=>$tariff],['allTariff' => $allTariff]);
         //print_r($tariff);
    }
    
    public function store(Request $request){

        $rules = [

            'hsdTariff' => 'required|numeric',
             'superTariff' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect('/tariff')
            ->withInput()
            ->withErrors($validator);
        }
        else{

       $form_data = array(

            0 => array(
                    'price' => $request['hsdTariff'],
                    'nozzel_type' => '1',
                    'added_by'=>auth()->user()->user_id
                ),

            1 => array(
                    'price' => $request['superTariff'],
                    'nozzel_type' => '2',
                    'added_by'=>auth()->user()->user_id
                )     


           
        
    );
      
       Tariff::where("isActive", 1)->update(["isActive" =>0]);
        
        for($i=0;$i<sizeof($form_data);$i++){

            Tariff::create($form_data[$i]);
        }
               //Tariff::create($form_data);
                  session()->flash("success","Stock Addedd Successfully");

               return redirect('/tariff')->with('status',"Insert successfully");
            }
    }
}
