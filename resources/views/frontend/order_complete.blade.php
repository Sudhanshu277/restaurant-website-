@extends('frontend.master')
@section('content')
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
							<h1 class="text-center" style="color: white;">Your Order is placed </h1>
						</div>
					</div>
				</div>
@endsection