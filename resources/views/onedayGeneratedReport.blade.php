@extends('layout.layout')
@section('content')
@php
$totalHsdSaleInLiter = 0;
$totalHsdSaleInRs = 0;
$totalSuperSaleInLiter= 0;
$totalSuperSaleInRs = 0;
$current_super_price=0;
$current_hsd_price = 0;
$servicestationSale = 0;
$total_amount = 0;
$total_lubs_quantity=0;
$total_expense=0;
$i = 1;
$j=1;
@endphp
 @foreach($nozzels_data as $row)
 @php
    if($row->nozzel_type==1)
    {                
     $totalHsdSaleInLiter+=$row->current_reading-$row->old_reading;
     $totalHsdSaleInRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
     $current_hsd_price = $row->current_nozzle_price;
       }

    if($row->nozzel_type==2)
	{
    $totalSuperSaleInLiter+=$row->current_reading-$row->old_reading;
    $totalSuperSaleInRs+=($row->current_reading-$row->old_reading)*$row->current_nozzle_price;
    $current_super_price = $row->current_nozzle_price;
	}               
@endphp
@endforeach


@foreach($serviceStationData as $row2)
@php
$servicestationSale  = $row2->sales;
@endphp
@endforeach

@foreach($lubricantSales as $row3)
@php
$lubricant_item  = $row3->item_name;
$sale = $row3->sale;
@endphp
@endforeach
<!-- {{$totalHsdSaleInRs}}
{{$totalSuperSaleInRs}}
{{$current_hsd_price}} -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      	<div class="row">
                <div class="col-6">
                  
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="report">Reports</a></li>
                <li class="breadcrumb-item"><a href="ondeayGenerateReport"> Sales Report</a></li>
             
            </ol>
            </div>
              </div>
                 

                 


      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container">
         <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
          
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fa fa-file"></i>
                  Sales Report</h4>
                  <h4>
                    <i class="fas fa-globe"></i> Sparly Petrol Pump.
                    <small class="float-right">Printing Date:<b> {{ date('d-F-Y') }}</b></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
      <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{ date('d-F-Y ', strtotime($date)) }}</strong><br>
                    <!-- 795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com -->
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ date('d-F-Y ', strtotime($dateto)) }}</strong><br>
                    <!-- 795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com -->
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <!-- <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th ></th>
                      
                      <th >Sale(Ltr)</th>
                      <th >Sale(Rs)</th>

                     
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>HSD</td>
                     
                      <td>{{ $totalHsdSaleInLiter }}</td>
                      <td>{{ $totalHsdSaleInRs }}</td>
                     
                    </tr> 
                    <tr>
                      <td>SUPER</td>
                      
                     
                      <td>{{$totalSuperSaleInLiter}}</td>
                      <td>{{ $totalSuperSaleInRs }}</td>
                     
                    </tr> 
                     <tr>
                      <td>Service Station</td>
                      
                    
                      <td>-</td>
                      <td>{{ $servicestationSale }}</td>
                     
                    </tr>   
                    <tr>
                     
                      
                      <th></th>
                      <th>Total: {{$totalHsdSaleInLiter+$totalSuperSaleInLiter}}</th>
                      <th>Total: {{$totalHsdSaleInRs + $totalSuperSaleInRs+$servicestationSale}}</th>
                     
                    </tr>                            
                    </tbody>
                  </table>

                </div>
                <!-- /.col -->
              </div>


    
            

	<h4>
     	Lubricants
    </h4> 
              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th >#</th>
                      <th >Lubricant Item</th>
                     
                      <th >Quantity</th>
                      <th >Amount(Rs)</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach($lubricantSales as $row)
                      @if($row->quantity>0)
                      @php
                      $total_amount+=$row->sale;
                      $total_lubs_quantity+=$row->quantity;
                      @endphp
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ ($row->item_name=='')?'N/A': $row->item_name}}</td>
                      
                      <td>{{ $row->quantity }}</td>
                      <td>{{ round($row->sale,2) }}</td>
                    </tr>
                    @endif
                    @endforeach
                         <tr>
                      <th ></th>
                      
                      <th ></th>
                      <th >Total: {{$total_lubs_quantity}}</th>
                      <th >Total: {{ $total_amount}}</th>
                    </tr>       
                    </tbody>
                  </table>

                </div>
                <!-- /.col -->
              </div>

				
  <h4>
      Expenses
    </h4> 
              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th >#</th>
                      
                     
                      <th >Expense Head</th>
                      <th >Amount(Rs)</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($expenses as $row)
                      
                      @php
                      $total_expense+=$row->amount;
                      @endphp
                    <tr>
                      <td>{{ $j++ }}</td>
                      <td>{{ $row->expense_head}}</td>
                      
                     
                      <td>{{ round($row->amount,2) }}</td>
                    </tr>
                   
                    @endforeach
                         <tr>
                      <th ></th>
                      
                     
                      <th > </th>
                      <th >Total: {{$total_expense}} </th>
                    </tr>       
                    </tbody>
                  </table>

                </div>
                <!-- /.col -->
              </div>

			

         <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  
                  
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">&nbsp;</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">HSD+SUPER (Ltr.) </th>
                        <td> {{$totalHsdSaleInLiter+$totalSuperSaleInLiter}}  </td>
                      </tr>
                      <tr>
                        <th style="width:50%">HSD+SUPER (Rs.)</th>
                        <td> {{$totalHsdSaleInRs+$totalSuperSaleInRs}} </td>
                      </tr>
                      <tr>
                        <th style="width:50%">SERVICE STATION(Rs.)</th>
                        <td> {{$servicestationSale}} </td>
                      </tr>
                      <tr>
                        <th style="width:50%">Lubricants(Qty)</th>
                        <td> {{$total_lubs_quantity}} </td>
                      </tr>
                      <tr>
                        <th style="width:50%">Lubricants (Rs):</th>
                        <td> {{$total_amount}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Expenses (Rs):</th>
                        <td> {{$total_expense}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%"> <h3><b>GTotal (Rs):</b> </h3></th>
                        <td> <h3><b>{{ $total_amount + $totalHsdSaleInRs + $totalSuperSaleInRs + $servicestationSale+$total_expense}} </b> </h3> </td>
                      </tr>

                      
                   
                    </table>
                     <button  class="btn btn-lg btn-primary float-right" style="" onclick="printReport();">Print Report</button>
                  </div>
                </div>
                
               
                <!-- /.col -->
              </div>


            </div>
    

            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
  </div>

</div>
<script type="text/javascript">
  function printReport(){
    window.print();
  }
</script>
 @endsection
