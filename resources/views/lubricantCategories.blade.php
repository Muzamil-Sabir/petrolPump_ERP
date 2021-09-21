@extends('layout.layout')
@section('content')
@php
$i=1;
@endphp
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Lubricant Categories </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a>
              </li>
              <li class="breadcrumb-item"><a href="lubricants">Lubricant</a></li>
              <li class="breadcrumb-item"><a href="lubricantCategories">Lubricant Categories</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title" style="text-align-last: center;">Lubricant categories</h3>
              </div>
              <form role="form" method="POST" action="{{ url('/uploadLubricantCategory')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                   <div style="margin-left: 5%;">  

                     <div class="row">
                    <div class="col-md-0">Lubricant Category&nbsp;</div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <input type="text" name="type" placeholder="Enter Lubricant Category" class="form-control @error('type') is-invalid @enderror">
                     @error('type')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                    </div>
                    </div>
                    <div class="col-md-3">
                    <button type="submit" class="btn btn-outline-success ">Add New Lubricant </button> 
                    </div>
                    </div>
                    
                  </div>
              <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">

                  <tr> 
                    <th>Lubrucant ID</th>
                    <th>Lubricant Category</th>
                    <th>Date & Time</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($lubricants as $row)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $row->lubricant_type }}</td>
                    <td>{{ date('d-F-Y h:i:s A', strtotime($row->created_at))  }}</td>
                  </tr>                       
                  
                  @endforeach 
                  </tbody>
              </table>                
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
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>
 @endsection