
@extends('layout.layout')
@section('content')
  @php
             $total_ltrs=0;
             $total_amount=0;    

             $lubricant_quantity=0;
             $lubricant_amount=0; 

             $hsd_amount=0;
             $super_amount=0;  

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
            <h1 class="m-0">Stock Report for the month of:&nbsp; <b>{{date("F-Y")}}</b> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="reports">Reporting</a></li>
               <li class="breadcrumb-item"><a href="stockReport">Stock Report</a></li>

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
                 <div class="float" >
                         <button class="btn btn-lg btn-success" onclick="window.location.href='stockinReport'">Stockin Report <i class="fa fa-download" aria-hidden="true"></i>
                          </button>
                       <button class="btn btn-lg btn-success" onclick="window.location.href='viewStockReport'">Current Stock Report <i class="fa fa-download" aria-hidden="true"></i>
                          </button>
                          <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#modal-primary">
                  Opening/Closing Stock
                </button>

                   
                  </div> <br>
              <div class="row">
          <div class="col-md-6">

             <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h2 align="center"><b>HSD / SUPER</b></h2>   
                   
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
                   @foreach($result as $row)
                   @php
                   $total_ltrs+=$row->quantity;
                   if($row->nozzel_id==1){
                    $hsd_amount = ($row->tariff-2.48)*$row->quantity;
                   }else{
                    $super_amount = ($row->tariff-3)*$row->quantity;
                   }

                   @endphp
                    <tr>
                      <td>{{($row->nozzel_id==1)?'HSD':'SUPER'}}</td>
                      <td>{{round($row->quantity,2)}}</td>
                      <td>{{($row->nozzel_id==1)?$hsd_amount:$super_amount}}</td>

                    </tr>
                    @endforeach
                    
                  </tbody>

                  <tr>
                    <th class="text-center bg-dark">
                      <font size="+2">TOTAL</font>
                    </th>
                  <th class="bg-secondary text-center"><font size="+2">Ltrs<br>{{round($total_ltrs,2)}}</font></th>
                  <th style="width: ;" class="bg-green text-center"><font size="+2">Rs.<br>Rs. {{round($hsd_amount+$super_amount,2)}}</font></th>
                  </tr>

                 </table>
               </div>


                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h2 align="center"><b>LUBRICANTS</b></h2>   
                   
                  </div>
                    </div>
                    <div class="col-md-8 ">
                       
                    </div>
                   </div>

                <table id="example2" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Amont(RS.)</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($lubricants as $row)
                   @php
                   $lubricant_quantity+=$row->quantity;
                   $lubricant_amount+=($row->quantity*$row->indent_price);
                   @endphp
                    <tr>
                      <td>{{$row->item_name}}</td>
                      <td>{{$row->quantity}}</td>
                      <td>{{$row->quantity*$row->indent_price}}</td>
                    </tr>
                    @endforeach
                  </tbody>

                  <tr>
                   <th class="text-center bg-dark">
                      <font size="+2">TOTAL</font>
                    </th>
                  <th class="bg-secondary text-center"><font size="+2">Quantity  <br>{{$lubricant_quantity}}</font></th>
                  <th style="width: ;" class="bg-green text-center"><font size="+2">Rs.<br>Rs. {{$lubricant_amount}}</font></th>
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

  <div class="modal fade" tabindex="-1" id="modal-primary">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Opening Closing Stock</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/openingClosingStock')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">
                      

                    

                     <div class="row">
                                   <div class="col-md-2">
                                    Month:&nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="month" type="month"  class="form-control" />
                                 
                                  </div>
                                   </div>
                     </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Show Stock</button>
            </div>
          </div>
        </form>


          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

        
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