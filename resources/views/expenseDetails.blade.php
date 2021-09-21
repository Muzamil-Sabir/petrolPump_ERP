
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
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>{{ date('F-Y') }}</b> Expense Details </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="../expense">Expense</a></li>
              <li class="breadcrumb-item"><a href="">Expense Details</a></li>
             
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
            

                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                   
                    <th>Expense Date</th>
                    <th>Expense Head</th>
                    <th>Expense Type</th>
                    <th>Amount</th>
                    <th>Description</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($result as $row)
                    <tr>
                      <td>{{  date('d-F-Y', strtotime($row->expense_date)) }}</td>
                      <td>{{ $row->expense_head }}</td>
                      <td>{{ $row->expense_type }}</td>
                      <td>{{ $row->amount }}</td>
                      <td>{{ $row->description }}</td>

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