@extends('frontend.master')
@section('content')			
			<div class="space bg-black"></div>
			<!-- banner of the page -->
			<section class="banner bg-parallax overlay" style="background-image:url(images/c.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="heading text-uppercase fwLight">Contact us</h2>
							<ul class="list-unstyled breadcrumbs">
								<li><a href="index.html">Home</a></li>
								<li>/</li>
								<li>pages</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- contact sec of the page -->
			<div class="contact-sec container">
				<div class="row">
					<div class="col-xs-12">
						<!-- contact list of the page -->
						<ul class="list-unstyled contact-list text-center">
							<li>
								<span class="fa fa-phone" style="color: #d43d3d"></span>
								<a href="javascript:void(0);" tel="00123456789" style="color: white;">(+91) 626 517 2538</a>
							</li>
							<li>
								<span class="fa fa-map-marker" style="color: #d43d3d"></span>
								<address style="color:white;">Address : Morar, Gwalior, <br class="hidden-xs hidden-sm">WA Madhya Pradesh, India</address>
							</li>
							<li>
								<span class="fa fa-envelope" style="color: #d43d3d"></span>
								<a href="mailto:palsudhanshu94@gmail.com" style="color:white;">palsudhanshu94@gmail.com</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<!-- header of the page -->
					<header class="col-xs-12 text-center header">
						<span class="title fontpinyon" style="color: #d43d3d">Foodyard</span>
						<h1 class="heading text-uppercase">Contact us</h1>
						<div class="header-img">
							<img src="images/bdr-img.png" alt="image description" class="img-responsive">
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore<br class="hidden-xs hidden-sm"> magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br class="hidden-xs hidden-sm"> consequat.</p>
						<!-- socail network of the page -->
						<ul class="social-network list-unstyled">
						 	<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
							<li><a href="javascript:void(0);"><i class="fa fa-twitter active"></i></a></li>
							<li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</header>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<h2 class="heading2 text-uppercase">We will love to hear from you</h2>
						<!-- contact form of the page -->
						<form class="contact-form">
							<fieldset>
								<input class="form-control" type="text" placeholder="Name">
								<input class="form-control" type="email" placeholder="Email">
								<input class="form-control" type="text" placeholder="Subject">
								<textarea class="form-control" placeholder="Your Comment"></textarea>
								<button type="submit" class="btn-primary active lg-round text-uppercase">send messages</button>
							</fieldset>
						</form>
					</div>
					<div class="col-sm-6">
						<div class="map-holder">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4108.482938800218!2d78.2261464077267!3d26.216382052371106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3976c15fc2f0d899%3A0x2149e4c1173239c8!2sMorar%20Cantt.%2C%20Gwalior%2C%20Madhya%20Pradesh%20474006!5e0!3m2!1sen!2sin!4v1623990181123!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
				</div>
			</div>
@endsection