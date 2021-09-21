<?php
namespace App\Http\Controllers;
use App\Models\Distributor;
use App\Models\Lubricants;
use App\Models\LubricantItems;
use App\Models\LubricantStockin;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
class LubricantStockinController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

public function index(){
    $distributors = (new DistributorController)->getDistributors();
    $lubricantCategories = (new LubricantsController)->getLubricantCategories();
    $lubricantItems = (new LubricantItemsController)->getLubricantItems();
     $stock=  DB::select(DB::raw("
          SELECT lubricant_items.item_name,lubricant_items.quantity,lubricant_categories.lubricant_type
from lubricant_items JOIN lubricant_categories on lubricant_items.fk_lubricant_category=lubricant_categories.lubricant_category_id where lubricant_categories.isActive=1
;

            "));

// $lubricantItems = LubricantItems::all();
    return view('/lubricantsStockIn', ['distributers'=>$distributors , 'lubricantCategories'=>$lubricantCategories, 'lubricantItems'=>$lubricantItems,'current_stock'=>$stock]);
}



 public function store(Request $request){

    $rules = [

            'distributor' => 'required',
            'lubricantCategory' => 'required|int',
            'lubricant_item' => 'required',
            'quantity' => 'required',
            'purchaseprice' => 'required',
            'totalamount'=> 'required',
            'paidamount'=> 'required',
             
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('/lubricantsStockIn')
            ->withInput()
            ->withErrors($validator);
        }else{

   // dd($request['lubricant_item']);
        $previous_stockObj = LubricantItems::where('lubricant_item_id',$request['lubricant_item'])->pluck('quantity');

        $previous_stock = $previous_stockObj[0];
        //dd($previous_stock);

        $distributor_id = $request['distributor'];
        $distributor_previous_amountObj = Distributor::where('distributor_id', $distributor_id)->pluck('pending_amount');
        //dd($distributor_pending_amount[0]);
        $distributor_previous_amount = $distributor_previous_amountObj[0];

        $current_amount = $request['totalamount'];
        $g_total_amount = $distributor_previous_amount + $current_amount;
        $paid_amount = $request['paidamount'];

        $pending_amount = $g_total_amount - $paid_amount;

        $purchase = new Purchase();
        $purchase->distributor_id = $distributor_id;
        $purchase->previous_amount = $distributor_previous_amount;
        $purchase->current_amount = $current_amount;
        $purchase->g_total = $g_total_amount;
        $purchase->paid_amount = $paid_amount;
        $purchase->pending_amount = $pending_amount;

        if ($purchase->save()) {
            Distributor::where('distributor_id', $purchase->distributor_id)->update(["pending_amount" =>$pending_amount]);
            $stockin = new LubricantStockin();
            $stockin->purchase_id =$purchase->purchase_id;
            $stockin->item_id = $request['lubricant_item'];
            $stockin->quantity = $request['quantity'];
            $stockin->indent_price = $request['purchaseprice'];
            
            if($stockin->save()) {
                // $update_stockIn = $previous_stock + $request['quantity'];
                // LubricantItems::where('lubricant_item_id', $stockin->item_id)->update(["quantity" =>$update_stockIn]);


                (new LubricantItemsController)->addItemQuantity($request['lubricant_item'],$previous_stock,$request['quantity']);

            }
            return redirect('/lubricantsStockIn');
        }


        // $lubricant_item_id = $request['lubricant_item'];
        // $quantity = $request['quantity'];
        // $purchase_price = $request['purchaseprice'];
        }
    }

}
