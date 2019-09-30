<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="/user/images/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>iShop</title>
        <!-- Icon css link -->
        <link href="/user/css/font-awesome.min.css" rel="stylesheet">
        <link href="/user/vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="/user/vendors/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="/user/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="/user/vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="/user/vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="/user/vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="/user/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="/user/vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        
        <link href="/user/css/style.css" rel="stylesheet">
        <link href="/user/css/responsive.css" rel="stylesheet">
        
    </head>
    <body>
        
        <!--================Top Header Area =================-->
        <div class="header_top_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="top_header_left">
                            <div class="selector">
                                <select class="language_drop" name="countries" id="countries" style="width:300px;">
                                    <option value='yt' data-image="/user/images/icon/flag-1.png" data-imagecss="flag yt" data-title="English">English</option>
                                    <option value='yu' data-image="/user/images/icon/flag-2.png" data-imagecss="flag yu" data-title="Nepali">Nepali</option>
                                </select>
                            </div>
                            <select class="selectpicker usd_select">
                                <option>NPR</option>
                                <option>USD</option>
                            </select>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button"><i class="icon-magnifier"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="top_header_middle">
                            <a href="#"><i class="fa fa-user"></i> Welcome <span>{{ auth()->user()->fname }}</span></a>
                            <a href="#"><i class="fa fa-envelope"></i> Email: <span>{{ auth()->user()->email }}</span></a>
                            <img src="/user/images/logo.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="top_right_header">
                            <ul class="header_social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                            <ul class="top_right">
                                <li class="user"><a href="#"><i class="icon-user icons"></i></a></li>
                                <li class="cart"><a href="#"><i class="icon-handbag icons"></i></a></li>
                                <li class="user"><a href="{{ route('logout')}}"><i class="icon-logout icons"></i></a></li>
                                
                            </ul>
                            <ul class="top_right">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Top Header Area =================-->
        
        <!--================Menu Area =================-->
        <header class="shop_header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><img src="/user/images/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav categories">
                            <li class="nav-item">
                                <select class="selectpicker">
                                    <option>Categories</option>
                                    <option>Categories 2</option>
                                    <option>Categories 3</option>
                                </select>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown submenu active">
                                <a class="nav-link dropdown-toggle" href="{{ route('homepage') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Home </a>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pages <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    {{-- @foreach ($products as $products) --}}
                                    <li class="nav-item"><a class="nav-link" href="{{ route('products.showAll') }}">All Product List</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{-- /products/{{ $products->id }} --}}">My Products </a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('products.create') }}">Add Product</a></li>
                                    {{-- @endforeach --}}
                                    
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--================End Menu Area =================-->
        
        @yield('content');
        
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
            <div class="container">
                <div class="footer_widgets">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-6">
                            <aside class="f_widget f_about_widget">
                                <img src="/user/images/logo.png" alt="">
                                <p>iShop is a online shopping platform for all user. Best choice for your online store. Let purchase it to enjoy now</p>
                                <h6>Social:</h6>
                                <ul>
                                    <li><a href="#"><i class="social_facebook"></i></a></li>
                                    <li><a href="#"><i class="social_twitter"></i></a></li>
                                    <li><a href="#"><i class="social_pinterest"></i></a></li>
                                    <li><a href="#"><i class="social_instagram"></i></a></li>
                                    <li><a href="#"><i class="social_youtube"></i></a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_info_widget">
                                <div class="f_w_title">
                                    <h3>Information</h3>
                                </div>
                                <ul>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Delivery information</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Help Center</a></li>
                                    <li><a href="#">Returns & Refunds</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_service_widget">
                                <div class="f_w_title">
                                    <h3>Customer Service</h3>
                                </div>
                                <ul>
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Ordr History</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_extra_widget">
                                <div class="f_w_title">
                                    <h3>Extras</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Brands</a></li>
                                    <li><a href="#">Gift Vouchers</a></li>
                                    <li><a href="#">Affiliates</a></li>
                                    <li><a href="#">Specials</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_account_widget">
                                <div class="f_w_title">
                                    <h3>My Account</h3>
                                </div>
                                <ul>
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Ordr History</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="footer_copyright">
                    Copyright &copy;<?php echo date('Y'); ?> The website is made by <a href="https://alpastechnology.com" target="_blank" style="color:#f96d15;">Alpas Technology</a> <i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </h5>
                </div>
            </div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/user/js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/user/js/popper.min.js"></script>
        <script src="/user/js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="/user/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="/user/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="/user/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="/user/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="/user/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="/user/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="/user/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="/user/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="/user/vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="/user/vendors/counterup/jquery.counterup.min.js"></script>
        <script src="/user/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="/user/vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
        <script src="/user/vendors/image-dropdown/jquery.dd.min.js"></script>
        <script src="/user/js/smoothscroll.js"></script>
        <script src="/user/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="/user/vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="/user/vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="/user/vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
        <script src="/user/vendors/jquery-ui/jquery-ui.js"></script>
        
        <script src="/user/js/theme.js"></script>
    </body>
</html>