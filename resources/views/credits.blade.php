
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
          <div class="col-sm-6">
            <h1 class="m-0"> Credit Parties </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="credits">Credit Parties</a></li>
             
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
                  Add New party  
                </button> 
                &nbsp;
                &nbsp;
                <button type="button" class="btn-lg btn bg-purple btn-outline-light" data-toggle="modal" data-target="#modal-success3">
                  Add New Vehicle  
                </button>
                &nbsp;
                <button type="button" class="btn-lg btn btn-dark" data-toggle="modal" data-target="#modal-success2">
                  Fill Oil  
                </button>
                &nbsp;
                <button type="button" class="btn-lg btn btn-primary" data-toggle="modal" data-target="#payment">
                  Payment  
                </button>
                <br><br>
                <h3>Party Owners</h3>
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-success">
                  <tr>
                    <th>Party Owner</th>
                    <th>Party Address</th>
                    <th>Pending Amount</th>
                    <th>Party Balance</th>
                    
                    </tr>
                  </thead>
                  <tbody> 
                   <tr>
                    @foreach($parties as $row)
                   <td>{{ $row->owner_name }}</td>
                    <td>{{ $row->owner_address }}</td>
                   <td>{{ $row->pending_balance }}</td>
                   <td>{{ $row->owner_balance }}</td>
                                    </tr>

                   @endforeach
                    
                    </tbody>
                 </table>


                <h3>Vehciles</h3>


                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">
                  <tr>
                    <th>Vehicle Model</th>
                    <th>Vehicle Owner</th>
                    <th>Vehicle Driver</th>
                    <th>Driver Contact</th>
                    <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody> 
                   <tr>
                    @foreach($vehicles as $row)
                   <td>{{ $row->vehicle_model }}</td>
                    <td>{{ $row->vehicle_owner }}</td>
                   <td>{{ $row->driver_name }}</td>
                   <td>{{ $row->driver_contact }}</td>
                    <td><button class="btn btn-lg bg-dark" onclick="window.location.href='creditFill/{{$row->vehicle_id }}'">Fill Info</button></td>

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
              <h4 class="modal-title">Add New Party</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/addParty')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">
                   

                     <div class="row">
                                   <div class="col-md-2">
                                    Owner Name: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="owner_name" placeholder=" Enter Owner Name" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>
                        <div class="row">
                                   <div class="col-md-2">
                                    Owner Contact: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="owner_contact" placeholder=" Enter Owner Contact" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>
                       <!-- <div class="row">
                                   <div class="col-md-2">
                                    Vehicle: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required name="vehicle" placeholder=" Vehicle model and Number" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div> -->
                     <!-- <div class="row">
                                        <div class="col-md-2">
                                            Vehicle Type: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">

                                                <select class="form-control" name="vehicle_type">
                                         @foreach($vehicle_type as $row)
                                    <option value="{{ $row->nozzel_id }}">
                                                        {{ $row->type }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                     <!-- <div class="row">
                                   <div class="col-md-2">
                                    Driver Name: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required name="driver_name" placeholder="Enter Driver Name" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div> -->
                     <div class="row">
                                   <div class="col-md-2">
                                    Owner Address: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input  name="owner_address" placeholder=" Enter Owner Address-Optional" type="text"  class="form-control"  />

                                  </div>
                                  </div>
                     </div>
                        <div class="row">
                                   <div class="col-md-2">
                                    Date: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required  name="date" type="date" value="{{date('Y-m-d')}}" max="{{date('Y-m-d')}}" class="form-control"/>
                                  </div>
                                  </div>
                     </div>
                     

                     
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Add Party</button>
            </div>
          </div>
        </form>


          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

        
      </div>




<div class="modal fade" tabindex="-1" id="modal-success3">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content bg-purple">
            <div class="modal-header">
              <h4 class="modal-title">Add New Vehicle</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/addVehicle')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">


                     <div class="row">
                                        <div class="col-md-2">
                                            Owner: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select name="vehicle_owner" class="form-control">
                                                  <option>
                                                    --Select Car owner--
                                                  </option>
                                                  @foreach($parties as $row)
                                    <option value="{{ $row->party_id }}">
                                                        {{ $row->owner_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                      </div>  

                     <!-- <div class="row">
                                   <div class="col-md-2">
                                    Owner Name: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="owner_name" placeholder=" Enter Owner Name" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div> -->
                        <!-- <div class="row">
                                   <div class="col-md-2">
                                    Owner Contact: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="owner_contact" placeholder=" Enter Owner Contact" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div> -->
                       <div class="row">
                                   <div class="col-md-2">
                                    Vehicle: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required  name="vehicle_model" placeholder=" Vehicle model and Number" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>
                     <div class="row">
                                        <div class="col-md-2">
                                            Vehicle Type: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">

                                                <select class="form-control" name="vehicle_type">
                                         @foreach($vehicle_type as $row)
                                    <option value="{{ $row->nozzel_id }}">
                                                        {{ $row->type }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                     <div class="row">
                                   <div class="col-md-2">
                                    Driver Name: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required name="driver_name" placeholder="Enter Driver Name" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>
                     <div class="row">
                                   <div class="col-md-2">
                                    Driver Contact: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required name="driver_contact" placeholder=" Enter Driver contact" type="text"  class="form-control" required />
                                  </div>
                                  </div>
                     </div>
                        <div class="row">
                                   <div class="col-md-2">
                                    Date: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required name="date" type="date" value="{{date('Y-m-d')}}" max="{{date('Y-m-d')}}" class="form-control" required />
                                  </div>
                                  </div>
                     </div>
                     

                     
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Add Vehicle</button>
            </div>
          </div>
        </form>


          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

        
      </div>





<div class="modal fade" tabindex="-1" id="modal-success2">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <h4 class="modal-title">Add Credit Sale</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/addCreditFill')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">
                       <!-- <div class="row">
                                        <div class="col-md-2">
                                            Vehicle Owner: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">

                                                <select id="owner" name="owner" class="form-control">
                                                  <option>
                                                    --Select Vehicle--
                                                  </option>
                                         @foreach($parties as $row)
                                    <option value="{{ $row->party_id }}">
                                                        {{ $row->owner_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                      </div> -->

                     <!-- <div class="row">
                                        <div class="col-md-2">
                                            Vehicle: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select id="vehicle" name="vehicle" class="form-control">
                                         
                                                </select>
                                            </div>
                                        </div>
                      </div> -->


                      <div class="row">
                                        <div class="col-md-3">
                                            Vehicle: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select id="vehicle" name="vehicle" class="form-control">
                                                  <option>
                                                    --Select Vehicle--
                                                  </option>
                                         @foreach($vehicles as $row)
                                    <option value="{{ $row->vehicle_id }}">
                                                        {{ $row->vehicle_model }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                      </div>                  
                     <div class="row">
                                   <div class="col-md-3">
                                    Current Fill (RS): &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input onkeydown ="showCurrentValue(event)" required Numeric name="currrent_fill" placeholder="Enter Current Fill" type="text" id="current_fill" class="form-control"/>
                                 
                                  </div>
                                   </div>
                     </div>
                     <!-- <div class="row">
                                   <div class="col-md-2">
                                    Paid Amount: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required name="driver_contact" placeholder=" Enter Driver contact" type="text"  class="form-control" required />
                                  </div>
                                  </div>
                     </div> -->
                    <div class="row">
                                   <div class="col-md-3">
                                    Date: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required name="date" type="date" value="{{date('Y-m-d')}}" max="{{date('Y-m-d')}}" class="form-control" required />
                                  </div>
                                  </div>
                     </div>          
                     <div class="row">
                                   <div class="col-md-3">
                                    Price Per Ltr: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="current_price" placeholder="price for this car" readonly id="current_price" type="double"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>
                        <div class="row">
                                   <div class="col-md-3">
                                    Current Amount: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="current_amount" readonly id="current_amount" placeholder=" Current Amount" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>
                       <div class="row dynamic">
                                        <div class="col-md-3">
                                            Owner Current Balance: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="double" placeholder="Owner current Balance" readonly class="form-control" name="owner_balance" id="owner_balance">
                                                
                                                @error('owner_balance')
                                            <div style="color:red" class="error">{{ $message }}</div>
                                            @enderror
                                          </div>
                                        </div>
                        </div>
                        <div class="row dynamic">
                                        <div class="col-md-3">
                                            Owner Pending Balance: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="double" placeholder="Owner Pending Balance" readonly class="form-control" name="pending_balance" id="pending_balance">
                                                
                                                @error('owner_balance')
                                            <div style="color:red" class="error">{{ $message }}</div>
                                            @enderror
                                          </div>
                                        </div>
                        </div>
                     <div class="row">
                                   <div class="col-md-3">
                                    Total Amount: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required readonly name="total_amount" id="total_amount" placeholder="Total amount" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>
                             
                   </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Add Credit Sale</button>
            </div>
          </div>
        </form>


          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

        
      </div>




       <div class="modal fade" tabindex="-1" id="payment">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Add Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/addPayment')}}" method="POST">
               @csrf
            <div class="modal-body">
            <div class="row">
                     <div class="col-md-12">
                   

                     <div class="row">
                                        <div class="col-md-3">
                                            Owner: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select name="party" class="form-control">
                                                  <option>
                                                    --Select Party--
                                                  </option>
                                                  @foreach($parties as $row)
                                    <option value="{{ $row->party_id }}">
                                                        {{ $row->owner_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                      </div>  
                        <div class="row">
                                   <div class="col-md-3">
                                    Payment: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required name="payment" placeholder=" Enter Owner Payment" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div>

                     <!-- <div class="row dynamic">
                                        <div class="col-md-3">
                                            Owner Current Balance: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="double" placeholder="Owner current Balance" readonly class="form-control" name="owner_balance" id="owner_balance">
                                                
                                                @error('owner_balance')
                                            <div style="color:red" class="error">{{ $message }}</div>
                                            @enderror
                                          </div>
                                        </div>
                        </div>
                        <div class="row dynamic">
                                        <div class="col-md-3">
                                            Owner Pending Balance: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="double" placeholder="Owner Pending Balance" readonly class="form-control" name="pending_balance" id="pending_balance">
                                                
                                                @error('owner_balance')
                                            <div style="color:red" class="error">{{ $message }}</div>
                                            @enderror
                                          </div>
                                        </div>
                        </div> -->
                       <!-- <div class="row">
                                   <div class="col-md-2">
                                    Vehicle: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required name="vehicle" placeholder=" Vehicle model and Number" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div> -->
                     <!-- <div class="row">
                                        <div class="col-md-2">
                                            Vehicle Type: &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">

                                                <select class="form-control" name="vehicle_type">
                                         @foreach($vehicle_type as $row)
                                    <option value="{{ $row->nozzel_id }}">
                                                        {{ $row->type }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                     <!-- <div class="row">
                                   <div class="col-md-2">
                                    Driver Name: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required required name="driver_name" placeholder="Enter Driver Name" type="text"  class="form-control" required />
                                 
                                  </div>
                                   </div>
                     </div> -->
                     
                        <div class="row">
                                   <div class="col-md-3">
                                    Date: &nbsp;
                                     </div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                    <input required  name="date" type="date" value="{{date('Y-m-d')}}" max="{{date('Y-m-d')}}" class="form-control"/>
                                  </div>
                                  </div>
                     </div>
                     

                     
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Add Payment</button>
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
<!-- <script >
     $(document).ready(function() {

            $('#owner').on('change', function() {

                var getStId = $(this).val();
                if(getStId) {

                    //alert(getStId);
                    console.log("yes");
                      $.ajax({

                        url: 'getvehicle/'+getStId,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data){
                            //alert(data);
                            //console.log(data);
                          if(data){
                            $('#vehicle').empty();
                            $('#vehicle').focus;
                            $('#vehicle').append('<option value="">-- Select vehicle --</option>'); 
                            $.each(data, function(key, value){
                            $('select[name="vehicle"]').append('<option value="'+value.vehicle_id+'">' + value.vehicle_model+ '</option>');
                        });
                      }else{
                        $('#vehicle').empty();
                      }
                      }
                    });
                }else{
                  $('#vehicle').empty();
                }
            });
        });
</script>


 -->
<script >
     $(document).ready(function() {
            $('#vehicle').on('change', function() {
                var getStId = $(this).val();
                if(getStId) {
                    //alert(getStId);
                    console.log("yes");
                      $.ajax({
                        url: 'gettariff/'+getStId,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data){
                            //alert(data);
                            //console.log(data);
                          if(data){
                            $.each(data, function(key, value){
                              var new_tariff = value.price;
                              //var new_tariff = value.tariff;
                              //document.getElementById('current_amount').value=new_tariff;

                           document.getElementById('current_price').value=new_tariff;
                           // var quantity = document.getElementById('current_amount');
                           // alert(quantity);

                             });
                      }else{
                        $('#owner_balance').empty();
                      }
                      }
                    });
                }else{
                  $('#owner_balance').empty();
                }
            });
        });
</script>


<script >
     $(document).ready(function() {
            $('#vehicle').on('change', function() {
                var getStId = $(this).val();
                if(getStId) {
                    //alert(getStId);
                    console.log("yes");
                      $.ajax({
                        url: 'getbalance/'+getStId,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data){
                            //alert(data);
                            //console.log(data);
                          if(data){
                            $.each(data, function(key, value){
                              var new_balance = value.owner_balance;
                              var pending_balance = value.pending_balance;

                              //var new_tariff = value.tariff;
                              //document.getElementById('current_amount').value=new_tariff;

                            document.getElementById('owner_balance').value=new_balance;
                            document.getElementById('pending_balance').value=pending_balance;
                           // var quantity = document.getElementById('current_amount');
                           // alert(quantity);

                             });
                      }else{
                        $('#owner_balance').empty();
                      }
                      }
                    });
                }else{
                  $('#owner_balance').empty();
                }
            });
        });
</script>

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
    var total_amount=0;
    function showCurrentValue(event)
{
    //sleep(100);
    var code = event.keyCode || event.which;
    //alert(code);
    if (code === 9) {  
    const fill = event.target.value;
    const price = document.getElementById('current_price').value;
    const c_amount = Number(document.getElementById('current_fill').value);
    const current_amount = fill/price;
    //const owner_balance = Number(document.getElementById('owner_balance').value);
    const pending_balance = Number(document.getElementById('pending_balance').value);
    document.getElementById('current_amount').value = current_amount.toFixed(2);
    const total_amount = Number(pending_balance+c_amount);
    document.getElementById('total_amount').value = total_amount;
    }
}
</script>
 @endsection