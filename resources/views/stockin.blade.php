
@extends('layout.layout')
@section('content')

  @if(Session::has('success'))
 <script type="text/javascript">
  swal("Success!", "Stock Addedd Successfully", "success",{
    button:"OK"
  })


</script>
@endif



</script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Stockin </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
               <li class="breadcrumb-item"><a href="stocking">Stocking</a></li>
              <li class="breadcrumb-item"><a href="stockin">Stockin</a></li>
             
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
                <h3 class="card-title" style="text-align-last: center;">Stock-In</h3>
              </div>

              <form role="form" method="POST" action="{{ url('/addstockin')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">

                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h1 align="center"><b>HSD</b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div style="margin-left: 5%;">
                    <div class="row">
                    <div class="col-md-0"><font style="color:blue" size="+1"><b>Current Stock:</b></font>
                      @foreach($quantity as $value)
                      @if($value->nozzel_id==1)
                      <font  size="+2"><b style="color: green">&nbsp; {{ round($value->quantity,3) }}-Ltr </b></font>
                      @endif
                      @endforeach
                     &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  
                  </div>
                  </div>
                    </div> <br>
                 

                    <div class="row">
                    <div class="col-md-2">Distributor&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <select id="hsddistributor" name="hsddistributor" class="form-control">
                        @foreach($distributors as $row)
                        <option value="{{ $row->distributor_id }}" >{{ $row->name }}</option>
                        @endforeach
                    </select>
                    
                      </div>
                  </div>
                    </div>

                    <div class="row">
                    <div class="col-md-2">Quantity&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input placeholder="Quantity" class="form-control  @error('hsdquantity') is-invalid @enderror" type="text" name="hsdquantity" value="{{ old('hsdquantity') }}">
                   @error('hsdquantity')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div> 
                     <div class="row">
                    <div class="col-md-2">Total Amount&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input placeholder="Total Amount" class="form-control @error('hsdtotalamount') is-invalid @enderror" type="text" name="hsdtotalamount" value="{{ old('hsdtotalamount') }}">
                @error('hsdtotalamount')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">Paid Amount&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input placeholder="Paid Amount" class="form-control @error('hsdpaidamount') is-invalid @enderror" type="text" name="hsdpaidamount" value="{{ old('hsdpaidamount') }}">
                  @error('hsdpaidamount')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>

                   <!--  <div class="row">
                    <div class="col-md-2">Pending Amount&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input disabled placeholder="Pending Amount" class="form-control" id="hsdpendingamount" type="text" name="hsdpendingamount">
                
                  </div>
                  </div>
                    </div> -->

                      <div class="row">
                    <div class="col-md-2">Indent Price&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input  placeholder="Indent Price" class="form-control @error('hsdpaidamount') is-invalid @enderror" id="hsdindentprice" type="text" name="hsdindentprice" value="{{ old('hsdindentprice') }}">
                  @error('hsdindentprice')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>

                    <div class="row">
                    <div class="col-md-2">Temperature&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input  placeholder="Temperature" class="form-control @error('hsdpaidamount') is-invalid @enderror" id="hsdtemperature" type="text" name="hsdtemperature" value="{{ old('hsdpaidamount') }}">
                    @error('hsdtemperature')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">Receipt#&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input placeholder="Receipt#" class="form-control @error('hsdreceipt') is-invalid @enderror" type="text" name="hsdreceipt" value="{{ old('hsdreceipt') }}">
                  @error('hsdreceipt')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div> 


                    <div class="row">
                    <div class="col-md-2">Shipment#&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="Shipment #" class="form-control @error('hsdshipment') is-invalid @enderror" type="text" name="hsdshipment" value="{{ old('hsdshipment') }}">
                    @error('hsdshipment')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div> 
                    <div class="row">
                    <div class="col-md-2">carrier#&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="Carrier #" class="form-control @error('hsdcarrier') is-invalid @enderror" type="text" name="hsdcarrier" value="{{ old('hsdcarrier') }}">
                      @error('hsdcarrier')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div> 

                    <div class="row">
                    <div class="col-md-2">Carrier Name&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="Carrier Name" class="form-control @error('hsdcarriername') is-invalid @enderror" type="text" name="hsdcarriername" value="{{ old('hsdcarriername') }}">
                    @error('hsdcarriername')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div> 

                     <div class="row">
                    <div class="col-md-2">Order #&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="Order #" class="form-control @error('hsdorder') is-invalid @enderror" type="text" name="hsdorder" value="{{ old('hsdorder') }}">
                  @error('hsdorder')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>

                    <div class="row">
                    <div class="col-md-2">Delivery #&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="delivery #" class="form-control @error('hsddelivery') is-invalid @enderror" type="text" name="hsddelivery" value="{{ old('hsddelivery') }}">
                  @error('hsddelivery')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">Seal #&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="Seal #" class="form-control @error('hsdseal') is-invalid @enderror" type="text" name="hsdseal" value="{{ old('hsdseal') }}">
                    @error('hsdseal')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>

                    
                  </div>
                  
                <!-- /.card-body -->

                
                </div>

                 <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h1 align="center"><b>SUPER</b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div >
                    <div class="row">
                    <div class="col-md-0" style=""><font style="color:blue" size="+1"><b>Current Stock:</b></font>
                       @foreach($quantity as $value)
                      @if($value->nozzel_id==2)
                    <font  size="+2"><b style="color: green">&nbsp; {{ round($value->quantity,3) }}-Ltr </b></font>
                      @endif
                      @endforeach
                     
                     &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <!-- <input type="text" name="superTariff" placeholder="Amount Rs/Liter" class="form-control"> -->
                  </div>
                  </div>
                    </div> <br>
                  

                    <div class="row">
                    <div class="col-md-2">Distributor&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <select name="superdistributor" class="form-control">
                        @foreach($distributors as $row)
                        <option value="{{ $row->distributor_id }}" >{{ $row->name }}</option>
                        @endforeach
                    </select>
                    
                      </div>
                  </div>
                    </div>

                    <div class="row">
                    <div class="col-md-2">Quantity&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input placeholder="Quantity" class="form-control @error('superquantity') is-invalid @enderror" type="text" name="superquantity" value="{{ old('superquantity') }}">
                     @error('superquantity')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div> 

                    <div class="row">
                    <div class="col-md-2">Total Amount&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input placeholder="Total Amount" class="form-control @error('supertotalamount') is-invalid @enderror" type="text" name="supertotalamount" value="{{ old('supertotalamount') }}">
                  @error('supertotalamount')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">Paid Amount&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input placeholder="Paid Amount" class="form-control @error('superpaidamount') is-invalid @enderror" type="text" name="superpaidamount" value="{{ old('superpaidamount') }}">
                    @error('superpaidamount')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>

                    <!-- <div class="row">
                    <div class="col-md-2">Pending Amount&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input disabled placeholder="Pending Amount" class="form-control" type="text" name="superpendingamount" >
                      
                  </div>
                  </div>
                    </div> -->

                    <div class="row">
                    <div class="col-md-2">Indent Price&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input  placeholder="Indent Price" class="form-control @error('superindentprice') is-invalid @enderror" id="superindentprice" type="text" name="superindentprice" value="{{ old('superindentprice') }}">
                     @error('superindentprice')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>

                    <div class="row">
                    <div class="col-md-2">Temperature&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input  placeholder="Temperature" class="form-control @error('supertemperature') is-invalid @enderror" id="hsdtemperature" type="text" name="supertemperature" value="{{ old('supertemperature') }}">
                    @error('supertemperature')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>

                    <div class="row">
                    <div class="col-md-2">Receipt#&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group" >
                    <input placeholder="Receipt#" class="form-control @error('superreceipt') is-invalid @enderror" type="text" name="superreceipt" value="{{ old('superreceipt') }}">
                     @error('superreceipt')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div> 


                    <div class="row">
                    <div class="col-md-2">Shipment#&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="Shipment #" class="form-control @error('supershipment') is-invalid @enderror" type="text" name="supershipment" value="{{ old('supershipment') }}">
                  @error('supershipment')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div> 
                    <div class="row">
                    <div class="col-md-2">carrier#&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="Carrier #" class="form-control @error('supercarrier') is-invalid @enderror" type="text" name="supercarrier" value="{{ old('supercarrier') }}">
                    @error('supercarrier')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div> 

                    <div class="row">
                    <div class="col-md-2">Carrier Name&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="Carrier Name" class="form-control @error('supercarriername') is-invalid @enderror" type="text" name="supercarriername" value="{{ old('supercarriername') }}">
                    @error('supercarriername')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div> 

                     <div class="row">
                    <div class="col-md-2">Order #&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="Order #" class="form-control @error('superorder') is-invalid @enderror" type="text" name="superorder" value="{{ old('superorder') }}">
                      @error('superorder')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>

                    <div class="row">
                    <div class="col-md-2">Delivery #&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="delivery #" class="form-control @error('superdelivery') is-invalid @enderror" type="text" name="superdelivery" value="{{ old('superdelivery') }}">
                    @error('superdelivery')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">Seal #&nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input placeholder="Seal #" class="form-control @error('superseal') is-invalid @enderror" type="text" name="superseal" value="{{ old('superseal') }}">
                    @error('superseal')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-0">Date: &nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input type="date" style="color:#138232" class="form-control @error('date') is-invalid @enderror" name="date" id="exampleInputPassword1"  value="{{ date('Y-m-d')}}" max="{{ date('Y-m-d')}}">
                     @error('date')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                   </div>
                   
                    </div>

                  </div>
                  
                <!-- /.card-body -->
                <div class="row">
                         <div class="col-md-8"> &nbsp;</div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-success ">Add Stock</button> 
                                       <!--  <button type="submit" class="btn btn-outline-primary ">Show  Tariff</button> --> 

                  </div>
                   </div>
                    </div>

                  
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
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="hsddistributor"]').on('change', function() {
            var stateID = $(this).val();
            // if(stateID) {
            //     $.ajax({
            //         url: '/myform/ajax/'+stateID,
            //         type: "GET",
            //         dataType: "json",
            //         success:function(data) {

                        
            //             $('select[name="city"]').empty();
            //             $.each(data, function(key, value) {
            //                 $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
            //             });


            //         }
            //     });
            // }else{
            //     $('select[name="city"]').empty();
            // }
        });
    });
</script>

 @endsection