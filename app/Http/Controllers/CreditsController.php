<?php
namespace App\Http\Controllers;
use DB;
use App\Models\Credits;
use App\Models\CreditFill;
use App\Models\Parties;
use App\Models\Vehicles;
use App\Models\Nozzeltype;
use App\Models\Tariff;
use Illuminate\Http\Request;
class CreditsController extends Controller
{


   public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){
        $vehicle_type = Nozzeltype::all();
        $parties = Parties::all();
        $vehicles=  DB::select(DB::raw("select credit_vehicles.vehicle_model, credit_vehicles.driver_name, credit_vehicles.driver_contact, credit_vehicles.vehicle_id, credit_vehicles.vehicle_owner, (SELECT credit_parties.owner_name from credit_parties where credit_parties.party_id = credit_vehicles.vehicle_owner) as vehicle_owner from credit_vehicles"));
        return view("credits",['vehicle_type'=>$vehicle_type,'vehicles'=>$vehicles,'parties'=>$parties]);
    }
    public function addParty(){
      $data = new Parties();
      $data->owner_name = request('owner_name');
      $data->owner_contact = request('owner_contact');
        $data->owner_address = request('owner_address');
      //$data->vehicle = request('vehicle');
      //$data->driver_name = request('driver_name');
      //$data->driver_contact = request('driver_contact');
      //$data->vehicle_type = request('vehicle_type');
      $data->created_at = request('date');
      $data->added_by = auth()->user()->user_id;
      //dd($data);
        $data->save();
        return redirect('/credits');
    }


    public function addVehicle()
    {
    $data = new Vehicles();
    $data->vehicle_owner = request('vehicle_owner');
    $data->vehicle_model = request('vehicle_model');
    $data->vehicle_type = request('vehicle_type');
    $data->driver_name = request('driver_name');
    $data->driver_contact = request('driver_contact');
    $data->created_at = request('date');
    $data->created_by = auth()->user()->user_id;
    $data->save();
        return redirect('/credits');

    }

    public function getVehicle($party_id){
            $vehicle = Vehicles::where('vehicle_owner',$party_id)->get();
            //dd($vehicle_info);
            // foreach($vehicle_info as $row)
            // {
            //     $tariff_type=$row['vehicle_type'];
            // }
            //$tariff = Tariff::where('nozzel_type',$tariff_type)->get();
            $Vehicle=compact($vehicle);
            return response()->json($vehicle);
        }
    public function gettariff($vehicle_id){
            $vehicle_info = Vehicles::where('vehicle_id',$vehicle_id)->get();
            foreach($vehicle_info as $row)
            {
                $tariff_type=$row['vehicle_type'];
            }
            $tariff = Tariff::where('nozzel_type',$tariff_type)->where('isActive',1)->get();
            $Tariff=compact($tariff);
            return response()->json($tariff);
        }

    public function getBalance($vehicle_id){
            $vehicle_info = Vehicles::where('vehicle_id',$vehicle_id)->get();
            foreach($vehicle_info as $row)
            {
                $balance=$row['vehicle_owner'];
            }
            //dd($balance);
            $ownerBalance = Parties::where('party_id',$balance)->get();
            //dd($ownerBalance);
            $OwnerBalance=compact($ownerBalance);
            return response()->json($ownerBalance);
        }

    public function creditFill()

    {
    $vehicle = request('vehicle');
        $info = Vehicles::where('vehicle_id',$vehicle)->get();
        foreach ($info as $row) {
        $partyId=$row['vehicle_owner'];
        }

        $new_party = Parties::where("party_id", $partyId)->get();
        foreach($new_party as $row)
            {
                $partyBalance=$row['owner_balance'];
                $partyPendingBalance = $row['pending_balance'];
            }

    // $party_id = DB::select(DB::raw("select party_id from parties where '.$jhfb.' ");
    $currentFill = request('currrent_fill');
    $currentPrice = request('current_price');
    $currentAmount = request('current_amount');
    $ownerBalance =request('owner_balance');
    $totalAmount =request('total_amount');
    

    if($ownerBalance == 0) {
        $partyPendingBalance = $partyPendingBalance + $currentFill;
    }
    elseif ($ownerBalance < $currentFill) {
    $partyPendingBalance = $currentFill-$ownerBalance;
    $ownerBalance = 0;
    }
    elseif($ownerBalance > $totalAmount) {
        $ownerBalance = $partyBalance - $totalAmount;

    } 
    elseif ($currentFill == $ownerBalance) {
$ownerBalance=0;
$partyPendingBalance = 0;

    }

    $data = new CreditFill();

    $data->vehicle_id = $vehicle;
    $data->current_fill = $currentFill;
    $data->current_price = $currentPrice;
    $data->current_amount = $currentAmount;
    $data->total_amount = $totalAmount;
    $data->created_at = request('date');
    $data->created_by = auth()->user()->user_id;

if ($data->save()){
    $vehicle_new_id =$data->vehicle_id;

    $partyObj = Vehicles::where('vehicle_id',$vehicle_new_id)->get();
    foreach ($partyObj as $row) {
        $party = $row['vehicle_owner'];
        Parties::where("party_id", $party)->update(["pending_balance" => $partyPendingBalance,"owner_balance"=> $ownerBalance]);
    } 
    return redirect('/credits');
    
}

    }

public function addPayment(){

    $parties = new Parties();

    $payment = request('payment');
    $party = request('party');

    $partyObj = Parties::where('party_id',$party)->get();
    foreach ($partyObj as $row) {
        $pending_balance = $row['pending_balance'];
        $owner_balance = $row['owner_balance'];
    }
        if ($pending_balance ==0) {
        $ownerBalance = $owner_balance + $payment;
        }
        elseif ($pending_balance == $payment) {
        $pending_balance=0;
        }
        elseif ($pending_balance < $payment) {
        $payment = $payment - $pending_balance;
        $owner_balance = $owner_balance + $payment;
        $pending_balance =0;
        }
        elseif($payment < $pending_balance){
            $pending_balance = $pending_balance-$payment;

        }
        else{

            echo "string";
        }
        
    Parties::where("party_id", $party)->update(["owner_balance"=> $owner_balance,"pending_balance"=>$pending_balance]);
 
    return redirect('/credits');
    

}


public function getFill($vehicle_id){
$vehicle_fill=  DB::select(DB::raw("select credit_fill.id,credit_fill.vehicle_id,credit_fill.current_fill,credit_fill.current_price,credit_fill.current_amount,credit_fill.total_amount,credit_fill.created_at, (SELECT credit_vehicles.vehicle_model FROM credit_vehicles WHERE credit_vehicles.vehicle_id = credit_fill.vehicle_id) as vehicle from credit_fill where credit_fill.vehicle_id = '$vehicle_id'"));    
    return view("creditFill",['vehicle_fill'=>$vehicle_fill]);
}

}
