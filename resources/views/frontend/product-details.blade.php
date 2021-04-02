@extends('frontend.layouts.app')
@section('content')
{{dd('hello')}}
<section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translate('Home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products') }}">{{ translate('All Categories')}}</a></li>
    {{--                        @if(isset($detailedProduct->category_id))--}}
    {{--                            <li class="active breadcrumb-item"><a href="{{ route('products.category', \App\Category::find(@$detailedProduct->category_id)->slug) }}">{{ \App\Category::find($detailedProduct->category_id)->name }}</a></li>--}}
    {{--                        @endif--}}
    {{--                        @if(isset($detailedProduct->subcategory_id))--}}
    {{--                            <li class="breadcrumb-item" ><a href="{{ route('products.category', \App\SubCategory::find(@$detailedProduct->subcategory_id)->category->slug) }}">{{ \App\SubCategory::find($detailedProduct->subcategory_id)->category->name }}</a></li>--}}
    {{--                            <li class="active breadcrumb-item"><a href="{{ route('products.subcategory', \App\SubCategory::find(@$detailedProduct->subcategory_id)->slug) }}">{{ \App\SubCategory::find($detailedProduct->subcategory_id)->name }}</a></li>--}}
    {{--                        @endif--}}
                            @if(isset($detailedProduct->subsubcategory_id))
                                <li class="breadcrumb-item" ><a href="{{ route('products.category', \App\SubSubCategory::find(@$detailedProduct->subsubcategory_id)->subcategory->category->slug) }}">{{ \App\SubSubCategory::find($detailedProduct->subsubcategory_id)->subcategory->category->name }}</a></li>
                                <li class="breadcrumb-item" ><a href="{{ route('products.subcategory', \App\SubsubCategory::find(@$detailedProduct->subsubcategory_id)->subcategory->slug) }}">{{ \App\SubsubCategory::find($detailedProduct->subsubcategory_id)->subcategory->name }}</a></li>
                                <li class="active breadcrumb-item"><a href="{{ route('products.subsubcategory', \App\SubSubCategory::find($detailedProduct->subsubcategory_id)->slug) }}">{{ \App\SubSubCategory::find($detailedProduct->subsubcategory_id)->name }}</a></li>
                            @endif
                            <!--<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>-->
                            <!--<li class="breadcrumb-item active">Product Details</li>-->
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row  mb--60">
                    <div class="col-lg-5 mb--30">
                        <!-- Product Details Slider Big Image-->
                        <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                           @if(is_array(json_decode($detailedProduct->photos)) && count(json_decode($detailedProduct->photos)) > 0)
                            @foreach (json_decode($detailedProduct->photos) as $key => $photo)
                            <div class="single-slide">
                               
                                <!--<img src="{{ static_asset('frontend/images/placeholder.jpg') }}" class="xzoom-gallery lazyload" src="{{ static_asset('frontend/images/placeholder.jpg') }}" width="80" data-src="{{ my_asset($photo) }}"  @if($key == 0) xpreview="{{ my_asset($photo) }}" @endif>-->
                                           
                                <img src="{{ my_asset($photo) }}" alt="">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <!-- Product Details Slider Nav -->
                        <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
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
                            @if(is_array(json_decode($detailedProduct->photos)) && count(json_decode($detailedProduct->photos)) > 0)
                            @foreach (json_decode($detailedProduct->photos) as $key => $photo)
                            <div class="single-slide">
                                <img src="{{ my_asset($photo) }}" alt="">
                            </div>
                            @endforeach
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-details-info pl-lg--30 ">
                            <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
                            <h3 class="product-title"></h3>
                            <ul class="list-unstyled">
                                <li>Ex Tax: <span class="list-value"> £60.24</span></li>
                                <li>Production: <a href="#" class="list-value font-weight-bold"> {{@$detailedProduct->production->name}}</a></li>
                                <li>Product Code: <span class="list-value"> model1</span></li>
                                <li>Reward Points: <span class="list-value"> 200</span></li>
                                @php
                                    $qty = 0;
                                    if($detailedProduct->variant_product){
                                        foreach ($detailedProduct->stocks as $key => $stock) {
                                            $qty += $stock->qty;
                                        }
                                    }
                                    else{
                                        $qty = $detailedProduct->current_stock;
                                    }
                                @endphp
                                <li>Availability: <span class="list-value"> 
                                
                                    @if ($qty > 0)
                                        {{ translate('In stock')}}
                                    @else
                                       {{ translate('Out of stock')}}
                                    @endif
                                </span></li>
                            </ul>
                            <div class="price-block">
                                <span class="price-new">
                                     {{home_discounted_price($detailedProduct->id) }} 
                                     
                                    @if($detailedProduct->unit != null)
                                    <span class="piece">/{{ $detailedProduct->unit }}</span>
                                    @endif
                                   
                                        {{$discountValue}}
                                    
                                        @if($discountValue)
                                         <span>off</span>
                                        @endif
                                </span>
                                <del class="price-old">{{ home_price($detailedProduct->id) }}
                                    @if($detailedProduct->unit != null)
                                        <span>/{{ $detailedProduct->unit }}</span>
                                    @endif
                                </del>
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
                                <p>{!!@$detailedProduct->excerpt!!}</p>
                            </article>
                            
                            <div class="add-to-cart-row">
                                <div class="count-input-block">
                                    <span class="widget-label">Qty</span>
                                    <input type="number" class="form-control text-center" value="1">
                                </div>
                                <div class="add-cart-btn">
                                    <button class="btn btn-outlined--primary" onclick="addToCart()"><span class="plus-icon">+</span>Add to
                                        Cart</button>
                                </div>
                            </div>
                            <div class="compare-wishlist-row">
                                <a href="#" class="add-link" onclick="buyNow()">
                                    <i class="fas fa-shopping-cart"></i> {{ translate('Buy Now')}}
                                </a>
                                <a href="#" class="add-link" onclick="addToWishList({{ $detailedProduct->id }})"><i class="fas fa-heart"></i>Add to Wish List</a>
                                <!--<a href="#" class="add-link"  ><i class="fas fa-random"></i>Add to Compare</a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sb-custom-tab review-tab section-padding">
                    <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                                aria-controls="tab-1" aria-selected="true">
                                DESCRIPTION
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab"
                                aria-controls="tab-2" aria-selected="true">
                                REVIEWS {{count(@$detailedProduct->reviews)}}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content space-db--20" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                            <article class="review-article">
                                <h1 class="sr-only">Tab Article</h1>
                                <p>{!! @$detailedProduct->description !!}</p>
                            </article>
                        </div>
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                            @if(isset($detailedProduct->reviews))
                            <div class="review-wrapper">
                                <h2 class="title-lg mb--20">{{count(@$detailedProduct->reviews)}} REVIEW</h2>
                                <div class="review-comment mb--20">
                                    
                                    @foreach($detailedProduct->reviews as $key => $review)
                                    <div class="avatar">
                                        <img @if($review->user->avatar_original !=null) src="{{ my_asset($review->user->avatar_original) }}" @else src="{{ my_asset('img/avatar-place.png') }}" @endif >
                                    </div>
                                    <div class="text">
                                        <div class="rating-block mb--15">
                                            @for($i=0; $i < $review->rating; $i++)
                                                    <span class="ion-android-star-outline star_on"></span>
                                            @endfor
                                            @for($i=0; $i< 5-$review->rating; $i++)
                                                <span class="ion-android-star-outline"></span>
                                                <!--<i class="fa fa-star"></i>-->
                                            @endfor
                                            <span class="ion-android-star-outline star_on"></span>
                                            <span class="ion-android-star-outline star_on"></span>
                                            <span class="ion-android-star-outline star_on"></span>
                                            <span class="ion-android-star-outline"></span>
                                            <span class="ion-android-star-outline"></span>
                                        </div>
                                        <h6 class="author">{{ $review->user->name }} – <span class="font-weight-400">{{date('M Y d',strtotime(@$review->created_at))}}</span>
                                        </h6>
                                        <p> {{ $review->comment }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                                <div class="rating-row pt-2">
                                    <p class="d-block">Your Rating</p>
                                    <span class="rating-widget-block">
                                        <input type="radio" name="star" id="star1">
                                        <label for="star1"></label>
                                        <input type="radio" name="star" id="star2">
                                        <label for="star2"></label>
                                        <input type="radio" name="star" id="star3">
                                        <label for="star3"></label>
                                        <input type="radio" name="star" id="star4">
                                        <label for="star4"></label>
                                        <input type="radio" name="star" id="star5">
                                        <label for="star5"></label>
                                    </span>
                                    <form action="{{ route('reviews.store') }}" class="mt--15 site-form ">
                                         <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="message">Comment</label>
                                                    <textarea name="comment" id="message" cols="30" rows="10"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="name">Name *</label>
                                                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="email">Email *</label>
                                                    <input type="text" name="email" value="{{ Auth::user()->email }}" id="email" class="form-control">
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-4">
                                                <div class="submit-btn">
                                                    <a href="#" class="btn btn-black">Post Comment</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- <div class="tab-product-details">
  <div class="brand">
    <img src="{{asset('public/frontend1/image/others/review-tab-product-details.jpg')}}" alt="">
  </div>
  <h5 class="meta">Reference <span class="small-text">demo_5</span></h5>
  <h5 class="meta">In stock <span class="small-text">297 Items</span></h5>
  <section class="product-features">
    <h3 class="title">Data sheet</h3>
    <dl class="data-sheet">
      <dt class="name">Compositions</dt>
      <dd class="value">Viscose</dd>
      <dt class="name">Styles</dt>
      <dd class="value">Casual</dd>
      <dt class="name">Properties</dt>
      <dd class="value">Maxi Dress</dd>
    </dl>
  </section>
</div> -->
            </div>
            <!--=================================
    RELATED PRODUCTS BOOKS
===================================== -->
            <section class="">
                <div class="container">
                    <div class="section-title section-title--bordered">
                        <h2>RELATED PRODUCTS</h2>
                    </div>
                    <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
            ]'>
                         @foreach (filter_products(\App\Product::where('subcategory_id', $detailedProduct->subcategory_id)->where('id', '!=', $detailedProduct->id))->limit(4)->get() as $key => $product)
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
                                            <img src="{{ my_asset($product->thumbnail_img) }}" style="height:221px; width:221px;" alt="{{@$product->name}}">
                                            <div class="hover-contents">
                                                <a href="{{ route('product', $product->slug) }}" class="hover-image">
                                                    @if(isset(json_decode($product->photos)[1]))
                                                    <img src="{{ my_asset(json_decode(@$product->photos)[1]) }}" style="height:221px; width:221px;"  alt="{{@$product->name}}">
                                                    @endif
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
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
    		$('#share').jsSocials({
    			showLabel: false,
                showCount: false,
                shares: ["facebook", "viber", "whatsapp"]
    		});
            getVariantPrice();
    	});

        function CopyToClipboard(containerid) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select().createTextRange();
                document.execCommand("Copy");

            } else if (window.getSelection) {
                var range = document.createRange();
                document.getElementById(containerid).style.display = "block";
                range.selectNode(document.getElementById(containerid));
                window.getSelection().addRange(range);
                document.execCommand("Copy");
                document.getElementById(containerid).style.display = "none";

            }
            showFrontendAlert('success', 'Copied');
        }

        function show_chat_modal(){
            @if (Auth::check())
                $('#chat_modal').modal('show');
            @else
                $('#login_modal').modal('show');
            @endif
        }
    </script>
@endsection