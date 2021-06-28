@extends('admin.master')
@section('tittle','Dish | Add Dish')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dish</h1>
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
             <!--  <div class="card-header">
                <nav class="navbar navbar-expand-md">
                <h3 class="card-title">Dish</h3>
                 <div class="ml-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa">Add Dish</button>
                
                </div>
                </nav>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{url('dish/update')}}" enctype="multipart/form-data" >
                           @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <input type="hidden" name="id" value="{{$data->id}}">
                              <label>DISH NAME</label>
                              <input type="text" name="dish_name" required="required"  class="form-control" value="{{$data->dish_name}}">
                            </div>

                             <div class="form-group">
                              <label>DESCRIPTION</label>
                             <input type="text" name="dish_description" required="required"  class="form-control" value="{{$data->dish_description}}" >
                            </div>

                            <div class="form-group">
                              <label>IMAGE</label>
                              <input type="file"  name="dish_image" class="form-control">
                              <img src="/upload/{{$data->dish_image}}" style="width: 100px;height: 100px;" >
                            </div>
                          

                             <div class="form-group">
                              <label>DISH STATUS</label>
                              <br>
                              <input type="radio"  name="dish_status" required="required" value="1" @if($data->dish_status=='1') checked @endif>Active
                              <br>
                              <input type="radio"  name="dish_status" required="required" value="0" @if($data->dish_status=='0') checked @endif>Inactive
                              </div>
                              
                              <div>
                              <label>PRICE</label>
                              <input type="text"  name="price" required="required"  class="form-control" value="{{$data->price}}" >
                              </div>

                              <div>
                              <label>QUANTITY</label>
                              <input type="text"  name="quantity" required="required"  class="form-control" value="{{$data->quantity}}">
                              </div>

                              <div>
                              <label>CATEGORY ID</label>
                               <select name="category_id" class="form-control" >
                                <option>select</option>
                                @foreach($d as $v)
                                <option value="{{$v->id}}"  @if($data->category_id==$v->id) selected @endif >{{$v->tittle}}
                                </option>
                                @endforeach
                              </select>
                              <!-- <input type="text"  name="category_id" required="required"  class="form-control" value="{{$data->category_id}}"> -->
                              </div>
                              <br><br>

                            <input type="submit" name="submit" value="submit" class="btn btn-info">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endsection