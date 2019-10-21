@extends('layouts.dashboard')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header" style="text-align: center;">
							<h2 class="display-5 my-3" style="margin-left: 2rem; text-align: center;" >Product Details</h2>
						</div>
						<div class="card-body">
							
							<div class="vue-misc">
								
								<div class="row">
									<div class="col-md-4">
										<address class="mt-3" style="margin-left: 2rem">
											<strong> Name:- </strong>{{ $product->product_name }} <br><br>
											<strong> Description:- </strong>{{ $product->product_description }} <br><br>
											<strong> Category:- </strong>{{ $product->product_category }} <br><br>
											<strong> Price:- </strong>Rs. {{ $product->price }} /-<br><br>
												
										</address>
									</div>
									<div class="col-md-8">
										<div class="jumbotron">
											<img src="{{ $product->image_url }}" alt="">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection