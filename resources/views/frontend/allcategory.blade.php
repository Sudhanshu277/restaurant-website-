@extends('frontend.master')
@section('content')
<!-- feature sec of the page -->
			<div class="feature-sec container" style="margin-top: 200px;">
				<div class="row">
					<!-- header of the page -->
					<header class="col-xs-12 text-center header wow fadeInUp" data-wow-delay="0.4s">
						<span class="title fontpinyon">Foodyard</span>
						<h1 class="heading text-uppercase" style="color: white;">FOOD FEATURED </h1>
						<div class="header-img">
							<img src="{{url('/images/bdr-img.png')}}" alt="image description" class="img-responsive">
						</div>
					</header>
				</div>
	
				<div class="row">
					@foreach($data as $d)
						<div class="col-xs-12 col-sm-4">
							<!-- team sec of the page -->
							<div class="team-col">
								<div class="img-holder">

									<a href="{{url('frontend/detail/'.$d->id)}}"><img src="/upload/{{$d->image}}" class="img-responsive" alt="team member"></a>
									<ul class="list-unstyled social-icons text-center">
										<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
										<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
										<li><a href="javascript:void(0);" class="fa fa-dribbble"></a></li>
									</ul>
								</div>
								<div class="txt-wrap">
									<h3 class="heading4 text-capitalize" style="color: white;">{{$d->tittle}}</h3>
									
								</div>
							</div>
						</div>
					@endforeach	
					
					
					</div>
			
			</div>
@endsection