<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Lubricants;
use App\Models\LubricantItems;
use Illuminate\Support\Facades\Validator;


class LubricantItemsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = DB::select(DB::raw("  SELECT lubricant_items.lubricant_item_id , lubricant_items.created_at, lubricant_items.item_name, lubricant_items.item_desc, lubricant_items.item_price, lubricant_categories.lubricant_type, lubricant_items.quantity FROM lubricant_items JOIN lubricant_categories on 
                lubricant_items.fk_lubricant_category = lubricant_categories.lubricant_category_id where lubricant_categories.isActive=1 "));;
        $lubricantCategories = (new LubricantsController)->getLubricantCategories();
        return view('lubricantItems',['lubricants'=>$lubricantCategories , 'items'=>$data]);
    }

    public function store(){
        $data = new LubricantItems();
        $data->fk_lubricant_category = request('category');
        $data->item_name = request('name');
        $data->item_desc = request('desc');
        $data->item_price = request('price');
        $data->save();
        return redirect('/lubricantItems');
    }

public function getLubricantItems(){
    $lubricantItems = LubricantItems::where('isActive',1)->get();
    return $lubricantItems;
}

    //update item stock when item sale occurs
    public function SubtractItemQuantity($item_id,$previous_quantity,$current_quantity){

                $update_quantity = $previous_quantity - $current_quantity;
                LubricantItems::where('lubricant_item_id', $item_id)->update(["quantity" =>$update_quantity]);
        }

    //update item stock on when stockin occurs
    public function addItemQuantity($item_id,$previous_quantity,$current_quantity){

                $update_quantity = $previous_quantity + $current_quantity;
                LubricantItems::where('lubricant_item_id', $item_id)->update(["quantity" =>$update_quantity]);
        }


        public function getItemByCategory($lubricantCategoryID){
            $lubricantItems = LubricantItems::where('fk_lubricant_category',$lubricantCategoryID)->get();
            $LubricantItems=compact($lubricantItems);
            return response()->json($lubricantItems);
        }
        
        public function getLubricantItem($id){
            $lubricantCategories = (new LubricantsController)->getLubricantCategories();
            $item = LubricantItems::where('lubricant_item_id',$id)->get();
            return view('editItem',['item'=>$item,'categories'=>$lubricantCategories]);
        } 

        public function update(Request $request){

                $rules = [

            'item_name' => 'required',
            'item_price' => 'required',
            
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }else{

            $item_id = $request['item_id'];
            $item_name = $request['item_name'];
            $item_price = $request['item_price'];
            $item_category = $request['item_category'];
            //dd($new_price);
            LubricantItems::where('lubricant_item_id',$item_id)->update(["item_price"=>$item_price,'item_name'=>$item_name,'fk_lubricant_category'=>$item_category]);
            return redirect('/lubricantItems');
        }
    }      

}
