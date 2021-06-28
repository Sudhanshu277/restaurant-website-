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
			<section class="banner bg-parallax overlay" style="background-image:url(/upload/{{$dat->dish_image}});">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="heading text-uppercase fwLight">{{$dat->dish_name}}</h2>
							<ul class="list-unstyled breadcrumbs">
								<li><a href="index.html">Home</a></li>
								<li>/</li>
								<li><a href="shop.html">Shop</a></li>
								<li>/</li>
								<li>Details</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- shop detail of the page -->
			<section class="shop-detail container">
				<div class="row">
					<div class="col-xs-12">
						<div class="slider">
							<!-- product slider of the page -->
							
							<div class="product-slider">
								@foreach($data as $d)
								<div class="slide">
									<img src="/upload/{{$d->image}}" class="img-responsive" alt="image description" class="w-100">
								</div>	
								@endforeach
							</div>
							
							<!-- pagg slider of the page -->
							<ul class="list-unstyled slick-slider pagg-slider">
								@foreach($data as $d)
								<li><img src="/upload/{{$d->image}}" alt="image description" class="img-responsive"></li>
								
								@endforeach
							</ul>
						</div>
						<h2 class="heading5" style="color: white;">{{$dat->dish_name}}</h2>
						<!-- rating list of the page -->
						<ul class="list-unstyled rating-list">
							<li><a href="javascript:void(0);" style="color: #d43d3d"><i class="fa fa-star"></i></a></li>
							<li><a href="javascript:void(0);" style="color: #d43d3d"><i class="fa fa-star"></i></a></li>
							<li><a href="javascript:void(0);" style="color: #d43d3d"><i class="fa fa-star"></i></a></li>
							<li><a href="javascript:void(0);" style="color: #d43d3d"><i class="fa fa-star"></i></a></li>
							<li><a href="javascript:void(0);" style="color: #d43d3d"><i class="fa fa-star"></i></a></li>
						</ul>
						<strong class="price fontbase" style="color: #d43d3d">{{$dat->price}}</strong>
						<p>{{$dat->	dish_description}}</p>
						<!-- footer of the page -->
						<form method="post" action="{{url('add-to-cart')}}">
							@csrf
							<input type="hidden" name="dish_id" value="{{$dat->id}}">
							<input type="hidden" name="dish_name" value="{{$dat->dish_name}}">
							<input type="hidden" name="dish_price" value="{{$dat->price}}">
							<input type="hidden" name="dish_image" value="{{$dat->dish_image}}">
						<footer class="footer">
							<div class="f-holder">
								<ul class="list-unstyled color-list">
									<li class="heading3">Select Color:</li>
									<li><a href="javascript:void(0);" class="red lg-round"></a></li>
									<li><a href="javascript:void(0);" class="black lg-round"></a></li>
									<li><a href="javascript:void(0);" class="blue lg-round"></a></li>
									<li><a href="javascript:void(0);" class="green lg-round"></a></li>
									<li><a href="javascript:void(0);" class="yellow lg-round"></a></li>
								</ul>
								<ul class="list-unstyled size-list">
									<li class="heading3">Select Size:</li>
									<li><input type="radio" name="" class="lg-round fontcinzel">S</li>
									<li><a href="javascript:void(0);" class="lg-round fontcinzel">S</a></li>
									<li><a href="javascript:void(0);" class="lg-round fontcinzel">M</a></li>
									<li><a href="javascript:void(0);" class="lg-round fontcinzel">L</a></li>
									<li><a href="javascript:void(0);" class="lg-round fontcinzel">XL</a></li>
									<li><a href="javascript:void(0);" class="lg-round fontcinzel">XXL</a></li>
								</ul>
							</div>
							<div class="f-holder">
								<ul class="list-unstyled tag-list text-uppercase">
									<li class="title"><i class="fa fa-tag"></i></li>
									<li><a href="javascript:void(0);">blackberry ,</a></li>
									<li><a href="javascript:void(0);">cassis ,</a></li>
									<li><a href="javascript:void(0);">plum ,</a></li>
									<li><a href="javascript:void(0);">vanilla ,</a></li>
									<li><a href="javascript:void(0);">cocoa</a></li>
								</ul>
								<ul class="list-unstyled social-network">
									<li class="heading3">Share link:</li>
									<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-google-plus"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
								</ul>
							</div>
						</footer>
						<!-- holder of the page -->
						<div class="holder">
							<input type="number" value="1" name="dish_quantity">
							<ul class="list-unstyled text-center social-networks">
								<li><a href="javascript:void(0);" style="color: white;"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
								<li><a href="javascript:void(0);" style="color: white;"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
								<li><a href="javascript:void(0);" style="color: white;"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
								<li><a href="javascript:void(0);" style="color: white;"><button  type="submit" style="background-color: transparent;outline: none;border: none;" ><i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a></li>
								<!-- <li><button class="btn btn-primary" type="submit" style="color: white;" ><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add To Cart</button></li> -->
							</ul>
						</div>
					    </form>
						<!-- accordion of the page -->
						<ul class="accordion list-unstyled">
