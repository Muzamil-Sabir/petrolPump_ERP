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
          <div class="col-sm-7">
            <h1 class="m-0">Lubricant Sales for the month of: &nbsp; <b>{{ date('F-Y') }} </b> </h1>
        </div><!-- /.col -->
        <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="lubricants">Lubricants</a></li>
              <li class="breadcrumb-item"><a href="lubricantsSale">Lubricants Sale</a></li>
              
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
              
                <a href="{{ route('createSale') }}">
                <button type="button" class="btn-lg btn btn-success" data-toggle="modal" data-target="">
                  Add Sale
                </button></a> <br> <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                    <th>Month</th>
                    <th>Category</th>
                    <th>Item Name</th>
                    <th>Sale Quantity</th>
                    <th>Sale Price</th>
                    <th>Sale (Rs)</th>
                    
                    <th></th>
                    </tr>
                  </thead>
                  <tbody> 
                @foreach($sales as $row)
                <tr>
                  <td>{{ date('F-Y ', strtotime($row->sale_date)) }}</td>
                    <td>{{ $row->category }}</td>
                    <td>{{ $row->item_name }}</td>
                    <td>{{ $row->sale_quantity }}</td>
                    <td>{{ $row->current_price }}</td>
                    <td>{{ round($row->sale_rs,2) }}</td>
                    
                    <th>
                    <a href="lubricantsSale/{{ $row->item_id }}">
                     <button class="btn  btn-success">Details</button> </a>                    </th>



                </tr>
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

<div class="modal fade" tabindex="-1" id="modal-success">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title">Add Sale</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/uploadLubricantSale')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">

                     <div class="row">
                                   <div class="col-md-2">
                                    Item Category: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                  <select class="form-control" name="lubricantCategory" id="lubricantCategory">
                                       @foreach($lubricantCategories as $row)
                                      <option value="{{ $row->lubricant_category_id }}">
                                        {{$row->lubricant_type}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                 
                                  </div>
                                   </div>
                     </div>
                     <div class="row">
                                   <div class="col-md-2">
                                    Item Name: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                 <select class="form-control" name="lubricant_item" id="lubricant_item">
                                                   
                                                </select>
                                 
                                  </div>
                                   </div>
                     </div>
                     <div class="row">
                                   <div class="col-md-2">
                                    Quantity: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="quantity" placeholder=" Amount" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>

                     

                     <div class="row">
                                   <div class="col-md-2">
                                    Date: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="sale_date" placeholder=" " type="date"  class="form-control" />
                                 
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

        
      </div>

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
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

<script>
  
  $(document).ready(function() {

            $('#lubricantCategory').on('change', function() {

                var getStId = $(this).val();
                if(getStId) {
                   // alert(getStId);
                    console.log("yes");
                      $.ajax({

                        url: 'getlubricantItem/'+getStId,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data){
                            //alert(data);
                            //console.log(data);
                          if(data){
                            $('#lubricant_item').empty();
                            $('#lubricant_item').focus;
                            $('#lubricant_item').append('<option value="">-- Select Item --</option>'); 
                            $.each(data, function(key, value){
                            $('select[name="lubricant_item"]').append('<option value="'+value.lubricant_item_id+'">' + value.item_name+ '</option>');
                        });
                      }else{
                        $('#lubricant_item').empty();
                      }
                      }
                    });
                }else{
                  $('#lubricant_item').empty();
                }
            });
        });
</script>
</script>

@endsection