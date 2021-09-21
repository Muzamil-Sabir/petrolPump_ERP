
@extends('layout.layout')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Nozzel Readings </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="nozzleReadings">Nozzel Readings</a></li>
             
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
                <h3 class="card-title" style="text-align-last: center;">Nozzel Readings</h3>
              </div>
<!-- @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif -->
              <form role="form" method="POST" action="{{ url('/uploadReadings')}}">
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
                     <label style="margin-left: 20%;color: #138232;"><font size="+1">New Readings</font></label>
                    <label style="margin-left: 15%;color: #1C45CB;"><font size="+1">Previous Readings</font></label>
                   <div class="row">
                    <div class="col-md-0">N1: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="n1" style="color:#138232" name="hsdn1" placeholder="Nozzel 1" class="form-control  @error('hsdn1') is-invalid @enderror" value="{{ old('hsdn1') }}">
                  @error('hsdn1')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                
                  </div>
                  </div> 
                  <div class="col-md-4"> <input disabled="" value="{{ $hsdN1totalReading }}" placeholder="Nozzel 1" style="color:#1C45CB" class="form-control"></div>  
                    </div>
                <div class="row">
                       <div class="col-md-0">N2: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" style="color:#138232" class="form-control @error('hsdn2') is-invalid @enderror" name="hsdn2"  id="exampleInputPassword1"  placeholder="Nozzel 2" value="{{ old('hsdn2') }}">
                     @error('hsdn2')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>

                  </div>
                  <div class="col-md-4"> <input disabled="" value="{{ $hsdN2totalReading }}" placeholder="Nozzel 1" style="color:#1C45CB" class="form-control">
                  </div> 
                    </div>

                     <div class="row">
                      <div class="col-md-0">N3: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" style="color:#138232" class="form-control @error('hsdn3') is-invalid @enderror" name="hsdn3"  id="exampleInputPassword1" placeholder="Nozzel 3" value="{{ old('hsdn3') }}">
                     @error('hsdn3')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                  <div class="col-md-4"> <input disabled="" value="{{ $hsdN3totalReading }}" placeholder="Nozzel 1" style="color:#1C45CB" class="form-control"></div> 
                    </div>

                     <div class="row">
                      <div class="col-md-0">N4: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" style="color:#138232" class="form-control @error('hsdn4') is-invalid @enderror" name="hsdn4"  value="" id="exampleInputPassword1" placeholder="Nozzel 4" value="{{ old('hsdn4') }}">
                     @error('hsdn4')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                   </div>
                   <div class="col-md-4"> <input disabled="" value="{{ $hsdN4totalReading }}" placeholder="Nozzel 1" style="color:#1C45CB" class="form-control"></div> 
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
                   <label style="margin-left: 20%;color: #138232;"><font size="+1">New Readings</font></label>
                    <label style="margin-left: 15%;color: #1C45CB;"><font size="+1">Previous Readings</font></label>
                   <div class="row">
                    <div class="col-md-0">N1: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="n1" style="color:#138232" name="supern1" placeholder="Nozzel 1" class="form-control @error('supern1') is-invalid @enderror" value="{{ old('supern1') }}">
                   @error('supern1')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                  <div class="col-md-4"> <input disabled="" value="{{ $superN1totalReading }}"  placeholder="Nozzel 1" style="color:#1C45CB" class="form-control"></div> 
                    </div>


                    <div class="row">
                       <div class="col-md-0">N2: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" style="color:#138232" class="form-control @error('supern2') is-invalid @enderror" name="supern2"   id="exampleInputPassword1"  placeholder="Nozzel 2" value="{{ old('supern2') }}">
                     @error('supern2')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                  <div class="col-md-4"> <input disabled="" value="{{ $superN2totalReading }}"  placeholder="Nozzel 1" style="color:#1C45CB" class="form-control"></div> 
                    </div>

                     <div class="row">
                      <div class="col-md-0">N3: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" style="color:#138232" class="form-control @error('supern3') is-invalid @enderror" name="supern3"  id="exampleInputPassword1" placeholder="Nozzel 3" value="{{ old('supern3') }}">
                     @error('supern3')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                  <div class="col-md-4"> <input disabled="" value="{{ $superN3totalReading }}"  placeholder="Nozzel 1" style="color:#1C45CB" class="form-control"></div> 
                    </div>

                     <div class="row">
                      <div class="col-md-0">N4: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" style="color:#138232" class="form-control @error('supern4') is-invalid @enderror" name="supern4" id="exampleInputPassword1" placeholder="Nozzel 4" value="{{ old('supern4') }}">
                     @error('supern4')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                   </div>
                   <div class="col-md-4"> <input disabled="" value="{{ $superN4totalReading }}"  placeholder="Nozzel 1" style="color:#1C45CB" class="form-control"></div> 
                    </div>

                    <div class="row">
                      <div class="col-md-0">Date: &nbsp;</div>
                    <div class="col-md-8">
                  <div class="form-group">
                    <input type="date" style="color:#138232" class="form-control @error('supern4') is-invalid @enderror" name="readingdate" id="exampleInputPassword1"  value="{{ date('Y-m-d')}}" max="{{ date('Y-m-d')}}">
                     @error('readingdate')
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
                    <button type="submit" class="btn btn-success ">Update Readings</button> 

                    <a href="{{ route('viewNozzelReadings') }}">
                    <button type="button"  class="btn btn-primary "> 
                   Show Readings</button> </a>


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