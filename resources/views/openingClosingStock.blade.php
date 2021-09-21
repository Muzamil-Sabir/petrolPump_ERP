
@extends('layout.layout')
@section('content')
  @php
               $opening_stock_ltr=0;
               $opening_stock_rs=0;
               

               $closing_stock_ltr=0;
               $closing_stock_rs=0;

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
            <h1 class="m-0">Opening/Closing Stock :&nbsp;<b>{{date('F-Y',strtotime($month)) }} </b> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="reports">Reporting</a></li>
               <li class="breadcrumb-item"><a href="stockReport">Stock Report</a>
                

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="" style="margin-left:5%;margin-right:5%;">
        
            <div class="card">

               
              <!-- /.card-header -->
              <div class="card-body">
                  <br>
              <div class="row">
          <div class="col-md-6">

             <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h2 align="center"><b>Opening Stock</b></h2>   
                   
                  </div>
                    </div>
                   </div>


                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                    <th>Nozzel Type</th>
                    <th>In Ltrs</th>
                    <th>Amont(RS.)</th>
                   
                    
                    </tr>
                  </thead>
                  <tbody>
                 @foreach($oilstock as $row)
                  @php
                  $opening_stock_ltr+=$row->opening_stock;
                  $closing_stock_ltr+=$row->closing_stock;
                  if($row->nozzel_id==1){
                    $opening_stock_rs+=round(($row->opening_tariff-2.48)*$row->opening_stock,2);

                    $closing_stock_rs+=round(($row->closing_tariff-2.48)*$row->closing_stock,2);

                  }else{
                      $opening_stock_rs+=round(($row->opening_tariff-3)*$row->opening_stock,2);
                      $closing_stock_rs+=round(($row->closing_tariff-3)*$row->closing_stock,2);
                  }
                  @endphp
                    <tr>
                      <td>{{$row->type}}</td>
                      <td>{{round($row->opening_stock,2)}}</td>
                      <td>{{($row->nozzel_id==1)?round(($row->opening_tariff-2.48)*$row->opening_stock,2):round(($row->opening_tariff-3)*$row->opening_stock,2)}}</td>

                    </tr>

                   @endforeach

                  </tbody>

                  <tr>
                    <th class="text-center bg-dark" colspan="3">
                      <font size="+2">LUBRICANTS</font>
                    </th>
                  
                  </tr>
                  @foreach($lubsOpeningStock as $row1)
                  @php
                  $opening_stock_ltr+=$row1->quantity;
                  $opening_stock_rs+=$row1->quantity*$row1->indent_price;
                  @endphp
                  <tr>
                    <td>{{$row1->item_name}}</td>
                    <td>{{$row1->quantity}}</td>
                    <td>{{$row1->quantity*$row1->indent_price}}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <th class="text-center bg-dark">
                      <font size="+2">TOTAL</font>
                    </th>
                  <th class="bg-secondary text-center"><font size="+2">Ltrs<br>      {{round($opening_stock_ltr,2)}}  </font></th>
                  <th style="width: ;" class="bg-green text-center"><font size="+2">Rs.<br>{{round($opening_stock_rs,2)}} </font></th>
                  </tr>

                 </table>
               </div>


                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h2 align="center"><b>Closing Stock</b></h2>   
                   
                  </div>
                    </div>
                    <div class="col-md-8 ">
                       
                    </div>
                   </div>

                <table id="example2" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                   <tr>
                    <th>Nozzel Type</th>
                    <th>In Ltrs</th>
                    <th>Amont(RS.)</th>
                   
                    
                    </tr>
                  </thead>
                  <tbody>
                 @foreach($oilstock as $row)
                    <tr>
                      <td>{{$row->type}}</td>
                      <td>{{round($row->closing_stock,2)}}</td>
                      <td>{{($row->nozzel_id==1)?round(($row->closing_tariff-2.48)*$row->closing_stock,2):round(($row->closing_tariff-3)*$row->closing_stock,2)}}</td>

                    </tr>
                   @endforeach
                  </tbody>
                  <tr>
                    <th class="text-center bg-dark" colspan="3">
                      <font size="+2">LUBRICANTS</font>
                    </th>
                     @foreach($lubsClosingStock as $row1)
                  @php
                  $closing_stock_ltr+=$row1->quantity;
                  $closing_stock_rs+=$row1->quantity*$row1->indent_price;
                  @endphp
                  <tr>
                    <td>{{$row1->item_name}}</td>
                    <td>{{$row1->quantity}}</td>
                    <td>{{$row1->quantity*$row1->indent_price}}</td>
                  </tr>
                  @endforeach
                  </tr>
                  <tr>
                    <th class="text-center bg-dark">
                      <font size="+2">TOTAL</font>
                    </th>
                  <th class="bg-secondary text-center"><font size="+2">Ltrs<br>       {{$closing_stock_ltr}} </font></th>
                  <th style="width: ;" class="bg-green text-center"><font size="+2">Rs.<br>{{$closing_stock_rs}}</font></th>
                  </tr>

                 </table>
               </div>


             </div>
              </div>
              <!-- /.card-body -->
            </div>
          
    </div>
    <!-- /.content -->
  </div>

  


  <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>

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
      "paging": false,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>   
<script>
  $(function () {
    $("#example2").DataTable({
      "pageLength": 1000,
      "paging": false,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 
  });
</script> 
 
 @endsection