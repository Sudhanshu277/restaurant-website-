@extends('frontend.master')
@section('content')

<div class="container-fluid"  >
	<div class="row" style="margin-top:350px;" >
		<div class="col-md-4" >
            <div class="card" style="border: 2px solid red;" >
               <a href="{{url('address')}}">
               <div class="row">
               	<div class="col-md-3" style="padding:10px;" >
               		<img src="https://images-na.ssl-images-amazon.com/images/G/31/x-locale/cs/ya/images/address-map-pin._CB485934183_.png" style="width:100px;margin-top: 5px;">
               	</div>
               	<div class="col-md-6" >
               		<h3 style="color:white;">Your Addresses<br></h3>
               		<h5 style="color:white;">Edit addresses for orders and gifts</h5>
               	</div>
               	
               	
               </div>
               </a>
               <div>

               </div>
            </div>
		</div>
		<div class="col-md-4">
            <div class="card" style="border: 2px solid red;" >
            		<a href="{{url('orderitem')}}">
               <div class="row">

               	<div class="col-md-3" style="padding:10px;" >
               		<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfu8rZzj0lIFonDCWHWRPVDxiLnSDITZ2nCA&usqp=CAU" style="width:100px;padding-left: 15px;">
               	</div>
               	<div class="col-md-6" >
               		<h3 style="color:white;">Your Orders<br></h3>
               		<h5 style="color:white;">Track, return, or buy things again</h5>
               	</div>
     
               	
               </div>
                </a>
               <div>

               </div>
            </div>
		</div>
	</div>
</div>
@endsection