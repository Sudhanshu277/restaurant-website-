@extends('frontend.master')
@section('content')
<div class="space bg-black"></div>
			<!-- banner of the page -->
			<section class="banner bg-parallax overlay" style="background-image:url(/images/cart.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="heading text-uppercase fwLight">Full Width</h2>
							<ul class="list-unstyled breadcrumbs">
								<li><a href="{{url('/')}}">Home</a></li>
								<li>/</li>
								<li>Shopping Cart</li>
							</ul>
						</div>
					</div>
				</div>
			</section> 
			<!-- Shopping cart of the page -->
			<div class="shopping-cart container">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<!-- cart table of the page -->
							<table class="cart-table" id="example">
								<thead>
									<tr class="text-uppercase" style="color: white;">
										<th>S No.</th>
										<th>image</th>
										<th>product name</th>
										<th>price</th>
										<th>quantity</th>
										<th class="wrap">
											<span class="pull-left">totel</span>
											<a href="#" style="color: #d43d3d" class="fa fa-close text-center"></a>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php $totalamount = 0; ?>
									<?php $i=1 ?>
									@foreach($cart as $c)
									<tr>
										<td>{{$i++}}</td>
										<!-- <td class="id">{{$c->id}}</td> -->
										<td>
											<div class="product-img">
												<img src="/upload/{{$c->dish_image}}" alt="image-description" class="img-responsive">
											</div>
										</td>
										<td>
											<div class="content-holder">
												<h3><a href="shop-detail.html" style="color: white;">{{$c->dish_name}}</a></h3>
												<div class="holder">
													<span class="color-code pull-left">Color:</span>
													<span class="size-code pull-left">Size: <a href="#" class="lg-round text-center">M</a></span>
												</div>
											</div>
										</td>
										<td class="price fwBold" id="p" style="color: #d43d3d">Rs.{{$c->dish_price}}</td>
										<!-- <td> -->	
										<td>	
											<a href="{{url('cart/update_quantity/'.$c->id.'/1')}}">+</a>
											<input type="text" name="dish_quantity" value="{{$c->dish_quantity}}">
											<a href="{{url('cart/update_quantity/'.$c->id.'/-1')}}">-</a>
										</td>
											<!-- <a href="#" class="plus" >+</a>
											<input type="text" name="dish_quantity" value="{{$c->dish_quantity}}">
											<a href="#" class="minus">-</a>
										</td> -->
										<td class="wrap">
											<!-- <span  class="price pull-left fwBold">
												Rs.<input type="text" name="total" id="total" style="background-color: transparent; color: white; border: none">
											</span> -->
											<span class="price pull-left fwBold" style="color: #d43d3d">Rs.{{$c->dish_price*$c->dish_quantity}}</span>
											<a href="{{url('delete'.$c->id)}}" style="color: #d43d3d" class="fa fa-close pull-right text-center"></span>
										</td>
									</tr>
									<?php $totalamount = $totalamount+($c->dish_price*$c->dish_quantity);?>
									@endforeach
								</tbody>
							</table>
							<a href="{{url('/')}}" style="color: #d43d3d" class="btn-primary pull-left lg-round text-uppercase text-center">continue shopping</a>
							<!-- <a href="#" class="btn-primary active pull-right lg-round text-uppercase text-center">update cart</a> -->
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Cart Widget of the page -->
					<!-- <div class="col-xs-12 col-sm-4 cart-widget text-center">
						<h3 class="heading3 text-uppercase">estimate shipping and tax</h3>
						<p>Enter your destination to get shipping &amp; tax</p>
						Shipping form of the page -->
<!-- 						<form class="shipping-form text-left">
							<fieldset>
								<div class="form-group">
									<label class="text-uppercase pull-left">COUNTRY *:</label>
									<select>
										<option value="0">Select options</option>
										<option value="1">Select options</option>
										<option value="2">Select options</option>
									</select>
								</div>
								<div class="form-group">
									<label class="text-uppercase pull-left">STATE / PROVINCE *:</label>
									<select>
										<option value="0">Select options</option>
										<option value="1">Select options</option>
										<option value="2">Select options</option>
									</select>
								</div>
								<div class="form-group">
									<label class="text-uppercase pull-left">ZIP / POSTAL CODE *:</label>
									<select>
										<option value="0">Select options</option>
										<option value="1">Select options</option>
										<option value="2">Select options</option>
									</select>
								</div>
								<button type="submit" class="btn-primary text-uppercase text-center lg-round">get a quocte</button>
							</fieldset>
						</form>
					</div>  -->
					<!-- Cart Widget of the page -->
					<!-- <div class="col-xs-12 col-sm-4 cart-widget text-center">
						<h3 class="heading3 text-uppercase">DIscount codes</h3>
						<p>Enter your coupin if you have one</p> -->
						<!-- Subscribe Form of the page -->
						<!-- <form class="subscribe-form">
							<fieldset>
								<input class="form-control" type="email">
								<button type="submit" class="btn-primary text-uppercase lg-round">Subscribe</button>
							</fieldset>
						</form>
					</div> -->
					<!-- Cart Widget of the page -->
					<div class="col-xs-12 col-sm-4 cart-widget text-center pull-right">
						<h3 class="heading3 text-uppercase">CART TOTAL</h3>
						<ul class="list-unstyled cart-totel text-uppercase">
							<!-- <li style="color: white;" >sub total: <strong class="heading2">$142.00</strong></li> -->
							
							<li style="color: white;">grand total: <strong class="heading2">Rs.<?php echo $totalamount; ?></strong></li>
						
						</ul>
						<span class="txt fontjosefin">Checkout with multiple address</span>
						
						@guest
                            @if (Route::has('login'))
                          
                                <a class="btn-primary active text-center text-uppercase lg-round " href="{{url('user_login')}}">proceed to checkout</a>
                            
                            @endif
                            @else
                            <a href="{{url('checkout')}}" class="btn-primary active text-center text-uppercase lg-round ">proceed to checkout</a>
                        @endguest
						<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa">Login</button> -->
					</div>
				</div>
			</div>
						</aside>
					</div>
				</div>
			</section>
		</main>
@endsection		