<li class="active">
<a href="javascript:void(0);" class="opener heading3 text-uppercase">Product DESCRIPTION</a>
<div class="slide">
<p><strong>Adult Signature Required :</strong>You must be at least 21 years of age to purchase wine. Adult signature is required on delivery.</p>
<p><strong>Weather Related Delays : </strong> The seller may delay shipment if the temperature at the shipping or delivery address is not between 45°F and 80°F.</p>
</div>
</li>

<li>
<a href="javascript:void(0);" class="opener heading3 text-uppercase">Customer Reviews {{$review->count()}}</a>
<div class="slide">

@foreach($review as $reviews)

<div class="row">
<div class="col-md-8">
<p>{{$reviews->comment}}</p>
</div>
<div class="col-md-2">
<p>{{$reviews->rating}}/5</p>
</div>
</div>

@endforeach
</div>
</li>
</ul>


<div class="container" style="background-color:#0000009c;margin-top: 10px;">
           <div class="row">

           <div class="card-group">

             <div class="col-md-6" style="border:1px solid white">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title" style="color:white;">Detailed Rating</h5>
                        <ul class="list-unstyled">
     <li>
         5 stars
     <span> <progress class="pull-right" value="{{$rate5}}" style="height: 20px; width: 80%; margin-top:4px;" max="100">  </progress></span>
     </li>
     <li>
         4 stars
     <progress class="pull-right" value="{{$rate4}}" style="height: 20px; width: 80%;margin-top:4px;" max="100">  </progress>
     </li>
     <li>
         3 stars
     <progress class="pull-right" value="{{$rate3}}" style="height: 20px; width: 80%;margin-top:4px;" max="100">  </progress>
     </li>
     <li>
         2 stars
     <progress class="pull-right" value="{{$rate2}}" style="height: 20px; width: 80%;margin-top:4px;" max="100">  </progress>
     </li>
     <li>
         1 stars
     <progress class="pull-right" value="{{$rate1}}" style="height: 20px; width: 80%;margin-top:4px;" max="100">  </progress>
     </li>
     </ul>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted"></small>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4" style="border:1px solid white">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title" style="margin-bottom: 27.5px;color: white;">Average Rating</h5>
                       
         @if($avg_rate>4)
         <h1>
         <?php
            echo number_format($avg_rate,1);
           ?>
         </h1>
         <i class="fas fa-star" style="color: #f9a134;"></i>
         <i class="fas fa-star" style="color: #f9a134;"></i>
         <i class="fas fa-star" style="color: #f9a134;"></i>
         <i class="fas fa-star" style="color: #f9a134;"></i>
         <i class="fas fa-star" style="color: #f9a134;"></i>
         <p>
         <?php
            echo number_format($avg_rate,1);
           ?> rating
         </p>

         @elseif($avg_rate>3)
         <h1>
         <?php
            echo number_format($avg_rate,1);
           ?>
         </h1>
         <i class="fas fa-star" style="color: #f9a134;"></i>
         <i class="fas fa-star" style="color: #f9a134;"></i>
         <i class="fas fa-star" style="color: #f9a134;"></i>
         <i class="fas fa-star" style="color: #f9a134;"></i>
         <i class="fas fa-star"></i>
         <p>
         <?php
            echo number_format($avg_rate,1);
           ?> rating
         </p>

         @elseif($avg_rate>2)
         <h1>
       <?php
          echo number_format($avg_rate,1);
         ?>
       </h1>
       <i class="fas fa-star" style="color: #f9a134;"></i>
       <i class="fas fa-star" style="color: #f9a134;"></i>
       <i class="fas fa-star" style="color: #f9a134;"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <p>
       <?php
          echo number_format($avg_rate,1);
         ?> rating
       </p>

       @elseif($avg_rate>1)
       <h1>
       <?php
          echo number_format($avg_rate,1);
         ?>
       </h1>
       <i class="fas fa-star" style="color: #f9a134;"></i>
       <i class="fas fa-star" style="color: #f9a134;"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <p>
        <?php
          echo number_format($avg_rate,1);
         ?> rating
       </p>

       @elseif($avg_rate>0)
       <h1>
        <?php
          echo number_format($avg_rate,1);
         ?>
       </h1>
       <i class="fas fa-star" style="color: #f9a134;"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <p>
        <?php
          echo number_format($avg_rate,1);
         ?> rating
       </p>
       @else
       <h1>
        <?php
          echo number_format($avg_rate,1);
         ?>
       </h1>

       <p>
        <?php
          echo number_format($avg_rate,1);
         ?> rating
       </p>
       @endif

                      </div>
                      <div class="card-footer">
                        <small class="text-muted" style="">
                       
                        </small>
                      </div>
                    </div>
                  </div>


                </div>
              <div>
            </div>

