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
<form class="checkout-form" method="post" action="{{url('order')}}">
				           @csrf
			<div class="checout-sec left-sidebar container">
				<div class="row">
					<div class="col-xs-12">
						<p>Returning customer? <a href="#">Click here to login</a></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-8 form-holder">
						<h2 class="heading3 text-center">BILLING ADDRESS</h2>
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
									<input class="form-control" name="name" value="{{Auth::user()->name}}" type="text" required="required">
								</div>
								
								<div class="form-group">
									<label class="text-uppercase">address *</label>
									<input class="form-control" name="address" value="{{Auth::user()->address}}" type="text" required="required" placeholder="Street Address">
								</div>
								<!-- <div class="form-group">
									<label class="visiblity text-uppercase">label</label>
									<input class="form-control" type="text" placeholder="Apartment, suite, unite ect (optinal)">
								</div> -->
								<div class="form-group">
									<label class="text-uppercase">TOWN / CITY *</label>
									<input class="form-control" name="city" value="{{Auth::user()->city}}" type="text" required="required">
								</div>
								<div class="form-group">
									<label class="text-uppercase">COUNTRY / STATES</label>
									<input class="form-control" name="country" value="{{Auth::user()->country}}" type="text" required="required">
								</div>
								<div class="form-group">
									<label class="text-uppercase">POSTCODE / ZIP *</label>
									<input class="form-control" name="pin_code" value="{{Auth::user()->pin_code}}" type="text" required="required">
								</div>
								<div class="form-group">
									<label class="text-uppercase">EMAIL ADDRESS *</label>
									<input class="form-control" name="user_email" value="{{Auth::user()->email}}" type="text" required="required">
								</div>
								<div class="form-group">
									<label class="text-uppercase">PHONE *</label>
									<input class="form-control" name="phone_num" value="{{Auth::user()->phone}}" type="text" required="required">
								</div>
								<!-- <div class="form-group wrap">
									<input type="checkbox"><span>Create an account?</span>
									<p>Create an account by entering the information below. If you are a returning customer please login at the top of the page</p>
								</div>
								<div class="form-group">
									<label class="text-uppercase">ACCOUNT PASSWORD *</label>
									<input class="form-control" type="password">
								</div>
								<div class="form-group mar wrap">
									<input type="checkbox"><span>Create an account?</span>
								</div>
								<div class="form-group wrap2">
									<label class="text-uppercase">ORDER NOTES</label>
									<textarea class="form-control"></textarea>
								</div> -->
							</fieldset>
					<!-- 	</form> -->
					</div>
					 <!-- coupon code -->
					<aside class="col-xs-12 col-md-4">
						<!-- Cart Widget of the page -->
						<!-- Cart Widget of the page -->
						<div class="cart-widget text-center">
							<h3 class="heading3 text-uppercase" style="color:white;">your order</h3>

							<ul class="list-unstyled cart-totel">

								<li class="text-uppercase" style="color:white;">product<span class="titles pull-right">total</strong></li>
                          
					            <?php  $totalamount = 0; ?>

                                @foreach($cart as $c)

								<li style="color: white;" >{{$c->dish_name}} X {{$c->dish_quantity}}<strong class="heading2 pull-right">
								{{ $c->dish_price* $c->dish_quantity}}
								</strong></li>
					            <?php
                                  $totalamount = $totalamount +  $c->dish_price*$c->dish_quantity
					            ?>
                                @endforeach
                  @if(!empty(Session::get('couponamount')))
								<li class="bdr-b text-uppercase" style="color:white;">Sub Total
								<strong class="heading2 pull-right">RS.
					           <?php echo $totalamount; ?>
					           <input type="hidden" value="">
								</strong></li>
        <!-- couponcode -->
       
								<li class="bdr-b text-uppercase" style="color:white">coupon discount
								<strong class="heading2 pull-right">RS.
									<?php
                                    echo Session::get('couponamount')
									?>
					           
					           <input type="hidden" name="grand_total" value="">
					           
								</strong></li>
                    
								<li class="bdr-b text-uppercase" style="color:white"> Grand Total
								<strong class="heading2 pull-right">RS.
									<?php
                                     echo $totalamount -  Session::get('couponamount')
									?>
					           
					           <input type="hidden" name="grand_total" value= "
                                <?php
                                     echo $totalamount -  Session::get('couponamount')
									?>
					           ">
								</strong></li>
							 @else
							 <li class="bdr-b text-uppercase" style="color:white;"> Grand Total
								<strong class="heading2 pull-right">RS.
									<?php
                                     echo $totalamount;
									?>
					           
					           <input type="hidden" name="grand_total" value= "
                                <?php
                                     echo $totalamount;
									?>
					           ">
								</strong></li>
                             @endif
							
							</ul>
						</div>
					<!-- ///// -->
					<!-- <aside class="col-xs-12 col-md-4"> -->
						<!-- Cart Widget of the page -->
					
						<!-- <div class="cart-widget text-center">
							<h3 class="heading3 text-uppercase">PROMOTIONAL CODE</h3>
							<p class="text-left">Enter your coupon code if you have one</p>
							
								<fieldset>
									<input class="form-control" type="text" name="coupon" placeholder="Coupon code">
									<br>
									<button type="submit" class="btn-primary text-uppercase lg-round">Subscribe</button>
								</fieldset>
							
						</div>
						
						<br> -->
						<!-- Cart Widget of the page -->
						<!-- <div class="cart-widget text-center">
							<h3 class="heading3 text-uppercase">your order</h3>
							<ul class="list-unstyled cart-totel">
								<li style="color: white;" class="text-uppercase">product<span class="titles pull-right">totel</strong></li>
									<?php $totalamount = 0; ?>
								@foreach($cart as $c)
								<li style="color: white;">{{$c->dish_name}} x {{$c->dish_quantity}}<strong class="heading2 pull-right">Rs.{{$c->dish_price}}</strong></li>
								<?php $totalamount = $totalamount+($c->dish_price*$c->dish_quantity);?>
								@endforeach -->
								<!-- <li class="bdr-b">Tomatin 12 Year Old x 1<strong class="heading2 pull-right">$142.00</strong></li> -->
								<!-- <li>Cart Subtotal<span class="heading2 pull-right"><?php echo $totalamount; ?></strong></li> -->
								<!-- <li>Shipping and Handling<span class="pull-right">Free Shipping</span></li> -->
								<!-- <li class="bdr-b text-uppercase" style="color: white;">Order Total<strong class="heading2 pull-right">Rs.<?php echo $totalamount; ?></strong>
									<input type="hidden" name="grand_total" value="<?php echo $totalamount; ?>">

								</li>
							</ul>
						</div> -->
						<!-- Cart Widget of the page -->
						<div class="cart-widget">
							
								<feildset>
									<label for="radio-6">
										<input id="radio-6" required="required" name="payment_method" value="cod" class="cod" type="radio">
										<span class="fake-input"></span>
										<span class="fake-label"  style="color: white;">Cash on Delivery</span>
									</label>
									<label for="radio-7">
										<input id="radio-7" required="required" name="payment_method" value="paytm" type="radio" class="paytm">
										<span class="fake-input"></span>
										<span class="fake-label" style="color: white;">Paytm</span>
									</label>
									<label for="radio-8">
										<input id="radio-8" required="required" name="payment_method" value="razorpay"  class="razorpay" name="group1" type="radio">
										<span class="fake-input"></span>
										<span class="fake-label" style="color: white;">razorpay</span>
									</label>
									<br>
									<button onclick="Confirmation()" class="btn-primary active text-center text-uppercase lg-round" onclick="return selectPaymentMethod();" type="submit">Place Order</button>
								</feildset>
						</form>
						</div>
						 @if(session('massage'))
      <h2 class="alert alert-info text-center" style="color: green;">
       {{ session('massage') }}
      </h2>
     @endif
 
				<div class="cart-widget text-center">
							<h3 class="heading3 text-uppercase">PROMOTIONAL CODE</h3>
							<p class="text-left">Enter your coupon code if you have one</p>

							<form class="subscribe-form" action="{{url('coupon-code-apply')}}" method="post">
								@csrf
								<fieldset>
									<input class="form-control" type="text" name="coupon" placeholder="Coupon code" style="color: white;">
									<button type="submit" class="btn-primary text-uppercase lg-round" style="    margin-top: 20px;">apply</button>
								</fieldset>
							</form>
						</div>
			</div>

					</aside>
				</div>
			</div>
		    
		     

@endsection

