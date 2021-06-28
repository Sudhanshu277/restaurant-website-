@extends('frontend.master')
@section('content')
<!-- Shopping cart of the page -->
			<div class="shopping-cart container" style="margin-top: 300px;">
				<div class="row" >
					<div class="col-xs-12" >
						<div class="table-responsive">
							<!-- cart table of the page -->
							<table class="cart-table" >
								<thead>
									<tr class="text-uppercase">
										<th>image</th>
										<th>product name</th>
										<th>Order Status</th>
										<th>price</th>
										<th>quantity</th>
										<th class="wrap">
											<span class="pull-left">totel</span>
											<!-- <a href="#" class="fa fa-close text-center"></a> -->
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach($item as $i)
									<tr>
										<td>
											<div class="product-img">
												<img src="/upload/{{$i->dish_image}}" class="img-responsive">
											</div>
										</td>
										<td>
											<div class="content-holder">
												<h3 style="color:white;">{{$i->dish_name}}</h3>
												<div class="holder">
													<!-- <span class="color-code pull-left">Color:</span>
													<span class="size-code pull-left">Size: <a href="#" class="lg-round text-center">M</a></span> -->
												</div>
											</div>
										</td>
										<td style="color:white;">{{$i->order_status}}</td>
										<td class="price fwBold">Rs.{{$i->dish_price}}</td>
										<td class="price fwBold text-center">	
											{{$i->dish_quantity}}
										</td>
										<td class="wrap">
											<span class="price pull-left fwBold">Rs.{{$i->dish_quantity*$i->dish_price}}</span>
											<!-- <a href="#" class="fa fa-close pull-right text-center"></span> -->
										</td>
									@endforeach
								</tbody>
							</table>
							<a href="{{url('/')}}" class="btn-primary active pull-left lg-round text-uppercase text-center">continue shopping</a>
							<!-- <a href="#" class="btn-primary active pull-right lg-round text-uppercase text-center">update cart</a> -->
						</div>
					</div>
				</div>

@endsection