@extends('layout.layout')
@section('content')
  @php
                    
  $total_sale = 0;
  $total_previous_stock = 0;
  $total_current_stock = 0;
  $total_purchase = 0;
  $total_gain_loss=0;
  $total_expense=0;


      $hsdSale=0;
      $hsdPreviousStock = 0;
      $hsdCurrentStock=0;
      $hsdGainLoss = 0;
      $hsdIndentPrice=0;
      $hsdPurchase=0;
      $hsdPreviousIndentPrice = 0;

      $superSale=0;
      $superPreviousStock = 0;
      $superCurrentStock=0;
      $superGainLoss = 0;
      $superIndentPrice=0;
      $superPurchase=0;
      $superPreviousIndentPrice=0;


  $profit_loss=0;
  @endphp

    @foreach($profitLossData as $row)
                      @php
                      $total_sale+=$row->sale;
                      $total_previous_stock+=$row->Previous_stock;
                      $total_current_stock+=$row->Current_stock;
                      $total_purchase+=$row->purchase;
                      $total_gain_loss+=$row->Gain_Loss;

                        if($row->nozzel_type==1){
                            $hsdSale=$row->sale;
                          $hsdPreviousStock = $row->Previous_stock;
                          $hsdCurrentStock=$row->Current_stock;
                          $hsdGainLoss = $row->Gain_Loss;
                          $hsdIndentPrice=($row->Indent_price-2.48);
                          $hsdPurchase=$row->purchase;
                          $hsdPreviousIndentPrice = $row->previous_indent;
                        }else{
                            $superSale=$row->sale;
                          $superPreviousStock = $row->Previous_stock;
                          $superCurrentStock=$row->Current_stock;
                          $superGainLoss = $row->Gain_Loss;
                          $superIndentPrice=($row->Indent_price-3);
                          $superPurchase=$row->purchase;
                          $superPreviousIndentPrice=$row->previous_indent;
                        }
                       

                      @endphp
                  
                        
                       
                    @endforeach


                  

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Profit/Loss Report </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="reports">Reports</a></li>
              <li class="breadcrumb-item"><a href="profitLossRange">Profit/Loss</a></li>
              <li class="breadcrumb-item"><a href="profitLoss">Profit/Loss Report</a></li>
             
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
                  Profit/Loss Report</h4>
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
                      <th></th>
                      <th>Previous Stock</th>
                      <th>Current Stock</th>
                      <th>Purchase </th>
                      <th>Sale</th>
                      
                     
                    </tr>
                    </thead>
                    <tbody>
                   
                     <tr>
                   <td>HSD</td>
                     <td>{{round($hsdPreviousStock*$hsdPreviousIndentPrice,2)}}</td>
                      <td>{{round(($hsdCurrentStock - $hsdGainLoss)*$hsdIndentPrice,2)}}</td>
                       <td>{{round($hsdPurchase,2)}}</td>
                        <td>{{$hsdSale}}</td>
                      </tr>

                     <tr>
                   <td>SUPER</td>
                     <td>{{round($superPreviousStock*$superPreviousIndentPrice,2)}}</td>
                      <td>{{round(($superCurrentStock - $superGainLoss)*$superIndentPrice,2)}}</td>
                       <td>{{round($superPurchase,2)}}</td>
                        <td>{{$superSale}}</td>
                      </tr>
                       <tr>
                   <td>LUBS</td>
                     <td>{{round($previous_lubs,2)}}</td>
                      <td>{{round($current_lub,2)}}</td>
                       <td>{{round($lub_purchase,2)}}</td>
                        <td>{{$lub_sale}} </td>
                      </tr>

                       <tr>
                   <td>SERVICE STATION</td>
                     <td>-</td>
                      <td>-</td>
                       <td>-</td>
                        <td>{{$service_station_Sale}}</td>
                      </tr>
                    
                   <tr>
                      <th></th>
                     <th>Total(Rs)</th>
                     <th>Total(Rs)</th>
                     <th>Total(Rs)</th>
                     <th>Total(Rs)</th>
                      </tr>

                      <tr>
                      <th></th>
                     <th>{{ round(($hsdPreviousStock*$hsdPreviousIndentPrice)+($superPreviousStock*$superPreviousIndentPrice)+$previous_lubs,2) }}</th>
                     <th>{{  round((($hsdCurrentStock - $hsdGainLoss)*$hsdIndentPrice)+(($superCurrentStock - $superGainLoss)*$superIndentPrice)+$current_lub,2)  }}</th>
                     <th>{{ round($hsdPurchase+$superPurchase+$lub_purchase,2) }}</th>
                     <th>{{ round($hsdSale+$superSale+$lub_sale+$service_station_Sale,2) }}</th>
                      </tr>

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <h2>Expense</h2>
               <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Expense type</th>
                      <th>Amount(Rs)</th>
                      
                     
                    </tr>
                    </thead>
                    <tbody>
                     @foreach($expense as $row)
                        @php
                            $total_expense+=$row->expense;
                        @endphp
                    <tr>
                    <td>{{$row->expense_type}}</td>
                    <td>{{($row->expense=='')?0:$row->expense}}</td>
                  @endforeach
                  </tr>
                   
                    
                    
                    <tr>
                      
                      <th></th>
                      <th>Total(Rs)</th>
                    </tr>
                    <tr>
                      
                      <th></th>
                      <th>{{$total_expense}}</th>
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
                      
                         @php
    $profit_loss = (($hsdSale+$superSale+$lub_sale+$service_station_Sale)+((($hsdCurrentStock-$hsdGainLoss)*$hsdIndentPrice)+(($superCurrentStock-$superGainLoss)*$superIndentPrice)+$current_lub)-(($hsdPurchase+$superPurchase+$lub_purchase)+(($hsdPreviousStock*$hsdPreviousIndentPrice)+($superPreviousStock*$superPreviousIndentPrice)+($previous_lubs))))-$total_expense;
    @endphp
                      
                      <!-- <tr>
                        <th style="width:50%">Lubricants (Rs):</th>
                        <td> Rs.  </td>
                      </tr> -->
                      <tr>
                        <th style="width:50%"> <h3><b>Gross Profit/Loss (Rs):</b> </h3></th>
                        <td> <h3><b> {{round($profit_loss,2)}} </b> </h3> </td>
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
