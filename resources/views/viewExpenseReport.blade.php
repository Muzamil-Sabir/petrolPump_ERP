@extends('layout.layout')
@section('content')

@php
$i=1;
$total_amount=0;
@endphp
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Expense Report </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="report">Reports</a></li>
                <li class="breadcrumb-item"><a href="generateExpenseReport">Expense Reports</a></li>
             
             
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
                  Expense Report</h4>
                  <h4>
                    <i class="fas fa-globe"></i> Sparly Petrol Pump.
                    <small class="float-right">Printing Date:<b> {{ date('d-F-Y') }}</b></small>
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
                      <th>#</th>
                      <th>Expense Head</th>
                      <th>Expense Amount</th>

                     
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($sales as $row)
                      @php
                      $total_amount+=$row->amount;
                      @endphp
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $row->expense_head }}</td>
                      <td>{{ $row->amount }}</td>
                     
                      
                     
                    </tr>
                    @endforeach
                   
                   
                    <tr>
                      <td></td>
                      <td></td>
                      
                      <td><b>Total Expense</b></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b>Rs. {{ $total_amount }}/-</b></td>
                      
                    </tr>

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
<button  class="btn btn-lg btn-primary float-right" onclick="printReport();">Print Report</button>




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
                      
                      <!-- <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr> -->
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
             <!--  <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div> -->
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
