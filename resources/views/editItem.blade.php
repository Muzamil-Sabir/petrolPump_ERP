@extends('layout.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Update Item  </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="lubricants">Lubricants</a></li>
              <li class="breadcrumb-item"><a href="lubricantItems">Lubricant Items</a></li>
              
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
                    <h3 class="card-title" style="text-align-last: center;">Update Item</h3>
                </div>
                <form role="form" method="POST" action="{{ url('/updateItem')}}">
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
                                
                                   
                                    @foreach($item as $row)

                                  
                                    <div class="row">
                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input hidden type="text" name="item_id" placeholder="Enter Stock Quantity" class="form-control" value="{{ $row->lubricant_item_id }}">
                                                @error('quantity')
                                <div style="color:red" class="error">{{ $message }}</div>
                                @enderror
                                                            </div>
                                        </div>
                                    </div>

                                      <div class="row">
                                       <div class="col-md-3">
                                            Category&nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="item_category"  class="form-control">
                                                    @foreach($categories as $value)
                                                    <option {{($row->fk_lubricant_category==$value->lubricant_category_id)?'selected':''}} value="{{$value->lubricant_category_id}}">{{$value->lubricant_type}}</option>
                                                    @endforeach
                                                </select>
                                                
                                                @error('quantity')
                                <div style="color:red" class="error">{{ $message }}</div>
                                @enderror
                                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3">
                                            Item&nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input  type="text" name="item_name" placeholder="Item Name" class="form-control @error('item_name') is-invalid @enderror" value="{{ $row->item_name}}">
                                                @error('item_name')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                             Price&nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input  type="text" name="item_price" placeholder="item_price" class="form-control @error('item_price') is-invalid @enderror" value="{{ $row->item_price}}">
                                                @error('item_price')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                                            </div>
                                        </div>
                                    </div> @endforeach
                                    
                                 

                                    <button type="submit" class=" float-right btn btn-outline-success ">Update Price</button> 
                                    
                                </div>
                                
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </form>
                </div>
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



@endsection