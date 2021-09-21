@extends('layout.layout')
@section('content')
@php
$i=1;
@endphp
@error('error')
<p></p>
<script type="text/javascript">
  swal("Failed", "{{ $message }}", "warning",{
    button:"OK"
  })


</script>
@enderror
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Lubricants Sale </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="lubricants">Lubricants</a></li>
              <li class="breadcrumb-item"><a href="createSale">Lubricants Sale</a></li>
              
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
            <!-- general form elements -->
            <div class="card card-primary " style="background-color: #888888;">
                <div class="card-header" >
                    <h3 class="card-title" style="text-align-last: center;">Lubricants Sale</h3>
                </div>
                <form role="form" method="POST" action="{{ url('/uploadLubricantSale')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-4 ">
                                        
                                    </div>
                                </div>
                                <div style="margin-left: 5%;">
                                    <div class="row">
                                        
                                    </div> 
                                 
                                    
                                     <div class="row">
                                        <div class="col-md-4">
                                          
                                        </div>
                                        
                                        <div class="col-md-2 text-center">
                                             <b>Sale Quantity </b>

                                        </div>
                                        <div class="col-md-2 text-center">
                                           <b> Price/Unit </b>

                                        </div>
                                        <div class="col-md-2 text-center">
                                                <b>Stock </b>

                                        </div>
                                        <div class="col-md-2 text-center">
                                                <b>Total Amount </b>

                                        </div>
                                    </div>
                                    

                                    @foreach($lubricantItems as $row)
                                    <div class="row">
                                        <div class="col-md-4">
                                            {{ $row->item_name }}-({{ $row->lubricant_type }})&nbsp;
                                        </div>
                                         <input type="text" hidden name="lubricant_item{{$i}}"   value="{{ $row->lubricant_item_id }}" >
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input onclick="updateValues(event)" onchange ="handleMouse(event)" onkeydown ="showCurrentValue(event)" type="text" id="{{$row->lubricant_item_id}}" name="quantity{{$i}}"   placeholder="quantity"  class="form-control text-center">
                                      
                                            </div>

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input tabIndex="-1" value="{{ $row->item_price }}" type="text" id="{{$row->lubricant_item_id}}_price" name="price{{$i}}" placeholder="Per unit price" readonly class="form-control text-center bg-info">
                                      
                                            </div>

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input tabIndex="-1" type="text" name="amount" placeholder="Total Amount" value="{{ $row->quantity }}" id="{{$row->lubricant_item_id}}_stock" readonly class="form-control text-center bg-success">
                                      
                                            </div>

                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input tabIndex="-1" type="text" name="amount{{$i}}" value="0" id="{{$row->lubricant_item_id}}_amount" readonly class="form-control text-center bg-secondary">
                                      
                                            </div>

                                        </div>


                                    </div>
                                    @php
                                    $i++;
                                    @endphp
                                @endforeach
                             
                                 <div class="row">
                                        <div class="col-md-4">
                                            &nbsp;
                                        </div>
                                        
                                       <di class="col-md-2">
                                           
                                       </di>

                                        <div class="col-md-4">
                                           <b> <font size="+2">Total Amount:</font>
                                           <font size="+3" color="yellow">
                                           <div class="" id="total_amount">0</div>
                                           </font> </b>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="date" name="sale_date" value="{{ date('Y-m-d')}}" max="{{ date('Y-m-d')}}"  class="form-control text-center">
                                      
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-success float-right ">Make Sale</button> 
                                    
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




<script type="text/javascript">
    var total_amount=0;
    function showCurrentValue(event)
{
    //sleep(100);
    
    var code = event.keyCode || event.which;
    //alert(code);
    if (code === 9) {  
    const item_id = event.target.id
    const quantity = event.target.value;
    
    var price = document.getElementById(item_id+'_price').value;
    var stock = document.getElementById(item_id+'_stock').value;
    var sale_amount = quantity*price;
    var updated_stock=stock-quantity;
    if(updated_stock>=0 ){
    document.getElementById(item_id+'_stock').value=updated_stock;

    document.getElementById(item_id+'_amount').value=sale_amount;
    var curren_amount = quantity*price;
    var previous_amount = Number(document.getElementById('total_amount').innerHTML);

       total_amount=Number(curren_amount+previous_amount);
       document.getElementById(item_id).style.border=' solid green';
       document.getElementById('total_amount').innerHTML=total_amount.toFixed(2);
    }
    else{


document.getElementById(item_id).style.border=' solid red';
    }
    
       //total_amount=total_amount.toFixed(2);
   // total_amount+= document.getElementById(item_id+'_amount').value;
    
 
    }
    
 
  

}

// function handleMouse(){
             
    
//     const item_id = event.target.id
//     const quantity = event.target.value;
    
//     var price = document.getElementById(item_id+'_price').value;
//     var stock = document.getElementById(item_id+'_stock').value;
//     var sale_amount = quantity*price;
//     var updated_stock=stock-quantity;
//     if(updated_stock>=0 ){
//     document.getElementById(item_id+'_stock').value=updated_stock;

//     document.getElementById(item_id+'_amount').value=sale_amount;
//     var curren_amount = document.getElementById(item_id+'_amount').value;
//        total_amount+=Number(curren_amount);
//        document.getElementById(item_id).style.border=' solid green';
//     }
//     else{


//         document.getElementById(item_id).style.border=' solid red';
//     }
    
//        //total_amount=total_amount.toFixed(2);
//    // total_amount+= document.getElementById(item_id+'_amount').value;
//     document.getElementById('total_amount').innerHTML="Rs."+total_amount.toFixed(2)+"/-";
 
    
//         }

        function updateValues(event){
            const item_id = event.target.id
            const quantity = Number(event.target.value);
            var stock =Number(document.getElementById(item_id+'_stock').value);
            var reverseStock = Number(stock+quantity);
            var price = document.getElementById(item_id+'_price').value;
            var previous_total_amount = Number(document.getElementById('total_amount').innerHTML);
            if(document.getElementById(item_id).style.border!='solid red'){
              var subtract_amount = quantity*price;  
              var updated_amount = previous_total_amount-subtract_amount;
              //alert(updated_amount);
              document.getElementById('total_amount').innerHTML = updated_amount;

            document.getElementById(item_id+'_stock').value=reverseStock;
            event.target.value='';
             }
            
        }
</script>
@endsection