@extends('frontend.master')
@section('content')
<div class="space bg-black"></div>

			<!-- banner of the page -->
			<section class="banner bg-parallax overlay" >
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="heading text-uppercase fwLight">Check Out</h2>
							<ul class="list-unstyled breadcrumbs">
								<li><a href="{{url('/')}}">Home</a></li>
								<li>/</li>
								<li>Check Out</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- Checkout Sec of the page -->
<form class="checkout-form" method="post" action="{{url('edit_address')}}">
				           @csrf
			<div class="checout-sec left-sidebar container">
				<!-- <div class="row">
					<div class="col-xs-12">
						<p>Returning customer? <a href="#">Click here to login</a></p>
					</div>
				</div> -->
				<div class="row">
					<div class="col-xs-12 col-md-8 form-holder">
						<h2 class="heading3 text-center">EDIT ADDRESS</h2>
						<!-- Checkout Form of the page -->
						
							<fieldset>
								<!-- <div class="form-group">
									<label class="text-uppercase">COUNTRY *</label>
									<select>
										<option value="0">USA</option>
										<option value="1">Pakistan</option>
										<option value="2">Dubai</option>
									</select>
								</div> -->
								<input type="hidden" name="user_id" value="{{Auth::user()->id}}" >
								<div class="form-group">
									<label class="text-uppercase">NAME *</label>
									<input class="form-control" name="name" value="{{Auth::user()->name}}" type="text">
								</div>
								
								<div class="form-group">
									<label class="text-uppercase">address *</label>
									<input class="form-control" name="address" value="{{Auth::user()->address}}" type="text" placeholder="Street Address">
								</div>
								<!-- <div class="form-group">
									<label class="visiblity text-uppercase">label</label>
									<input class="form-control" type="text" placeholder="Apartment, suite, unite ect (optinal)">
								</div> -->
								<div class="form-group">
									<label class="text-uppercase">TOWN / CITY *</label>
									<input class="form-control" name="city" value="{{Auth::user()->city}}" type="text">
								</div>
								<div class="form-group">
									<label class="text-uppercase">COUNTRY / STATES</label>
									<input class="form-control" name="country" value="{{Auth::user()->country}}" type="text">
								</div>
								<div class="form-group">
									<label class="text-uppercase">POSTCODE / ZIP *</label>
									<input class="form-control" name="pin_code" value="{{Auth::user()->pin_code}}" type="text">
								</div>
								<div class="form-group">
									<label class="text-uppercase">EMAIL ADDRESS *</label>
									<input class="form-control" name="user_email" value="{{Auth::user()->email}}" type="text">
								</div>
								<div class="form-group">
									<label class="text-uppercase">PHONE *</label>
									<input class="form-control" name="phone_num" value="{{Auth::user()->phone}}" type="text">
								</div>

                                <div class="text-center" >
									<button class="btn-primary pull-center active text-center text-uppercase lg-round" type="submit">Update</button>
								</div>
								
							</fieldset>
					<!-- 	</form> -->
					</div>
					
				</div>
			</div>
		    </form>
@endsection