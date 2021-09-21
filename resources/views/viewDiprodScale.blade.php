
@extends('layout.layout')
@section('content')
 
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Diprod Scale </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="viewDiprodScale">DiprodScale</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="" style="margin-left:5%;margin-right:5%;">
        <div class="row">
          
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" >
                <h3 class="card-title" style="text-align-last: center;">Diprod Scale</h3>
              </div>

              <form role="form" method="POST" action="{{ url('/uploadTariff')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">

                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h1 align="center"><b>HSD</b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div >
                    <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">

                  <tr>
                   
                    
                    <th>Fill</th>
                    <th>LT</th>
                    <th>LG</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($diprodScale as $row)
                     @if($row->fk_nozzel_type==1)
                  <tr>
                    <td>{{ $row->fill }}</td>
                    <td>{{ $row->LT }}</td>
                    <td>{{ $row->LG }}</td>
                  </tr>   
                     
                  @endif
                  @endforeach               
                    </tbody>
                 </table>


                    
                  </div>
                  
                <!-- /.card-body -->

                
                </div>

                 <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h1 align="center"><b>SUPER</b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div >
                   

                    <table id="example2" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                   
                    
                    <th>Fill</th>
                    <th>LT</th>
                    <th>LG</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($diprodScale as $row)
                     @if($row->fk_nozzel_type==2)
                  <tr>
                    <td>{{ $row->fill }}</td>
                    <td>{{ $row->LT }}</td>
                    <td>{{ $row->LG }}</td>
                  </tr>   
                     
                  @endif
                  @endforeach                  
                    </tbody>
                 </table>


                    

                  </div>
                  
                <!-- /.card-body -->
              

                  
                  </div>
              </div>
              </form>
            </div>
          </div>
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
       "pageLength": 200,
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example3').DataTable({
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


<script>
  $(function () {
    $("#example2").DataTable({
       "pageLength": 200,
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example4').DataTable({
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