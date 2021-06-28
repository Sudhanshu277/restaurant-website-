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
            <h1 class="m-0">Category</h1>
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
                    <th>Deal DESCRIPTION</th>                                  
                    <th>Deal IMAGE</th>
                    <th>ACTION</th>                   
                  </tr>
                  </thead>
                  <tbody>
                     @foreach($data as $a)
                    <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->description}}</td>
                    <td> <img src="/upload/{{$a->image}}" style="width: 100px;height: 100px;"></td>
                     <td>
                      <a href="{{url('deal/edit/'.$a->id)}}"  class="btn btn-info" >Edit</a>
                      <a href="{{url('dish/delete/'.$a->id)}}" class="btn btn-danger" >Delete</a>
                      <a href="{{url('dish/add_image/'.$a->id)}}" class="btn btn-secondary" >Add Image</a>
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
                    <h5 class="modal-title">ADD Dish</h5>

                    <button type="button" class="" data-dismiss="modal">
                    <span>&times;</span></button>
        
                </div>
                    <div class="modal-body">
                        <form method="post" action="{{url('deal/insert')}}" enctype="multipart/form-data" >
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
                              <label>DESCRIPTION</label>
                             <input type="text" name="description" required="required"  class="form-control" >
                            </div>

                            <div class="form-group">
                              <label>IMAGE</label>
                              <input type="file"  name="image" required="required"  class="form-control">
                            </div>
                          

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