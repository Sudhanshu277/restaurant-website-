@extends('admin.master')
@section('tittle','Edit |Edit Category')
@section('content')
<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">category</h1>
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
                <h3 class="card-title">category</h3>

                 <div class="ml-auto">
                  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa">Add category</button> -->
               
                </div>
                </nav>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!--  @if(session('message'))

         <p class ="alert alert-success">
          {{session('message')}}
         </p>
          
    @endif -->
    <form class="form-group" method="post" action="{{url('coupon/update')}}" enctype="multipart/form-data">
                      @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                     Coupon_code:
                    <input type="text" name="coupon_code" value="{{$data->coupon_code}}"  placeholder="Enter Tittle" class="form-control" >
                    <br><br>
                    Coupon Type:
                    <select name="coupon_type" class="form-control" >
                      <option>select</option>
                      <option value="Fixed" @if($data->coupon_type=='Fixed') selected @endif>Fixed</option>
                      <option value="Percentage" @if($data->coupon_type=='Percentage') selected @endif >Percentage</option>
                    </select>
                    <br><br>
                    Coupon value:
                    <input type="text" name="coupon_value" value="{{$data->coupon_value}}" placeholder="Enten Coupon value" class="form-control">
                    <br><br>
                     Cart Min value:
                    <input type="text" name="cart_min_value" value="{{$data->cart_min_value}}" placeholder="Enten cart min value" class="form-control">
                    <br><br>
                    Expired on:
                    <input type="datetime" name="expired_on" value="{{$data->expired_on}}" placeholder="Enten cart min value" class="form-control">
                    <br><br>
                    status:<br>
                    <input type="radio" value="1" name="status" @if($data->status=='1') checked @endif>Active<br>
                    <input type="radio" value="0" name="status" @if($data->status=='0') checked @endif>Inactive
                    <br><br>
                    Date:
                    <input type="datetime" name="datetime" value="{{$data->datetime}}" placeholder="Enter Tittle" class="form-control" >
                    <br><br>
                    <input type="submit" name="submit" value="submit" class="btn btn-info" >
                    </form>
                
              </div>
    <!-- /.content -->
  </div>
@endsection