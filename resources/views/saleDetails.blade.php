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
            <h1 class="m-0"> Sale Detail </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="../lubricants">Lubricants</a></li>
              <li class="breadcrumb-item"><a href="../lubricantsSale">Lubricants Sale</a></li>
              <li class="breadcrumb-item"><a href="lubricantsSale"> Sale Detail</a></li>
              
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
        <div class="col-md-2"></div>
        <div class="col-md-12">
           <div class="card">
               
              <!-- /.card-header -->
              <div class="card-body">
              

                
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                   
                    <th>Date</th>
                    <th>Item Name</th>
                    <th>Sale Quantity</th>
                    <th>Sale Price</th>
                    <th>Sale (Rs)</th>
                    
                   
                    </tr>
                  </thead>
                  <tbody> 
                  @foreach($salesDetail as $row)
                  @if($row->sale_quantity>0)
                    <tr>
                      <td>{{ date('d-M-Y ', strtotime($row->sale_date))  }}</td>
                      <td>{{ $row->item_name }}</td>
                      <td>{{ $row->sale_quantity }}</td>
                      <td>{{ $row->current_price }}</td>
                      <td>{{ round($row->sale_rs,2) }}</td>
                      
                    </tr>
                    @endif
                  @endforeach
                    
                    </tbody>
                 </table>
              </div>
              <!-- /.card-body -->
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