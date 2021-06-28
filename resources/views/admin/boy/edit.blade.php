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
    <form class="form-group" method="post" action="{{url('boy/update')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                     Delivery Boy Name:
                    <input type="text" name="delivery_boy_name" value="{{$data->delivery_boy_name}}" placeholder="Enter name" class="form-control" >
                    <br><br>
                     Phone number:
                    <input type="number" name="phone_no" value="{{$data->phone_no}}" placeholder="Enter Tittle" class="form-control" >
                    <br><br>
                    Password:
                    <input type="text" name="password" value="{{$data->password}}" placeholder="Enter Tittle" class="form-control" >
                    status:<br>
                    <input type="radio" value="1" name="status"  @if($data->status=='1') checked @endif >Active<br>
                    <input type="radio" value="0" name="status" @if($data->status=='0') checked
                    @endif>Inactive
                    <br><br>
                    Date Of Joining:
                    <input type="date" name="date_of_joining" value="{{$data->date_of_joining}}" class="form-control" >
                    <br><br>
                    <input type="submit" name="submit" value="submit" class="btn btn-info" >
                    </form>
                
              </div>
    <!-- /.content -->
  </div>
@endsection