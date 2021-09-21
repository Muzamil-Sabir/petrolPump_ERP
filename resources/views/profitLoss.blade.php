
@extends('layout.layout')
@section('content')
  @php
                    
  $total_sale = 0;
  $total_previous_stock = 0;
  $total_current_stock = 0;
  $total_purchase = 0;
  $total_gain_loss=0;
  $total_expense=0;


      $hsdSale=0;
      $hsdPreviousStock = 0;
      $hsdCurrentStock=0;
      $hsdGainLoss = 0;
      $hsdIndentPrice=0;
      $hsdPurchase=0;
      $hsdPreviousIndentPrice = 0;

      $superSale=0;
      $superPreviousStock = 0;
      $superCurrentStock=0;
      $superGainLoss = 0;
      $superIndentPrice=0;
      $superPurchase=0;
      $superPreviousIndentPrice=0;


  $profit_loss=0;
  @endphp
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>{{date('d-F-Y',strtotime($from))}}</b> to  <b>{{date('d-F-Y',strtotime($to))}}</b> Profit/Loss </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="reports">Reports</a></li>
              <li class="breadcrumb-item"><a href="profitLoss">Profit/Loss</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        
            <div class="card">
               
              <!-- /.card-header -->
              <div class="card-body">
              
                    @foreach($profitLossData as $row)
                      @php
                      $total_sale+=$row->sale;
                      $total_previous_stock+=$row->Previous_stock;
                      $total_current_stock+=$row->Current_stock;
                      $total_purchase+=$row->purchase;
                      $total_gain_loss+=$row->Gain_Loss;

                        if($row->nozzel_type==1){
                            $hsdSale=$row->sale;
                          $hsdPreviousStock = $row->Previous_stock;
                          $hsdCurrentStock=$row->Current_stock;
                          $hsdGainLoss = $row->Gain_Loss;
                          $hsdIndentPrice=($row->Indent_price-2.48);
                          $hsdPurchase=$row->purchase;
                          $hsdPreviousIndentPrice = $row->previous_indent;
                        }else{
                            $superSale=$row->sale;
                          $superPreviousStock = $row->Previous_stock;
                          $superCurrentStock=$row->Current_stock;
                          $superGainLoss = $row->Gain_Loss;
                          $superIndentPrice=($row->Indent_price-3);
                          $superPurchase=$row->purchase;
                          $superPreviousIndentPrice=$row->previous_indent;
                        }
                       

                      @endphp
                  
                        
                       
                    @endforeach
                  
               
                   
                 <div class="row">
                   <div class="col-sm-6">
                    <h1></h1>
                    <h2 align=""><b>Previous Stock</b></h2>
                      HSD(RS): {{round($hsdPreviousStock*$hsdPreviousIndentPrice,2)}} <br>
                      SUPER(RS): {{round($superPreviousStock*$superPreviousIndentPrice,2)}} <br> 
                      LUBS (RS): {{round($previous_lubs,2)}} <br>
                      <h2 align=""><b>Purchase</b></h2>
                      HSD(RS): {{round($hsdPurchase,2)}} <br>
                      SUPER(RS): {{round($superPurchase,2)}} <br>
                      LUBS(RS):{{round($lub_purchase,2)}}  <br>
                      <h2 align=""><b>EXPENSE</b></h2>
                        @foreach($expense as $row)
                        @php
                            $total_expense+=$row->expense;
                        @endphp
                        {{$row->expense_type}}: {{$row->expense}} <br>
                        @endforeach
                  
                   </div>

                   <div class="col-sm-6">
                    <h1></h1>
                    <h2 align=""><b>Current Stock</b></h2>
                      HSD(RS): {{round(($hsdCurrentStock - $hsdGainLoss)*$hsdIndentPrice,2)}} <br>
                      SUPER(RS): {{round(($superCurrentStock - $superGainLoss)*$superIndentPrice,2)}} <br> 
                      LUBS (RS): {{round($current_lub,2)}} <br>
                      <h2 align=""><b>Sale</b></h2>
                      HSD(RS): {{$hsdSale}} <br>
                      SUPER(RS): {{$superSale}} <br>
                      LUBS(RS):{{$lub_sale}}  <br>
                      SERVICE STATION (RS): {{$service_station_Sale}}


                   </div>
                 </div> <hr>
    @php
    $profit_loss = (($hsdSale+$superSale+$lub_sale+$service_station_Sale)+((($hsdCurrentStock-$hsdGainLoss)*$hsdIndentPrice)+(($superCurrentStock-$superGainLoss)*$superIndentPrice)+$current_lub)-(($hsdPurchase+$superPurchase+$lub_purchase)+(($hsdPreviousStock*$hsdPreviousIndentPrice)+($superPreviousStock*$superPreviousIndentPrice)+($previous_lubs))))-$total_expense;
    @endphp
                  <h2>Gross Profit/Loss:  <b>{{round($profit_loss,2)}} </b> </h2>
                  <hr>
                   <h3 align="center"> </h3>
              </div>
              <!-- /.card-body -->
            </div>
          
    </div>
    <!-- /.content -->
  </div>
  <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "pageLength": 1000,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>   
 
 @endsection