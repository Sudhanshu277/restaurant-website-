<!-- tomatin sec of the page -->
@foreach($deal as $d)
			<section class="tomatin-sec bg-parallax" style="background-image: url(https://images.unsplash.com/photo-1533777857889-4be7c70b33f7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-lg-12">
							<!-- header of the page -->
							<header class="header text-center wow fadeInUp" data-wow-delay="0.4s">
								<!-- <span class="title fontpinyon" style="font-weight: bold;font-size: 50px;color:#fef9e7;;">Deal Of Week</span><br> -->
								<h2 class="heading text-uppercase" style="color: #d43d3d;">Deal Of Week</h2>
								<div class="header-img">
									<img src="images/bdr-img.png" class="img-responsive" class="">
								</div>
								<p style="font-size: 22px;color:#fef9e7;;">{{$d->description}}<br class="visible-lg hidden"> consequat. </p>
							</header>
							<div class="text-center">
								<div id="defaultCountdown" class="comming-timer" style="font-size: 60px;"></div>
								<a href="{{url('frontend/allcategory')}}" class="btn-primary active lg-round text-uppercase">SHOP NOW</a>
							</div>
							<!-- deal slider of the page -->
							<!-- <div class="deal-slider bg-white">
								<div class="img-holder">
									<img src="https://via.placeholder.com/260x340" class="img-responsive" alt="bear08">
									<span class="p-label fwBold">$215.00</span>
								</div>
								<div class="img-holder">
									<img src="https://via.placeholder.com/260x340" class="img-responsive" alt="bear08">
									<span class="p-label fwBold">$215.00</span>
								</div>
								<div class="img-holder">
									<img src="https://via.placeholder.com/260x340" class="img-responsive" alt="bear08">
									<span class="p-label fwBold">$215.00</span>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</section>
@endforeach