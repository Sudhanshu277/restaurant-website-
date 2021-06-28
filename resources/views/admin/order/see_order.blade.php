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
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>85</h3>

                <p>Paid Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$in}}<sup style="font-size: 20px"></sup></h3>

                <p>In Making Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$pa}}</h3>

                <p>Packed Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$sk}}</h3>

                <p>Skipped Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$fa}}</h3>

                <p>Failed Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           
        </div>
        <!-- /.row -->
        <!-- Main row -->
                <nav class="navbar navbar-expand-md">
                <!-- <h3 class="card-title">Dish</h3> -->
                 <div>

                  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa">Add Dish</button> -->
                
                </div>
                </nav>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Details</th>  
                    <th>Order Date</th>                                  
                    <th>Order Status</th>
                    <th>Product Status</th>
                    <th>Payment Method</th>
                    <th>ACTION</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                       <?php $i=1; ?>
                    @foreach($data as $a)
                    <tr>
                   
                    <td>{{$i++}}</td>
                    <td>
                      <b>Order no#: </b>{{$a->id}}<br>
                      <b>Name: </b>{{$a->name}}<br>
                      <b>Contact</b><br>
                      <b>Email: </b>{{$a->user_email}}
                    </td>
                    <td>{{$a->created_at}}</td>
                    <form action="{{url('admin/order_status')}}" method="post" >
                      @csrf
                    <td>
                      <input type="hidden" name="id" value="{{$a->id}}">
                     <select name="order_status" value="{{$a->order_status}}" >
                      <option >Select</option>
                      <option value="In Making" @if($a->order_status=="In Making") selected @endif>In Makeing</option>
                      <option value="Packed"  @if($a->order_status=="Packed") selected @endif >Packed</option>
                      <option value="Skiped"  @if($a->order_status=="Skiped") selected @endif>Skipped Order</option>
                      <option value="Failed" @if($a->order_status=="Failed") selected @endif >Failed Order</option>
                     </select><br><br>
                     <input type="submit" name="submit" value="submit" class="btn btn-info">
                    </td>
                    </form>
                    <td></td>
                    <td>{{$a->payment_method}}</td>

                     <td>
                      <a href="{{url('admin/see_item/'.$a->id)}}"  class="btn btn-info" >View Item</a>
                      <a href="{{url('admin/invoice/'.$a->id)}}" class="btn btn-secondary">Invoice</a>
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