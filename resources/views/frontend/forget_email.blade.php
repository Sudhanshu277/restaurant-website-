@extends('frontend.master')
@section('content')

<div class="container-fluid a" >
	<h2>login</h2>
	<div class="wthree-form" style="margin-top: 220px;">
		<!--728x90-->
		<h2 style="color: #d43d3d">Reset Password</h2>
		<div class="w3l-login form">
		<!--728x90-->
			<form action="{{url('send_forget_mail')}}" method="post">
				@if(session('message'))
				<h3 style="color: #727273;" class ="alert alert-success">
					{{session('message')}}
				</h3>
				@endif
				@csrf
				<div class="from-group">
					<input type="email" name="email"   placeholder="Email" required=""/>
				</div>
				<!-- <label>
					<input type="checkbox" class="checkbox">
					<span>Remember Me</span> 
				</label> -->
				<div>
					<input type="submit" class="submit btn btn-danger" value="Send Password Reset Link">
				</div>
				<br>
			</form>
		</div>
	</div>
</div>
@endsection