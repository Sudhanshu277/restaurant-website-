@extends('frontend.master')
@section('content')
<!-- <form method="post" action="{{url('save-user-registration')}}" >
	@csrf
	<div class="card" >
		<div class="from-group" >
			<label>Name</label>
			<input type="text" name="name" placeholder="enter Name" class="from-control">
		</div>
		<div class="from-group" >
			<label>Email</label>
			<input type="text" name="email" placeholder="enter email" class="from-control">
		</div>
		<div class="from-group" >
			<label>password</label>
			<input type="text" name="password" placeholder="Enter password" class="from-control">
		</div>
		<input type="submit" name="submit" class="btn btn-info">
	</div>
</form>
	 -->
<div class="container-fluid a" >
	<h2>login</h2>
	<div class="wthree-form" style="margin-top: 220px;">
		<!--728x90-->
		<h2 style="color: #d43d3d">Register</h2>
		<div class="w3l-login form">
		<!--728x90-->
			<form action="{{url('save-user-registration')}}" method="post">
				@if(session('message'))
				<h3 style="color: #727273;" class ="alert alert-success">
					{{session('message')}}
				</h3>
				@endif
    @csrf
    <div class="row" >
    	<div class="col-md-6" >
    		<div class="from-group">
					<input type="text" name="name" placeholder="Username" required="">
				</div>
				<div class="from-group" >
			     <input type="text" name="email" placeholder="Email" class="from-control">
		         </div>
			    <div class="form-group">
					<input type="password" name="password" placeholder="Password" required="">
				</div>
				<div class="form-group">
					<input type="text" name="address" placeholder="Address" required="">
				</div>
				<!-- <label>
					<input type="checkbox" class="checkbox">
					<span>Remember Me</span> 
				</label> -->
				
    	</div>
    	<div class="col-md-6" >
    		<div class="from-group">
					<input type="text" name="city" placeholder="City" required="">
				</div>
				<div class="from-group" >
			     <input type="text" name="country" placeholder="Country" class="from-control">
		         </div>
			    <div class="form-group">
					<input type="text" name="pin_code" placeholder="PinCode" required="">
				</div>
				<!-- <label>
					<input type="checkbox" class="checkbox">
					<span>Remember Me</span> 
				</label> -->
				<div>
					<input type="text" name="phone" placeholder="Phone Number" required="img-responsive">
				</div>
    	</div>
    	<div>
					<input type="submit" name="submit" value="submit" class="btn-primary active text-center text-uppercase lg-round ">
				</div>
    </div>
				
				
				
			</form>
		</div>
	</div>
</div>
@endsection