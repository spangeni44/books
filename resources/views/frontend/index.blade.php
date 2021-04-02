@extends('frontend.layouts.app')
@section('content')
<section class="hero-area hero-slider-3">
            <div class="sb-slick-slider" data-slick-setting='{
                                                        "autoplay": true,
                                                        "autoplaySpeed": 8000,
                                                        "slidesToShow": 1,
                                                        "dots":true
                                                        }'>
                @foreach($sliders as $slider)
                <div class="single-slide bg-image  bg-overlay--dark" data-bg="{{my_asset($slider->photo)}}">
                    <div class="container">
                        <div class="home-content text-center">
                            <div class="row justify-content-end">
                                <div class="col-lg-6">
                                    <h1>Beautifully Designed</h1>
                                    <h2>Cover up front of book and
                                        <br>leave summary</h2>
                                    <a href="shop-grid.html" class="btn btn--yellow">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </section>
        <!--=================================
        Home Category Gallery
    ===================================== -->
        <section class="pt--30 section-margin">
            <h2 class="sr-only">Category Gallery Section</h2>
            <div class="container">
                <div class="category-gallery-block">
                    <a href="#" class="single-block hr-large">
                        <img src="{{my_asset('frontend1/image/others/cat-gal-large.png')}}" alt="">
                    </a>
                    <div class="single-block inner-block-wrapper">
                        <a href="#" class="single-image mid-image">
                            <img src="{{my_asset('frontend1/image/others/cat-gal-mid.png')}}" alt="">
                        </a>
                        <a href="#" class="single-image small-image">
                            <img src="{{my_asset('frontend1/image/others/cat-gal-small.png')}}" alt="">
                        </a>
                        <a href="#" class="single-image small-image">
                            <img src="{{my_asset('frontend1/image/others/cat-gal-small-2.jpg')}}" alt="">
                        </a>
                        <a href="#" class="single-image mid-image">
                            <img src="{{my_asset('frontend1/image/others/cat-gal-mid-2.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
@foreach (\App\HomeCategory::where('status', 1)->get() as $key => $homeCategory)
    
@if($homeCategory->category != null)
       <!--=================================
    E BOOKS
