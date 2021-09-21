
@extends('layout.layout')
@section('content')

<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Stocking </small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="reports">Reporting</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <a href="wetStockReport"> 
            <div class="small-box bg-primary">
              <div class="inner">
                <h3 align="center" style="padding-top: 20%;">Wet Stock Report  </h3>

                <p>&nbsp;</p><p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div> </a>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <a href="financialReport"> 
            <div class="small-box bg-success">
              <div class="inner">
                <h3 align="center" style="padding-top: 20%;">Nozzle Sale</h3>

                <p>&nbsp;</p><p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div> </a>
          </div>
           <div class="col-lg-4 col-6">
            <!-- small box -->
            <a href="expenseReport"> 
            <div class="small-box bg-info">
              <div class="inner">
                <h3 align="center" style="padding-top: 20%;">Expense Report</h3>

                <p>&nbsp;</p><p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div> </a>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <a href="profitLossRange"> 
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 align="center" style="padding-top: 20%;">Profit / Loss</h3>

                <p>&nbsp;</p><p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div> </a>
          </div>
          

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <a href="stockReport"> 
            <div class="small-box bg-info">
              <div class="inner">
                <h3 align="center" style="padding-top: 20%;">Stock Report</h3>

                <p>&nbsp;</p><p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div> </a>
          </div>

                <div class="col-lg-4 col-6">
            <!-- small box -->
            <a href="onedayReport"> 
            <div class="small-box bg-red">
              <div class="inner">
                <h3 align="center" style="padding-top: 20%;">Sales Report</h3>

                <p>&nbsp;</p><p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div> </a>
          </div>
          <!-- /.col-md-6 -->
         
          <!-- /.col-md-6 -->
         
        
        </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

 @endsection