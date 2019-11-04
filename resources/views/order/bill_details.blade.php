@extends('layouts.homepage')
@section('content')
<!--================Categories Banner Area =================-->
<section class="solid_banner_area">
	<div class="container">
		<div class="solid_banner_inner">
			<h3>Total Billing Details</h3>
			<ul>
				<li><a href="{{ route('homepage') }}">Home</a></li>
				<li><a href="#">Track Item</a></li>
			</ul>
		</div>
	</div>
</section>
<!--================End Categories Banner Area =================-->

<!--================Track Area =================-->
<section class="track_area p_100">
	<div class="container">
		<div class="track_inner">
			<div class="track_title">
				<h2>Total Billing</h2>
				<p> Thank you for choosing us. Please visit our site again. </p>
			</div>
			<form class="track_form row">
				<div class="col-lg-12 form-group">
					<label for="text">Ordered Date</label>
					<input class="form-control" type="text" value="{{ $bill_id->created_at }}" disabled>
				</div>
				<div class="col-lg-12 form-group">
					<label for="email">bill email</label>
					<input class="form-control" type="text" value="{{ $bill_id->email }}" disabled>
				</div>
				<div class="col-lg-12 form-group">
					<label for="email">bill ID</label>
					<input class="form-control" type="email" value="{{ $bill_id->id }}" disabled>
				</div>
				<div class="col-lg-12 form-group">
					<label for="number">Total Amount</label>
					<input class="form-control" type="number" value="{{ $bill_id->total }}" disabled>
				</div>
				<div class="col-lg-12 form-group">
					<button type="submit" value="submit" class="btn subs_btn form-control">place order</button>
				</div>
			</form>
		</div>
	</div>
</section>
<!--================End Track Area =================-->
@endsection