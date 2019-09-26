@extends('layout')

@section('content')
	<h1>Edit Products</h1>

	<form action="/products/{{ $product->id }}" method="POST">
		@method('PATCH')
		@csrf
		<div class="field">
			<label for="title" class="label">Title</label>

			<div class="control">
				<input type="text" name="product_name" placeholder="Name" value="{{ $product->product_name }}">
			</div>
		</div>

		<div class="field">
			<label for="title" class="label">Description</label>

			<div class="control">
				<textarea name="product_description" class="textarea">{{  $product->product_description }}</textarea>
			</div>
		</div>

		<div class="field">
			<label for="title" class="label">Category</label>

			<div class="control">
				<input name="product_category" value="{{  $product->product_category }}">
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button name="submit" class="btn btn-primary">Update Project</button>
			</div>
		</div>		
	</form>

	<form action="/products/{{ $product->id }}" method="POST">
		@method('DELETE') 
		@csrf
		<div class="field">
			<div class="control">
				<button name="submit" class="btn btn-danger">Delete Project</button>
			</div>
		</div>
	</form>
@endsection