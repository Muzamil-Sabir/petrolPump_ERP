<?php

namespace App\Http\Controllers;
use App\Models\ExpenseHead;
use App\Models\Expense;
use Illuminate\Http\Request;
use DB;
class ExpenseController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
         $result=  DB::select(DB::raw("
            SELECT expense.expense_head_id,sum(expense.amount) as amount,(SELECT expense_head.name from expense_head WHERE expense_head.expense_head_id=expense.expense_head_id) as expense_head from expense where MONTH(expense.expense_date)=MONTH(now()) 
        GROUP by expense_head_id

            "));


        $ExpenseHead = (new ExpenseHeadController)->getExpenseHead();
        $ExpenseType = (new ExpenseTypeController)->getExpenseType();
        return View('expense',['ExpenseHead'=>$ExpenseHead,'ExpenseType'=>$ExpenseType,'result'=>$result]);
    }

    public function store(Request $request){
        $Expense = new Expense();
        $Expense->expense_head_id=$request['expense_head'];
        $Expense->expense_type_id=$request['expense_type'];
        $Expense->amount=$request['amount'];
        $Expense->description = $request['description'];
        $Expense->expense_date=$request['date'];
        $Expense->save();
        return redirect('/expense');
    }   


    public function getExpenseHeadDetails($id){

        $result=  DB::select(DB::raw("
            SELECT expense.expense_head_id,expense.amount,expense.description,expense.expense_date,(SELECT expense_head.name from expense_head where expense_head.expense_head_id=expense.expense_head_id) as expense_head,(select expense_type from expense_type where expense_type.id=expense.expense_type_id) as expense_type from expense WHERE expense.expense_head_id='".$id."' AND MONTH(expense.expense_date)=MONTH(now());

            "));

        return view('/expenseDetails',['result'=>$result]);
    }

    public function getexpenseDetailswithDateRange($id,$from,$to){

    $result=  DB::select(DB::raw("
            SELECT expense.expense_head_id,expense.amount,expense.description,expense.expense_date,(SELECT expense_head.name from expense_head where expense_head.expense_head_id=expense.expense_head_id) as expense_head,(select expense_type from expense_type where expense_type.id=expense.expense_type_id) as expense_type from expense WHERE expense.expense_head_id='".$id."' and expense.expense_date between '$from' and '$to';

            "));
    return view('/expenseDetails',['result'=>$result]);
    }
}
