<?php

namespace App\Http\Controllers;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
   public function index()
   {
        $distributors = Distributor::all();
        return view("distributor",['distributors'=>$distributors]);
   }

   public function store(){

      $data = new Distributor();
      $data->name = request('name');
      $data->email = request('email');
      $data->phone = request('phone');
      $data->created_by= auth()->user()->user_id;
      $data->save();
      return redirect('distributor');
   }

   public function getPendingAmount()
   {

   }

   public function getDistributors(){
    $distributors = Distributor::all();
    return $distributors;
   }
}
