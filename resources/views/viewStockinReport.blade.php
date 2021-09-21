@extends('layout.layout')
@section('content')
  @php
             $lubricant_quantity=0;
             $lubricant_amount=0; 

             $hsdSuper_total_quantity=0;
             $hsdSuper_total_amount=0;

  @endphp

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> StockIn Report </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="reports">Reports</a></li>
              <li class="breadcrumb-item"><a href="stockReport">Stock Report</a></li>
              <li class="breadcrumb-item"><a href="stockinReport">Stock Report</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container">
         <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fa fa-file"></i>
                  StockIn Report</h4>
                  <h4>
                    <small class="float-right">Printing Date:<b> {{ date('d-F-Y') }} </b></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
            
               <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{ date('d-F-Y ', strtotime($from)) }}</strong><br>
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
                    <strong>{{ date('d-F-Y ', strtotime($to)) }}</strong><br>
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
                      <th>Date</th>
                      <th>Nozzel Type</th>
                      <th>Quantity</th>
                      <th>Indent Price</th>
                      <th>Amount Rs</th>
                      
                     
                    </tr>
                    </thead>
                    <tbody>
                     @foreach($stock_in as $row)
                     @if($row->quantity>0)
                     @php
                     $hsdSuper_total_quantity+=$row->quantity;
                     $hsdSuper_total_amount+=$row->quantity*$row->indent_price;
                     @endphp
                     <tr>
                   <td>{{date('d-F-Y',strtotime($row->created_at))}}</td>
                     <td>{{$row->type}}</td>
                      <td>{{$row->quantity}}</td>
                       <td>{{$row->indent_price}}</td>
                        <td>{{$row->quantity*$row->indent_price}}</td>
                      </tr>
                       @endif
                      @endforeach
                    <tr>

                      <td></td>
                      <td></td>
                      <td style="text-center"><b>Total(Ltr)</b></td>
                      <td></td>
                      <td><b>Total(Rs.)</b></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b> {{$hsdSuper_total_quantity}} ltr.</b></td>
                      <td></td>
                      <td><b>Rs. {{$hsdSuper_total_amount}}</b></td>
                    </tr>

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


               <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Date</th>
                      <th>Lubricant</th>
                      <th>Quantity</th>
                      <th>Indent Price</th>
                      <th>Amount</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lubricants as $row)
                    @php
                    $lubricant_quantity+=$row->quantity;
                    $lubricant_amount+=$row->current_amount;
                    @endphp
                    <tr>
                    <td>{{date('d-F-Y',strtotime($row->created_at))}}</td>
                    <td>{{$row->item_name}}</td>
                    <td>{{$row->quantity}}</td>
                    <td>{{$row->indent_price}}</td>
                    <td>{{$row->current_amount}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                    @endforeach
                    
                    
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b>Qty: {{$lubricant_quantity}}  </b></td>
                      <td><b>   </b></td>
                      <td><b>Rs. {{$lubricant_amount}}  </b></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>




              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">&nbsp;</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">HSD+SUPER (Ltr.) </th>
                        <td>{{$hsdSuper_total_quantity}} Ltr.  </td>
                      </tr>
                      <tr>
                        <th style="width:50%">HSD+SUPER (Rs.)</th>
                        <td>{{$hsdSuper_total_amount}} Rs.  </td>
                      </tr>
                      <tr>
                        <th style="width:50%">Lubricants(Qty)</th>
                        <td> {{$lubricant_quantity}} </td>
                      </tr>
                      <tr>
                        <th style="width:50%">Lubricants (Rs):</th>
                        <td> Rs. {{$lubricant_amount}} </td>
                      </tr>
                      <tr>
                        <th style="width:50%"> <h3><b>Cumulative (Rs):</b> </h3></th>
                        <td> <h3><b> Rs.{{$lubricant_amount+$hsdSuper_total_amount}} </b> </h3> </td>
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
