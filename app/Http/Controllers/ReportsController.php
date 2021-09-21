<?php

namespace App\Http\Controllers;
use App\Models\nozzelReadings;
use App\Models\LubricantItems;
use App\Models\stockin;
use App\Models\LubricantStockin;
use App\Models\DailyLubStock;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

    public  function index()
    {
        return view('/reports');
    }

    public function financialReport(){

        return view('/financialReport');
    }

    public function exportCsv(Request $request)
{

   $fileName = 'tasks.csv';
   $tasks = nozzelReadings::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Title', 'Assign', 'Description', 'Start Date', 'Due Date');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Title']  = $task->nozzel_type;
                $row['Assign']    = $task->nozzle_number;
                $row['Description']    = $task->current_reading;
                $row['Start Date']  = $task->total_reading;
                $row['Due Date']  = $task->reading_date;

                fputcsv($file, array($row['Title'], $row['Assign'], $row['Description'], $row['Start Date'], $row['Due Date']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


    public function viewReport(Request $req)
    {
        //dd($req);

        $from = $req['from'];
        $to = $req['to'];
        //dd($to);
       $nozzelData= nozzelReadings::whereBetween('reading_date', [$from, $to])->get();
       
        $totalHsdSaleInLiter = 0;
        $totalSuperSaleInLiter = 0;
        $totalHsdSaleInRs=0;
        $totalSuperSaleInRs=0;
        $hsdN1Saleltr=0;$hsdN2Saleltr=0;$hsdN3Saleltr=0;$hsdN4Saleltr=0;
        $superN1Saleltr=0;$superN2Saleltr=0;$superN3Saleltr=0;$superN4Saleltr=0;
        $hsdN1SaleRs=0;$hsdN2SaleRs=0;$hsdN3SaleRs=0;$hsdN4SaleRs=0;
        
        $superN1SaleRs=0;$superN2SaleRs=0;$superN3SaleRs=0;$superN4SaleRs=0;

       foreach($nozzelData as $row) {
           if($row->nozzel_type==1){
                 $totalHsdSaleInLiter+=$row->current_reading-$row->old_reading;
                 $totalHsdSaleInRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                 if($row->nozzel_number=='N1'){
                        $hsdN1Saleltr+=$row->current_reading-$row->old_reading;
                        $hsdN1SaleRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                 }
                 if($row->nozzel_number=='N2'){
                        $hsdN2Saleltr+=$row->current_reading-$row->old_reading;
                        $hsdN2SaleRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                 }
                 if($row->nozzel_number=='N3'){
                        $hsdN3Saleltr+=$row->current_reading-$row->old_reading;
                        $hsdN3SaleRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                 }
                 if($row->nozzel_number=='N4'){
                        $hsdN4Saleltr+=$row->current_reading-$row->old_reading;
                        $hsdN4SaleRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                 }

                }

       
       if($row->nozzel_type==2){
            $totalSuperSaleInLiter+=$row->current_reading-$row->old_reading;
                      $totalSuperSaleInRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;

                 if($row->nozzel_number=='N1'){
                        $superN1Saleltr+=$row->current_reading-$row->old_reading;
                        $superN1SaleRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                 }
                 if($row->nozzel_number=='N2'){
                        $superN2Saleltr+=$row->current_reading-$row->old_reading;
                         $superN2SaleRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                 }
                 if($row->nozzel_number=='N3'){
                        $superN3Saleltr+=$row->current_reading-$row->old_reading;
                         $superN3SaleRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                 }
                 if($row->nozzel_number=='N4'){
                        $superN4Saleltr+=$row->current_reading-$row->old_reading;
                         $superN4SaleRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                 }
       }

}
       $ReportData = array(
            'hsdN1Saleltr' => $hsdN1Saleltr,
             'hsdN2Saleltr' => $hsdN2Saleltr,
              'hsdN3Saleltr' => $hsdN3Saleltr,
               'hsdN4Saleltr' => $hsdN4Saleltr,
             'hsdN1SaleRs' => $hsdN1SaleRs,
             'hsdN2SaleRs' => $hsdN2SaleRs,
             'hsdN3SaleRs' => $hsdN3SaleRs,
             'hsdN4SaleRs' => $hsdN4SaleRs,
             'totalHsdSaleInLiter'=>$totalHsdSaleInLiter,
             'totalHsdSaleInRs' => $totalHsdSaleInRs,

             'superN1saleltr' => $superN1Saleltr,
             'superN2Saleltr' => $superN2Saleltr,
              'superN3Saleltr' => $superN3Saleltr,
               'superN4Saleltr' => $superN4Saleltr,
             'superN1SaleRs' => $superN1SaleRs,
             'superN2SaleRs' => $superN2SaleRs,
             'superN3SaleRs' => $superN3SaleRs,
             'superN4SaleRs' => $superN4SaleRs,
             'totalSuperSaleInLiter'=>$totalSuperSaleInLiter,
             'totalSuperSaleInRs' => $totalSuperSaleInRs,

             'cumulativeSaleltr'=>$totalHsdSaleInLiter+$totalSuperSaleInLiter,
             'cumulativeSaleRs'=>$totalHsdSaleInRs+$totalSuperSaleInRs,
             'from'=>$req['from'],
             'to'=>$req['to']


);

       //dd($ReportData);
        return view('viewReport',$ReportData);

    }



    public function expenseReport(Request $request){

         $from="";
        $to="";
         if($request->method()=='POST')
        {
        $from = $request['from'];
        $to = $request['to'];
        //dd($from);
            $result=  DB::select(DB::raw("
            SELECT expense.expense_head_id,sum(expense.amount) as amount,(SELECT expense_head.name from expense_head WHERE expense_head.expense_head_id=expense.expense_head_id) as expense_head from expense where expense.expense_date between '$from' AND '$to' 
        GROUP by expense_head_id "));
       }
       else{

        $result=  DB::select(DB::raw("
            SELECT expense.expense_head_id,sum(expense.amount) as amount,(SELECT expense_head.name from expense_head WHERE expense_head.expense_head_id=expense.expense_head_id) as expense_head from expense where MONTH(expense.expense_date)=MONTH(now()) 
        GROUP by expense_head_id

            "));
    }
        return view('expenseReport',['result'=>$result,'from'=>$from,'to'=>$to]);
    }
    public function generateExpenseReport(Request $request){
        $from = $request['from'];
        $to = $request['to'];
          $sales=  DB::select(DB::raw("
           SELECT expense.expense_head_id,sum(expense.amount) as amount,(SELECT expense_head.name from expense_head WHERE expense_head.expense_head_id=expense.expense_head_id) as expense_head from expense where expense_date between '".$from."' and '".$to."'
                GROUP by expense_head_id
;

            "));
          return view('viewExpenseReport',['sales'=>$sales,'from'=>$from,'to'=>$to]);
    }

    public function profitLossRange(){
        return view('profitLossRange');
    }

    public function getProfitLoss(Request $request){
        $total_expense=0;
        $from = $request['from'];
        $to = $request['to'];


            $profitLossData=  DB::select(DB::raw("
                SELECT nozzel_readings.nozzel_type,SUM((nozzel_readings.current_reading-nozzel_readings.old_reading)*nozzel_readings.current_nozzle_price) as sale,(SELECT diprod_readings.physical_stock from diprod_readings WHERE  diprod_readings.reading_date='$from' and diprod_readings.nozzel_type=nozzel_readings.nozzel_type) as Previous_stock,(SELECT tariff.price from tariff WHERE tariff.created_at>='$from' AND tariff.nozzel_type=nozzel_readings.nozzel_type order by tariff.tariff_id asc limit 1) as previous_indent,(SELECT diprod_readings.physical_stock from diprod_readings WHERE diprod_readings.reading_date<='$to' and diprod_readings.nozzel_type=nozzel_readings.nozzel_type order by id desc limit 1) as Current_stock,(SELECT SUM(diprod_readings.physical_stock-diprod_readings.book_stock) FROM diprod_readings WHERE diprod_readings.reading_date BETWEEN '$from' and '$to' AND nozzel_readings.nozzel_type= diprod_readings.nozzel_type) as Gain_Loss,(SELECT tariff.price from tariff WHERE tariff.created_at<='$to' AND tariff.nozzel_type=nozzel_readings.nozzel_type order by tariff.tariff_id desc limit 1) as Indent_price,(SELECT SUM(stock_in.quantity*stock_in.indent_price) from stock_in WHERE stock_in.created_at BETWEEN '$from' AND '$to' and stock_in.product_id=nozzel_readings.nozzel_type) as purchase from nozzel_readings where nozzel_readings.reading_date between '$from' AND '$to' GROUP by nozzel_type;



            "));
    

             $expense=  DB::select(DB::raw("
                       SELECT expense_type.id,expense_type.expense_type,(SELECT SUM(expense.amount) from expense WHERE expense.expense_type_id=expense_type.id and expense.expense_date between '$from' and '$to') as expense from expense_type

            "));
             
             $prevStockArray = array();
             $currStockArray = array();
             $previous_lub = 0;
             $curr_lub=0;
             $prevStock=  DB::select(DB::raw("
                       SELECT daily_lubs_stock.created_at,daily_lubs_stock.stock as prev_stock from daily_lubs_stock WHERE daily_lubs_stock.created_at>='$from' order by id asc Limit 1;

            "));
             $currStock=  DB::select(DB::raw("
                       SELECT daily_lubs_stock.created_at, daily_lubs_stock.stock as current_stock from daily_lubs_stock WHERE daily_lubs_stock.created_at<='$to' order by id desc Limit 1;

            "));
             foreach($prevStock as $row){
                $prevStockArray = json_decode($row->prev_stock);

                    foreach($prevStockArray as $value){
                        $previous_lub+=$value->quantity*$value->indent_price;
                    }

             }
             foreach($currStock as $row){
                $currStockArray = json_decode($row->current_stock);
                foreach($currStockArray as $value){
                        $curr_lub+=$value->quantity*$value->indent_price;
                    }

             }

             $lub_purchase_sale=  DB::select(DB::raw("
                    SELECT SUM(lubricants_stock_in.quantity*lubricants_stock_in.indent_price) as purchase,(SELECT sum(lubricant_sales.quantity*lubricant_sales.current_price) from lubricant_sales WHERE lubricant_sales.sale_date BETWEEN '$from' AND '$to') as sale,(SELECT SUM(servicestation.sales) from servicestation WHERE servicestation.datetime BETWEEN '$from' AND '$to') as servicestation_sale from lubricants_stock_in WHERE lubricants_stock_in.created_at BETWEEN '$from' AND '$to'

            "));
             foreach($lub_purchase_sale as $row){
                $lub_purchase = round($row->purchase,2);
                $lub_sale = round($row->sale,2);
                $service_station_Sale = round($row->servicestation_sale,2);
             }

             

        
        return view('profitLossReport',['profitLossData'=>$profitLossData,'expense'=>$expense,'previous_lubs'=>$previous_lub,'current_lub'=>$curr_lub,'lub_purchase'=>$lub_purchase,'lub_sale'=>$lub_sale,'service_station_Sale'=>$service_station_Sale,'from'=>$from,'to'=>$to]);
    }

    public function wetStockReport(){
        return view('wetStockReport');
    }

    public function generateWetStockReport(Request $request){

        $from = $request['from'];
        $to = $request['to'];
       // return "yes";

        $result=  DB::select(DB::raw("
           SELECT diprod_readings.reading_date, diprod_readings.nozzel_type,diprod_readings.opening_stock,stock_in.quantity,(SELECT SUM(nozzel_readings.current_reading-nozzel_readings.old_reading) from nozzel_readings WHERE nozzel_readings.nozzel_type=diprod_readings.nozzel_type and DATE_FORMAT(diprod_readings.reading_date,'%y%m%d')=DATE_FORMAT(nozzel_readings.reading_date,'%y%m%d') ) as sale,diprod_readings.book_stock,diprod_readings.physical_stock from diprod_readings LEFT JOIN stock_in on DATE_FORMAT(diprod_readings.reading_date,'%y%m%d')=DATE_FORMAT(stock_in.created_at,'%y%m%d') and diprod_readings.nozzel_type=stock_in.product_id  where  diprod_readings.reading_date between '".$from."' and '".$to."' ORDER BY `diprod_readings`.`reading_date` ASC

            "));
        return view('viewWetStockReport',['result'=>$result,'from'=>$from,'to'=>$to]);


    }


    public function stockReport(){

        $result=  DB::select(DB::raw("
               SELECT nozzel_type.nozzel_id,nozzel_type.quantity,tariff.price as tariff  FROM
    nozzel_type JOIN
    tariff ON
    nozzel_type.nozzel_id=tariff.nozzel_type
    where tariff.isActive=1

            "));

        $lubricants = DB::select(DB::raw("
               SELECT lubricant_items.lubricant_item_id,lubricant_items.item_name,lubricant_items.quantity,(SELECT lubricants_stock_in.indent_price from lubricants_stock_in WHERE lubricants_stock_in.item_id=lubricant_items.lubricant_item_id ORDER by lubricants_stock_in.stock_in_id desc limit 1) as indent_price FROM
                lubricant_items;

            "));
       
        
        return view('stockReport',['result'=>$result,'lubricants'=>$lubricants]);
    }

    public function generateStockReport(){
         $result=  DB::select(DB::raw("
               SELECT nozzel_type.nozzel_id,nozzel_type.quantity,(tariff.price*nozzel_type.quantity) as In_amount FROM
    nozzel_type JOIN
    tariff ON
    nozzel_type.nozzel_id=tariff.nozzel_type
    where tariff.isActive=1

            "));

        $lubricants = (new LubricantItemsController)->getLubricantItems();

        return view('viewStockReport',['stock'=>$result,'lubricants'=>$lubricants]);   
         }

         public function stockinReport(){
            return view('/stockinReport');
         }

        public function generateStockinReport(Request $request){

        $from = $request['from'];
        $to = $request['to'];
         $stockIn= DB::select(DB::raw("
                    SELECT  stock_in.quantity,stock_in.indent_price,nozzel_type.type,stock_in.created_at
                        from 
                        stock_in 
                         LEFT JOIN
                        nozzel_type on stock_in.product_id=nozzel_type.nozzel_id  where stock_in.created_at between '$from' AND '$to'

            "));


        $lubricantStockIn =  DB::select(DB::raw("
                    SELECT purchase.purchase_id,purchase.current_amount,lubricants_stock_in.quantity,lubricants_stock_in.indent_price,lubricant_items.item_name,lubricants_stock_in.created_at
                    from purchase
                    JOIN
                    lubricants_stock_in on purchase.purchase_id=lubricants_stock_in.purchase_id
                    JOIN
                    lubricant_items on lubricants_stock_in.item_id=lubricant_items.lubricant_item_id where lubricants_stock_in.created_at between '".$from."' and '".$to."'

            "));

            return view('/viewStockinReport',['lubricants'=>$lubricantStockIn,'stock_in'=>$stockIn,'from'=>$from,'to'=>$to]);

        }

    public function onedayReport(){
            return view('/onedayReport');
         }

    public function onedayReportCalculation(Request $request){
            $datefrom = $request['reportDatefrom'];
            $dateto = $request['reportDateto'];

            $nozzels_data=  DB::select(DB::raw("SELECT * FROM `nozzel_readings` WHERE reading_date  between '$datefrom' and '$dateto' "));

            $serviceStationData = DB::select(DB::raw("SELECT sales FROM `servicestation` WHERE datetime between '$datefrom' and '$dateto' 
                "));
             $expenses = DB::select(DB::raw("SELECT expense.expense_head_id,sum(expense.amount) as amount,(SELECT expense_head.name from expense_head WHERE expense_head.expense_head_id=expense.expense_head_id) as expense_head from expense where expense_date between '$datefrom' and '$dateto'
                GROUP by expense_head_id
                "));

            $lubricantSales = DB::select(DB::raw("SELECT lubricant_items.item_name,(SELECT sum(lubricant_sales.quantity) from lubricant_sales WHERE lubricant_sales.item_id=lubricant_items.lubricant_item_id AND lubricant_sales.sale_date BETWEEN '$datefrom' AND '$dateto' ) as quantity ,(SELECT sum(lubricant_sales.quantity*lubricant_sales.current_price) from lubricant_sales WHERE lubricant_sales.item_id=lubricant_items.lubricant_item_id AND lubricant_sales.sale_date BETWEEN '$datefrom' AND '$dateto') as sale from lubricant_items WHERE lubricant_items.isActive=1"));

            return view('/onedayGeneratedReport',['date'=>$datefrom,'dateto'=>$dateto,'nozzels_data'=>$nozzels_data,'serviceStationData'=>$serviceStationData,'lubricantSales'=>$lubricantSales,'expenses'=>$expenses]);
         }

 
// 
    public function openingClosingStock(Request $request){

        if($request->method()=='POST')
       {
        $month = $request['month'];
           $start = date('Y-m-01', strtotime($month));
           $last  = date('Y-m-t', strtotime($month));

           $year_month = date('Ym',strtotime($start));
          
           //dd($year_month);
            
            $oilresult=  DB::select(DB::raw("
               SELECT nozzel_type.nozzel_id,nozzel_type.type,(SELECT diprod_readings.opening_stock from diprod_readings WHERE EXTRACT(YEAR_MONTH FROM diprod_readings.reading_date)='$year_month' AND diprod_readings.reading_date>='$start' AND diprod_readings.nozzel_type=nozzel_type.nozzel_id ORDER BY diprod_readings.id asc limit 1) as opening_stock,(SELECT tariff.price from tariff WHERE tariff.created_at>='$start' and tariff.nozzel_type=nozzel_type.nozzel_id ORDER by tariff.tariff_id asc limit 1) as opening_tariff,(SELECT diprod_readings.physical_stock from diprod_readings WHERE EXTRACT(YEAR_MONTH FROM diprod_readings.reading_date)='$year_month' AND diprod_readings.reading_date<='$last' AND diprod_readings.nozzel_type=nozzel_type.nozzel_id ORDER BY diprod_readings.id desc limit 1) as closing_stock,(SELECT tariff.price from tariff WHERE tariff.created_at<='$last' and tariff.nozzel_type=nozzel_type.nozzel_id ORDER by tariff.tariff_id desc limit 1) as closing_tariff from nozzel_type;


            "));

            $lubsOpeningStockJSON=  DB::select(DB::raw("
              SELECT id, daily_lubs_stock.created_at,daily_lubs_stock.stock from daily_lubs_stock WHERE EXTRACT(YEAR_MONTH FROM daily_lubs_stock.created_at) = '$year_month'
                AND daily_lubs_stock.created_at>='$start' ORDER by daily_lubs_stock.created_at asc limit 1


            "));

            $lubsClosingStockJSON=  DB::select(DB::raw("
              SELECT id, daily_lubs_stock.created_at,daily_lubs_stock.stock from daily_lubs_stock WHERE EXTRACT(YEAR_MONTH FROM daily_lubs_stock.created_at) = '$year_month'
                AND daily_lubs_stock.created_at<='$last' ORDER by daily_lubs_stock.created_at desc limit 1


            "));
            $lubsOpeningStock=array();
            $lubsClosingStock=array();
            foreach($lubsOpeningStockJSON as $row){
                $lubsOpeningStock = json_decode($row->stock);
            }

            foreach($lubsClosingStockJSON as $row){
                $lubsClosingStock = json_decode($row->stock);
            }
            //dd($lubsOpeningStock);
            // $lubsOpeningStocktoArray =  json_decode($lubsOpeningStockJSON[0], true);
        return view('openingClosingStock',['month'=>$month,'oilstock'=>$oilresult,'lubsOpeningStock'=>$lubsOpeningStock,'lubsClosingStock'=>$lubsClosingStock]);
        }else{
            return redirect('/stockReport');
        }
    }
}
