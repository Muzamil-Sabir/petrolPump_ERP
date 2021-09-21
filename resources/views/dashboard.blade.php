
@extends('layout.layout')
@section('content')

@php
$hsd=0;
$super=0;
foreach($current_stock as $row){
  if($row->nozzel_id==1){
    $hsd=round($row->quantity,2);
  }else{
    $super = round($row->quantity,2);
  }
}
@endphp
<div class="content-header">
  <div class="container">
  <div class="content">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-1"> Dashboard </h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right"> 
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
            </ol>
      </div>
    </div>
  </div>
  </div>
</div>
<div class="container">
<div class="row" >
  <div class="col-md-6 text-center" style="background-color:{{($hsd<100)?'red':'green'}}"><h1 style="color:white">HSD: <font color="yellow"><b>{{$hsd}} ltr. </b></font></h1></div>
  <div class="col-md-6 text-center" style="background-color:{{($super<100)?'red':'green'}}"><h1 style="color:white">SUPER:<font color="yellow"><b> {{$super}} ltr.</b></font></h1></div>
</div>
</div>
<!-- <marquee width="100%" direction="right" height="">
<h2>This is a sample scrolling text that has scrolls texts to right.</h2>
</marquee> --> <br>
<div class="">
<div class="row">
  <div class="col-md-3">
    <div style="margin-left: 25%;">
    <div class="dropdown">
  <a href="">
           <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-12">
              <span class="info-box-icon bg-red elevation-1"><i class="fas fa-cogs"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricants</span>
                <span class="info-box-number">Complete Stock and sales</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
  </a>

  <div class="dropdown-content dropdown" style="position:absolute;">
    <a href="lubricantCategories">
            <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-red elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricants</span>
                <span class="info-box-number">categories</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
    </a>
    <a href="lubricantItems">
                  <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-red elevation-1"><i class="fas fa-list-ol"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number">Items</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
    </a>
    <a href="lubricantsStockIn">
            <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-red elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number"> Stock In</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
    </a>
        <a href="lubricantsSale">
            <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-red elevation-1"><i class="fas fa-credit-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number"> sales</span>
              </div>
            </div>
          </div>
    </a>
  </div>
</div>
</div>
<div style="margin-left: 25%;">
      <div class="dropdown">
  <a href="tariff">
           <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-12">
              <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tariff</span>
                <span class="info-box-number">Update and add new Tariff</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
  </a>

</div>
</div>
<div>
  
</div>
  </div>
          <div class="col-md-3">
                  <div>
            <!-- small box -->
            <a href="diprodReadings"> 
            <div class="small-box bg-info"> 
              <div class="inner">
                <h3 align="center" style="padding-top: 20%;">DIP-Rod Readings</h3>

                <p>&nbsp;</p> <p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
           </div> </a>
          </div>
          </div>
          <div class="col-md-3">
                   <div>
            <!-- small box -->
            <a href="nozzleReadings"> 
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 align="center" style="padding-top: 20%;">Nozzels Readings</h3>

                <p>&nbsp;</p><p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div> </a>
          </div>
          </div>
      <div class="col-md-3">
            <div class="dropdown">
  <a href="ServiceStationSale">
           <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-12">
              <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-shower"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Service Station</span>
                <span class="info-box-number">Sales and logs</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
  </a>

</div>

  
      <div class="dropdown">
        <div>
  <a href="viewDiprodScale">
           <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-12">
              <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-question-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Diprod Scale</span>
                <span class="info-box-number">HSD and Super</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
  </a>
</div>
</div>

</div>
</div>
<div class="row">

  <div class="col-md-3">
    <br>
     <div style="margin-left:25%">
    <div class="dropdown">
    
  <a href="distributor">
           <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-12">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-address-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Distributors</span>
                <span class="info-box-number">Amount logs and clearance</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
  </a>
  </div>
</div>
<div style="margin-left:25%">
<div class="dropdown">
  <a href="users">
           <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-12">
              <span class="info-box-icon bg-black elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">List of Users and Add new </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
  </a>

</div>
</div>
<!-- <div>
      <div class="dropdown">
  <a href="">
           <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-12">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Expense</span>
                <span class="info-box-number">Expense head and logs</span>
              </div>
            </div>
          </div>
  </a>
  <div class="dropdown-content dropdown">
    <a href="#">
            <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number">categories</span>
              </div>
            </div>
          </div>
    </a>
    <a href="#">
                  <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number">Items</span>
              </div>
            </div>
          </div>
    </a>
    <a href="#">
                  <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number"> sales</span>
              </div>
            </div>
          </div>
    </a>
  </div>
</div>
</div> -->
<div>
  
</div>
  </div>
          <div class="col-md-3">
                   <div>
            <!-- small box -->
             <a href="stocking"> 
            <div class="small-box bg-success">
              <div class="inner">
                <h3 align="center" style="padding-top: 20%;">Stocking</h3>

                <p>&nbsp;</p><p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
             
            </div> </a>
          </div>
          </div>
            <div class="col-md-3">
            <!-- small box -->
             <a href="reports"> 
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 align="center" style="padding-top: 20%;">Reporting</h3>

                <p>&nbsp;</p><p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
             
            </div> </a>
          </div>
      <div class="col-md-3">
              <div><br></div>

            <div class="dropdown">
  <a href="expense">
           <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-12">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Expense</span>
                <span class="info-box-number"> Expense &nbsp; Head</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
  </a>
  <!-- <div class="dropdown-content dropdown">
    <a href="#">
             <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number">categories</span>
              </div>
            </div>
          </div>
    </a>
    <a href="#">
                  <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number">Items</span>
              </div>
            </div>
          </div>
    </a>
    <a href="#">
                  <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number"> sales</span>
              </div>
            </div>
          </div>
    </a>
  </div> -->
</div>

<div class="dropdown">
  <a href="credits">
           <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-12">
              <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-car"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Credits</span>
                <span class="info-box-number"> Party &nbsp; Details</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
  </a>
  <!-- <div class="dropdown-content dropdown">
    <a href="#">
             <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number">categories</span>
              </div>
            </div>
          </div>
    </a>
    <a href="#">
                  <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number">Items</span>
              </div>
            </div>
          </div>
    </a>
    <a href="#">
                  <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number"> sales</span>
              </div>
            </div>
          </div>
    </a>
  </div> -->
</div>
<!-- <div>
  
      <div class="dropdown">
  <a href="">
           <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-12">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricants</span>
                <span class="info-box-number">Complete Tracking</span>
              </div>
            </div>
          </div>
  </a>
  <div class="dropdown-content dropdown">
    <a href="#">
            <div class="col-12 col-sm-12 col-md-12 dropdown">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number">categories</span>
              </div>
            </div>
          </div>
    </a>
    <a href="#">
                  <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number">Items</span>
              </div>
            </div>
          </div>
    </a>
    <a href="#">
                  <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lubricant</span>
                <span class="info-box-number"> sales</span>
              </div>
            </div>
          </div>
    </a>
  </div>
</div>
</div> -->
</div>
</div>  
</div>




 @endsection