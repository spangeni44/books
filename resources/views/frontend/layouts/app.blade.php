<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Leadmagnet Books - Book Store HTML Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('meta')
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('public/frontend1/css/plugins.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('public/frontend1/css/main.css')}}" />
     <link rel="stylesheet" type="text/css" media="screen" href="{{asset('public/frontend/css/main.css')}}" />
     <link type="text/css" href="{{ static_asset('frontend/css/sweetalert2.min.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <!-- Icons -->
<link rel="stylesheet" href="{{ static_asset('frontend/css/font-awesome.min.css') }}" type="text/css" media="none" onload="if(media!='all')media='all'">
<link rel="stylesheet" href="{{ static_asset('frontend/css/line-awesome.min.css') }}" type="text/css" media="none" onload="if(media!='all')media='all'">

    
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend1/image/favicon.ico')}}">
    <style>
        .book_name{white-space: nowrap; overflow: hidden; text-overflow: ellipsis;}
        .btn-anim-primary, .form-control:focus, .sub-cat-featured a:hover, .brands-collapse-box li:hover, .widget-profile-menu a.active, button.paction.add-wishlist:hover, button.paction.add-compare:hover, .all-category-menu ul li.active, .all-category-menu ul li.active:before, .product-gal-thumb a img.xactive, label.payment_option input:checked + span, .link--bb-1, .ribbon.bg-base-1:before, .ribbon.bg-base-1:after, .btn-base-1, .card-hover--animation-1:hover .btn, .delimiter-left-thick--style-1, .checkbox input[type="checkbox"]:checked + label::before, .checkbox input[type="radio"]:checked + label::before, .checkbox-primary input[type="checkbox"]:checked + label::before, .checkbox-primary input[type="radio"]:checked + label::before, .radio-primary input[type="radio"]:checked + label::before, input:checked + .toggle-switch-slider:before, input:checked + .toggle-switch-slider, .checkbox-alphanumeric input:checked ~ label, .checkbox-color input:checked ~ label, a > .feature--boxed-border:hover, .icon-block--style-1-v3 .block-icon, .icon-block--style-1-v5.block-bordered-grid-animated:hover .block-inner::after, .icon-block--style-2-v2.active .block-icon, .icon-block--style-2-v2:hover .block-icon, .icon-block--style-4:hover .block-icon::after, .pagination > .active .page-link, .pagination > .active .page-link:focus, .pagination > .active .page-link:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover, .pricing-plans--style-2 .block-pricing.active .plan-title, .nav-tab-image-wrapper:hover .nav-tab-image, .tabs--style-1 .nav-tabs > li > a.active, .tabs--style-1 .nav-tabs > li:first-child > a.active, .tabs--style-2 .nav-tabs .nav-item.show .nav-link, .tabs--style-2 .nav-tabs .nav-link.active, .tabs--style-2 .nav-tabs .nav-link:hover, .timeline-img, .dropzone, .milestone-counter .milestone-delimiter, .search-widget .form-control:focus, .search-widget--style-5 .form-control:focus, .search-widget--style-5 .form-control:hover, .typeface-palette a.active > .typeface-entry, .typeface-palette a.active:hover > .typeface-entry, .section-title-1 li a.active, .section-title-1 li a:hover, .bg-base-1 .btn-base-1, .product-box-2 .add-to-cart, .seller-shop-menu li.active a, .seller-shop-menu li a:hover, .aiz-megabox>input:checked~.aiz-megabox-elem, .aiz-megabox>input:checked~.aiz-megabox-elem {
    border-color: #e62e04;
}
.btn-anim-primary:before, .bootstrap-tagsinput .label, .logo-bar-icons .nav-search-box .nav-box-number, .logo-bar-icons .nav-compare-box .nav-box-number, .logo-bar-icons .nav-wishlist-box .nav-box-number, .logo-bar-icons .nav-cart-box .nav-box-number, .side-menu-list ul li .badge, .navbar.bg-base-1, .btn-base-1, .vd--1, .vd--2, .checkbox-primary input[type="checkbox"]:checked + label::before, .checkbox-primary input[type="radio"]:checked + label::before, .radio input[type="radio"]:checked + label::after, .radio-primary input[type="radio"] + label::after, .radio-primary input[type="radio"]:checked + label::after, .form-card--style-2 .form-header, .modal[data-modal-color=base-1] .modal-content, .pagination > .active .page-link, .pagination > .active .page-link:focus, .pagination > .active .page-link:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover, .pager .page-item .page-link:focus, .pager .page-item .page-link:hover, .progress-bar, .flatpickr-month, .hamburger.is-active .hamburger-inner:after, .hamburger.is-active .hamburger-inner:before, .noUi-horizontal .noUi-handle, .noUi-vertical .noUi-handle, .input-group-btn-vertical > .btn:hover, #map-zoom-in:hover, #map-zoom-out:hover, .product-box-2 .add-to-cart:hover {
    background-color: #62ab00;
    /*#e62e04;*/
}
.btn-styled {
    padding: 0.6rem 1.5rem;
}
.btn-base-1 {
    color: #FFF;
    border: 1px solid transparent;
}
.btn-styled {
    font-weight: 600;
    letter-spacing: 0;
    text-transform: capitalize;
    padding: 0.75rem 2rem;
}

