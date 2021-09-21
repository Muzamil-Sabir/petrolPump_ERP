@extends('layout.layout')
@section('content')


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Report </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="report">Reports</a></li>
             
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
                    <i class="fas fa-globe"></i> Sparly Petrol Pump.
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
                    <strong>{{ date('d-F-Y',strtotime($from)) }}</strong><br>
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
                    <strong>{{ date('d-M-Y',strtotime($to)) }}</strong><br>
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
                      <th>Nozzel Type</th>
                      <th>Nozzel #</th>
                      <th>Sale in Ltr</th>
                      <th>Sale in Rs</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>HSD</td>
                      <td>N1</td>
                      <td>{{ $hsdN1Saleltr }}</td>
                      <td>{{ $hsdN1SaleRs }}</td>
                     
                    </tr>
                    <tr>
                      <td>HSD</td>
                      <td>N2</td>
                      <td>{{ $hsdN2Saleltr }}</td>
                     <td>{{ $hsdN2SaleRs }}</td>

                    </tr>
                    <tr>
                      <td>HSD</td>
                      <td>N3</td>
                      <td>{{ $hsdN3Saleltr }}</td>
                      <td>{{ $hsdN3SaleRs }}</td>
                      
                    </tr>
                    <tr>
                      <td>HSD</td>
                      <td>N4</td>
                      <td>{{ $hsdN4Saleltr }}</td>
                      <td>{{ $hsdN4SaleRs }}</td>
                      
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td style="text-center"><b>Total(Ltr)</b></td>
                      <td><b>Total(Rs.)</b></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b>{{ $totalHsdSaleInLiter }}</b></td>
                      <td><b>{{ $totalHsdSaleInRs }}</b></td>
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
                      <th>Nozzel Type</th>
                      <th>Nozzel #</th>
                      <th>Sale in Ltr</th>
                      <th>Sale in Rs</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>SUPER</td>
                      <td>N1</td>
                      <td >{{ $superN1saleltr }}</td>
                      <td>{{ $superN1SaleRs }}</td>
                     
                    </tr>
                    <tr>
                      <td>SUPER</td>
                      <td>N2</td>
                      <td>{{ $superN2Saleltr }}</td>
                     <td>{{ $superN2SaleRs }}</td>

                    </tr>
                    <tr>
                      <td>SUPER</td>
                      <td>N3</td>
                      <td>{{ $superN3Saleltr }}</td>
                      <td>{{ $superN3SaleRs }}</td>
                      
                    </tr>
                    <tr>
                      <td>SUPER</td>
                      <td>N4</td>
                      <td>{{ $superN4Saleltr }}</td>
                      <td>{{ $superN4SaleRs }}</td>
                      
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td style="text-center"><b>Total(Ltr)</b></td>
                      <td><b>Total(Rs.)</b></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b>{{ $totalSuperSaleInLiter }}</b></td>
                      <td><b>{{ $totalSuperSaleInRs }}</b></td>
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
                        <th style="width:50%">HSD Cumulative (Ltr):</th>
                        <td>{{ $totalHsdSaleInLiter }}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Super Cumulative (Ltr):</th>
                        <td>{{ $totalSuperSaleInLiter }}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">HSD Cumulative (Rs):</th>
                        <td>{{ $totalHsdSaleInRs }}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Super Cumulative (Rs):</th>
                        <td>{{ $totalSuperSaleInRs }}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Subtotal (Ltr):</th>
                        <td>{{ $cumulativeSaleltr }}</td>
                      </tr>
                      <tr>
                        <th>Subtotal (Rs)</th>
                        <td>{{ $cumulativeSaleRs }}</td>
                      </tr>
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


 @endsection
