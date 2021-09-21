@extends('layout.layout2')
@section('content')
@php
$totalHsdSaleInLiter = 0;
$totalHsdSaleInRs = 0;
$totalSuperSaleInLiter= 0;
$totalSuperSaleInRs = 0;
$current_super_price=0;
$current_hsd_price = 0;
$servicestationSale = 0;
$total_amount = 0;
$i = 1;
@endphp
 @foreach($nozzelsData as $row)
 @php
    if($row->nozzel_type==1)
    {                
     $totalHsdSaleInLiter+=$row->current_reading-$row->old_reading;
     $totalHsdSaleInRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
     $current_hsd_price = $row->current_nozzle_price;
    $reading_date = $row->reading_date;

       }

    if($row->nozzel_type==2)
  {
    $totalSuperSaleInLiter+=$row->current_reading-$row->old_reading;
    $totalSuperSaleInRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
    $current_super_price = $row->current_nozzle_price;
  }               
@endphp
@endforeach

@foreach($serviceStationData as $row2)
@php
$servicestationSale  = $row2->sales;
$servicestationSaleDate  = $row2->datetime;

@endphp
@endforeach

@foreach($lubricantSales as $row3)
@php
$lubricant_item  = $row3->item_name;
$sale = $row3->sale;
$total_amount= $total_amount + $sale;
$sale_date = $row3->sale_date;
@endphp
@endforeach
<!-- {{$totalHsdSaleInRs}}
{{$totalSuperSaleInRs}}
{{$current_hsd_price}} -->

<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-5">
            
          </div>
          <div class="col-sm-4">
            <h1 class="m-0" style="color: purple;"> Petrol Pump Branches </h1>
          </div><!-- /.col -->
          <div class="col-sm-1">
            
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="mainDashboard">Main Dashboard</a></li>
             
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
                <div class="row">
                  
            <div class="col-sm-5">
            <div class="info-box" style="background-color: #CECDCD;">
              <div class="info-box-content">
                <span class="info-box-text" style="text-align: center;"><h3>Takhtbhai Petrol Pump</h3></span>
                  <img src="{{ asset('dist/img/site2.jpg')}}" style="width:100%;height: 100;"  >
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                  HSD Sale(Ltrs.): {{ $totalHsdSaleInLiter }}
                  <small></small>
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
                  --{{$reading_date}}
                  <small></small>
                </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                  HSD Sale(Rs.): {{ $totalHsdSaleInRs }} 
                  <small></small>
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
                   -- {{$reading_date}}
                  <small></small>
                </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                  Super Sale(Ltrs.): {{ $totalSuperSaleInLiter }}
                  <small></small>
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
                  --{{$reading_date}}
                  <small></small>
                </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                  Super Sale(Rs.): {{ $totalSuperSaleInRs }}
                  <small></small>
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
                  --{{$reading_date}}
                  <small></small>
                </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                  Service Station Sale: {{ $servicestationSale }} 
                  <small></small>
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
                   -- {{$servicestationSaleDate}}
                  <small></small>
                </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                Total Lubricant Sales: {{ $total_amount }}
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
              --{{$sale_date}}
                </span>
                  </div>
                </div>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-sm-2">
            
          </div>
          <div class="col-sm-5">
            <div class="info-box" style="background-color: #CECDCD;">
              <div class="info-box-content">
                <span class="info-box-text" style="text-align: center;"><h3>Sparly Petrol Pump</h3></span>
                  <img src="{{ asset('dist/img/site_header.jpg')}}" style="width:100%;height: 100;"  >
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                  HSD Sale(Ltrs.): {{ $totalHsdSaleInLiter }}
                  <small></small>
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
                  --{{$reading_date}}
                  <small></small>
                </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                  HSD Sale(Rs.): {{ $totalHsdSaleInRs }} 
                  <small></small>
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
                   -- {{$reading_date}}
                  <small></small>
                </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                  Super Sale(Ltrs.): {{ $totalSuperSaleInLiter }}
                  <small></small>
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
                  --{{$reading_date}}
                  <small></small>
                </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                  Super Sale(Rs.): {{ $totalSuperSaleInRs }}
                  <small></small>
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
                  --{{$reading_date}}
                  <small></small>
                </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                  Service Station Sale: {{ $servicestationSale }} 
                  <small></small>
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
                   -- {{$servicestationSaleDate}}
                  <small></small>
                </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <span class="info-box-number" style="text-align: center;">
                Total Lubricant Sales: {{ $total_amount }}
                </span>
                  </div>
                  <div class="col-sm-4">
                    <span class="info-box-number" style="text-align: center;">
              --{{$sale_date}}
                </span>
                  </div>
                </div>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          </div>

          </div>
              <!-- /.card-body -->
            </div>
     <div class="modal fade" tabindex="-1" id="modal-success">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

        
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
      "pageLength": 1000,"paging": false,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
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