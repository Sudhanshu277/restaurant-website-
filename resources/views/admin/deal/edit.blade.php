@extends('admin.master')
@section('tittle','Deal | Add Deal')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Deal</h1>
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
                <h3 class="card-title">Deal</h3>
                 <div class="ml-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa">Add Deal</button>
                
                </div>
                </nav>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{url('deal/update')}}" enctype="multipart/form-data" >
                           @csrf
                           <input type="hidden" name="id" value="{{$data->id}}">
                          <div class="card-body">
                            <div class="form-group">
                              <label>DESCRIPTION</label>
                             <input type="text" name="description" value="{{$data->description}}" required="required"  class="form-control" >
                            </div>

                            <div class="form-group">
                              <label>IMAGE</label>
                              <input type="file"  name="image"  class="form-control">
                              <img src="/upload/{{$data->image}}" style="width: 100px;height: 100px;" >
                            </div>
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