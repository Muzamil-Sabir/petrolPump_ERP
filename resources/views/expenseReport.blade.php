
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
            <h1 class="m-0">Expense Report </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="reports">Reports</a></li>
              <li class="breadcrumb-item"><a href="expenseReport">Expense Report</a></li>
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
              <div class="card-header" >
                <h3 class="card-title" style="text-align-last: center;">Reports</h3>
              </div>

              <form role="form" method="POST" action="{{ url('/generateExpenseReport')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >

                  </div>
                    </div>
                   </div>
                  <div style="margin-left: 5%;">
                  
                   <div class="row">
                    <div class="col-md-0">Date:&nbsp;</div>
                    <div class="col-md-3">
                  <div class="form-group">
                  <input type="date" name="from" onchange="fromdate(event);" max="{{ date('Y-m-d')}}" value="{{ date('Y-m-d')}}" class="form-control">
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                  <input type="date" name="to" onchange="todate(event);" max="{{ date('Y-m-d')}}" value="{{ date('Y-m-d')}}" class="form-control">
                  </div>
                  </div>

                  <div class="col-md-2">
                  <button type="submit" class="btn btn-outline-primary ">Generate Report</button> 
                   </form>
                 

                  </div>
                  <div class="col-md-3">
                    <form role="form" method="POST" action="{{ url('/expenseReport')}}">
                       @csrf
                       <input hidden type="date" value="{{ date('Y-m-d')}}"  name="from" id="from">
                       <input hidden type="date" value="{{ date('Y-m-d')}}" name="to" id="to">
                     <button type="submit" class="btn btn-outline-success ">Get Report</button> 
                     </form>
                  </div>
                    </div>

              </div> </div>

                    </div>
             
             
            </div>
             <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                   
                    <th>#</th>
                    <th>Expense Head</th>
                    <th>Amount</th>
                    <th></th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($result as $row)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $row->expense_head }}</td>
                      <td>{{ $row->amount }}</td>
                      <th><a href="expense/{{ $row->expense_head_id }}/{{$from}}/{{$to}}">
                     <button class="btn  btn-success">Details</button> </a></th>
                    </tr>
                    @endforeach
                    
                    </tbody>
                 </table>
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

<script type="text/javascript">
  function fromdate(event){
 var from =   event.target.value;
  document.getElementById('from').value=from;
  }

  function todate(event){
    var to =   event.target.value;

  document.getElementById('to').value=to;
  }
</script>
 @endsection