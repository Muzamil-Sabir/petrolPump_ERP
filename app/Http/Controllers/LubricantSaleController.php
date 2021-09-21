<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LubricantItems;
use App\Models\LubricantSale;
use App\Models\DailyLubStock;
use DB;
class LubricantSaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){        //view current month sales on route: lubricantsSale

         $sales=  DB::select(DB::raw("
           SELECT lubricant_sales.item_id,(SELECT fk_lubricant_category from lubricant_items WHERE lubricant_item_id= lubricant_sales.item_id ) as category_id,(SELECT lubricant_type from lubricant_categories WHERE lubricant_category_id=category_id) as category,(SELECT item_name from lubricant_items WHERE lubricant_item_id= lubricant_sales.item_id) as item_name, sum(quantity) as sale_quantity,current_price,sum(current_price*quantity) as sale_rs,max(sale_date) as sale_date from lubricant_sales where MONTH(lubricant_sales.sale_date)=MONTH(now()) GROUP by item_id,current_price
;

            "));


        $lubricantCategories = (new LubricantsController)->getLubricantCategories();
        $lubricantItems = (new LubricantItemsController)->getLubricantItems();



    return view('/lubricantsSale', ['lubricantCategories'=>$lubricantCategories, 'lubricantItems'=>$lubricantItems,'sales'=>$sales]);
        //return view('lubricantsSale');
    }


    public function createSaleView(){ //return create sale view

         $lubricantItems=  DB::select(DB::raw("
           SELECT * from lubricant_items left
            JOIN lubricant_categories on lubricant_items.fk_lubricant_category=lubricant_categories.lubricant_category_id where lubricant_items.isActive=1


            "));
        // $lubricantItems = (new LubricantItemsController)->getLubricantItems();
        return view('createLubricantSale',['lubricantItems'=>$lubricantItems]);

    }

    public function createSale(Request $request){
            $lubricantItems = (new LubricantItemsController)->getLubricantItems();
            $flag=false;
           for($i=1;$i<=count($lubricantItems);$i++){
           if($request['quantity'.$i]>0){
             $previous_stockObj = LubricantItems::where('lubricant_item_id',$request['lubricant_item'.$i])->pluck('quantity');
             $previous_stock = $previous_stockObj[0];
            if(!($request['quantity'.$i]>$previous_stock)){
             
                $LubricantSale = new LubricantSale();
                $LubricantSale->item_id=$request['lubricant_item'.$i];
                $LubricantSale->current_price=$request['price'.$i];
                $LubricantSale->quantity=$request['quantity'.$i];
                $LubricantSale->sale_date=$request['sale_date'];
                $LubricantSale->created_by=auth()->user()->user_id;
                if($LubricantSale->save()){
                    (new LubricantItemsController)->SubtractItemQuantity($request['lubricant_item'.$i],$previous_stock,$LubricantSale->quantity);


                }
             }else{
                    return redirect()->back()->withErrors(['error' => 'Quantity must be less than Stock']);
                } 
            $flag=true;
            }
           }
           if($flag){
            $data=array();
                    $daily_lub_Stock = DB::select(DB::raw("
               SELECT lubricant_items.lubricant_item_id,lubricant_items.item_name,lubricant_items.quantity,(SELECT lubricants_stock_in.indent_price from lubricants_stock_in WHERE lubricants_stock_in.item_id=lubricant_items.lubricant_item_id ORDER by lubricants_stock_in.stock_in_id desc limit 1) as indent_price FROM
                lubricant_items WHERE lubricant_items.isActive=1;

            "));
                    foreach($daily_lub_Stock as $row){
                        array_push($data,['item_id'=>$row->lubricant_item_id,'item_name'=>$row->item_name,'quantity'=>$row->quantity,'indent_price'=>$row->indent_price]);
                    }

                    $DailyLubStock = new DailyLubStock();
                    $DailyLubStock->stock = json_encode($data);
                    $DailyLubStock->created_at = $request['sale_date'];
                    $DailyLubStock->save();
                
           }
        
             return redirect('/createSale');
    }


    public function saleDetails($id){

        $salesDetail=  DB::select(DB::raw("
           SELECT lubricant_sales.item_id,(SELECT item_name from lubricant_items WHERE lubricant_item_id= lubricant_sales.item_id) as item_name, quantity as sale_quantity,current_price,(current_price*quantity) as sale_rs,sale_date as sale_date from lubricant_sales where MONTH(lubricant_sales.sale_date)=MONTH(now()) AND lubricant_sales.item_id='".$id."'
;

            "));

        return view('saleDetails',['salesDetail'=>$salesDetail]);
    }
}
