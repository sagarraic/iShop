@extends('layouts.dashboard')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<strong>Edit </strong> a existing Product
						</div>
						<div class="card-body card-block">
							<form action="/admin/products/{{ $product->id }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('patch')
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">Product Name</label>
									</div>
									<div class="col-12 col-md-9">
										<input type="text" value="{{ $product->product_name }}" name="product_name" placeholder="Product Name" class="form-control">
										{{-- <small class="form-text text-muted">This is a help text</small> --}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="textarea-input" class=" form-control-label">Product Description</label>
									</div>
									<div class="col-12 col-md-9">
										<textarea id="textarea-input" rows="9" placeholder="Description..." class="form-control" name="product_description">{{ $product->product_description }}</textarea>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">Product Category</label>
									</div>
									<div class="col-12 col-md-9">
										<input type="text" value="{{ $product->product_category }}" name="product_category" placeholder="Product Category" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">Product Price</label>
									</div>
									<div class="col-12 col-md-9">
										<input type="number" value="{{ $product->price }}" name="price" placeholder="Product Price" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="file-input" class=" form-control-label">Select image</label>
									</div>
									<div class="col-12 col-md-9">
										<input type="file" name="image" class="form-control-file">
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary btn-sm">
									<i class="fa fa-dot-circle-o"></i> Submit
									</button>
									<button type="reset" class="btn btn-danger btn-sm">
									<i class="fa fa-ban"></i> Reset
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="copyright">
						<p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection