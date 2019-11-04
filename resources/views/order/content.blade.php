@extends('layouts.homepage')
@section('content')
@if(!$orders->isEmpty())
<!--================Categories Banner Area =================-->
<section class="solid_banner_area">
	<div class="container">
		<div class="solid_banner_inner">
			<h3>shopping cart</h3>
			<ul>
				<li><a href="{{ route('homepage') }}">Home</a></li>
				<li><a href="{{ route('orders.index') }}">Shopping cart</a></li>
			</ul>
		</div>
	</div>
</section>
<!--================End Categories Banner Area =================-->

<!--================Shopping Cart Area =================-->
<section class="shopping_cart_area p_100">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="cart_product_list">
					<h3 class="cart_single_title">Discount Cupon</h3>
					<div class="table-responsive-md">
						<table class="table">
							<thead>
								<tr>
									<th scope="col"></th>
									<th scope="col">product</th>
									<th scope="col">price</th>
									<th scope="col">quantity</th>
									<th scope="col">total</th>
								</tr>
							</thead>
							<tbody>
							<form id="billForm" action="users/order/bill_details" method="POST">
							@csrf
								@foreach ($orders as $order)
								<tr>
									<th scope="row">

										<form class="del-form" action="/orders/{{ $order->id }}" method="POST">
										@method('DELETE')
										@csrf
										<button id="del"><img src="user/images/icon/close-icon.png" alt=""></button>
										</form>
									</th>
									<td>
										<div class="media">
											<div class="d-flex">
												<img style="height: 100px;" src="{{ $order->product->image_url }}" alt="">
											</div>
											<div class="media-body">
												<h4>{{ $order->product->product_name }}</h4>
											</div>

										</div>
									</td>
									<td><input type="number" name="product_price" id="product_price" value="{{ $order->product->price }}" readonly></td>
									<td><input type="number" name="order_quantity" id="order_quantity" placeholder="1"></td>
									<input type="hidden" name="product_quantity" id="product_quantity" value="{{ $order->product_quantity }}">
									<td><input type="number" id="updated_price" value="{{ $order->product->price }}" readonly></td>
								</tr>
								@endforeach
							</form>
							</tbody>
						</table>
					</div>
				</div>

				<div class="calculate_shoping_area">
					<h3 class="cart_single_title">Calculate Shoping <span><i class="icon_minus-06"></i></span></h3>
					<div class="calculate_shop_inner">
						<form class="calculate_shoping_form row" action="{{ route('bill_details') }}" method="POST" id="proceedForm" novalidate="novalidate">
							@csrf
							<input type="hidden" name="total_price" value="{{ $total_price }}">
							<div class="form-group col-lg-12">
								<select name="country" class="selectpicker">
									<option>Nepal </option>
									<option>United Kingdom (UK) </option>
									<option>United State America (USA)</option>
								</select>
							</div>
							<div class="form-group col-lg-6">
								<input type="text" class="form-control" id="state" name="state" placeholder="State / Country">
							</div>
							<div class="form-group col-lg-6">
								<input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode / Zip">
							</div>
							<div class="form-group col-lg-12">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="total_amount_area">
					<div class="cupon_box">
						<h3 class="cart_single_title">Discount Cupon</h3>
						<div class="cupon_box_inner">
							<input type="text" placeholder="Enter your code here">
							<button type="submit" class="btn btn-primary subs_btn">apply cupon</button>
						</div>
					</div>
					<div class="cart_totals">
						<h3 class="cart_single_title">Discount Cupon</h3>
						<div class="cart_total_inner">
							<ul>
								<li><a href="#"><span>Shipping</span> Free</a></li>
								<li><a href="#"><span>Totals</span> {{ $total_price }}</a></li>
							</ul>
						</div>
						<a href="#" id="proceed" class="btn btn-primary checkout_btn">proceed to checkout</a>
					</div>

				</div>

			</div>
		</div>
	</div>
</section>
@else 

<!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>empty cart</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="track.html">empty cart</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================login Area =================-->
        <section class="emty_cart_area p_100">
            <div class="container">
                <div class="emty_cart_inner">
                    <i class="icon-handbag icons"></i>
                    <h3>Your Cart is Empty</h3>
                    <h4>back to <a href="#">shopping</a></h4>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->

        @endif

<script>
	$(document).ready(function(){
		$("#order_quantity").change(function(){
			var order_quantity = $("#order_quantity").val();
			var actual_product_price = $("#product_price").val();
			var product_quantity = $("#product_quantity").val();
			var updatedPrice = order_quantity * actual_product_price;
			$("#updated_price").val(updatedPrice);

			if(parseInt(order_quantity) > parseInt(product_quantity)) {
				alert("You can't have more value than in stock!");
				$("#order_quantity").val('1');
				$("#updated_price").val(actual_price);

			} else if(order_quantity == 0) {
				alert("Sorry! you can't submit empty value");
				$("#order_quantity").val('1');
				$("#updated_price").val(actual_price);
			}
		});	
		$("#sub").on('click',function(){
			$("#billForm").submit();
		})	
		$("#del").on('click',function(){
			$(".del-form").submit();
		})	

		$('#proceed').on('click',function(e){
			e.preventDefault();
			$("#proceedForm").submit();
		})
	});

</script>

<!--================End Shopping Cart Area =================-->
@endsection

