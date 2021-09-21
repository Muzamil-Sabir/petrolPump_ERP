<?php

namespace App\Http\Controllers;
use App\Models\ExpenseHead;
use Illuminate\Http\Request;

class ExpenseHeadController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request){

        $ExpenseHead = new ExpenseHead();
        $ExpenseHead->name=$request['expensehead'];
        $ExpenseHead->save();
        return redirect('/expense');
    }

    public function getExpenseHead(){
        $expenseHead=ExpenseHead::all();
        return $expenseHead;
    }
}
