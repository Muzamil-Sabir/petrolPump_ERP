
@extends('layout.layout')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Tariff </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Tariff</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <table class="table yajra-datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>


        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
   
  $(function () {
         //alert("yes");
       // alert("yes");
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('tariffLog.list') }}",
        columns: [
            {data: 'tariff_id', name: 'tariff_id'},
            {data: 'nozzel_type', name: 'nozzel_type'},
            {data: 'price', name: 'price'},

            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'isActive', name: 'isActive'},
           
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
 @endsection