
@extends('layout.layout')
@section('content')
  @php
          $i=1;
          $j=1;

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
            <h1 class="m-0"> Users </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="users">Uses</a></li>
             
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
              
                <button type="button" class="btn-lg btn btn-success" data-toggle="modal" data-target="#modal-success">
                  Add New User  
                </button> <br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                   
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>User Type</th>
                    </tr>
                  </thead>
                  <tbody> 
                   @foreach($users as $row)
                   <tr>
                   <td>{{$i++}}</td>
                   <td>{{ $row->name }}</td>
                   <td>{{ $row->email }}</td>
                   <td class="{{($row->isActive==1)?'bg-success':'bg-danger' }}">{{ ($row->isActive==1)?'Active':'Disable' }}</td>
                   <td>{{ ($row->role_id==1)?'Admin':'Normal User' }}</td>
                 </tr>
                   @endforeach
                    
                    </tbody>
                 </table>
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
            <form action="{{ url('/adduser')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">


                     

                     <div class="row">
                                   <div class="col-md-2">
                                    Name: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="name" placeholder=" Enter Name" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>
                        <div class="row">
                                   <div class="col-md-2">
                                    Email: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="email" placeholder=" Enter Email" type="email"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>
                       <div class="row">
                                   <div class="col-md-2">
                                    Password: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required name="password" placeholder=" Password" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>
                     

                     
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Add User</button>
            </div>
          </div>
        </form>


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