
<!-- main slider of the page -->
			<div class="main-slider">
				<!-- slide of the page -->
				@foreach($slider as $s)
				<div class="slide bg-full" style="background-image:url(/upload/{{$s->image}});">
					<div class="holder">
						<div class="b-logo">
							<!-- <img src="images/logo4.png" class="img-responsive" alt="banner-logo"> -->
						</div>
						<a href="{{url('frontend/allcategory')}}" class="btn-primary active lg-round text-uppercase">show now</a>
					</div>
				</div>
				@endforeach
				<!-- slide of the page -->
				<!-- <div class="slide bg-full" style="background-image:url({{url('images/b.jpg')}});">
					<div class="holder">
						<div class="b-logo">
							<img src="images/logo4.png" class="img-responsive" alt="banner-logo">
						</div>
						<a href="javascript:void(0);" class="btn-primary active lg-round text-uppercase">show now</a>
					</div>
				</div> -->
			</div>