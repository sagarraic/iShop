@extends('layouts.homepage')
@section('content')
	<!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Edit Product</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Add Product</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Product Details =================-->
        <section class="contact_area p_100">
            <div class="container">
                <div class="contact_form_inner">
                    <h3>Add a New Product</h3>
                    <form class="contact_us_form row" action="/products/{{ $product->id }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
	                    @method('PATCH')
						@csrf
                        <div class="form-group col-lg-7">
                            <input type="text" class="form-control" value="{{ $product->product_name }}" name="product_name" placeholder="Product Name *">
                        </div>
                        <div class="form-group col-lg-7">
                            <textarea class="form-control" name="product_description" rows="1" placeholder="Product Description">{{ $product->product_description }}</textarea>
                        </div>
                        <div class="form-group col-lg-7">
                            <input type="text" class="form-control" name="product_category" value="{{ $product->product_category }}" placeholder="Product Category">
                        </div>
                        <div class="form-group col-lg-7">
                            <input type="file" class="form-control" name="image">
                        </div>
                        
                        <div class="form-group col-lg-7">
                            <button type="submit" class="btn update_btn form-control">Update Product</button>
                        </div>
                    </form>

                    <form action="/products/{{ $product->id }}" method="POST">
						@method('DELETE') 
						@csrf
						<div class="form-group col-lg-7">
							<div class="control">
								<button name="submit" class="btn btn-danger">Delete Project</button>
							</div>
						</div>
					</form>
                </div>
            </div>
        </section>
        <!--================End Product Details =================-->
@endsection