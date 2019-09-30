@extends('layouts.homepage')
@section('content')
	<!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Add Product</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="contact.html">Add Product</a></li>
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
                    <form class="contact_us_form row" action="{{ route('products.store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-lg-7">
                            <input type="text" class="form-control" name="product_name" placeholder="Product Name *">
                        </div>
                        <div class="form-group col-lg-7">
                            <textarea class="form-control" name="product_description" rows="1" placeholder="Product Description"></textarea>
                        </div>
                        <div class="form-group col-lg-7">
                            <input type="text" class="form-control" name="product_category" placeholder="Product Category">
                        </div>
                        <div class="form-group col-lg-7">
                            <input type="number" class="form-control" name="price" placeholder="Product Price">
                        </div>
                        <div class="form-group col-lg-7">
                            <input type="file" class="form-control" name="image">
                        </div>
                        
                        <div class="form-group col-lg-7">
                            <button type="submit" value="submit" class="btn update_btn form-control">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--================End Product Details =================-->
@endsection