===================================== -->
         <section class="section-margin">
            <div class="container">
                <div class="section-title section-title--bordered">
                    <h2>{{ translate($homeCategory->category->name) }}</h2>
                </div>
                <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 8000,
                        "slidesToShow": 5,
                        "dots":true
                    }' data-slick-responsive='[
                        {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>
                    @foreach (filter_products(\App\Product::where('published', 1)->where('category_id', $homeCategory->category->id))->latest()->limit(12)->get() as $key => $product)
                    <div class="single-slide">
                        <div class="product-card">
                            <div class="product-header">
                                <a href="#" class="author">
                                   {{@$product->author_name}}
                                </a>
                                <h3 class="book_name" ><a href="{{ route('product', $product->slug) }}">{{@$product->name}}</a></h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image" style="margin-left:10%; margin-right:10%;">
                                    <a href="{{ route('product', $product->slug) }}" class="hover-image">
                                        <img src="{{ my_asset($product->thumbnail_img) }}" style="height:221px; width:221px;" alt="{{@$product->name}}">
                                    </a>
                                    <div class="hover-contents">
                                        <div class="hover-btns">
                                            <button type='button' onclick="addToCart({{$product->id}})" class="single-btn">
                                                <i class="fas fa-shopping-basket"></i>
                                            </button>
                                            <button onclick="addToWishList({{ $product->id }})" class="single-btn">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                            <button onclick="addToCompare({{ $product->id }})" class="single-btn">
                                                <i class="fas fa-random"></i>
                                            </button>
                                            <!--<button type="button" onclick="showQuickView('{{$product->slug}}')" class="single-btn" >-->
                                                <!--data-toggle="modal"  data-target="#quickModal"-->
                                            <!--    <i class="fas fa-eye"></i>-->
                                            <!--</button>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="price-block">
                                    
                                    <span class="price">{{ home_base_price($product->id) }}</span>
                                    @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <del class="price-old">{{home_base_price($product->id)}}</del>
                                    @endif
                                    <span class="price-discount"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
         </section>
    @endif
@endforeach

     
        <!--=================================
        Home Two Column Section
    ===================================== -->
        <section class="bg-gray section-padding-top section-padding-bottom section-margin">
            <h1 class="sr-only">Promotion Section</h1>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="home-left-sidebar">
                            <div class="single-side  bg-white">
                                <h2 class="home-sidebar-title">
                                    Special offer
                                </h2>
                                <div class="product-slider countdown-single with-countdown sb-slick-slider product-border-reset"
                                    data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 1,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":575, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} }
                                    ]'>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="#" class="author">
                                                    Bpple
                                                </a>
                                                <h3><a href="product-details.html">Rpple QPad with Retina Display
                                                        MD510LL/A</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{my_asset('frontend1/image/products/product-2.jpg')}}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="product-details.html" class="hover-image">
                                                            <img src="{{my_asset('frontend1/image/products/product-1.jpg')}}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a href="cart.html" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a href="wishlist.html" class="single-btn">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a href="compare.html" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a>
                                                            <a href="#" data-toggle="modal" data-target="#quickModal"
                                                                class="single-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">£51.20</span>
                                                    <del class="price-old">£51.20</del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown" data-countdown="01/05/2020"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="#" class="author">
                                                    Tpple
                                                </a>
                                                <h3><a href="product-details.html">Koss KPH7 Lightweight Portable
                                                        Headphone</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{my_asset('frontend1/image/products/product-2.jpg')}}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="product-details.html" class="hover-image">
                                                            <img src="{{my_asset('frontend1/image/products/product-1.jpg')}}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a href="cart.html" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a href="wishlist.html" class="single-btn">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a href="compare.html" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a>
                                                            <a href="#" data-toggle="modal" data-target="#quickModal"
                                                                class="single-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">£51.20</span>
                                                    <del class="price-old">£51.20</del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown" data-countdown="01/05/2020"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="#" class="author">
                                                    Qpple
                                                </a>
                                                <h3><a href="product-details.html">Beats EP Wired On-Ear
                                                        digital Headphone-Black                    
                                                       
                                  </a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{my_asset('frontend1/image/products/product-3.jpg')}}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="product-details.html" class="hover-image">
                                                            <img src="{{my_asset('frontend1/image/products/product-2.jpg')}}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a href="cart.html" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a href="wishlist.html" class="single-btn">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a href="compare.html" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a>
                                                            <a href="#" data-toggle="modal" data-target="#quickModal"
                                                                class="single-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">£51.20</span>
                                                    <del class="price-old">£51.20</del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown" data-countdown="01/05/2020"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="#" class="author">
                                                    Gpple
                                                </a>
                                                <h3><a href="product-details.html">Beats Solo2 Solo 2 Wired On-Ear
                                                        Headphone</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{my_asset('frontend1/image/products/product-5.jpg')}}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="product-details.html" class="hover-image">
                                                            <img src="{{my_asset('frontend1/image/products/product-4.jpg')}}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a href="cart.html" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a href="wishlist.html" class="single-btn">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a href="compare.html" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a>
                                                            <a href="#" data-toggle="modal" data-target="#quickModal"
                                                                class="single-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">£51.20</span>
                                                    <del class="price-old">£51.20</del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown" data-countdown="01/05/2020"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="#" class="author">
                                                    Hpple
                                                </a>
                                                <h3><a href="product-details.html">Beats Solo3 Wireless On-Ear
                                                        Headphones                      
                                                       
                                                   
                                                       
                                  </a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{my_asset('frontend1/image/products/product-6.jpg')}}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="product-details.html" class="hover-image">
                                                            <img src="{{my_asset('frontend1/image/products/product-4.jpg')}}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a href="cart.html" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a href="wishlist.html" class="single-btn">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a href="compare.html" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a>
                                                            <a href="#" data-toggle="modal" data-target="#quickModal"
                                                                class="single-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">£51.20</span>
                                                    <del class="price-old">£51.20</del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown" data-countdown="01/05/2020"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="#" class="author">
                                                    Lpple
                                                </a>
                                                <h3><a href="product-details.html">3 Ways To Have (A) More Appealing
                                                        BOOK</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{my_asset('frontend1/image/products/product-8.jpg')}}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="product-details.html" class="hover-image">
                                                            <img src="{{my_asset('frontend1/image/products/product-7.jpg')}}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a href="cart.html" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a href="wishlist.html" class="single-btn">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a href="compare.html" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a>
                                                            <a href="#" data-toggle="modal" data-target="#quickModal"
                                                                class="single-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">£51.20</span>
                                                    <del class="price-old">£51.20</del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown" data-countdown="01/05/2020"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="#" class="author">
                                                    Epple
                                                </a>
                                                <h3><a href="product-details.html">In 10 Minutes, I'll Give You The
                                                        Truth About</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{my_asset('frontend1/image/products/product-13.jpg')}}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="product-details.html" class="hover-image">
                                                            <img src="{{my_asset('frontend1/image/products/product-11.jpg')}}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a href="cart.html" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a href="wishlist.html" class="single-btn">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a href="compare.html" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a>
                                                            <a href="#" data-toggle="modal" data-target="#quickModal"
                                                                class="single-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">£51.20</span>
                                                    <del class="price-old">£51.20</del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown" data-countdown="01/05/2020"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-side">
                                <a href="#" class="promo-image promo-overlay">
                                    <img src="{{my_asset('frontend1/image/bg-images/promo-banner-small-with-text.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="home-right-block bg-white">
                            <div class="sb-custom-tab   pt--30 pb--30">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop"
                                            role="tab" aria-controls="shop" aria-selected="true">
                                            Featured Products
                                        </a>
                                        <span class="arrow-icon"></span>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab"
                                            aria-controls="men" aria-selected="true">
                                            New Arrivals
                                        </a>
                                        <span class="arrow-icon"></span>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab"
                                            aria-controls="woman" aria-selected="false">
                                            Most view products
                                        </a>
                                        <span class="arrow-icon"></span>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane show active" id="shop" role="tabpanel"
                                        aria-labelledby="shop-tab">
                                        <div class="product-slider product-list-slider multiple-row slider-border-multiple-row  sb-slick-slider"
                                            data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 2,
                                    "rows":4,
                                    "dots":true
                                }' data-slick-responsive='[
                                    {"breakpoint":992, "settings": {"slidesToShow": 2,"rows": 3} },

                                    {"breakpoint":768, "settings": {"slidesToShow": 1} }
                                ]'>
                                            @foreach($featuredProducts as $featured)
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="col-md-6">
                                                    <div class="card-image">
                                                        <img src="{{my_asset($featured->thumbnail_img)}}" alt="" height="80" width="90">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                {{$featured->author_name}}
                                                            </a>
                                                            <h3><a href="{{ route('product', $product->slug) }}">{{$featured->name}}</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">{{$featured->unit_price}}</span>
                                                            <del class="price-old">{{$featured->unit_price}}</del>
                                                            <span class="price-discount">{{$featured->discount}}</span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                           @endforeach
                                        </div>
                                    </div>
                                    
                                      
                                    <!--=================================
                                      Old Backup
                                  
                                    <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                                        <div class="product-slider product-list-slider multiple-row slider-border-multiple-row  sb-slick-slider"
                                            data-slick-setting='{
                                                                                                    "autoplay": true,
                                                                                                    "autoplaySpeed": 8000,
                                                                                                    "slidesToShow": 2,
                                                                                                    "rows":4,
                                                                                                    "dots":true
                                                                                                }'
                                            data-slick-responsive='[
                                                                                                    {"breakpoint":992, "settings": {"slidesToShow": 2,"rows": 3} },
                                                                
                                                                                                    {"breakpoint":768, "settings": {"slidesToShow": 1} }
                                                                                                ]'>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-1.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Fpple
                                                            </a>
                                                            <h3><a href="product-details.html">5 Ways To Get Through
                                                                    To Your BOOK</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-2.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Gpple
                                                            </a>
                                                            <h3><a href="product-details.html">What Can You Do
                                                                    Save Your BOOK</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-3.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Hpple
                                                            </a>
                                                            <h3><a href="product-details.html">From Destruction By
                                                                    Social Media?</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-4.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Gpple
                                                            </a>
                                                            <h3><a href="product-details.html">Find About
                                                                    BOOK By Social Media?</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-5.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Dpple
                                                            </a>
                                                            <h3><a href="product-details.html">Read This
                                                                    Contro versial BOOK?</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-6.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Cpple
                                                            </a>
                                                            <h3><a href="product-details.html">Koss KPH7 Light weight
                                                                    Portable</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-7.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Apple
                                                            </a>
                                                            <h3><a href="product-details.html">Ways To Have
                                                                    Appealing BOOK</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-8.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Xpple
                                                            </a>
                                                            <h3><a href="product-details.html">Ways To Have
                                                                    Appealing BOOK</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-9.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Tpple
                                                            </a>
                                                            <h3><a href="product-details.html">In 10 Minutes, I'll
                                                                    Give You The Truth</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-10.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Fpple
                                                            </a>
                                                            <h3><a href="product-details.html">What Can You Do
                                                                    Save Your BOOK</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-11.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Fpple
                                                            </a>
                                                            <h3><a href="product-details.html">From Destruction By
                                                                    Social Media?</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-12.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Spple
                                                            </a>
                                                            <h3><a href="product-details.html">From Destruction By
                                                                    Social Media?</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£53.20</span>
                                                            <del class="price-old">£61.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-13.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Kpple
                                                            </a>
                                                            <h3><a href="product-details.html">Find About
                                                                    BOOK By Social Media?</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-1.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Apple
                                                            </a>
                                                            <h3><a href="product-details.html">Read This
                                                                    Contro versial BOOK?</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-2.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Apple
                                                            </a>
                                                            <h3><a href="product-details.html">Apple iPad with
                                                                    Retina Display</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-slide">
                                                <div class="product-card card-style-list">
                                                    <div class="card-image">
                                                        <img src="{{my_asset('frontend1/image/products/product-5.jpg')}}" alt="">
                                                    </div>
                                                    <div class="product-card--body">
                                                        <div class="product-header">
                                                            <a href="#" class="author">
                                                                Gpple
                                                            </a>
                                                            <h3><a href="product-details.html">Koss KPH7 Light weight
                                                                    Portable</a></h3>
                                                        </div>
                                                        <div class="price-block">
                                                            <span class="price">£51.20</span>
                                                            <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  
===================================== -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Blog Slider
        ===================================== -->
        <!--=================================
        Home Blog
        ===================================== -->
        <section class="section-margin">
            <div class="container">
                <div class="section-title">
                    <h2>LATEST BLOGS</h2>
                </div>
                <div class="blog-slider sb-slick-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 2,
                "dots": true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 1} }
            ]'>
                    @if(isset(\App\Blog::where('status','active')->get()[0]->id))
                    @foreach(\App\Blog::where('status','active')->take(6)->orderBy('id','desc')->get() as $ind_blog)
                    <div class="single-slide">
                        <div class="blog-card">
                            <div class="image">
                                <img src="{{my_asset(@$ind_blog->blog_image)}}" style="height:220px;" alt="">
                            </div>
                            
                            <div class="content">
                                <div class="content-header">
                                    <div class="date-badge">
                                        <span class="date">
                                            {{date('d',strtotime(@$ind_blog->created_at))}}
                                        </span>
                                        <span class="month">
                                            {{date('M',strtotime(@$ind_blog->created_at))}}
                                        </span>
                                    </div>
                                    <h3 class="title"><a href="{{route('blog-details',@$ind_blog->slug)}}">{{@$ind_blog->blog_title}}</a>
                                    </h3>
                                </div>
                                <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">@if(@$ind_blog->author->user_type=='admin') Admin @else {{@$ind_blog->author->name}} @endif</a></p>
                                <article class="blog-paragraph">
                                    <h2 class="sr-only">blog-paragraph</h2>
                                    <p> @if(isset($ind_blog->description))
                                         {{ strip_tags(str_replace('&nbsp;','',substr(@$ind_blog->description,0,120))).'...' }}
                                         @endif</p>
                                </article>
                                <a href="{{route('blog-details',@$ind_blog->slug)}}" class="card-link">Read More <i
                                        class="fas fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
            </div>
        </section>
        
        <!--=================================
        Home Features Section
    ===================================== -->
        <section class="space-dt--30 section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text">
                                <h5>Free Shipping Item</h5>
                                <p> Orders over $500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-redo-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Money Back Guarantee</h5>
                                <p>100% money back</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-piggy-bank"></i>
                            </div>
                            <div class="text">
                                <h5>Cash On Delivery</h5>
                                <p>Lorem ipsum dolor amet</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                            <div class="text">
                                <h5>Help & Support</h5>
                                <p>Call us : + 0123.4567.89</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Promotion Section One    Banner Home 2
    ===================================== -->
        <section class="section-margin">
            <h1 class="sr-only">Promotion Section</h1>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="#" class="promo-image promo-overlay">
                            <!--<img src="{{my_asset('frontend1/image/bg-images/promo-banner-with-text.jpg')}}" alt="">-->
                            
                                            <img src="{{my_asset($banner2->photo)}}" alt="" class="book-photo" />
                        </a>
                    </div>
                     <div class="col-lg-6">
                        <a href="#" class="promo-image promo-overlay">
                            <!--<img src="{{my_asset('frontend1/image/bg-images/promo-banner-with-text.jpg')}}" alt="">-->
                            
                                            <img src="{{my_asset($banner2->photo)}}" alt="" class="book-photo" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--<section class="single-product-slider section-margin">-->
        <!--    <div class="container">-->
        <!--        <div class="row ">-->
        <!--            {{-- justify-content-center align-items-center --}}-->
        <!--            <div class="col-lg-12 col-md-6 no-padding exclusive-left">-->
        <!--                <div class="row">-->
        <!--                    <div class="book-slide">-->
        <!--                        <div class="book js-flickity">-->
        <!--                            {{-- data-flickity-options='{ "wrapAround": true }' --}}-->
        <!--                            <div class="book-cell">-->
        <!--                                <div class="book-img">-->
        <!--                                    <img src="{{my_asset($banner2->photo)}}" alt="" class="book-photo" />-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->

@endsection
@section('script')
    @section('script')
    <script>
        $(document).ready(function(){
             $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
               
            });
            
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                
            });

            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                
            });

           

            @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                
            });
            @endif
        });
    </script>
@endsection
@endsection