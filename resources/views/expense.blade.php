
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
            <h1 class="m-0">Expense for the month of: &nbsp; <b>{{ date('F-Y') }}</b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="expense">Expense</a></li>
             
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
              <button type="button" class=" btn-lg btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                     Expense Head
                </button>
                <button type="button" class=" btn-lg btn btn-primary" data-toggle="modal" data-target="#modal-showExpenseHead">
                     Show Expense Head
                </button>
                <button type="button" class="btn-lg btn btn-success" data-toggle="modal" data-target="#modal-success">
                  Add Expense
                </button> <br><br>
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
                      <td>{{ $j++; }}</td>
                      <td>{{ $row->expense_head }}</td>
                      <td>{{ $row->amount }}</td>
                      <th><a href="expense/{{ $row->expense_head_id }}">
                     <button class="btn  btn-success">Details</button> </a></th>
                    </tr>
                    @endforeach
                    
                    </tbody>
                 </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal fade" tabindex="-1" id="modal-primary">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Add Expense Head</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/addExpenseHead')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">

                     <div class="row">
                                   <div class="col-md-2">
                                    Expense Head: &nbsp;
                                     </div>
                                     <div class="col-md-10">
                                    <div class="form-group">
                                    <input required name="expensehead" placeholder="Enter Expense Head" type="text"  class="form-control" />
                                 
                                  </div>
                                   </div>
                     </div>

                     

            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Add Expense Head</button>
            </div>
          </div>
        </form>


          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

        
      </div>



      <div class="modal fade" tabindex="-1" id="modal-showExpenseHead">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content bg-light">
            <div class="modal-header">
              <h4 class="modal-title">Show Expense Head</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           
            <div class="modal-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-info">
                  <tr>
                   
                    <th>#</th>
                    <th>Expense Head</th>
                    
                    <th>Date</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($ExpenseHead as $row)
                    <tr>
                      <td>{{ $i++; }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ date('d-M-Y h:i:s A', strtotime($row->created_at))  }}</td>
                        
                    
                    </tr>
                    @endforeach
                    
                    </tbody>
                 </table>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
              
            </div>
          </div>
       


          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

        
      </div>




     <div class="modal fade" tabindex="-1" id="modal-success">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title">Add Expense</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/addExpense')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">

                     <div class="row">
                                   <div class="col-md-2">
                                    Expense Head: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                  <select name="expense_head" class="form-control">
                                    @foreach($ExpenseHead as $row)
                                    <option value="{{ $row->expense_head_id }}">{{ $row->name }}</option>
                                    @endforeach
                                  </select>
                                 
                                  </div>
                                   </div>
                     </div>

                     <div class="row">
                                   <div class="col-md-2">
                                    Expense Type: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                  <select name="expense_type" class="form-control">
                                    @foreach($ExpenseType as $row)
                                    <option value="{{ $row->id }}">{{ $row->expense_type }}</option>
                                    @endforeach
                                  </select>
                                 
                                  </div>
                                   </div>
                     </div>

                     <div class="row">
                                   <div class="col-md-2">
                                    Amount: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="amount" placeholder=" Amount" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>

                     <div class="row">
                                   <div class="col-md-2">
                                    Description:&nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <textarea name="description" class="form-control" rows="5" placeholder="Description"></textarea>
                                 
                                  </div>
                                   </div>
                     </div>

                     <div class="row">
                                   <div class="col-md-2">
                                    Date: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="date" max="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" placeholder=" " type="date"  class="form-control" />
                                 
                                  </div>
                                   </div>
                     </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Add Expense</button>
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