<div class="container" style="background-image: url('/upload/login.jpg'); background-repeat: no-repeat;background-size: cover;">
<div class="row">
<div class="col-md-8">
<div class="card">
<div class="card-header">
<h2>Add Review</h2>
<hr>
</div>
<div class="card-body">
<form method="post" action="{{url('add_review')}}">
@csrf
<input type="hidden" name="dish_id" value="{{$dat->id}}">
<div class="form-group">
<label style="font-size: 20px;color: #ccc;">Rating</label><br>
 <input type="range" min="1" max="5" value="3" class="slider" name="rating" id="myRange" style="width: 80%">
 <span id="demo"></span>/5
</div>

<div class="form-group">
<textarea name="comment" class="form-control" rows="2" cols="3" placeholder="Write Review"></textarea>
</div>

<button class="btn-primary active lg-round text-center fwBold text-uppercase" style="width:40%;  font-size:15px" type="submit">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>

						<!-- ////// -->
						<!-- <ul class="accordion list-unstyled">
							<li class="active">
								<a href="javascript:void(0);" class="opener heading3 text-uppercase">Product DESCRIPTION</a>
								<div class="slide">
									<p><strong>Adult Signature Required :</strong>You must be at least 21 years of age to purchase wine. Adult signature is required on delivery.</p>
									<p><strong>Weather Related Delays : </strong> The seller may delay shipment if the temperature at the shipping or delivery address is not between 45°F and 80°F.</p>
								</div>
							</li>
							<li>
								<a href="javascript:void(0);" class="opener heading3 text-uppercase">additional imformation</a>
								<div class="slide">
									<p><strong>Adult Signature Required :</strong>You must be at least 21 years of age to purchase wine. Adult signature is required on delivery.</p>
									<p><strong>Weather Related Delays : </strong> The seller may delay shipment if the temperature at the shipping or delivery address is not between 45°F and 80°F.</p>
								</div>
							</li>
							<li>
								<a href="javascript:void(0);" class="opener heading3 text-uppercase">Customer Reviews (15)</a>
								<div class="slide">
									<p><strong>Adult Signature Required :</strong>You must be at least 21 years of age to purchase wine. Adult signature is required on delivery.</p>
									<p><strong>Weather Related Delays : </strong> The seller may delay shipment if the temperature at the shipping or delivery address is not between 45°F and 80°F.</p>
								</div>
							</li>
						</ul> -->
					</div>
				</div>
			</section>
			<!-- feature sec of the page -->
			
		</main>
		<script>

var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
@endsection