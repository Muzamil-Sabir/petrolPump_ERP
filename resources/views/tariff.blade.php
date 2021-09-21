
@extends('layout.layout')
@section('content')
 @if(Session::has('success'))
 <script type="text/javascript">
  swal("Success!", "Tariff Updated Successfully", "success",{
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
            <h1 class="m-0"> Tariff </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="tariff">Tariff</a></li>
             
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
                <h3 class="card-title" style="text-align-last: center;">Tariff</h3>
              </div>

              <form role="form" method="POST" action="{{ url('/uploadTariff')}}">
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
                    <div class="col-md-0"><font style="color:blue" size="+1"><b>Current Tariff:</b></font>
                      @foreach($tariff as $value)
                      @if($value->nozzel_type==1)
                      <font  size="+2"><b style="color: green">&nbsp; {{ $value->price }}/- </b></font>
                      @endif
                      @endforeach
                     &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  
                  </div>
                  </div>
                    </div> <br>
                   <div class="row">
                    <div class="col-md-0">New Tariff&nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="n1" name="hsdTariff" placeholder="Amount Rs/Liter"  class="form-control  @error('hsdTariff') is-invalid @enderror" value="{{ old('hsdTariff') }}" >
                 @error('hsdTariff')
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
                    <div class="col-md-0" style=""><font style="color:blue" size="+1"><b>Current Tariff:</b></font>
                       @foreach($tariff as $value)
                      @if($value->nozzel_type==2)
                     <font  size="+2"><b style="color: green">&nbsp; {{ $value->price }}/- </b></font>
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
                    <div class="col-md-0">New Tariff: &nbsp;</div>
                    <div class="col-md-6">
                  <div class="form-group">
                  <input type="text" name="superTariff" placeholder="Amount Rs/Liter" class="form-control  @error('superTariff') is-invalid @enderror" value="{{ old('superTariff') }}">
                   @error('superTariff')
                <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                  </div>                 
                  </div>

                  <div class="row">
                  <div class="col-md-0">Tariff Date: &nbsp;</div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <input type="date" name="tariffDate" placeholder="Tariff Date" class="form-control  @error('tariffDate') is-invalid @enderror"   max="{{ date('Y-m-d')}}" value="{{ date('Y-m-d')}}">
                @error('tariffDate')
                    <div style="color:red" class="error">{{ $message }}</div>
                @enderror
                  </div>
                  </div>
                    </div>
                <!-- /.card-body -->
                <div class="row">
                      <div class="col-md-4"> &nbsp;</div>
                    <div class="col-md-19">
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-success ">Update Tariff</button> 
                  </div>
                   </div>
                    </div>
                  </div>
              </div>
              </form>
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-primary">

                  <tr> 
                     <th>Tariff Date</th>
                    <th>Nozzel Type</th>
                    <th>Price</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($allTariff as $row)
                  <tr class="">
                    <td>{{ date('d-F-Y',strtotime($row->created_at)) }}</td>
                    <td>{{ ($row->nozzel_type==1)?'HSD':'SUPER' }}</td>
                    <td>{{ $row->price }}</td>
                    
                  </tr>                       
                  @endforeach 
                  </tbody>
              </table>
            </div>
          </div>
         </div>


        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
 @endsection