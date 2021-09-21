@extends('layout.layout')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Diprod Scale </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Diprod Scale</a></li>
             
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
          
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" >
                <h3 class="card-title" style="text-align-last: center;">Diprod Scale</h3>
              </div>

              <form role="form" method="POST" action="{{ url('/uploadDiprodScale')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">

                  <div class="row">
                    <div class="col-md-6 ">
                       <div class="form-group" >
                       <h1 align="center"><b>Dipdrod Scale</b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div style="margin-left: 5%;">
                    <div class="row">
              
                    </div> 
                   <div class="row">
                    <div class="col-md-0">Fill&nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="text" name="fill" placeholder="Enter Fill Value" class="form-control">
                  </div>
                  </div>
                    </div>

                     <div class="row">
                    <div class="col-md-0">LT&nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="text" name="lt" placeholder="Enter LT value" class="form-control">
            
                  </div>
                  </div>
                    </div>

                     <div class="row">
                    <div class="col-md-0">LG&nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="text" name="lg" placeholder="Enter LG value" class="form-control">
            
                  </div>
                  </div>

                    </div>

                    <button type="submit" class="btn btn-outline-success ">Add Diprod Scale</button> 
                    
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