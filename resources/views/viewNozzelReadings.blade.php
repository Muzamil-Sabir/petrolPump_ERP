@extends('layout.layout')
@section('content')
  @php
                    $totalHsdSaleInLiter = 0;
                    $totalSuperSaleInLiter = 0;
                    $totalHsdSaleInRs=0;
                    $totalSuperSaleInRs=0;
                    $date='';


                    $monthlyHsdSaleInLiter=0;
                    $monthlySuperSaleInLiter=0;
                    $monthlyHsdTotalSaleInRs=0;
                    $monthlySuperTotalSaleInRs=0;
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
            <h1 class="m-0"> Nozzel Readings </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="viewNozzelReadings">Nozzel Readings</a></li>
             
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
                 <form role="form" method="POST" action="{{ url('/viewNozzelReadings')}}">
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
                    <div class="col-md-0"><b>From</b>&nbsp;</div>
                    <div class="col-md-7">
                  <div class="form-group">
                  <input type="date" name="from" placeholder="New Dip-rod Reading" class="form-control  @error('hsd') is-invalid @enderror" value="{{ date('Y-m-d')}}" max="{{ date('Y-m-d')}}">
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
                    <div class="col-md-3 ">
                       <div class="form-group" >
                   
                  </div>
                    </div>
                   </div>
                   <div >
                   <div class="row">
                    <div class="col-md-0"><b>To:</b> &nbsp;</div>
                    <div class="col-md-7">
                  <div class="form-group">
                  <input type="date" name="to" placeholder="New Dip-rod Reading" class="form-control  @error('super') is-invalid @enderror" value="{{ date('Y-m-d')}}" max="{{ date('Y-m-d')}}">
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
                    <div class="col-md-3 ">
                       <div class="form-group" >
                   
                  </div>
                    </div>
                   </div>
                   <div >
                   <div class="row">
                    <div class="col-md-8">
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-success ">Show Nozzels Data</button>                 
                  </div>
                  </div>
                    </div>
                    
                  </div>

                  </div>
                  
                <!-- /.card-body -->
          <!--       <div class="row">
                      <div class="col-md-4"> &nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-success ">show Nozzels Data</button> 
                                         

                  </div>
                   </div>
                    </div> -->

                  
              </div>
              </form>
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                   
                    <th>Nozzel Type</th>
                    <th>Nozzel #</th>
                    <th>Previous Readings</th>
                    <th>Current Readings</th>
                    <th>Price/Ltr.</th>
                    <th>Sale in Ltr.</th>
                    <th>Sale in Rs.</th>
                    
                    <th>Reading Date</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach($nozzelReadings as $row)

<!--                     @if(date_format($row->created_at,'Y,m')==date('Y,m'))
 -->                      @php
                      if($row->nozzel_type==1){
                        $monthlyHsdSaleInLiter+=$row->current_reading-$row->old_reading;
                         $monthlyHsdTotalSaleInRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                        }
                        if($row->nozzel_type==2){
                          $monthlySuperSaleInLiter+=$row->current_reading-$row->old_reading;
                          $monthlySuperTotalSaleInRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                        }
                      @endphp
<!--                     @endif
 -->

                    @if($row->isActive==1)

                    @php
                    $date = date('d-F-Y', strtotime($row->reading_date));
                    if($row->nozzel_type==1){
                    
                      $totalHsdSaleInLiter+=$row->current_reading-$row->old_reading;
                      $totalHsdSaleInRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
                    }
                    if($row->nozzel_type==2)
                    {
                       $totalSuperSaleInLiter+=$row->current_reading-$row->old_reading;
                      $totalSuperSaleInRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;

                    }
                    
                    @endphp
                  <tr>
                    @if($row->nozzel_type==1)
                     <td>HSD</td>
                    @endif
                   @if($row->nozzel_type==2)
                     <td>SUPER</td>
                    @endif
                    <td>{{ $row->nozzel_number }}
                    </td>
                    <td>{{ $row->old_reading   }}</td>
                    <td>{{ $row->total_readings }}</td>
                    <td>{{ $row->current_nozzle_price }}</td>
                    <td>{{ $row->current_reading-$row->old_reading}}</td>
                    
                  
                    <td>{{ ($row->current_reading-$row->old_reading)*$row->current_nozzle_price }}</td>
                    <td>
                      {{ date('d-F-Y', strtotime($row->reading_date)) }}
                    </td>
                  </tr>
                  @endif
                  @endforeach
                  </tbody>
                  <tbody>
                    <tr  class="bg-primary">
                      <td></td>
                   <td colspan="2"></td>
                 
                   <td></td>
                   <td colspan="2"></td>
              
                   <td colspan="2"></td>
                 
                    </tr>
                  
                 <tr >

                   <td rowspan="3" style="text-align:center" class="bg-secondary"><div style="margin-top:25%;color: white"><b >{{ date("F-Y") }}</b></div></td>
                   <td class="bg-info" style=" text-align:center ;" colspan="2" >
                     <b>HSD:<b>
                       <font color="yellow">  {{$monthlyHsdSaleInLiter}}.Ltr
                   </font> <br>
                   <b>Super:<b>
                       <font color="yellow">  {{$monthlySuperSaleInLiter}}.Ltr
                   </font>
                   </td>

                   <td rowspan="3" style="text-align:center" class="bg-secondary"><div style="margin-top:25%;color: white"><b >{{ $date }}</b></div></td>
                   
                   <!-- <td></td>
                   <td></td> -->
                  
                       
                         <td style=" text-align: center;" colspan="2" class="bg-info"><b>HSD:<b> <font color="yellow">  {{$totalHsdSaleInLiter}}.Ltr
                   </font> <br>
                        Super:<font color="yellow">  {{$totalSuperSaleInLiter}}.Ltr </font></td>
                         <td style=" text-align: center;" colspan="2" class="bg-green"><b>HSD:<b> <font color="yellow">  Rs. {{$totalHsdSaleInRs}} </font> <br>
                        Super:<font color="yellow">  Rs. {{$totalSuperSaleInRs}} </font></td>
                        
                 </tr>

                 <tr class="bg-primary">
                      <!-- <td></td> -->
                   <td colspan="2"></td>
                   
                   <!-- <td></td> -->
                   <td colspan="2"></td>
                  
                   <td colspan="2"></td>
                  
                    </tr>
                    <tr >
                   <!-- td></td> -->
                   <td colspan="2" style="text-align:center;" class="bg-info">
                      <b>Cumulative:<b> <font color="yellow">  {{$monthlyHsdSaleInLiter+$monthlySuperSaleInLiter}}. Ltr </font>

                   </td>
                  <!--  <td></td> -->
                   <!-- <td></td> -->
                   
                          
                          <td style=" text-align: center;" colspan="2"  class="bg-info"><b>Cumulative:<b> <font color="yellow">  {{$totalHsdSaleInLiter+$totalSuperSaleInLiter}}.Ltr </font> </td>
                         <td style=" text-align: center;"  colspan="2" class="bg-green"><b>Cumulative:<b> <font color="yellow">  Rs. {{$totalHsdSaleInRs+$totalSuperSaleInRs}} </font></td>
                          
                 </tr>
                    </tbody>  
                </table>
              </div>
              <!-- /.card-body -->
            </div>


        
      </div><!-- /.container-fluid -->
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
     "paging": false, "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": false,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>   
 
 @endsection