@extends('layout.layout')
@section('content')
  @php
             $total_ltrs=0;
             $total_amount=0;    

             $lubricant_quantity=0;
             $lubricant_amount=0;   

  @endphp

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Stock Report </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="reports">Reporting</a></li>
                <li class="breadcrumb-item"><a href="stockReport">Stock Report</a></li>
             
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
                  Stock Report</h4>
                  <h4>
                    <small class="float-right">Printing Date:<b> {{ date('d-F-Y') }} </b></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
            



              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Nozzel Type</th>
                      <th>in Ltrs</th>
                      <th>Amount Rs</th>
                      
                     
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($stock as $row)
                       @php
                         $total_ltrs+=$row->quantity;
                         $total_amount+=$row->In_amount
                   @endphp
                    <tr>
                      <td>{{($row->nozzel_id==1)?'HSD':'SUPER'}}</td>
                     
                       <td>{{round($row->quantity,2)}}</td>
                      <td>{{round($row->In_amount,2)}}</td>
                     
                    </tr>
                    @endforeach
                  
                  
                    <tr>
                      <td></td>
                    
                      <td style="text-center"><b>Total(Ltr)</b></td>
                      <td><b>Total(Rs.)</b></td>
                    </tr>
                    <tr>
                      <td></td>
                     
                      <td><b>{{round($total_ltrs,2)}} Ltr.</b></td>
                      <td><b>Rs. {{round($total_amount,2)}}</b></td>
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
                      <th>Lubricants</th>
                      <th>Quantity</th>
                      
                      <th>Amount</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                     @foreach($lubricants as $row)
                   @php
                   $lubricant_quantity+=$row->quantity;
                   $lubricant_amount+=($row->quantity*$row->item_price);
                   @endphp
                    <tr>
                       <tr>
                      <td>{{$row->item_name}}</td>
                      <td>{{$row->quantity}}</td>
                      <td>{{$row->quantity*$row->item_price}}</td>
                    </tr>
                     
                    </tr>
                    @endforeach
                   
                    
                    <tr>
                      <td></td>
                      
                      <td><b>Quantity. {{$lubricant_quantity}}  </b></td>
                      <td><b> Rs. {{$lubricant_amount}} </b></td>
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
                        <td> {{round($total_ltrs,2)}} Ltr.  </td>
                      </tr>
                      <tr>
                        <th style="width:50%">HSD+SUPER (Rs.)</th>
                        <td> Rs. {{round($total_amount,2)}} </td>
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
                        <td> <h3><b> Rs. {{round($lubricant_amount+$total_amount,2)}}</b> </h3> </td>
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
