<!DOCTYPE html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the apple mobile web app capable -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- set the HandheldFriendly -->
	<meta name="HandheldFriendly" content="True">
	<!-- set the apple mobile web app status bar style -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- set the description -->
	<meta name="description" content="Vine Yard HTML Template">
	<!-- set the Keyword -->
	<!-- SweetAlert2 -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
   <!-- // -->
	<script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
	<meta name="keywords" content="blog, clean, clear, creative, design web, ecommerce, flat, Indoor Furniture, marketing, portfolio, vineyard, wines, wines WordPress theme, winewinery">
	<meta name="author" content="Vine Yard HTML Template">
	<title>@yield('tittle')</title>
	<!-- include the site stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Philosopher:400,700%7CPinyon+Script" rel="stylesheet">
	<!-- Meta tag Keywords login form -->
    <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/font-awesome.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/bootstrap.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/plugins.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/icofont.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/style.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/responsive.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{url('/css/colors.css')}}">
</head>
<body style="background-color:#0d0d0d">
	<!-- main container of all the page elements -->
	<div id="wrapper">
		<!-- Header of the page -->
		<header id="header" class="v1">
			<!-- header holder of the page -->
			<div class="header-holder " style="background-color:black;">
				<div class="container-fluid">
					<!-- setting wrap of the page -->
                                
					<ul class="list-unstyled setting-wrap pull-left">
						<li>
							<a href="javascript:void(0);" class="setting-drop-opener"><i class="icon-setting" style="color: white;"></i></a>
							<!-- cart dropdown of the page -->
							<div class="cart-dropdown">
								<!-- setting-drop of the page -->
								<div class="setting-drop">
									<ul class="list-unstyled account-list">
										<li><a href="{{url('myaccount')}}">My Account</a></li>
										<!-- <li><a href="wishlist.html">My Wishlist</a></li>
										<li><a href="compare.html">Compare</a></li> -->
										<li><a href="{{url('frontend/cart')}}">My Cart</a></li>
										<li><a href="{{url('checkout')}}">Check out</a></li>
									</ul>
									<!-- <hr>
									<h3 class="heading3 text-uppercase">CURRENCY</h3>
									<form action="javascript:void(0);" class="currency-form">
										<feildset>
											<label for="radio-2">
												<input id="radio-2" name="group1" type="radio">
												<span class="fake-input"></span>
												<span class="fake-label">USD</span>
											</label>
											<label for="radio-3">
												<input id="radio-3" name="group1" type="radio">
												<span class="fake-input"></span>
												<span class="fake-label">EUR</span>
											</label>
											<label for="radio-4">
												<input id="radio-4" name="group1" type="radio">
												<span class="fake-input"></span>
												<span class="fake-label">GBP</span>
											</label>
											<label for="radio-5">
												<input id="radio-5" name="group1" type="radio">
												<span class="fake-input"></span>
												<span class="fake-label">CNY</span>
											</label>
										</feildset>
									</form>
									<hr>
									<h3 class="heading3 text-uppercase">LANGUAGE</h3>
									<ul class="list-unstyled lang-list">
										<li><a href="javascript:void(0);"><img src="images/flag-1.jpg" alt="flag" class="img-responsive"></a></li>
										<li><a href="javascript:void(0);"><img src="images/flag-2.jpg" alt="flag" class="img-responsive"></a></li>
										<li><a href="javascript:void(0);"><img src="images/flag-3.jpg" alt="flag" class="img-responsive"></a></li>
									</ul> -->
								</div>
							</div>
						</li>
						<li><a href="javascript:void(0);" class="nav-opener visible-xs hidden"><i class="fa fa-bars"></i></a></li>
					</ul>
					<!-- widget cart wrap of the page -->
					<?php 

					$session = Session::getId();
					// dd($session); 
					$r = DB::table('carts')->where('session_id',$session)->get();
					// print_r($r);
					if(Auth::check())
					{
			            $cart = DB::table('carts')->where('user_email',Auth::user()->email)->get();
			            // print_r($cart);
					}
					 ?>
					<ul class="list-unstyled widget-cart-wrap pull-right" >
						<!-- <li><a href="#popup1" class="lightbox"><i class="icon-user" style="color: white;"></i></a></li> -->
						<li><a href="#popup1" class="lightbox"><i class="icon-search" style="color: white;"></i></a></li>
						
						<li>
							<a href="javascript:void(0);" class="cart-drop-opener"><i class="icon-cart" style="color: white;"></i> <span class="num round fontjosefin text-center">
								@if(Auth::check()) 

								{{$cart->count()}}

								@else
								{{$r->count()}}
								@endif
							</span></a>
							<!-- Cart Dropdown of the page -->
							<div class="cart-dropdown right">
								<!-- Cart Menu of the page -->
								<ul class="list-unstyled cart-menu">
									@if(Auth::check())

									    @if($cart->count()>0)
                                           <?php $total = 0; ?>
									      @foreach($cart as $cart_data)
									<li>
										<div class="img-holder bdr pull-left">
											<a href="shopping-cart.html"><img src="/upload/{{$cart_data->dish_image}}" alt="image description" class="img-responsive"></a>
										</div>
										<div class="align-left pull-left">
											<h3 class="heading3"><a href="shopping-cart.html">{{$cart_data->dish_name}}</a></h3>
											<span class="price clr">{{$cart_data->dish_quantity}} x {{$cart_data->dish_price}}</span>
											<a href="{{url('delete'.$cart_data->id)}}" class="close"><i class="fa fa-times"></i></a>
										</div>
									</li>

										<?php $total = $total + ($cart_data->dish_quantity*$cart_data->dish_price) ?>
									      @endforeach
									      <li class="total-price text-uppercase">
										total:
									 
										<em class="price clr fwBold pull-right">Rs.<?php echo $total; ?></em>
									</li>
									      
									<li>
										<a href="{{url('frontend/cart')}}" class="btn-primary active text-center text-uppercase lg-round">View Cart</a>
										<a href="{{url('checkout')}}" class="btn-primary lg-round text-center text-uppercase">Check Out</a>
									</li>
									    @endif
									
									@else
                                        @if($r->count()>0)
                                           <?php $total = 0; ?>
									      @foreach($r as $cart_data)
									<li>
										<div class="img-holder bdr pull-left">
											<a href="shopping-cart.html"><img src="/upload/{{$cart_data->dish_image}}" alt="image description" class="img-responsive"></a>
										</div>
										<div class="align-left pull-left">
											<h3 class="heading3"><a href="shopping-cart.html">{{$cart_data->dish_name}}</a></h3>
											<span class="price clr">{{$cart_data->dish_quantity}} x {{$cart_data->dish_price}}</span>
											<a href="{{url('delete'.$cart_data->id)}}" class="close"><i class="fa fa-times"></i></a>
										</div>
									</li>

										<?php $total = $total + ($cart_data->dish_quantity*$cart_data->dish_price) ?>
									      @endforeach
									      <li class="total-price text-uppercase">
										total:
									
										<em class="price clr fwBold pull-right">Rs.<?php echo $total; ?></em>
									</li>
									      
									<li>
										<a href="{{url('frontend/cart')}}" class="btn-primary active text-center text-uppercase lg-round">View Card</a>
										<a href="{{url('user_login')}}" class="btn-primary lg-round text-center text-uppercase">Check Out</a>
									</li>
                                        @endif
									    
									
                                   
									@endif
								</ul>
							</div>
						</li>
						@guest
                            @if (Route::has('login'))
                               <li class="nav-item">
                                <a class="nav-link" style="color: white;" href="{{url('user_login')}}">{{ __('Login') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a style="color: white;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                               
                                <div class="dropdown-menu dropdown-menu-right text-center" style="background-color: black;" aria-labelledby="navbarDropdown">

                                	<a  class="btn-primary active text-center text-uppercase lg-round " href="{{url('logout')}}">Logout</a>
                                </div>
                            </li>
                        @endguest
					</ul>

					<div class="logo">
						<!-- <a href="index.html"><h1 style="color: #a53e4c;margin-top: -11px;" >FoodYard</h1></a> -->
						<a href="{{url('/')}}"><img src="{{url('images/3.png')}}" alt="Vine Yard" class="img-responsive"></a>
					</div>
				</div>
			</div>
			<!-- nav holder of the page -->
			<div class="nav-holder container" style="background-color:#0d0d0d">
				<div class="row">
					<div class="col-xs-12">
						<!-- nav of the page -->
						<nav id="nav" >
							<ul class="list-unstyled text-center">
								<li class="n-logo"><a href="index.html"><img src="{{url('images/3.png')}}" alt="Vine Yard" class="img-responsive"></a></li>
								<li class="active" style="font-size: 20px;" ><a href="{{url('/')}}">Home</a></li>
								<!-- dropdownfull of the page -->
								<!-- <li class="dropdownfull">
									<a href="javascript:void(0);" class="drop-open">Shop</a>
									<div class="dropdownmenu text-left">
										<div class="dropdowncol">
											<h3 class="heading3 text-uppercase">Shop List</h3>
											<ul class="list-unstyled dropdowncollist">
												<li><a href="shop.html">Shop</a></li>
												<li><a href="shop-fullwidth.html">Shop FullWidth</a></li>
												<li><a href="shop-detail.html">Shop Detail</a></li>
											</ul>
										</div>
										<div class="dropdowncol hidden-xs">
											<div class="img-holder">
												<a href="javascript:void(0);"><img src="https://via.placeholder.com/225x280" class="img-responsive" alt="image description"></a>
											</div>
										</div>
										<div class="dropdowncol">
											<h3 class="heading3 text-uppercase">Cart List</h3>
											<ul class="list-unstyled dropdowncollist">
												<li><a href="shopping-cart.html">Shopping Cart</a></li>
												<li><a href="checkout.html">Checkout</a></li>
												<li><a href="wishlist.html">Wishlist</a></li>
											</ul>
										</div>
										<div class="dropdowncol hidden-xs">
											<div class="img-holder">
												<a href="javascript:void(0);"><img src="https://via.placeholder.com/225x280" class="img-responsive" alt="image description"></a>
											</div>
										</div>
									</div>
								</li> -->
								<!-- dropdown of the page -->
								<li class="dropdown" style="font-size: 20px;">
									<a href="javascript:void(0);" >Category</a>
									<!-- dropdown menu of the page -->
									<ul class="dropdown-menu text-left">
										@foreach($master as $c)
										<li><a href="{{url('frontend/detail/'.$c->id)}}">{{$c->tittle}}</a></li>
								        @endforeach
									</ul>
								</li>
								<!-- <li class="dropdown">
									<a href="javascript:void(0);">Blog</a> -->
									<!-- dropdown menu of the page -->
									<!-- <ul class="dropdown-menu text-left">
										<li><a href="blog-list.html">Blog List</a></li>
										<li><a href="blog-colume2.html">Blog Colume2</a></li>
										<li><a href="blog-list-leftsidebar.html">Blog List Leftside</a></li>
										<li><a href="blog-detail-fullwidth.html">Blog Detail Fullwidth</a></li>
									</ul>
								</li> -->
								<li style="font-size: 20px;"><a href="{{url('contact')}}">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>
		
		<!-- main of the page -->
		<main id="main">
             @yield('content')
		</main>
		<!-- footer of the page -->
		<footer id="footer" class="bg-black">
			<!-- footer aside of the page -->
			<aside class="footer-aside bg-grey">
				<!-- socail network of the page -->
				<ul class="social-network list-unstyled">
					<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-twitter active"></i></a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
				</ul>
				<div class="payment-img">
					<a href="javascript:void(0);"><img src="{{url('images/img35.png')}}" class="img-responsive" alt="Payment Card"></a>
				</div>
				<a id="back-top" class="round"><i class="fa fa-chevron-up"></i></a>
			</aside>
			<!-- footer folder of the page -->
			<div class="footer-holder">
				<div class="container">
					<div class="row mar-bt">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="logo">
								<a href="index.html"><img class="img-responsive" src="{{url('images/3.png')}}" alt="vineyard" ></a>
							</div>
							<!-- contact list of the page -->
							<ul class="list-unstyled contact-list">
								<li>Address : Morar, Gwalior,Madhya Pradesh,<br class="hidden-xs"> India</li>
								<li>Email: <a href="mailto:info.contact@gmail.com">palsudhanshu94@gmail.com</a></li>
								<li>Phone: <a href="tell:(+1)234456789">(+91) 6265172538</a></li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-2">
							<h3 class="heading3">My Accounts</h3>
							<!-- f nav of the page -->
							<ul class="list-unstyled f-nav">
								<li><a href="javascript:void(0);">My account</a></li>
								<li><a href="javascript:void(0);">My orders</a></li>
								<li><a href="javascript:void(0);">Register</a></li>
								<li><a href="javascript:void(0);">Login</a></li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-2">
							<h3 class="heading3">Quick link</h3>
							<!-- f nav of the page -->
							<ul class="list-unstyled f-nav">
								<li><a href="javascript:void(0);">New User</a></li>
								<li><a href="javascript:void(0);">Help Center</a></li>
								<li><a href="javascript:void(0);">Report Spam</a></li>
								<li><a href="javascript:void(0);">FAQs</a></li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<h4 class="heading3">Tag Clound</h4>
							<!-- tags list of the page -->
							<ul class="list-unstyled tags-list">
								<li><a href="javascript:void(0);">Music</a></li>
								<li><a href="javascript:void(0);">Travel</a></li>
								<li><a href="javascript:void(0);">video</a></li>
								<li><a href="javascript:void(0);">Ecommerce</a></li>
								<li><a href="javascript:void(0);">feature</a></li>
								<li><a href="javascript:void(0);">text</a></li>
								<li><a href="javascript:void(0);">sports</a></li>
								<li><a href="javascript:void(0);">fashion</a></li>
								<li><a href="javascript:void(0);">store</a></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<!-- footer nav of the page -->
							<ul class="list-unstyled footer-nav text-center">
								<li><a href="javascript:void(0);">About</a></li>
								<li><a href="javascript:void(0);">Customer Service</a></li>
								<li><a href="javascript:void(0);">Terms &amp; Conditions</a></li>
								<li><a href="javascript:void(0);">Privacy Policy</a></li>
								<li><a href="javascript:void(0);">Site Map</a></li>
								<li><a href="javascript:void(0);">Contact</a></li>
							</ul>
						</div>													
						<div class="col-xs-12">
							<div class="copyright text-center">
								<p>Copyright<a href="javascript:void(0);"> FoodYard</a> © 2021. All rights reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- <a id="newsletter-hiddenlink" href="#popup2" class="lightbox" style="display: none;">Newsletter</a> -->
		<!-- loader of the page -->
		<!-- <div id="loader" class="loader-holder">
			<div class="block"><img src="images/svg/hearts.svg" width="100" alt="loader"></div>
		</div> -->
	</div>
	
	<!-- main container of all the page elements end -->
	<div class="popup-holder">
		<!-- popup1 of the page -->
		<div id="popup1" class="search-holder">
			<!-- search holder of the page -->
		
			<!-- select form of the page -->
			<form action="{{url('/search')}}" method="get" class="select-form">
				<fieldset>
					
					<select>       
						<option value="0">Select</option>
						@foreach($master as $c)
						<option value="1"><a href="{{url('frontend/detail/'.$c->id)}}">{{$c->tittle}}</a></option>
							@endforeach
					</select>
				
					<input type="search" style="background-color:white;" name="quary" class="form-control fwNormal bdr" placeholder="Search"><button type="submit" class="sub-btn"><i class="fa fa-search"></i></button>
					
				</fieldset>
			</form>
		</div>
		<!-- popup2 of the page -->
		<div id="popup2" class="lightbox-demo text-center">
			<h4 class="heading2 text-uppercase">advanced popup modle</h4>
			<div class="img-holder">
				<img src="https://via.placeholder.com/600x260" alt="image description" class="img-responsive">
			</div>
			<span class="txt text-uppercase">sign up for out newsletter to<br> receive special offers</span>
			<!-- email form of the page -->
			<form class="email-form">
				<fieldset>
					<input class="form-control" type="email" placeholder="Email">
					<button class="fa fa-long-arrow-right" type="submit"></button>
				</fieldset>
			</form>
		</div>
		<!-- popup3 of the page -->
		<div id="popup3" class="lightbox-demo text-left">
			<h4 class="heading5 text-uppercase">Register</h4>
			<!-- login form of the page -->
			<form class="login-form text-center">
				<fieldset>
					<div class="form-group">
						<input class="form-control" type="text" placeholder="Username*:">
					</div>
					<div class="form-group">
						<input class="form-control" type="password" placeholder="Password*:">
					</div>
					<button class="btn-primary active lg-round text-center fwBold text-uppercase" type="submit">Register</button>
				</fieldset>
			</form>
			<div class="wrap">
				<a href="#popup1" class="pull-left" >Login</a>
				<a href="javascript:void(0);" class="pull-right">Forget Password</a>
			</div>
		</div>
		</div>
	
	<!-- include jQuery -->
	<script src="{{url('js/jquery.js')}}"></script>
	<!-- include jQuery -->
	<script src="{{url('js/plugins.js')}}"></script>
	<!-- include jQuery -->
	<script src="{{url('js/jquery.main.js')}}"></script>
	<script type="text/javascript">
     var clock = setInterval(clocktiming,1000)
     function clocktiming(){
     var d = new Date();
     var p = d.toLocaleTimeString();
     
     document.getElementById('defaultCountdown').innerHTML = p;
    }
    </script>
    <script >
    	 $(document).ready(function () {
        
    $("#example").on("click", ".plus", function(evt){

      var id = $(this).closest('tr').find('.id').text(); 
  
            // alert(id);
            evt.preventDefault();

            $.ajax({
            type:'GET',
            url: "/cart/update_quantity/"+id+"/1",
            dataType: 'json',
            success: function(response) {
            	alert(response);
            
            }
            });
        });
    });
    </script>
    <script >
    	 $(document).ready(function () {
        
    $("#example").on("click", ".minus", function(evt){

      var id = $(this).closest('tr').find('.id').text(); 
  
            // alert(id);
            evt.preventDefault();

            $.ajax({
            type:'GET',
            url: "/cart/update_quantity/"+id+"/-1",
            dataType: 'json',
            success: function(response) {
            	
            
            }
            });
        });
    });
    </script>
    <script >
    	function selectPaymentMethod() {
    		// alert("hello");
    		if($('.stripe').is(':checked') || $('.cod').is(':checked') || $('.paytm').is(':checked') || $('.Instamojo').is(':checked') || $('.razorpay').is(':checked') ){
                alert('checked');
            }
           else{
            alert('Please select payment method');
            return false;
            }
    	}
    </script>
    <script type="text/javascript">
function Confirmation() {
swal("Have a Good Meal!", "You Order is Placed!", "success");
}
</script>
</body>
</html>