@extends('layouts.homepage')
@section('content')

	<!--================Categories Banner Area =================-->
        <section class="categories_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>My products List</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li class="current"><a href="#">My products</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Categories Product Area =================-->
        <section class="categories_product_main p_80">
            <div class="container">
                <div class="categories_main_inner">
                    <div class="row row_disable">
                        <div class="col-lg-9 float-md-right">
                            <div class="showing_fillter">
                                <div class="row m0">
                                    <div class="first_fillter">
                                        <h4>Showing 1 to 12 of 30 total</h4>
                                    </div>
                                    <div class="secand_fillter">
                                        <h4>SORT BY :</h4>
                                        <select class="selectpicker">
                                            <option>Name</option>
                                            <option>Name 2</option>
                                        </select>
                                    </div>
                                    <div class="third_fillter">
                                        <h4>Show : </h4>
                                        <select class="selectpicker">
                                            <option>09</option>
                                            <option>10</option>
                                            <option>10</option>
                                        </select>
                                    </div>
                                    <div class="four_fillter">
                                        <h4>View</h4>
                                        <a class="active" href="#"><i class="icon_grid-2x2"></i></a>
                                        <a href="#"><i class="icon_grid-3x3"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="c_product_grid_details">

                                
                                <div class="c_product_item">
                                    @foreach ($product as $product)
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="c_product_img">
                                                <img style="height: 315px; width: 315px;" class="img-fluid" src="{{ $product->image_url }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6">
                                            <div class="c_product_text">
                                                <h3>{{ $product->product_name }}</h3>
                                                <h5>Rs. {{ $product->price }}</h5>
                                                <ul class="product_rating">
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                                <h6>Available In <span>Stock</span></h6>
                                                <p>{{ $product->product_description }}</p>
                                                <ul class="c_product_btn">
                                                    <li class="p_icon"><a href="/products/{{ $product->id }}"><i class="icon_search"></i></a></li>
                                                    <li><a class="add_cart_btn" href="/products/{{ $product->id }}/edit">Edit</a></li>
                                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                                </ul><br>
                                                <form action="/products/{{ $product->id }}" method="POST">
                                                @method('DELETE') 
                                                @csrf
                                                <ul class="c_product_btn">
                                                    <li><button type="submit" class="add_cart_btn">Delete Project</button></li>
                                                </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div><br>
                                    @endforeach
                                </div>
                                
                                
                                <nav aria-label="Page navigation example" class="pagination_area">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                        <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 float-md-right">
                            <div class="categories_sidebar">
                                <aside class="l_widgest l_p_categories_widget">
                                    <div class="l_w_title">
                                        <h3>Categories</h3>
                                    </div>
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Men’s Fashion
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Women’s Fashion
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li class="nav-item"><a class="nav-link" href="#">Hoodies & Sweatshirts</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Jackets & Coats</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Blouses & Shirts</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Phone & Accessories
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link disabled" href="#">All Categories
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_fillter_widget">
                                    <div class="l_w_title">
                                        <h3>Filter section</h3>
                                    </div>
                                    <div id="slider-range" class="ui_slider"></div>
                                    <label for="amount">Price:</label>
                                    <input type="text" id="amount" readonly>
                                </aside>
                                <aside class="l_widgest l_color_widget">
                                    <div class="l_w_title">
                                        <h3>Color</h3>
                                    </div>
                                    <ul>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_menufacture_widget">
                                    <div class="l_w_title">
                                        <h3>Manufacturer</h3>
                                    </div>
                                    <ul>
                                        <li><a href="#">Nigel Cabourn.</a></li>
                                        <li><a href="#">Cacharel.</a></li>
                                        <li><a href="#">Calibre (Menswear)</a></li>
                                        <li><a href="#">Calvin Klein.</a></li>
                                        <li><a href="#">Camilla and Marc</a></li>
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_feature_widget">
                                    <div class="l_w_title">
                                        <h3>Featured Products</h3>
                                    </div>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="/user/images/product/featured-product/f-p-5.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Jeans with <br /> Frayed Hems</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->

@endsection
