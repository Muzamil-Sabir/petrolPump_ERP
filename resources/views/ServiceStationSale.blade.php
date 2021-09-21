
@extends('layout.layout')
@section('content')
  @php
             $totalSale=0;       

  @endphp
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h1 class="m-0">Service Sation Sale for the month of: <b>{{date("F-Y")}}</b> </h1>
          </div><!-- /.col -->
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="ServiceStationSale">Service Station Sale</a></li>
             
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
              <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#modal-primary">
                  Add New Sale
                </button><br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                    <th>Date</th>
                    <th>Sale(Rs)</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($result as $row)
                   @php
                   $totalSale+=$row->sales;
                   @endphp
                   <tr>
                   <td>{{ date('d-F-Y ', strtotime($row->datetime))  }}</td>
                   <td>{{$row->sales}}</td>
                 </tr>
                   @endforeach

                  </tbody>

                  <tr>
                  <th class="bg-secondary text-center"><font size="+2">Month  <br>{{date('F-Y')}}</font></th>
                  <th style="width: ;" class="bg-green text-center"><font size="+2">Cumulative Sale<br>Rs. {{$totalSale}}</font></th>
                  </tr>

                 </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal fade" tabindex="-1" id="modal-primary">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Create Sale</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/uploadServiceStationSale')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">
                                

                     <div class="row">
                                   <div class="col-md-2">
                                    Sale(Rs): &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="sales" placeholder="Enter Sale Amount (Rs.)" type="text"  class="form-control" />
                                 
                                  </div>
                                   </div>
                     </div>

                    

                     <div class="row">
                                   <div class="col-md-2">
                                    Date:&nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="datetime" value="{{ date('Y-m-d')}}" max="{{ date('Y-m-d')}}" type="date"  class="form-control" />
                                 
                                  </div>
                                   </div>
                     </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Add Sale</button>
            </div>
          </div>
        </form>


          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
      "pageLength": 1000,
      "paging": false,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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