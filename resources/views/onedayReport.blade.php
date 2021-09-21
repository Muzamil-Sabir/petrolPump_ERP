@extends('layout.layout')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Sales Report </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="onedayReport"> Sales Report</a></li>
              
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
          <div class="col-md-1"></div>
            <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" >
                <h3 class="card-title" style="text-align-last: center;"> Sales Report</h3>
              </div>

              <form role="form" method="POST" action="{{ url('/onedayGeneratedReport')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">

                  <div class="row">
                    <div class="col-md-12 ">
                       <div class="form-group" >
                       <b>Sale Report</b> 
                  </div>
                    </div>
                   </div>
                   <div style="margin-left: 5%;">
                  
                   <div class="row">
                    <div class="col-md-0">Date:&nbsp;</div>
                    <div class="col-md-4">
                  <div class="form-group">
                  <input type="date" name="reportDatefrom" max="{{ date('Y-m-d')}}" value="{{ date('Y-m-d')}}" class="form-control">
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <input type="date" name="reportDateto" max="{{ date('Y-m-d')}}" value="{{ date('Y-m-d')}}" class="form-control">
                  </div>
                  </div>

                  <div class="col-md-2">
                  <button type="submit" class="btn btn-outline-success ">Get Report</button> 

                  </div>
                    </div>

                 

                    
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

 @endsection