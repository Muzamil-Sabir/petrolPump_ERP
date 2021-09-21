
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
            <h1 class="m-0"> Distributors </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="distributor">Distributors</a></li>
             
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                  Add Distributor
                </button>
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                   
                    <th>Distributor name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Pending Amount</th>
                    <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($distributors as $row)
                    <tr  class="">
                      <td>{{ $row->name }}</td>
                 
                 
                   <td>{{ $row->email }}</td>
                   <td >{{ $row->phone }}</td>
                   <td class="bg-red" >{{ $row->pending_amount }}</td>
                   <td>
                     <a href="purchase/{{ $row->distributor_id }}">
                     <button class="btn btn-lg btn-success">Show Purchases</button> </a>
                   </td>
                        </tr>
                    @endforeach
                    </tbody>
                 </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal fade" tabindex="-1" id="modal-primary">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Add New Distributor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/adddistributor')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">

                     <div class="row">
                                   <div class="col-md-0">
                                    Name: &nbsp;
                                     </div>
                                     <div class="col-md-10">
                                    <div class="form-group">
                                    <input required name="name" placeholder="Enter Distributor Name" type="text"  class="form-control" />
                                 
                                  </div>
                                   </div>
                     </div>

                     <div class="row">
                                   <div class="col-md-0">
                                    Email: &nbsp;
                                     </div>
                                     <div class="col-md-10">
                                    <div class="form-group">
                                    <input required name="email" placeholder="Distributor Email" type="text"  class="form-control" />
                                 
                                  </div>
                                   </div>
                     </div>

                     <div class="row">
                                   <div class="col-md-0">
                                    Phone:&nbsp;
                                     </div>
                                     <div class="col-md-10">
                                    <div class="form-group">
                                    <input required name="phone" placeholder="Distributor Phone" type="text"  class="form-control" />
                                 
                                  </div>
                                   </div>
                     </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Add Distributor</button>
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