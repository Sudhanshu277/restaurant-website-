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
              <div class="card-header">
                <nav class="navbar navbar-expand-md">
                <h3 class="card-title">Dish</h3>
                 <div class="ml-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa">Add Dish</button>
                
                </div>
                </nav>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>







                    <th>ID</th>
                    <th>DISH NAME</th>  
                    <th>DISH DESCRIPTION</th>                                  
                    <th>DISH IMAGE</th>
                    <th>DISH Status</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>CATEGORY ID</th>
                    <th>ACTION</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                     @foreach($data as $a)
                    <tr>
                   
                    <td>{{$a->id}}</td>
                    <td>{{$a->dish_name}}</td>
                    <td>{{$a->dish_description}}</td>
                    <td> <img src="/upload/{{$a->dish_image}}" style="width: 100px;height: 100px;"></td>
                    <td>{{$a->dish_status}}</td>
                    <td>{{$a->price}}</td>
                    <td>{{$a->quantity}}</td>
                    <td>{{$a->category_id}}</td>
                  
                    
                
                   
                    

                     <td>
                      <a href="{{url('admin/dish/edit/'.$a->id)}}"  class="btn btn-info" >Edit</a>
                      <a href="{{url('dish/delete/'.$a->id)}}" class="btn btn-danger" >Delete</a>
                      <a href="{{url('dish/add_image/'.$a->id)}}" class="btn btn-secondary" >Add Image</a>
                    </td>

                    
                  </tr>
                  @endforeach              
                  </tbody>
                  
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
                    <h5 class="modal-title">ADD Dish</h5>

                    <button type="button" class="" data-dismiss="modal">
                    <span>&times;</span></button>
        
                </div>
                    <div class="modal-body">
                        <form method="post" action="{{url('dish/insert')}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="card">
                          @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif
                          <div class="card-body">
                            <div class="form-group">
                              <label>DISH NAME</label>
                              <input type="text" name="dish_name" required="required"  class="form-control" >
                            </div>

                             <div class="form-group">
                              <label>DESCRIPTION</label>
                             <input type="text" name="dish_description" required="required"  class="form-control" >
                            </div>

                            <div class="form-group">
                              <label>IMAGE</label>
                              <input type="file"  name="dish_image" required="required"  class="form-control">
                            </div>
                          

                             <div class="form-group">
                              <label>DISH STATUS</label>
                              <br>
                              <input type="radio"  name="dish_status" required="required" value="1">Active
                              <br>
                              <input type="radio"  name="dish_status" required="required" value="0">Inactive
                            </div>
                              
                              <div>
                              <label>PRICE</label>
                              <input type="text"  name="price" required="required"  class="form-control">
                              </div>

                              <div>
                              <label>QUANTITY</label>
                              <input type="text"  name="quantity" required="required"  class="form-control">
                              </div>

                              <div>
                              <label>CATEGORY ID</label>

                              <select name="category_id" class="form-control" >
                                <option>select</option>
                                @foreach($d as $v)
                                <option value="{{$v->id}}" >{{$v->tittle}}</option>
                                @endforeach
                              </select>
                             
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