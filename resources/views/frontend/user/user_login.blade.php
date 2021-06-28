@extends('frontend.master')
@section('content')

<div class="container-fluid a" >
	<h2>login</h2>
	<div class="wthree-form" style="margin-top: 220px;">
		<!--728x90-->
		<h2 style="color: #d43d3d">Login</h2>
		<div class="w3l-login form">
		<!--728x90-->
			<form action="{{url('login_insert')}}" method="post">
				@if(session('message'))
				<h3 style="color: #727273;" class ="alert alert-success">
					{{session('message')}}
				</h3>
				@endif
				@csrf
				
				<input type="hidden" name="role" value="1">
				<div class="from-group">
					<input type="text" name="email" placeholder="Email" required=""/>
				</div>
			    <div class="form-group">
					<input type="password" name="password" placeholder="Password" required=""/>
				</div>
				<!-- <label>
					<input type="checkbox" class="checkbox">
					<span>Remember Me</span> 
				</label> -->
				<div>
					<input type="submit" class="submit" value="Login">
				</div>
				<a href="{{url('user_register')}}" class="btn-primary active text-center text-uppercase lg-round ">Register</a><br>
				<br>
				<a href="{{ url('/auth/redirect/google') }}" class="btn btn-primary"><i class="fa fa-google"></i><strong style="color: white;">Login With Google</strong></a>
                                  
                                </a> 
                <a class="btn btn-link" style="font-size:18px;" href="{{url('forgot_password')}}">Forgot My Password?</a>
				
			</form>
		</div>
	</div>
</div>
@endsection