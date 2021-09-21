<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lubricants;
use Illuminate\Support\Facades\Validator;

class LubricantsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('lubricants');
    }

     public function addLubricantsCategory(){
        $lubricants = $this->getLubricantCategories();
        return view('lubricantCategories',['lubricants'=>$lubricants]);
    }

    public function store(Request $request){

        $rules = [

            'type' => 'required',
             
        ];
         $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('/lubricantCategories')
            ->withInput()
            ->withErrors($validator);
        }else{

        $data = new Lubricants();
        $data->lubricant_type = request('type');
        $data->save();
        return redirect('/lubricantCategories');
        }

    }

    public function getLubricantCategories(){
         $lubricantCategories = Lubricants::where('isActive',1)->get();
         return $lubricantCategories;
    }


}

