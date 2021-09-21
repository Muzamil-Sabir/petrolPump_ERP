
@extends('layout.layout')
@section('content')
 @php
$i=1;
$hsdCmGainLoss=0;
$SuperCmGainLoss=0;
$HsdCmSale=0;
$SuperCmSale=0;
$hsdCmDelivery=0;
$SuperCmDelivery=0;
$totalSale=0;
$totalDelivery=0;

@endphp
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div style="margin-left:5%;margin-right:5%" class="">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Diprod Readings For the Month Of: <b>{{date("F-Y")}}</b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="diprodReadings">Diprod Reading</a></li>
              <li class="breadcrumb-item"><a href="viewDipReadings">Current Month Readings</a></li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="">
      <div style="margin-left:5%;margin-right: 5%;" class="">

            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
                  <form role="form" method="POST" action="{{ url('/viewDipReadings')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >

                  </div>
                    </div>
                   </div>
                   <div style="margin-left: 5%;">
                   <div class="row">
                    <div class="col-md-0"><b>From: &nbsp;</b></div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="date" name="from" placeholder="New Dip-rod Reading" class="form-control  @error('hsd') is-invalid @enderror" max="{{date('Y-m-d')}}" value="{{ date('Y-m-d') }}" >
                  @error('hsd')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>



                  </div>

                <!-- /.card-body -->


                </div>

                 <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >

                  </div>
                    </div>
                   </div>
                   <div >
                   <div class="row">
                    <div class="col-md-0"><b>To: </b>&nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="date" name="to" placeholder="New Dip-rod Reading" class="form-control  @error('super') is-invalid @enderror" max="{{ date('Y-m-d')}}" value="{{ date('Y-m-d') }}">
                   @error('super')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>
                  </div>    
              </div>

        <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >

                  </div>
                    </div>
                   </div>
                   <div >
                   <div class="row">
                    <div class="col-md-6">
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-success ">Show Diprod Data</button>
               
                  </div>
                  </div>
                    </div>
                  </div>    
              </div>



                <div class="col-md-4">
                  <div class="form-group">
                  </div>
                   </div>
                    </div>
              </form>

                <table id="example1" class="table table-bordered table-striped">
                  <thead class="">
                    <tr  class="">
                    <th  colspan="8"></th>
                    <!--  <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th> </th>
                    <th> </th> -->

                    <th style="text-align:center" class="bg-secondary" colspan="1">DAILY</th>
                    <th style="text-align:center" class="bg-success" colspan="4">CUMULATIVE</th>
                    <!-- <th></th> -->


                    </tr>
                  <tr class="bg-primary">
                    <th>#</th>
                     <th>Reading at</th>
                    <th>Nozzel Type</th>
                    <th>Opening Stock</th>
                    <th>Delivery</th>
                    <th>Sale</th>
                    <th>Book Stock</th>
                    <th>Physical Stock</th>

                    <th>Gain/Loss</th>

                    <th>Gain/Loss</th>
                    <th >Sales</th>
                    <th >%age G÷Hx100
                  </th>
                  <th>Status</th>



                    </tr>
                  </thead>
                  <tbody>
                    @foreach($result as $row)
                        @php
                           $totalDelivery+=$row->quantity;
                            $totalSale+=$row->sale;
                        @endphp
                    <tr  class="">
                      <td>{{ $i++ }}</td>
                      <td>{{ date('d-F-Y', strtotime($row->reading_date)) }}</td>
                      @if($row->nozzel_type==1)
                      @php
                     $hsdCmGainLoss+=round($row->physical_stock-$row->book_stock,2);

                     $HsdCmSale+=$row->sale;
                     $hsdCmDelivery+=$row->quantity;
                      @endphp
                      <td>HSD</td>
                        @endif

                        @if($row->nozzel_type==2)
                          @php
                        $SuperCmGainLoss+=round($row->physical_stock-$row->book_stock,2);
                        $SuperCmSale+=$row->sale;
                        $SuperCmDelivery+=$row->quantity;
                        @endphp
                      <td>SUPER</td>
                        @endif


                   <td>{{ round($row->opening_stock,2) }}</td>
                   <td>{{ ($row->quantity>0)?$row->quantity:'0' }}</td>
                   <td>{{ ($row->sale>0)?$row->sale:'0' }}</td>
                   <td >{{ round($row->book_stock,2) }}</td>
                   <td class="" >{{ round($row->physical_stock,2) }}</td>
                    <td>{{ round($row->physical_stock-$row->book_stock,2) }}</td>



                    @if($row->nozzel_type==1)
                    <td style="text-align:center">{{ $hsdCmGainLoss }}</td>
                    @endif
                    @if($row->nozzel_type==2)
                    <td style="text-align:center">{{ $SuperCmGainLoss }}</td>
                    @endif

                    @if($row->nozzel_type==1)
                    <td style="text-align:center">{{ $HsdCmSale }}</td>
                    @endif
                    @if($row->nozzel_type==2)
                    <td style="text-align:center">{{ $SuperCmSale }}</td>
                    @endif
                    @if($row->nozzel_type==1)
                    <td style="text-align:center">{{ ($HsdCmSale>0)?round($hsdCmGainLoss/$HsdCmSale*100,2):'0' }}</td>
                    @endif
                     @if($row->nozzel_type==2)
                    <td style="text-align:center">{{ ($SuperCmSale>0)?round($SuperCmGainLoss/$SuperCmSale*100,2):'0' }}</td>
                    @endif

                    @if($row->nozzel_type==1)
                    @if($hsdCmGainLoss>0)
                     <td style="text-align:center" class="bg-success">Gain</td>
                    @endif
                    @if($hsdCmGainLoss<0)
                     <td style="text-align:center" class="bg-danger">Loss</td>
                    @endif
                     @if($hsdCmGainLoss==0)
                     <td style="text-align:center" class="bg-warning">N/A</td>
                    @endif
                  @endif

                   @if($row->nozzel_type==2)
                    @if($SuperCmGainLoss>0)
                     <td style="text-align:center" class="bg-success">Gain</td>
                    @endif
                    @if($SuperCmGainLoss<0)
                     <td style="text-align:center" class="bg-danger">Loss</td>
                    @endif
                     @if($SuperCmGainLoss==0)
                     <td style="text-align:center" class="bg-warning">N/A</td>
                    @endif
                  @endif

                        </tr>

                    @endforeach
                     </tbody>
                    <tr class="bg-light">



                        <th colspan="4" class="text-center bg-success">

                            HSD Delivery = <font size="+2"> {{$hsdCmDelivery}} ltr. </font> <br>
                            Super Delivery = <font size="+2"> {{$SuperCmDelivery}} ltr. </font> <br>
                            Cumulative = <font size="+2"> {{$totalDelivery}} ltr. </font>

                        </th>
                        <th colspan="4" class="text-center bg-secondary">
                            HSD Sale =<font size="+2"> {{$HsdCmSale}} ltr. </font><br>
                            Super Sale =<font size="+2"> {{$SuperCmSale}} ltr. </font><br>
                            Cumulative =<font size="+2"> {{$totalSale}} ltr.</font></th>



                        <th  class="bg-info text-center" colspan="3" >
                            Hsd Gain/loss Ltr. = <font size="+2"> {{$hsdCmGainLoss}} </font><br>
                            Super Gain/Loss ltr =<font size="+2">{{$SuperCmGainLoss}} </font><br>

                        </th>
                        <th colspan="3" class="bg-primary text-center">
                            Hsd Gain/loss % = <font size="+2"> {{($HsdCmSale>0)?round($hsdCmGainLoss/$HsdCmSale*100,2):'0'}} </font><br>
                            Super Gain/Loss % =<font size="+2">{{($SuperCmSale>0)?round($SuperCmGainLoss/$SuperCmSale*100,2):'0'}} </font><br>
                        </th>




                    </tr>
                   
                 </table>
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
        "responsive": true, "lengthChange": false, "autoWidth": false, "paging": false,
         "buttons": ["copy", "csv", "excel", "pdf", "print"],
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
