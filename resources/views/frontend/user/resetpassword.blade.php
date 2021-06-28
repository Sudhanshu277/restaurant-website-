@extends('frontend.master')
@section('content')

<div class="container-fluid a" >
	<h2>login</h2>
	<div class="wthree-form" style="margin-top: 220px;">
		<!--728x90-->
		<h2 style="color: #d43d3d">Set New Password</h2>
		<div class="w3l-login form">
		<!--728x90-->
			<form action="{{url('passwordupdate')}}" method="post">
				@if(session('message'))
				<h3 style="color: #727273;" class ="alert alert-success">
					{{session('message')}}
				</h3>
				@endif
				@csrf
				
				
				<div class="from-group">
					<input type="text" name="email" value="{{$email}}" placeholder="Email" required=""/>
				</div>
			    <div class="form-group">
					<input type="password" name="password" placeholder="Password" required=""/>
				</div>
				<!-- <label>
					<input type="checkbox" class="checkbox">
					<span>Remember Me</span> 
				</label> -->
				<div>
					<input type="submit" class="submit" value="Reset Password">
				</div>
				
			</form>
		</div>
	</div>
</div>
@endsection