<!-- small product of the page -->
			<section class="small-product container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<h3 class="heading5" style="color: white;">New Arrivals <a href="javascript:void(0);" class="next pull-right"><i class="fa fa-chevron-circle-right"></i></a></h3>
						<!-- feature col of the page -->
						@foreach($b as $i)
						<div class="feature-col feature-col2">
							<div class="img-holder text-center pull-left">
								<a href="{{url('frontend/d/'.$i->id)}}"><img style="height: 95px;" src="/upload/{{$i->dish_image}}" alt="image description" class="img-responsive"></a>
							</div>
							<div class="txt-wrap pull-left">
								<h2 class="heading3"><a href="shop-detail.html">{{$i->dish_name}}</a></h2>
								<footer class="footer">
									<ul class="list-unstyled rating-list">
										<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white;"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white;"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white;"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star-o" style="color: white;"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star-o" style="color: white;"></i></a></li>
									</ul>
									<strong class="price" style="color: white;">Rs.{{$i->price}}</strong>
									<!-- <ul class="list-unstyled text-center social-network">
										<li><a href="javascript:void(0);"><i class="fa fa-arrows-alt" aria-hidden="true" style="color: white;"></i></a></li>
										<li><a href="compare.html"><i class="fa fa-refresh" aria-hidden="true" style="color: white;"></i></a></li>
										<li><a href="wishlist.html"><i class="fa fa-heart-o" aria-hidden="true" style="color: white;"></i></a></li>
										<li><a href="shopping-cart.html"><i class="fa fa-shopping-cart" aria-hidden="true" style="color: white;"></i></a></li>
									</ul> -->
								</footer>
							</div>
						</div>
						@endforeach
						
					</div>
					<div class="col-xs-12 col-sm-4">
						<h3 class="heading5" style="color: white">Best Sellers <a href="javascript:void(0);" class="next pull-right"><i class="fa fa-chevron-circle-right"></i></a></h3>
						<!-- feature col of the page -->
						@foreach($c as $e)
						<div class="feature-col feature-col2">
							<div class="img-holder text-center pull-left">
								<a href="shop-detail.html"><img style="height: 95px;" src="/upload/{{$e->dish_image}}" alt="image description" class="img-responsive"></a>
							</div>
							<div class="txt-wrap pull-left">
								<h2 class="heading3" style="color: white"><a href="shop-detail.html">{{$e->dish_name}}</a></h2>
								<footer class="footer">
									<ul class="list-unstyled rating-list">
										<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star-o" style="color: white"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star-o" style="color: white"></i></a></li>
									</ul>
									<strong class="price" style="color: white">Rs.{{$e->price}}</strong>
									<ul class="list-unstyled text-center social-network">
										<li><a href="javascript:void(0);"><i class="fa fa-arrows-alt" aria-hidden="true" style="color: white"></i></a></li>
										<li><a href="compare.html"><i class="fa fa-refresh" aria-hidden="true" style="color: white"></i></a></li>
										<li><a href="wishlist.html"><i class="fa fa-heart-o" aria-hidden="true" style="color: white"></i></a></li>
										<li><a href="shopping-cart.html"><i class="fa fa-shopping-cart" aria-hidden="true" style="color: white"></i></a></li>
									</ul>
								</footer>
							</div>
						</div>
						@endforeach
					</div>
					<div class="col-xs-12 col-sm-4">
						<h3 class="heading5" style="color: white;">Hot Products <a href="javascript:void(0);" class="next pull-right"><i class="fa fa-chevron-circle-right"></i></a></h3>
						<!-- feature col of the page -->
						@foreach($a as $e)
						<div class="feature-col feature-col2">
							<div class="img-holder text-center pull-left">
								<a href="shop-detail.html"><img style="height: 95px;" src="/upload/{{$e->dish_image}}" alt="image description" class="img-responsive"></a>
							</div>
							<div class="txt-wrap pull-left">
								<h2 class="heading3" style="color: white;"><a href="shop-detail.html">{{$e->dish_name}}</a></h2>
								<footer class="footer">
									<ul class="list-unstyled rating-list">
										<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white;"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white;"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white;"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star-o" style="color: white;"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-star-o" style="color: white;"></i></a></li>
									</ul>
									<strong class="price" style="color: white;">Rs.{{$e->price}}</strong>
									<ul class="list-unstyled text-center social-network">
										<li><a href="javascript:void(0);"><i class="fa fa-arrows-alt" aria-hidden="true" style="color: white;"></i></a></li>
										<li><a href="compare.html"><i class="fa fa-refresh" aria-hidden="true" style="color: white;"></i></a></li>
										<li><a href="wishlist.html"><i class="fa fa-heart-o" aria-hidden="true" style="color: white;"></i></a></li>
										<li><a href="shopping-cart.html"><i class="fa fa-shopping-cart" aria-hidden="true" style="color: white;"></i></a></li>
									</ul>
								</footer>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>