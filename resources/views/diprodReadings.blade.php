
@extends('layout.layout')
@section('content')

 @if(Session::has('success'))
 <script type="text/javascript">
  swal("Success!", "Diprod Readings Added Successfully", "success",{
    button:"OK"
  })

</script>
@endif
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Dip-rod Readings </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="diprodReadings">Dip-rod Readings</a></li>
             
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
            <div class="card card-primary " >
              <div class="card-header" >
                <h3 class="card-title" style="text-align-last: center;">Dip-rod Readings</h3>
              </div>

              <form role="form" method="POST" action="{{ url('/uploadDiprodReadings')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h1 align="center"><b>HSD</b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div style="margin-left: 5%;">
                    <div class="row">
                    <div class="col-md-0">
                      @foreach($diprodReadings as $value)
                      @if($value->nozzel_type==1)

                      <font style="color:blue" size="+1"><b>Last FILL:</b></font>
                       &nbsp;
                      <font  size="+2"><b style="color: green">&nbsp; {{ round($value->fillReading,2) }}</b></font>
                      <br>

                      <font style="color:blue" size="+1"><b>Physical Stock:</b></font>
                    
                      <font  size="+2"><b style="color: green">&nbsp; {{ round($value->physical_stock,2) }}.Ltr</b></font>
                      <br>
                      <font style="color:#BDCF00" size="+1"><b>Book Stock:</b></font>
                        <font  size="+2"><b style="color: #00BF5E">&nbsp; {{ round($value->book_stock,2) }}.Ltr</b></font>
                      @endif
                      @endforeach
                     &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  
                  </div>
                  </div>
                    </div> <br>


                   <div class="row">
                    <div class="col-md-0">Dip-rod Reading&nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="n1" name="hsd" placeholder="New Dip-rod Reading" class="form-control  @error('hsd') is-invalid @enderror" value="{{ old('hsd') }}" >
                  @error('hsd')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>


                    
                  </div>
                  
                <!-- /.card-body -->

                
                </div>

                 <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 ">
                       <div class="form-group" >
                       <h1 align="center"><b>SUPER</b></h1>   
                   
                  </div>
                    </div>
                   </div>
                   <div >

                     <div class="row">
                    <div class="col-md-0" style="">
                      @foreach($diprodReadings as $value)
                       @if($value->nozzel_type==2)
                       <font style="color:blue" size="+1"><b>Last FILL:</b>
                      </font> &nbsp;
                       <font  size="+2"><b style="color: green">&nbsp; {{ round($value->fillReading,2) }} </b></font>

                      <br>
                      <font style="color:blue" size="+1"><b>Physical Stock:</b>
                      </font>
                       <font  size="+2"><b style="color: green">&nbsp; {{ round($value->physical_stock,2) }}.Ltr</b></font>

                      <br>
                      <font style="color:#BDCF00" size="+1"><b>Book Stock:</b></font> 
                        <font  size="+2"><b style="color: #00BF5E">&nbsp; {{ round($value->book_stock,2) }}.Ltr</b></font>
                      @endif
                      @endforeach
                     &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <!-- <input type="text" name="superTariff" placeholder="Amount Rs/Liter" class="form-control"> -->
                  </div>
                  </div>
                    </div> <br>
                   <div class="row">
                    <div class="col-md-0">Dip-rod Reading: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="text" name="super" placeholder="New Dip-rod Reading" class="form-control  @error('super') is-invalid @enderror" value="{{ old('super') }}">
                   @error('super')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>

                     <div class="row">
                      <div class="col-md-0">Date: &nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input type="date" style="color:#138232" class="form-control @error('date') is-invalid @enderror" name="date" id="exampleInputPassword1"  value="{{ date('Y-m-d')}}">
                     @error('date')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                   </div>
                   
                    </div>

                    

                  </div>
                  
                <!-- /.card-body -->
                <div class="row">
                      <div class="col-md-4"> &nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-success ">Upload Reading</button>
                    <a href="{{ route('viewDipReadings') }}"> 
                                        <button type="button"  class="btn btn-outline-primary ">Show Readings</button> </a> 

                  </div>
                   </div>
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