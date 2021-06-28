@extends('frontend.master')
@section('content')
<!-- search holder of the page -->
		<div class="search-holder">
			<!-- select form of the page -->
			<form action="javascript:void(0);" class="select-form">
				<fieldset>
					<select>
						<option value="0">ALL CATEGORIES</option>
						<option value="1">ALL CATEGORIES</option>
						<option value="2">ALL CATEGORIES</option>
					</select>
					<input type="search" class="form-control fwNormal bdr" placeholder="Search">
					<button type="submit" class="sub-btn"><i class="fa fa-search"></i></button>
				</fieldset>
			</form>
			<a href="javascript:void(0);" class="search-opener icon"><i class="fa fa-times"></i></a></li>
		</div>
		<!-- main of the page -->
		<main id="main">
			<div class="space bg-black"></div>
			<!-- banner of the page -->
			<section class="banner bg-parallax overlay" style="background-image:url(/upload/{{$cat->image}});">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="heading text-uppercase fwLight">{{$cat->tittle}}</h2>
							<ul class="list-unstyled breadcrumbs">
								<li><a href="index.html">Home</a></li>
								<li>/</li>
								<li>Shop Grid</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- shop sec of the page -->
			<section class="shop-sec">
				<div class="container">
					<div class="row">
						<!-- content of the page -->
						<article id="content" class="col-xs-12 col-md-9">
							<div class="col-xs-12">
								<select>
									<option value="0">12 item/pages</option>
									<option value="1">13 item/pages</option>
									<option value="2">14 item/pages</option>
								</select>
								<select>
									<option value="0">Name: A to Z</option>
									<option value="1">Vine Yard</option>
									<option value="2">Vodca</option>
								</select>
								<ul class="list-unstyled viewFilterLinks">
									<li class="active"><a href="javascript:void(0);" class="fa fa-th-large"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-list"></a></li>
								</ul>
							</div>
							@foreach($data as $dish)
							<div class="col-xs-12 col-sm-4">
								<!-- feature col of the page -->
								<form method="post" action="{{url('add-to-cart')}}">
							    @csrf
							    <input type="hidden" name="dish_id" value="{{$dish->id}}">
							    <input type="hidden" name="dish_name" value="{{$dish->dish_name}}">
							    <input type="hidden" name="dish_price" value="{{$dish->price}}">
							    <input type="hidden" name="dish_image" value="{{$dish->dish_image}}">
								<input type="hidden" value="1" name="dish_quantity">
								<div class="feature-col">
									
									<div class="img-holder text-center">
										<a href="{{url('frontend/d/'.$dish->id)}}"><img src="/upload/{{$dish->dish_image}}" alt="image description" class="img-responsive"></a>
									</div>
									<div class="txt-wrap">
										<h2 class="heading3"><a href="shop-detail.html" style="color: white;">{{$dish->dish_name}}</a></h2>
										<footer class="footer">
											<ul class="list-unstyled rating-list pull-left" >
												<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white;"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white;"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa fa-star" style="color: white;"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa fa-star-o" style="color: white;"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa fa-star-o" style="color: white;"></i></a></li>
											</ul>
											<strong class="price pull-right" style="color: #d43d3d">Rs. {{$dish->price}}</strong>
										</footer>
									</div>
									<ul class="list-unstyled text-center social-network">
										<li><a href="javascript:void(0);"><i class="fa fa-arrows-alt" aria-hidden="true" style="color: white;"></i></a></li>
										<li><a href="compare.html"><i class="fa fa-refresh" aria-hidden="true" style="color: white;"></i></a></li>
										<li><a href="wishlist.html"><i class="fa fa-heart-o" aria-hidden="true" style="color: white;"></i></a></li>
										<li><a href="javascript:void(0);" style="color: white;"><button  type="submit" style="background-color: transparent;outline: none;border: none;" ><i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a></li>
									</ul>
								
								</div>
							 </form>
							</div>
							@endforeach
							<div class="col-xs-12">
								<!-- pagination of the page -->
								<ul class="list-unstyled pagination text-center">
									<li><a href="javascript:void(0);"><i class="fa fa-long-arrow-left"></i></a></li>
									<li><a href="javascript:void(0);">1</a></li>
									<li><a href="javascript:void(0);">2</a></li>
									<li class="active"><a href="javascript:void(0);">3</a></li>
									<li><a href="javascript:void(0);">4</a></li>
									<li><a href="javascript:void(0);">5</a></li>
									<li><a href="javascript:void(0);"><i class="fa fa-long-arrow-right"></i></a></li>
								</ul>
							</div>
						</article>
						<!-- sidebar of the page -->
						<aside id="sidebar" class="col-xs-12 col-md-3">
							<!-- widget of the page -->
							<section class="widget category-widget" style="color: white;">
								<h2 class="heading2 text-uppercase" style="color: white;">CATEGORIES</h2>
								<ul class="list-unstyled text-uppercase category-list">
									@foreach($category as $c)
									<li><a href="javascript:void(0);" style="color: white;">{{$c->tittle}}</a></li>
									@endforeach
								</ul>
							</section>
							<!-- widget of the page -->
							<section class="widget">
								<h2 class="heading2 text-uppercase" style="color: white;">shop by</h2>
								<div class="price-range" >
									<span class="progress"><img src="{{url('images/range-img.png')}}" alt="range img" class="img-responsive"></span>
									<span class="text text-uppercase" style="color: white;">price<span class="price fwBold">$20 - $100</span></span>
									<a href="javascript:void(0);" class="btn-primary lg-round text-uppercase" style="color: white;">filter</a>
								</div>
							</section>
							<!-- widget of the page -->
							<!-- <section class="widget">
								<h2 class="heading2 text-uppercase">colors</h2>
								<ul class="list-unstyled color-list">
									<li>
										<a href="javascript:void(0);">
											<h3 class="heading3 text-uppercase pull-left">red</h3>
											<span class="view pull-right">(42)</span>
										</a>
									</li>
									<li class="black">
										<a href="javascript:void(0);">
											<h3 class="heading3 text-uppercase pull-left">black</h3>
											<span class="view pull-right">(28)</span>
										</a>
									</li>
									<li class="blue">
										<a href="javascript:void(0);">
											<h3 class="heading3 text-uppercase pull-left">blue</h3>
											<span class="view pull-right">(27)</span>
										</a>
									</li>
									<li class="green">
										<a href="javascript:void(0);">
											<h3 class="heading3 text-uppercase pull-left">green</h3>
											<span class="view pull-right">(43)</span>
										</a>
									</li>
									<li class="yellow">
										<a href="javascript:void(0);">
											<h3 class="heading3 text-uppercase pull-left">yellow</h3>
											<span class="view pull-right">(15)</span>
										</a>
									</li>
								</ul>
							</section> -->
							<!-- widget of the page -->
							<!-- <section class="widget size-widget">
								<h2 class="heading2 text-uppercase">sizes</h2>
								<ul class="list-unstyled size-list text-center">
									<li><a href="javascript:void(0);">S</a></li>
									<li><a href="javascript:void(0);">M</a></li>
									<li><a href="javascript:void(0);">L</a></li>
									<li><a href="javascript:void(0);">XL</a></li>
									<li><a href="javascript:void(0);">XXL</a></li>
								</ul>
							</section> -->
							<!-- widget of the page -->
							<!-- <section class="widget">
								<div class="img-holder">
									<img src="https://via.placeholder.com/270x360" alt="image-description" class="img-responsive">
								</div>
							</section> -->
							<!-- widget of the page -->
							<!-- <section class="widget">
								<h2 class="heading2 text-uppercase">FEATURED</h2>
								<ul class="list-unstyled feature-list">
									<li>
										<div class="img-holder text-center pull-left">
											<a href="shop-detail.html"><img src="https://via.placeholder.com/20x70" class="img-responsive" alt="img-description"></a>
										</div>
										<div class="txt-holder pull-left">
											<h3 class="heading3"><a href="shop-detail.html">Rose Wines</a></h3>
											<ul class="list-unstyled rating-list">
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
											</ul>
											<strong class="heading2 fontcinzel fwBold">$125.00</strong>
										</div>
									</li>
									<li>
										<div class="img-holder text-center pull-left">
											<a href="shop-detail.html"><img src="https://via.placeholder.com/20x70" class="img-responsive" alt="img-description"></a>
										</div>
										<div class="txt-holder pull-left">
											<h3 class="heading3"><a href="shop-detail.html">Rose Wines</a></h3>
											<ul class="list-unstyled rating-list">
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
											</ul>
											<strong class="heading2 fontcinzel fwBold">$125.00</strong>
										</div>
									</li>
									<li>
										<div class="img-holder text-center pull-left">
											<a href="shop-detail.html"><img src="https://via.placeholder.com/20x70" class="img-responsive" alt="img-description"></a>
										</div>
										<div class="txt-holder pull-left">
											<h3 class="heading3"><a href="shop-detail.html">Rose Wines</a></h3>
											<ul class="list-unstyled rating-list">
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
											</ul>
											<strong class="heading2 fontcinzel fwBold">$125.00</strong>
										</div>
									</li>
									<li>
										<div class="img-holder text-center pull-left">
											<a href="shop-detail.html"><img src="https://via.placeholder.com/20x70" class="img-responsive" alt="img-description"></a>
										</div>
										<div class="txt-holder pull-left">
											<h3 class="heading3"><a href="shop-detail.html">Rose Wines</a></h3>
											<ul class="list-unstyled rating-list">
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
											</ul>
											<strong class="heading2 fontcinzel fwBold">$125.00</strong>
										</div>
									</li>
									<li>
										<div class="img-holder text-center pull-left">
											<a href="shop-detail.html"><img src="https://via.placeholder.com/20x70" class="img-responsive" alt="img-description"></a>
										</div>
										<div class="txt-holder pull-left">
											<h3 class="heading3"><a href="shop-detail.html">Rose Wines</a></h3>
											<ul class="list-unstyled rating-list">
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-star"></a></li>
											</ul>
											<strong class="heading2 fontcinzel fwBold">$125.00</strong>
										</div>
									</li>
								</ul>
							</section> -->
						</aside>
					</div>
				</div>
			</section>
		</main>
@endsection		