/*seller and customer dashboard css*/
 .categories--style-3 li:hover{
        background-color:#62ab00 !important;
        z-index:9999;
    }
    .widget-profile-menu a.active:hover{
        background-color:#62ab00 !important;
    }
    .btn-anim-primary:before {
    top: 0;
    height: 100%;
}
.btn-anim-primary:before {
    position: absolute;
    width: 100%;
    content: "";
    left: 0;
    z-index: -1;
    transition: all 0.3s;
    -webkit-transition: all 0.3s;
}
.btn-anim-primary:before, .bootstrap-tagsinput .label, .logo-bar-icons .nav-search-box .nav-box-number, .logo-bar-icons .nav-compare-box .nav-box-number, .logo-bar-icons .nav-wishlist-box .nav-box-number, .logo-bar-icons .nav-cart-box .nav-box-number, .side-menu-list ul li .badge, .navbar.bg-base-1, .btn-base-1, .vd--1, .vd--2, .checkbox-primary input[type="checkbox"]:checked + label::before, .checkbox-primary input[type="radio"]:checked + label::before, .radio input[type="radio"]:checked + label::after, .radio-primary input[type="radio"] + label::after, .radio-primary input[type="radio"]:checked + label::after, .form-card--style-2 .form-header, .modal[data-modal-color=base-1] .modal-content, .pagination > .active .page-link, .pagination > .active .page-link:focus, .pagination > .active .page-link:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover, .pager .page-item .page-link:focus, .pager .page-item .page-link:hover, .progress-bar, .flatpickr-month, .hamburger.is-active .hamburger-inner:after, .hamburger.is-active .hamburger-inner:before, .noUi-horizontal .noUi-handle, .noUi-vertical .noUi-handle, .input-group-btn-vertical > .btn:hover, #map-zoom-in:hover, #map-zoom-out:hover, .product-box-2 .add-to-cart:hover {
     background-color: #62ab00 !important; 
}
.swal2-container{
    z-index:9999 !important; 
}
.swal2-title{
    font-size:14px !important;
}
    </style>
    @yield('style')
</head>

<body>
    <div class="site-wrapper" id="top">
        <!--nav start-->
        <div class="site-header header-2 d-none d-lg-block">
                <div class="header-middle pt--10 pb--10">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <a href="{{route('home')}}" class="site-brand">
                                    <img src="{{asset('public/frontend1/image/logo.png')}}" alt="">
                                </a>
                            </div>
                            <div class="col-lg-5">
                                <div class="header-search-block">
                                    <form action="/search" method="GET" >
                                       
                                        <input type="text" name="q" placeholder="Search entire store here">
                                        <button>Search</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="main-navigation flex-lg-right">
                                    <div class="cart-widget">
                                        
                                        <div class="login-block">
                                             @auth
                                               
                                                    <a href="{{ route('dashboard') }}" class="font-weight-bold">{{ translate('My Panel')}}</a>
                                               
                                                    <a href="{{ route('logout') }}"  class="font-weight-bold">{{ translate('Logout')}}</a>
                                                
                                            @else
                                            <a href="{{route('user.login')}}" class="font-weight-bold">Login</a> <br>
                                            <span>or</span><a href="{{route('user.registration')}}">Register</a>
                                            @endauth
                                        </div>
                                        <div class="cart-block" id="cart_items">
                                            <div class="cart-total">
                                                <span class="text-number" id="nav-cart-count">
                                                   @if(Session::has('cart'))
                                                    {{ count(Session::get('cart'))}}
                                                    @else
                                                       0
                                                    @endif
                                                </span>
                                                <span class="text-item">
                                                    Shopping Cart
                                                </span>
                                                <!--<span class="price">-->
                                                    
                                                <!--    {{ single_price(1) }}-->
                                                <!--    <i class="fas fa-chevron-down"></i>-->
                                                </span>
                                            </div>
                                            <div class="cart-dropdown-block">
                                                 @if(Session::has('cart'))
                                                 @php $total=0; 
                                                 $cart=Session::get('cart');
                                                
                                                 @endphp
                                                 
                                                 @foreach($cart as $key =>$cartItem)
                                                            @php
                                                                $product = \App\Product::find($cartItem['id']);
                                                                
                                                            @endphp
                                                <div class=" single-cart-block ">
                                                    <div class="cart-product">
                                                        <a href="{{ route('product', $product->slug) }}" class="image">
                                                            
                                                            <img src="{{ my_asset($product->thumbnail_img) }}" class="img-fluid lazyload" style="height:80px" alt="{{ __($product->name) }}">
                                                        </a>
                                                        
                                                        <div class="content">
                                                            <h3 class="title"><a href="{{ route('product', $product->slug) }}">{{$product->name}}</a>
                                                            </h3>
                                                            
                                                            <p class="price" style="font-size:13px;"><span class="qty">{{$cartItem['quantity'] }} ×</span> {{ single_price($cartItem['price']) }}={{single_price($cartItem['quantity']*$cartItem['price']) }}</p>
                                                            <button class="cross-btn"><i class="fas fa-times"></i></button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                @endforeach
                                                @endif
                                                <div class=" single-cart-block ">
                                                    <div class="btn-block">
                                                        <a href="{{route('cart')}}" class="btn">View Cart <i
                                                                class="fas fa-chevron-right"></i></a>
                                                        <a href="{{route('checkout.shipping_info')}}" class="btn btn--primary">Check Out <i
                                                                class="fas fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- include menu.htm removed form here-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom bg-primary">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <nav class="category-nav white-nav  ">
                                    <div>
                                        <a href="javascript:void(0)" class="category-trigger"><i
                                                class="fa fa-bars"></i>Browse
                                            categories</a>
                                        <ul class="category-menu">
                                             @foreach (\App\Category::take(11)->get() as $key => $category)
                            
                                            <li class="cat-item @isset(\App\SubCategory::where('category_id',@$category->id)->first()->id) has-children @endisset">
                                                <a href="{{ route('products.category', $category->slug) }}">{{$category->name}}</a>
                                                @isset(\App\SubCategory::where('category_id',@$category->id)->first()->id)
                                                    <ul class="sub-menu">
                                                         @foreach(\App\SubCategory::where('category_id',@$category->id)->get() as $key1=>$subcategory)
                                                            <li><a href="{{ route('products.subcategory', $subcategory->slug) }}">{{$subcategory->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endisset
                                            </li>
                                             @endforeach
                                            
                                            <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
                                                    Categories</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-lg-3">
                                <div class="header-phone color-white">
                                    <div class="icon">
                                        <i class="fas fa-headphones-alt"></i>
                                    </div>
                                    <div class="text">
                                        <p>Free Support 24/7</p>
                                        <p class="font-weight-bold number">+01-202-555-0181</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="main-navigation flex-lg-right">
                                    <ul class="main-menu menu-right main-menu--white li-last-0">
                                        <li class="menu-item has-children">
                                            <a href="{{route('home')}}">Home </a>
                                            
                                        </li>
                                        <!-- Shop -->
                                        <li class="menu-item has-children mega-menu">
                                            <a href="javascript:void(0)">shop <i
                                                    class="fas fa-chevron-down dropdown-arrow"></i></a>
                                            <ul class="sub-menu four-column">
                                                <li class="cus-col-25">
                                                    <h3 class="menu-title"><a href="{{route('b-shop-grid')}}">Shop</a></h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="{{route('b-shop-grid')}}">Fullwidth</a></li>
                                                        <li><a href="shop-grid-left-sidebar.html">left Sidebar</a></li>
                                                        <li><a href="shop-grid-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="cus-col-25">
                                                    <h3 class="menu-title"> <a href="javascript:void(0)">Shop List</a></h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="shop-list.html">Fullwidth</a></li>
                                                        <li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
                                                        <li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="cus-col-25">
                                                    <h3 class="menu-title"> <a href="{{route('b-product-details')}}">Product Details
                                                            1</a></h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="{{route('b-product-details')}}">Product Details Page</a></li>
                                                        <li><a href="product-details-affiliate.html">Product Details
                                                                Affiliate</a></li>
                                                        <li><a href="product-details-group.html">Product Details Group</a>
                                                        </li>
                                                        <li><a href="product-details-variable.html">Product Details
                                                                Variables</a></li>
                                                    </ul>
                                                </li>
                                                <li class="cus-col-25">
                                                    <h3 class="menu-title"><a href="javascript:void(0)">Product Details
                                                            2</a></h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
                                                        </li>
                                                        <li><a href="product-details-right-thumbnail.html">Right
                                                                Thumbnail</a></li>
                                                        <li><a href="product-details-left-gallery.html">Left Gallery</a>
                                                        </li>
                                                        <li><a href="product-details-right-gallery.html">Right Gallery</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- Pages -->
                                        <li class="menu-item has-children">
                                            <a href="javascript:void(0)">Pages <i
                                                    class="fas fa-chevron-down dropdown-arrow"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('b-cart')}}">Cart</a></li>
                                                <li><a href="{{route('b-checkout')}}">Checkout</a></li>
                                                <li><a href="{{route('b-compare')}}">Compare</a></li>
                                                <li><a href="{{route('b-wishlist')}}">Wishlist</a></li>
                                                <li><a href="{{route('b-login-register')}}">Login Register</a></li>
                                                <li><a href="{{route('b-my-account')}}">My Account</a></li>
                                                <li><a href="{{route('b-order-complete')}}">Order Complete</a></li>
                                                <li><a href="{{route('b-faq')}}">Faq</a></li>
                                                <li><a href="contact-2.html">contact 02</a></li>
                                            </ul>
                                        </li>
                                        <!-- Blog -->
                                        <li class="menu-item">
                                            <a href="{{route('blogs')}}">Blogs </a>
                                            
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{route('b-contact')}}">Contact</a>
                                        </li>
                                        <li class="menu-item" style="background-color:#bd0018;">
                                            <a href="{{ route('shops.create') }}" style="font-size:13px;">Become a Seller</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-mobile-menu">
                <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                    <div class="container">
                        <div class="row align-items-sm-end align-items-center">
                            <div class="col-md-4 col-7">
                                <a href="{{route('home')}}" class="site-brand">
                                    <img src="{{asset('public/frontend1/image/logo.png')}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-5 order-3 order-md-2">
                                <nav class="category-nav   ">
                                    <div>
                                        <a href="javascript:void(0)" class="category-trigger"><i
                                                class="fa fa-bars"></i>Browse
                                            categories</a>
                                        <ul class="category-menu">
                                            <li class="cat-item has-children">
                                                <a href="#">Arts & Photography</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Bags & Cases</a></li>
                                                    <li><a href="#">Binoculars & Scopes</a></li>
                                                    <li><a href="#">Digital Cameras</a></li>
                                                    <li><a href="#">Film Photography</a></li>
                                                    <li><a href="#">Lighting & Studio</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children mega-menu"><a href="#">Biographies</a>
                                                <ul class="sub-menu">
                                                    <li class="single-block">
                                                        <h3 class="title">WHEEL SIMULATORS</h3>
                                                        <ul>
                                                            <li><a href="#">Bags & Cases</a></li>
                                                            <li><a href="#">Binoculars & Scopes</a></li>
                                                            <li><a href="#">Digital Cameras</a></li>
                                                            <li><a href="#">Film Photography</a></li>
                                                            <li><a href="#">Lighting & Studio</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="single-block">
                                                        <h3 class="title">WHEEL SIMULATORS</h3>
                                                        <ul>
                                                            <li><a href="#">Bags & Cases</a></li>
                                                            <li><a href="#">Binoculars & Scopes</a></li>
                                                            <li><a href="#">Digital Cameras</a></li>
                                                            <li><a href="#">Film Photography</a></li>
                                                            <li><a href="#">Lighting & Studio</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="single-block">
                                                        <h3 class="title">WHEEL SIMULATORS</h3>
                                                        <ul>
                                                            <li><a href="#">Bags & Cases</a></li>
                                                            <li><a href="#">Binoculars & Scopes</a></li>
                                                            <li><a href="#">Digital Cameras</a></li>
                                                            <li><a href="#">Film Photography</a></li>
                                                            <li><a href="#">Lighting & Studio</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="single-block">
                                                        <h3 class="title">WHEEL SIMULATORS</h3>
                                                        <ul>
                                                            <li><a href="#">Bags & Cases</a></li>
                                                            <li><a href="#">Binoculars & Scopes</a></li>
                                                            <li><a href="#">Digital Cameras</a></li>
                                                            <li><a href="#">Film Photography</a></li>
                                                            <li><a href="#">Lighting & Studio</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Business & Money</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Brake Tools</a></li>
                                                    <li><a href="#">Driveshafts</a></li>
                                                    <li><a href="#">Emergency Brake</a></li>
                                                    <li><a href="#">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Calendars</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Brake Tools</a></li>
                                                    <li><a href="#">Driveshafts</a></li>
                                                    <li><a href="#">Emergency Brake</a></li>
                                                    <li><a href="#">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Children's Books</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Brake Tools</a></li>
                                                    <li><a href="#">Driveshafts</a></li>
                                                    <li><a href="#">Emergency Brake</a></li>
                                                    <li><a href="#">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Comics</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Brake Tools</a></li>
                                                    <li><a href="#">Driveshafts</a></li>
                                                    <li><a href="#">Emergency Brake</a></li>
                                                    <li><a href="#">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item"><a href="#">Perfomance Filters</a></li>
                                            <li class="cat-item has-children"><a href="#">Cookbooks</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Brake Tools</a></li>
                                                    <li><a href="#">Driveshafts</a></li>
                                                    <li><a href="#">Emergency Brake</a></li>
                                                    <li><a href="#">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item "><a href="#">Accessories</a></li>
                                            <li class="cat-item "><a href="#">Education</a></li>
                                            <li class="cat-item hidden-menu-item"><a href="#">Indoor Living</a></li>
                                            <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
                                                    Categories</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-md-3 col-5  order-md-3 text-right">
                                <div class="mobile-header-btns header-top-widget">
                                    <ul class="header-links">
                                        <li class="sin-link">
                                            <a href="{{route('b-cart')}}" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                        </li>
                                        <li class="sin-link">
                                            <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                                    class="ion-navicon"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!--Off Canvas Navigation Start-->
                <aside class="off-canvas-wrapper">
                    <div class="btn-close-off-canvas">
                        <i class="ion-android-close"></i>
                    </div>
                    <div class="off-canvas-inner">
                        <!-- search box start -->
                        <div class="search-box offcanvas">
                            <form>
                                <input type="text" placeholder="Search Here">
                                <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <!-- search box end -->
                        <!-- mobile menu start -->
                        <div class="mobile-navigation">
                            <!-- mobile menu navigation start -->
                            <nav class="off-canvas-nav">
                                <ul class="mobile-menu main-mobile-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">Home</a>
                                        <ul class="sub-menu">
                                            <li> <a href="{{route('home')}}">Home</a></li>
                                           
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{route('blogs')}}">Blog</a>
                                       
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children">
                                                <a href="#">Shop Grid</a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('b-shop-grid')}}">Fullwidth</a></li>
                                                    <li><a href="shop-grid-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="shop-grid-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Shop List</a>
                                                <ul class="sub-menu">
                                                    <li><a href="shop-list.html">Fullwidth</a></li>
                                                    <li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Product Details 1</a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('b-product-details')}}">Product Details Page</a></li>
                                                    <li><a href="product-details-affiliate.html">Product Details
                                                            Affiliate</a></li>
                                                    <li><a href="product-details-group.html">Product Details Group</a></li>
                                                    <li><a href="product-details-variable.html">Product Details
                                                            Variables</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Product Details 2</a>
                                                <ul class="sub-menu">
                                                    <li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
                                                    </li>
                                                    <li><a href="product-details-right-thumbnail.html">Right Thumbnail</a>
                                                    </li>
                                                    <li><a href="product-details-left-gallery.html">Left Gallery</a></li>
                                                    <li><a href="product-details-right-gallery.html">Right Gallery</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('cart')}}">Cart</a></li>
                                            <li><a href="{{route('b-checkout')}}">Checkout</a></li>
                                            <li><a href="{{route('b-compare')}}">Compare</a></li>
                                            <li><a href="{{route('b-wishlist')}}">Wishlist</a></li>
                                            <li><a href="{{route('b-login-register')}}">Login Register</a></li>
                                            <li><a href="{{route('b-my-account')}}">My Account</a></li>
                                            <li><a href="{{route('b-order-complete')}}">Order Complete</a></li>
                                            <li><a href="{{route('b-faq')}}">Faq</a></li>
                                            <li><a href="contact-2.html">contact 02</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('b-contact')}}">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu menu-block-2">
                                <li class="menu-item-has-children">
                                    <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li> <a href="{{route('b-cart')}}">USD $</a></li>
                                        <li> <a href="{{route('b-checkout')}}">EUR €</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Lang - Eng<i class="fas fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li>Eng</li>
                                        <li>Ban</li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Transactions</a></li>
                                        <li><a href="#">Downloads</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="off-canvas-bottom">
                            <div class="contact-list mb--10">
                                <a href="#" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                                <a href="#" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                            </div>
                            <div class="off-canvas-social">
                                <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </aside>
                <!--Off Canvas Navigation End-->
            </div>
            <div class="sticky-init fixed-header common-sticky">
                <div class="container d-none d-lg-block">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <a href="{{route('home')}}" class="site-brand">
                                <img src="{{asset('public/frontend1/image/logo.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-8">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right ">
                                    <li class="menu-item has-children">
                                        <a href="javascript:void(0)">Home <i
                                                class="fas fa-chevron-down dropdown-arrow"></i></a>
                                        <ul class="sub-menu">
                                            <li> <a href="{{route('home')}}">Home</a></li>
                                           
                                        </ul>
                                    </li>
                                    <!-- Shop -->
                                    <li class="menu-item has-children mega-menu">
                                        <a href="javascript:void(0)">shop <i
                                                class="fas fa-chevron-down dropdown-arrow"></i></a>
                                        <ul class="sub-menu four-column">
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"><a href="javascript:void(0)">Shop Grid </a></h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="{{route('b-shop-grid')}}">Fullwidth</a></li>
                                                    <li><a href="shop-grid-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="shop-grid-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"> <a href="javascript:void(0)">Shop List</a></h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="shop-list.html">Fullwidth</a></li>
                                                    <li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"> <a href="javascript:void(0)">Product Details 1</a>
                                                </h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="{{route('b-product-details')}}">Product Details Page</a></li>
                                                    <li><a href="product-details-affiliate.html">Product Details
                                                            Affiliate</a></li>
                                                    <li><a href="product-details-group.html">Product Details Group</a></li>
                                                    <li><a href="product-details-variable.html">Product Details
                                                            Variables</a></li>
                                                </ul>
                                            </li>
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"><a href="javascript:void(0)">Product Details 2</a>
                                                </h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
                                                    </li>
                                                    <li><a href="product-details-right-thumbnail.html">Right Thumbnail</a>
                                                    </li>
                                                    <li><a href="product-details-left-gallery.html">Left Gallery</a></li>
                                                    <li><a href="product-details-right-gallery.html">Right Gallery</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Pages -->
                                    <li class="menu-item has-children">
                                        <a href="javascript:void(0)">Pages <i
                                                class="fas fa-chevron-down dropdown-arrow"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('b-cart')}}">Cart</a></li>
                                            <li><a href="{{route('b-checkout')}}">Checkout</a></li>
                                            <li><a href="{{route('b-compare')}}">Compare</a></li>
                                            <li><a href="{{route('b-wishlist')}}">Wishlist</a></li>
                                            <li><a href="{{route('b-login-register')}}">Login Register</a></li>
                                            <li><a href="{{route('b-my-account')}}">My Account</a></li>
                                            <li><a href="{{route('b-order-complete')}}">Order Complete</a></li>
                                            <li><a href="{{route('b-faq')}}">Faq</a></li>
                                            <li><a href="contact-2.html">contact 02</a></li>
                                        </ul>
                                    </li>
                                    <!-- Blog -->
                                    <li class="menu-item has-children mega-menu">
                                        <a href="javascript:void(0)">Blogs <i
                                                class="fas fa-chevron-down dropdown-arrow"></i></a>
                                       
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('b-contact')}}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--nav ends -->
        @yield('content')
        <!--modal starts -->
            <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
                aria-labelledby="quickModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="product-details-modal">
                            <div class="row">
                                <div class="col-lg-5">
                                    <!-- Product Details Slider Big Image-->
                                    <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
                  "slidesToShow": 1,
                  "arrows": false,
                  "fade": true,
                  "draggable": false,
                  "swipe": false,
                  "asNavFor": ".product-slider-nav"
                  }'>
                                        <div class="single-slide">
                                            <img src="{{asset('public/frontend1/image/products/product-details-1.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('public/frontend1/image/products/product-details-2.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('public/frontend1/image/products/product-details-3.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('public/frontend1/image/products/product-details-4.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('public/frontend1/image/products/product-details-5.jpg')}}" alt="">
                                        </div>
                                    </div>
                                    <!-- Product Details Slider Nav -->
                                    <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
                                        data-slick-setting='{
                "infinite":true,
                  "autoplay": true,
                  "autoplaySpeed": 8000,
                  "slidesToShow": 4,
                  "arrows": true,
                  "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                  "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
                  "asNavFor": ".product-details-slider",
                  "focusOnSelect": true
                  }'>
                                        <div class="single-slide">
                                            <img src="{{asset('public/frontend1/image/products/product-details-1.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('public/frontend1/image/products/product-details-2.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('public/frontend1/image/products/product-details-3.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('public/frontend1/image/products/product-details-4.jpg')}}" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="{{asset('public/frontend1/image/products/product-details-5.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 mt--30 mt-lg--30">
                                    <div class="product-details-info pl-lg--30 ">
                                        <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
                                        <h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
                                        <ul class="list-unstyled">
                                            <li>Ex Tax: <span class="list-value"> £60.24</span></li>
                                            <li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a></li>
                                            <li>Product Code: <span class="list-value"> model1</span></li>
                                            <li>Reward Points: <span class="list-value"> 200</span></li>
                                            <li>Availability: <span class="list-value"> In Stock</span></li>
                                        </ul>
                                        <div class="price-block">
                                            <span class="price-new">£73.79</span>
                                            <del class="price-old">£91.86</del>
                                        </div>
                                        <div class="rating-widget">
                                            <div class="rating-block">
                                                <span class="fas fa-star star_on"></span>
                                                <span class="fas fa-star star_on"></span>
                                                <span class="fas fa-star star_on"></span>
                                                <span class="fas fa-star star_on"></span>
                                                <span class="fas fa-star "></span>
                                            </div>
                                            <div class="review-widget">
                                                <a href="#">(1 Reviews)</a> <span>|</span>
                                                <a href="#">Write a review</a>
                                            </div>
                                        </div>
                                        <article class="product-details-article">
                                            <h4 class="sr-only">Product Summery</h4>
                                            <p>Long printed dress with thin adjustable straps. V-neckline and wiring under
                                                the Dust with ruffles
                                                at the bottom
                                                of the
                                                dress.</p>
                                        </article>
                                        <div class="add-to-cart-row">
                                            <div class="count-input-block">
                                                <span class="widget-label">Qty</span>
                                                <input type="number" class="form-control text-center" value="1">
                                            </div>
                                            <div class="add-cart-btn">
                                                <a href="#" class="btn btn-outlined--primary"><span
                                                        class="plus-icon">+</span>Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="compare-wishlist-row">
                                            <a href="#" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                                            <a href="#" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="widget-social-share">
                                <span class="widget-label">Share:</span>
                                <div class="modal-social-share">
                                    <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                                    <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- sitewrapper top ends -->
    <!--modal ends -->

    <!--footer starts -->
        <!--=================================
        Footer Area
        ===================================== -->
    <footer class="site-footer">
        <div class="container">
            <div class="row justify-content-between  section-padding">
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="brand-footer footer-title">
                            <img src="{{asset('public/frontend1/image/logo--footer.png')}}" alt="">
                        </div>
                        <div class="footer-contact">
                            <p><span class="label">Address:</span><span class="text">Example Street 98, HH2 BacHa, New
                                    York,
                                    USA</span></p>
                            <p><span class="label">Phone:</span><span class="text">+18088 234 5678</span></p>
                            <p><span class="label">Email:</span><span class="text">suport@hastech.com</span></p>
                        </div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Information</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="#">Prices drop</a></li>
                            <li><a href="#">New products</a></li>
                            <li><a href="#">Best sales</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Extras</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="#">Delivery</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Stores</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h3>Newsletter Subscribe</h3>
                    </div>
                    <div class="newsletter-form mb--30">
                        <form action="">
                            <input type="email" class="form-control" placeholder="Enter Your Email Address Here...">
                            <button class="btn btn--primary w-100">Subscribe</button>
                        </form>
                    </div>
                    <div class="social-block">
                        <h3 class="title">STAY CONNECTED</h3>
                        <ul class="social-list list-inline">
                            <li class="single-social facebook"><a href="#"><i class="ion ion-social-facebook"></i></a>
                            </li>
                            <li class="single-social twitter"><a href="#"><i class="ion ion-social-twitter"></i></a></li>
                            <li class="single-social google"><a href="#"><i
                                        class="ion ion-social-googleplus-outline"></i></a></li>
                            <li class="single-social youtube"><a href="#"><i class="ion ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p class="copyright-heading">Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam
                    vel
                    magna volutpat, posuere eros</p>
                <a href="#" class="payment-block">
                    <img src="{{asset('public/frontend1/image/icon/payment.png')}}" alt="">
                </a>
                <p class="copyright-text">Copyright © {{date('Y')}} <a href="#" class="author">Leadmagn Books</a>. All Right Reserved.
                    <br>
                    Developed By Aiextech</p>
            </div>
        </div>
    </footer>
    <!-- <a class="top-link hide" href="" id="js-top">-->
      <!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 6"><path d="M12 6H0l6-6z"/></svg>-->
      <!--<span class="screen-reader-text">-->
    <!--      <img id='top-link-img' src="{{asset('public/img/back-to-top.png')}}" style="height:50px;">-->
           
         
    <!--</a>-->
    <script src="{{asset('public/frontend1/js/plugins.js')}}"></script>
    <script src="{{asset('public/frontend1/js/ajax-mail.js')}}"></script>
    <script src="{{ static_asset('frontend/js/sweetalert2.min.js') }}"></script>
    <script src="{{asset('public/frontend1/js/custom.js')}}"></script>
     <!--footer ends -->
     <script>
   
    function showFrontendAlert(type, message){
        if(type == 'danger'){
            type = 'error';
        }
        swal({
            position: 'top-end',
            type: type,
            title: message,
            showConfirmButton: false,
            timer: 3000
        });
    }

         function updateNavCart(){
        $.post('{{ route('cart.nav_cart') }}', {_token:'{{ csrf_token() }}'}, function(data){
            $('#cart_items').html(data);
        });
    }

    function removeFromCart(key){
        $.post('{{ route('cart.removeFromCart') }}', {_token:'{{ csrf_token() }}', key:key}, function(data){
            updateNavCart();
            $('#cart-summary').html(data);
            showFrontendAlert('success', 'Item has been removed from cart');
            $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);
        });
    }

    function addToCompare(id){
        $.post('{{ route('compare.addToCompare') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
            $('#compare').html(data);
            showFrontendAlert('success', "{{ translate('Item has been added to compare list') }}");
            $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);
        });
    }

    function addToWishList(id){
        @if (Auth::check() && (Auth::user()->user_type == 'customer' || Auth::user()->user_type == 'seller'))
            $.post('{{ route('wishlists.store') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
                if(data != 0){
                    $('#wishlist').html(data);
                    showFrontendAlert('success', "{{ translate('Item has been added to wishlist') }}");
                }
                else{
                    showFrontendAlert('warning', "{{ translate('Please login first') }}");
                }
            });
        @else
            showFrontendAlert('warning', "{{ translate('Please login first') }}");
        @endif
    }

    function showAddToCartModal(id){
        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }
        $('#addToCart-modal-body').html(null);
        $('#addToCart').modal();
        $('.c-preloader').show();
        $.post("{{ route('cart.showCartModal') }}", {_token:'{{ csrf_token() }}', id:id}, function(data){
            $('.c-preloader').hide();
            $('#addToCart-modal-body').html(data);
            $('.xzoom, .xzoom-gallery').xzoom({
                Xoffset: 20,
                bg: true,
                tint: '#000',
                defaultScale: -1
            });
            getVariantPrice();
        });
    }

    $('#option-choice-form input,select').on('change', function(){
        getVariantPrice();
    });
    
   

    function getVariantPrice(){
        if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity() ){
            $.ajax({
               type:"POST",
               url: '{{ route('products.variant_price') }}',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){
                   $('#option-choice-form #chosen_price_div').removeClass('d-none');
                   $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                   $('#option-choice-form #delivery_charge_div ').removeClass('d-none');
                   $('#option-choice-form #delivery_charge_div #delivery_charge').html(data.delivery_charge);
                   $('#available-quantity').html(data.quantity);
                   $('.input-number').prop('max', data.quantity);
                   //console.log(data.quantity);
                   if(parseInt(data.quantity) < 1 && data.digital  != 1){
                       $('.buy-now').hide();
                       $('.add-to-cart').hide();
                   }
                   else{
                       $('.buy-now').show();
                       $('.add-to-cart').show();
                   }
               }
           });
        }
    }
    
    function checkAddToCartValidity(){
        var names = {};
        $('#option-choice-form input:radio').each(function() { // find unique names
              names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function() { // then count them
              count++;
        });

        if($('#option-choice-form input:radio:checked').length == count){
            return true;
        }

        return false;
    }

    function addToCart(id=null){
        if(checkAddToCartValidity()) {
            $('#addToCart').modal();
            $('.c-preloader').show();
            if(id!=null){
            var inputs={'_token':'{{csrf_token()}}','id':id,'quantity':1};
            }else{
              var  inputs=$('#option-choice-form').serialize();
            }
            
            $.ajax({
               type:"POST",
               url: '{{ route('cart.addToCart') }}',
               
               data: inputs,
               success: function(data){
                   console.log(data);
                   $('#addToCart-modal-body').html(null);
                   $('.c-preloader').hide();
                   $('#modal-size').removeClass('modal-lg');
                   $('#addToCart-modal-body').html(data);
                   updateNavCart();
                   $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
                   $("#nav-cart-count").html(parseInt($('#nav-cart-count').html()+1));
                   showFrontendAlert('success', 'Item Added to cart');
               }
           });
        }
        else{
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }

    function buyNow(){
        if(checkAddToCartValidity()) {
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.ajax({
               type:"POST",
               url: '{{ route('cart.addToCart') }}',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){
                   console.log(data);
                   updateNavCart();
                   $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
                   window.location.replace("{{ route('cart') }}");
               }
           });
        }
        else{
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }

    function show_purchase_history_details(order_id)
    {
        $('#order-details-modal-body').html(null);

        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }

        $.post('{{ route('purchase_history.details') }}', { _token : '{{ @csrf_token() }}', order_id : order_id}, function(data){
            $('#order-details-modal-body').html(data);
            $('#order_details').modal();
            $('.c-preloader').hide();
        });
    }

    function show_order_details(order_id)
    {
        $('#order-details-modal-body').html(null);

        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }

        $.post('{{ route('orders.details') }}', { _token : '{{ @csrf_token() }}', order_id : order_id}, function(data){
            $('#order-details-modal-body').html(data);
            $('#order_details').modal();
            $('.c-preloader').hide();
        });
    }

    function cartQuantityInitialize(){
        $('.btn-number').click(function(e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function() {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function() {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }

     function imageInputInitialize(){
         $('.custom-input-file').each(function() {
             var $input = $(this),
                 $label = $input.next('label'),
                 labelVal = $label.html();

             $input.on('change', function(e) {
                 var fileName = '';

                 if (this.files && this.files.length > 1)
                     fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                 else if (e.target.value)
                     fileName = e.target.value.split('\\').pop();

                 if (fileName)
                     $label.find('span').html(fileName);
                 else
                     $label.html(labelVal);
             });

             // Firefox bug fix
             $input
                 .on('focus', function() {
                     $input.addClass('has-focus');
                 })
                 .on('blur', function() {
                     $input.removeClass('has-focus');
                 });
         });
     }
    
     
     
    function showQuickView(slug){
	
    var slug = slug;
   
    var url = '/quickview-ajax?slug='+slug;
    $.ajax({
        type: "GET",
        url: url,
        data: {'slug': slug},
    //    dataType:'json',
        success: function (data) {
        console.log(data);
        
        
        $("#quickModal").attr("tabindex",-1).focus();
         $('#quickModal').empty();
        $('#quickModal').append(data);
        $('#quickModal').removeClass('fade');
        $('#quickModal').addClass('show');
        $('#quickModal').removeAttr('hidden');
        $('body').addClass('modal-open');
        },

        error: function (data){
            alert('error');
            console.log('Error:', data);
        }
    });
}

function hideQuickView(){
    $('#quickModal').empty();
    $('#quickModal').removeClass('show');
    $('#quickModal').addClass('fade');
    // $('#quickModal').attr('hidden','true');
     $('body').removeClass('modal-open');
}
     
     </script>
    
     @yield('script')
</body>
</html>
   
    
    