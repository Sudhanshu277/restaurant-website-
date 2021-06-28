@extends('admin.master')
@section('tittle','Coupon | Add Coupon')
@section('content')
<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Coupon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="card">
              <div class="card-header">
                <nav class="navbar navbar-expand-md">
                <h3 class="card-title">Coupon</h3>

                 <div class="ml-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa">Add Coupon</button>
               
                </div>
                </nav>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 @if(session('message'))

         <p class ="alert alert-success">
          {{session('message')}}
         </p>
          
    @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S no.</th>
                    <th>Coupon Code</th>
                    <th>Coupon Type</th>
                    <th>Coupon Value</th>
                    <th>Cart Min Value</th>
                    <th>Expired on</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
            @foreach($data as $a)
                   <tr>
                   	<td>{{$i++}}</td>
                   	<td>{{$a->coupon_code}}</td>
                    <td>{{$a->coupon_type}}</td>
                    <td>{{$a->coupon_value}}</td>
                    <td>{{$a->cart_min_value}}</td>
                    <td>{{$a->expired_on}}</td>
                    <td>{{$a->status}}</td>
                    <td>{{$a->datetime}}</td>
                   	<td>
                   		<a href="{{url('coupon/edit/'.$a->id)}}" class="btn btn-info" >Edit</a>
                   		<a href="{{url('coupon/delete/'.$a->id)}}" class="btn btn-danger" >Delete</a>
                   	</td>
                   </tr>
            @endforeach
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
                </table>
              </div>
            </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="aa">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Coupon</h5>

                    <button type="button" class="btn btn-danger" style="border-radius: 50px;" data-dismiss="modal">
                    <span >&times;</span></button>
        
                </div>
                    <div class="modal-body">
                    <form class="form-group" method="post" action="{{url('coupon/insert')}}" enctype="multipart/form-data">
                      @csrf
                       <!--  @if(session('message'))

         <p class ="alert alert-success">
          {{session('message')}}
         </p>
          
    @endif -->  @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif
                    Coupon_code:
                    <input type="text" name="coupon_code" placeholder="Enter Tittle" class="form-control" >
                    <br><br>
                    Coupon Type:
                    <select name="coupon_type" class="form-control" >
                      <option>select</option>
                      <option value="Fixed" >Fixed</option>
                      <option value="Percentage" >Percentage</option>
                    </select>
                    <br><br>
                    Coupon value:
                    <input type="text" name="coupon_value" placeholder="Enten Coupon value" class="form-control">
                    <br><br>
                     Cart Min value:
                    <input type="text" name="cart_min_value" placeholder="Enten cart min value" class="form-control">
                    <br><br>
                    Expired on:
                    <input type="date" name="expired_on" placeholder="Enten cart min value" class="form-control">
                    <br><br>
                    status:<br>
                    <input type="radio" value="1" name="status" >Active<br>
                    <input type="radio" value="0" name="status">Inactive
                    <br><br>
                    Date:
                    <input type="date" name="datetime" placeholder="Enter Tittle" class="form-control" >
                    <br><br>
                    <input type="submit" name="submit" value="submit" class="btn btn-info" >
                    </form>
                   </div>
            </div>
        </div>
    </div>
@endsection