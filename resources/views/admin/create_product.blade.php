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
							<strong>Add </strong> a new Product
						</div>
						<div class="card-body card-block">
							<form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
								<div class="row form-group @error('product_name') has-error @enderror">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">Product Name</label>
									</div>
									<div class="col-12 col-md-9">
										<input type="text" id="product_name" name="product_name" placeholder="Product Name" class="form-control" value="{{ old('product_name') }}">
										@error('product_name')
											<small class="form-text text-muted">{{ $message }}</small>
										@enderror
									</div>
								</div>
								<div class="row form-group @error('product_description') has-error @enderror">
									<div class="col col-md-3">
										<label for="textarea-input" class=" form-control-label">Product Description</label>
									</div>
									<div class="col-12 col-md-9">
										<textarea id="textarea-input" rows="9" placeholder="Description..." class="form-control" name="product_description">{{ old('product_description') }}</textarea>
										@error('product_description')
											<small class="form-text text-muted">{{ $message }}</small>
										@enderror
									</div>
								</div>
								<div class="row form-group @error('product_category') has-error @enderror">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">Product Category</label>
									</div>
									<div class="col-12 col-md-9">
										<input type="text" name="product_category" placeholder="Product Category" class="form-control" value="{{ old('product_category') }}">
										@error('product_category')
											<small class="form-text text-muted">{{ $message }}</small>
										@enderror
									</div>
								</div>
								<div class="row form-group @error('price') has-error @enderror">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">Product Price</label>
									</div>
									<div class="col-12 col-md-9">
										<input type="number" name="price" placeholder="Product Price" class="form-control" value="{{ old('price') }}">
										@error('price')
											<small class="form-text text-muted">{{ $message }}</small>
										@enderror
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
                        <p>Copyright © 2019 This website is made by <a href="https://alpas.com.np">Alpas Technology Pvt. Lmd.</a></p>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection