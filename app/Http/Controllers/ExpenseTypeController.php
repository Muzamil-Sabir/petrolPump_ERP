<?php

namespace App\Http\Controllers;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function getExpenseType(){
        $ExpenseType = ExpenseType::all();
        return $ExpenseType;
    }
}
