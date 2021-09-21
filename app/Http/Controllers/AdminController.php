<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $users = User::where('user_id','!=',auth()->user()->user_id)->get();

        return view('users',['users'=>$users]);
    }

    public function create(Request $request){

       $form_data = array(
            'role_id'=>1,
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        );
        $user = User::create($form_data);

        return redirect('/users');

    }
}
