<?php

namespace App\Http\Controllers;
use App\Models\Nozzeltype;
use Illuminate\Http\Request;

class nozzeltypeController extends Controller
{
   function show(){
  $data= 	Nozzeltype::all();
  return $data;
   }
}
