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
                  
                
                </div>
                </nav>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>







                    <th>ID</th>
                    <th>Dish Name</th>  
                    <th>Dish Image</th>                                  
                    <th>Dish Price</th>
                    <th>Dish Quantity</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($data as $a)
                    <tr>
                      
                    <td>{{$i++}}</td>
                   <td>{{$a->dish_name}}</td>
                   <td>
                    <img src="/upload/{{$a->dish_image}}" style="width:100px;height: 100px;"></td>
                   <td>{{$a->dish_price}}</td>
                   <td>{{$a->dish_quantity}}</td>
                    </tr>
                        @endforeach           
                  </tbody>
               
                </table>
              </div>
            </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
       
              @endsection