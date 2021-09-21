<?php

namespace App\Http\Controllers;
use App\Models\Stockin;
use App\Models\Nozzeltype;
use App\Models\Distributor;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class StockinController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
      {
     $quantity =    Nozzeltype::all(['nozzel_id','quantity']);
     $distributors = Distributor::all(['distributor_id','name']);
        return view('stockin',['quantity'=>$quantity,'distributors'=>$distributors]);
      }

       public function store(Request $req)
    {

        $rules = [

            'hsdquantity' => 'required|numeric',
             'hsdtotalamount' => 'required|numeric',
             'hsdpaidamount' => 'required|numeric',
            
             'hsdindentprice' => 'required|numeric',
             'hsdtemperature' => 'required|numeric',
             'hsdreceipt' => 'required',
             'hsdshipment' => 'required',
             'hsdcarrier' => 'required',
            'hsdcarriername' => 'required',
             'hsdorder' => 'required',
             'hsddelivery' => 'required',
             'hsdseal' => 'required',

             'superquantity' => 'required|numeric',
             'supertotalamount' => 'required|numeric',
             'superpaidamount' => 'required|numeric',
          
             'superindentprice' => 'required|numeric',
             'supertemperature' => 'required|numeric',
             'superreceipt' => 'required',
             'supershipment' => 'required',
             'supercarrier' => 'required',
                'supercarriername' => 'required',
             'superorder' => 'required',
             'superdelivery' => 'required',
             'superseal' => 'required',
             'date'=>'required',
        ];
        $validator = Validator::make($req->all(),$rules);
        if ($validator->fails()) {
            return redirect('/stockin')
            ->withInput()
            ->withErrors($validator);
        }else{



    $nozzeltype='hsd';
        //$super='super';
    for($i=1;$i<=2;$i++){
        $PrevStockObj =    Nozzeltype::where('nozzel_id',$i)->pluck('quantity');
        $PreviousStock = $PrevStockObj[0];


        $hsddistributor_id = $req[$nozzeltype.'distributor'];
       // dd($hsddistributor_id);
       

        $hsddistributorPendingAmount = Distributor::where('distributor_id',$hsddistributor_id)->pluck('pending_amount');

        $distributorPreviousAmount = $hsddistributorPendingAmount[0];
        $hsdCurrentAmount = $req[$nozzeltype.'totalamount'];
        $hsdGTotalAmount = $distributorPreviousAmount+$hsdCurrentAmount;
        $hsdPaidAmount = $req[$nozzeltype.'paidamount'];
        $hsdPendingAmount = $hsdGTotalAmount-$hsdPaidAmount;
        //dd($hsdPendingAmount);

        $purchaseObj = new Purchase();
        $purchaseObj->distributor_id=$hsddistributor_id;
        $purchaseObj->previous_amount=$distributorPreviousAmount;
        $purchaseObj->current_amount=$hsdCurrentAmount;
        $purchaseObj->g_total=$hsdGTotalAmount;
        $purchaseObj->paid_amount=$hsdPaidAmount;
        $purchaseObj->pending_amount=$hsdPendingAmount;
        if($purchaseObj->save()){
           // dd($purchaseObj->purchase_id);
          Distributor::where("distributor_id",$purchaseObj->distributor_id)->update(["pending_amount" =>$hsdPendingAmount]);  

            $stockin_data = array(
                'purchase_id'=>$purchaseObj->purchase_id,
                'product_id'=>$i,
                'quantity'=>$req[$nozzeltype.'quantity'],
                'temperature'=>$req[$nozzeltype.'temperature'],
                'indent_price'=>$req[$nozzeltype.'indentprice'],
                'receipt_no'=>$req[$nozzeltype.'receipt'],
                'shipment_no'=>$req[$nozzeltype.'shipment'],
                'carrier_no'=>$req[$nozzeltype.'carrier'],
                'carrier_name'=>$req[$nozzeltype.'carriername'],
                'order_no'=>$req[$nozzeltype.'order'],
                'delivery_no'=>$req[$nozzeltype.'delivery'],
                'seal_no'=>$req[$nozzeltype.'seal'],
                'created_at'=>$req['date'],

            );

            Stockin::create($stockin_data);
            $UpdatedStock = $PreviousStock+$req[$nozzeltype.'quantity'];
            Nozzeltype::where("nozzel_id", $i)->update(["quantity" =>$UpdatedStock]);
            // (new IndentPriceTrackController)->store($i,$req[$nozzeltype.'quantity'],$req[$nozzeltype.'indentprice']);

        }
        $nozzeltype='super';
    }



        }
          session()->flash("success","Stock Addedd Successfully");
         return redirect('/stockin')->with('stock_success',"Stock Addedd Successfully");
        
  }

}
