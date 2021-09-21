
@extends('layout.layout')
@section('content')
 @php
$i=1;


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
            <h1 class="m-0">Stock Detail for the month of: &nbsp; <b>{{date("F-Y")}}</b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="stocking">stocking</a></li>
              <li class="breadcrumb-item"><a href="currentstock">Stock Details</a></li>
             
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
                  <div class="row">
                    <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h1 align="center"><b>HSD: <font color="green">{{round($hsd,2)}}</font></b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div style="margin-left: 5%;">
                  


                    
                  </div>
                  
                <!-- /.card-body -->

                
                </div>

                 <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h1 align="center"><b>SUPER:<font color="green"> {{round($super,2)}}</font></b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div >
                  


                    

                  </div>
                  
               

                  
                  </div>
              </div>
 

                  <form role="form" method="POST" action="{{ url('/currentstock')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h1 align="center"><b>From</b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div style="margin-left: 5%;">
                   <div class="row">
                    <div class="col-md-0">From&nbsp;</div>
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

                 <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h1 align="center"><b>To</b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div >
                   <div class="row">
                    <div class="col-md-0">To: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="date" name="to" placeholder="New Dip-rod Reading" class="form-control  @error('super') is-invalid @enderror" max="{{date('Y-m-d')}}" value="{{ date('Y-m-d') }}">
                   @error('super')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>


                    

                  </div>
                  
                <!-- /.card-body -->
                <div class="row">
                      <div class="col-md-4"> &nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-success ">show Stock</button> 
                                         

                  </div>
                   </div>
                    </div>

                  
                  </div>
              </div>
              </form>
              
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="">
                    
                  <tr class="bg-primary">
                    <th>#</th>
                     <th>Date</th>
                    <th>Nozzel Type</th>
                    <th>Opening Stock</th>
                    
                    <th>Book Stock</th>
                    <th>Physical Stock</th>
                    
                   

                   
                    
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($stock_details as $row)
                   <tr>
                   <td>{{$i++}}</td>
                   <td>{{date('d-F-Y',strtotime($row->reading_date)) }}</td>
                   <td>{{ ($row->nozzel_type==1)?'HSD':'SUPER' }}</td>
                   <td>{{$row->opening_stock}}</td>
                   <td>{{$row->book_stock}}</td>
                   <td>{{$row->physical_stock}}</td>
                 </tr>
                   @endforeach
                    </tbody>
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