<?php
//This page shows the 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\diprodScale;


class DiprodScaleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

        return view('DiprodScale');
    }
    public function store(){
        $data = new diprodScale();
        $data->fk_nozzel_type = 1;
        $data->fill = request('fill');
        $data->LT = request('lt');
        $data->LG = request('lg');
        $data->save();
        return redirect('/DiprodScale');

    }

    public function showDiprodScale(){

        $diprodScale = diprodScale::all();
        return view('viewDiprodScale',['diprodScale'=>$diprodScale]);
    }

    }
