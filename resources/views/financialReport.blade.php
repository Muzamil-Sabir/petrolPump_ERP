
@extends('layout.layout')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reports </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="reports">Reports</a></li>
              <li class="breadcrumb-item"><a href="financialReport">Financial Report</a></li>
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
          
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" >
                <h3 class="card-title" style="text-align-last: center;">Reports</h3>
              </div>

              <form role="form" method="POST" action="{{ url('/generateReport')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >

                  </div>
                    </div>
                   </div>
                   <div style="margin-left: 5%;">
                   <div class="row">
                    <div class="col-md-0"><b>From: &nbsp;</b></div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="date" max="{{date('Y-m-d')}}" name="from" class="form-control  @error('hsd') is-invalid @enderror" value="{{ date('Y-m-d') }}" >
                  @error('hsd')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>



                  </div>

                <!-- /.card-body -->


                </div>

                 <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >

                  </div>
                    </div>
                   </div>
                   <div >
                   <div class="row">
                    <div class="col-md-0"><b>To: </b>&nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="date" name="to"  class="form-control  @error('super') is-invalid @enderror" max="{{date('Y-m-d')}}" value="{{ date('Y-m-d') }}">
                   @error('super')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>
                  </div>    
              </div>

        <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >

                  </div>
                    </div>
                   </div>
                   <div >
                   <div class="row">
                    <div class="col-md-6">
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-success ">Generate Report</button>
               
                  </div>
                  </div>
                    </div>
                  </div>    
              </div>



                <div class="col-md-4">
                  <div class="form-group">
                  </div>
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