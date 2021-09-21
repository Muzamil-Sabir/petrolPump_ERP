<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\IndentPriceTrack;
use DB;
class IndentPriceTrackController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($nozzel_type,$stock,$indent_price){

        $IndentTrack = new IndentPriceTrack();
        $IndentTrack->nozzel_type=$nozzel_type;
        $IndentTrack->stock=$stock;
        $IndentTrack->indent_price = $indent_price;
        $IndentTrack->save();
    }

    public function currentIndent($nozzel_type){
        $result=  DB::select(DB::raw("
            SELECT * from indent_price_track WHERE nozzel_type='".$nozzel_type."' AND stock>0 LIMIT 1

            "));
        return $result;

    }

    public function updateIndentStock($id,$current_stock,$updated_stock){
        
        $new_stock  = $current_stock-$updated_stock;
        IndentPriceTrack::where("id", $id)->update(["stock" =>$new_stock]);

    }

}
