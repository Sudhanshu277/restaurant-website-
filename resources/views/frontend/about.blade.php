<!-- aboutus sec of the page -->
@foreach($data as $a)
			<section class="aboutus-sec " style="background-color:#141414">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-5 col-lg-6">
							<div class="image-block img-col" data-tilt>
								<img src="/upload/{{$a->image}}" class="img-responsive" alt="img-description">
							</div>
						</div>
						<div class="col-xs-12 col-md-7 col-lg-6">
							<!-- header of the page -->
							<header class="header text-center wow fadeInUp" data-wow-delay="0.4s">
								<span class="title fontpinyon">Welcome</span>
								<h1 class="heading text-uppercase" style="color: white;" >FoodYard</h1>
								<div class="header-img">
									<img src="images/bdr-img.png" alt="image description" class="img-respnsive">
								</div>
								<p>{{$a->description}}.</p>
							</header>
							<!-- <span class="signature-image"><img src="images/sign.png" class="img-responsive" alt="Signature"></span> -->
						</div>
					</div>
					<div class="row contact-holder">
						<div class="col-xs-12 col-sm-4 text-center">
							<h2 class="heading2" style="color: white;">Hotline</h2>
							<a class="sub-title" href="tell:(00)123456789" style="color: white;" >(+91) {{$a->phone_no}}</a>
						</div>
						<div class="col-xs-12 col-sm-4 text-center l-bdr">
							<h2 class="heading2" style="color: white;">We’re Open</h2>
							<time class="sub-title" style="color: white;">MON-SUN: 8AM-10PM</time>
						</div>
						<div class="col-xs-12 col-sm-4 text-center l-bdr">
							<h2 class="heading2" style="color: white;">Follow Us</h2>
							<ul class="list-unstyled social-network text-center">
								<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
@endforeach