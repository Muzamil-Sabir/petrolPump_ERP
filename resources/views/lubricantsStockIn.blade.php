@extends('layout.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Lubricant Items Stock In </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="lubricants">Lubricants</a></li>
              <li class="breadcrumb-item"><a href="lubricantsStockIn">Lubricants Stock In</a></li>
              
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
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header" >
                    <h3 class="card-title" style="text-align-last: center;">Lubricant Items Stock In</h3>
                </div>
                <form role="form" method="POST" action="{{ url('/uploadLubricantsStock')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 ">
                                        
                                    </div>
                                </div>
                                <div style="margin-left: 5%;">
                                    <div class="row">
                                        
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            Distributer: &nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <select class="form-control" name="distributor">

                                         @foreach($distributers as $row)
                                    <option value="{{ $row->distributor_id }}">
                                                        {{ $row->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Lubricant Category: &nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                    <select class="form-control @error('lubricantCategory') is-invalid @enderror" name="lubricantCategory" id="lubricantCategory">
                                        <option value="">-Select Category-</option>
                                       @foreach($lubricantCategories as $row)
                                      <option value="{{ $row->lubricant_category_id }}">
                                        {{$row->lubricant_type}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                 @error('lubricantCategory')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row dynamic">
                                        <div class="col-md-3">
                                            Lubricant Item: &nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control @error('lubricant_item') is-invalid @enderror" name="lubricant_item" id="lubricant_item">
                                                    
                                                </select>
                                                @error('lubricant_item')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            Quantity: &nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="quantity" type="text" name="quantity" placeholder="Enter Stock Quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                                                @error('quantity')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Purchase Price:&nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="price"  onkeydown ="showCurrentValue(event)" type="text" name="purchaseprice" placeholder="Enter Purchase Price" class="form-control @error('purchaseprice') is-invalid @enderror" value="{{ old('purchaseprice') }}">
                                              @error('purchaseprice')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Total Payble Amount:&nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div onclick="handleMouse()"  class="form-group">
                                                <input type="text" id="totalamount" name="totalamount" class="form-control @error('totalamount') is-invalid @enderror" value="{{ old('totalamount') }}" placeholder="Payble Amount">
                                                @error('totalamount')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Paid Amount:&nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div   class="form-group">
                                                <input id="paid_amount" type="text" name="paidamount" class="form-control @error('paidamount') is-invalid @enderror" value="{{ old('paidamount') }}" placeholder="Amount Paid">
                                                @error('paidamount')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-outline-success ">Add Stock</button> 
                                    
                                </div>
                                
                                 


                                <!-- /.card-body -->
                            </div>

                        </div>
                    </form>

                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                    <th>Category</th>
                    <th>Items</th>
                    <th>Quantity</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                 @foreach($current_stock as $row)
                    <tr>
                        <td>{{$row->lubricant_type}}</td>
                        <td>{{$row->item_name }}</td>
                        <td>{{$row->quantity}}</td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script >


     $(document).ready(function() {

            $('#lubricantCategory').on('change', function() {

                var getStId = $(this).val();
                if(getStId) {
                    //alert(getStId);
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


 function showCurrentValue(event)
            {
    //sleep(100);
    
    var code = event.keyCode || event.which;
    //alert(code);
    //alert(event.button);
    if (code === 9 || code === 65) { 
            const price = event.target.value;

            const quantity = document.getElementById('quantity').value;

            const amount = price*quantity;
            //alert(amount);
            document.getElementById('totalamount').value=amount.toFixed(2);
              document.getElementById('paid_amount').value=amount.toFixed(2);

            }

        }

        function handleMouse(){
            const price = document.getElementById('price').value;

            const quantity = document.getElementById('quantity').value;
            
            const amount = price*quantity;
            //alert(amount);
            document.getElementById('totalamount').value=amount.toFixed(2);
              document.getElementById('paid_amount').value=amount.toFixed(2);
        }

</script>

@endsection