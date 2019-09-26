@extends('layout')

@section('content')
	<h1>{{ $product->product_name }}</h1>
	<div class="container">
		<div class="row">
			{{  $product->product_description }}
		</div>
	</div>

	<p>
		<a href="/products/{{ $product->id }}/edit">Edit</a>
	</p>
@endsection
