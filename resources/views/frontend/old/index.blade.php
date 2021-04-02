@extends('frontend.layouts.app')

@section('content')
    <section class="home-banner-area mb-4">
        <div class="container-fluid" style="margin-left:5px; margin-top:10px;">
            <div class="row no-gutters position-relative">
                <div class="col-lg-2 col-md-3 col-sm-2 col-xs-2 position-static order-2 order-lg-0 bg-gray">
                    <div class="category-sidebar">
                        {{-- <div class="all-category d-none d-lg-block">
                            <span >{{ translate('Categories') }}</span>
                            <a href="{{ route('categories.all') }}">
                                <span class="d-none d-lg-inline-block">{{ translate('See All') }} ></span>
                            </a>
                        </div> --}}
                        <ul class="categories no-scrollbar" style="margin-top:15px;">
                            <li class="d-lg-none">
                                
                                <a href="{{ route('categories.all') }}" class="text-truncate">
                                    <img class="cat-image lazyload" src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ static_asset('frontend/images/icons/list.png') }}" width="30" alt="{{ translate('All Category') }}">
                                    <span class="cat-name">{{ translate('All') }} <br> {{ translate('Categories') }}  </span>
                                   
                                </a>
                            </li>
                            
                            @foreach (\App\Category::all()->take(11) as $key => $category)
                                @php
                                    $publications = array();
                                  
                                @endphp
                                
                                <li class="category-nav-element" data-id="{{ $category->id }}">
                                    <a href="{{ route('products.category', $category->slug) }}" class="text-truncate">
                                       
                                        <img class="cat-image lazyload" src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($category->icon) }}" width="30" alt="{{ __($category->name) }}">
                                        <span class="cat-name">{{ __($category->name) }}</span>
                                    </a>
                                    @if(count($category->subcategories)>0)
                                        <div class="sub-cat-menu c-scrollbar">
                                            <div class="c-preloader">
                                                <i class="fa fa-spin fa-spinner"></i>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                              
                            @endforeach
                        </ul>
                    </div>
                </div>

                @php
                    $num_todays_deal = count(filter_products(\App\Product::where('published', 1)->where('todays_deal', 1 ))->get());
                    $featured_categories = \App\Category::where('featured', 1)->get();
                @endphp

                <div class="@if($num_todays_deal > 0) col-lg-8 @else col-lg-9 @endif order-1 order-lg-0 @if(count($featured_categories) == 0) home-slider-full @endif p-md-4 p-sm-0" >
                    <div class="home-slide">
                        <div class="home-slide overflow-hidden">
                            <!--rounded-->
                            <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true">
                                @foreach (\App\Slider::where('published', 1)->get() as $key => $slider)
                                    <div class="home-slide-item" style="height:350px;">
                                        <a href="{{ $slider->link }}" target="_blank">
                                        <img class="d-block w-100 h-100 lazyload" src="{{ static_asset('frontend/images/placeholder-rect.jpg') }}" data-src="{{ my_asset($slider->photo) }}" alt="{{ env('APP_NAME')}} promo">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

                @if($num_todays_deal > 0)
                <div class="col-lg-2 d-none d-lg-block pt-4 rounded overflow-hidden" style="padding-right:10px;">
                    <div class="flash-deal-box bg-white h-100 border rounded overflow-hidden">
                        <div class="title p-2 gry-bg bg-gray d-flex align-items-center">
                            <h3 class="heading-6 mb-0 font-weight-bold">
                                {{ translate('Todays Deal') }}
                            </h3>
                            <button class="today-deal-btn today-deal-btn-1 mx-2">
                            </button>
                            <!--<button class="today-deal-btn today-deal-btn-2">-->
                            <!--</button>-->

                        </div>
                        <div class="flash-content c-scrollbar c-height">
                            @foreach (filter_products(\App\Product::where('published', 1)->where('todays_deal', '1'))->get() as $key => $product)
                                @if ($product != null)
                                        <div class="row no-gutters align-items-start mb-2">
                                            <div class="col-4">
                                                <div class="img">
                                                    <a href="{{ route('product', $product->slug) }}" class="d-block flash-deal-item">

                                                        <img class="lazyload img-fit" src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}">
                                                    </a>
                                                 </div>
                                            </div>
                                            <div class="col-8">
                                                {{-- rating --}}
                                                <!--<div class="star-rating star-rating-sm">-->
                                                <!--    {{ renderStarRating($product->rating) }}-->
                                                <!--</div>-->

                                                {{-- product title --}}
                                                <h2 class="product-title mb-0 p-0 text-truncate-2">
                                                    <a href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
                                                </h2>

                                                {{-- price --}}
                                                <div class="price d-flex">
                                                    <span class="nrn-color-orange-normal">{{ home_discounted_base_price($product->id) }}</span>
                                                    @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                        <del>{{ home_base_price($product->id) }}</del>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section>
    <section class="mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h3 class="text-uppercase nrn-title-small">Latest Products</h3>
                        @foreach (filter_products(\App\Product::where('published', 1)->orderBy('created_at', 'desc'))->take(6)->get() as $key => $product)
                            @if ($product != null)
                                    <div class="row no-gutters align-items-start mb-2">
                                        <div class="col-4">
                                            <div class="img">
                                                <a href="{{ route('product', $product->slug) }}" class="d-block flash-deal-item">

                                                    <img class="lazyload img-fit" src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}">
                                                </a>
                                             </div>
                                        </div>
                                        <div class="col-8">
                                            {{-- rating --}}
                                            <!--<div class="star-rating star-rating-sm">-->
                                            <!--    {{ renderStarRating($product->rating) }}-->
                                            <!--</div>-->

                                            {{-- product title --}}
                                            <h2 class="product-title mb-0 p-0 text-truncate-2">
                                                <a href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
                                            </h2>

                                            {{-- price --}}
                                            <div class="price d-flex">
                                                <span class="nrn-color-orange-normal">{{ home_discounted_base_price($product->id) }}</span>
                                                @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                    <del>{{ home_base_price($product->id) }}</del>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        @endforeach
                        
                        <img class="d-none d-lg-block" src="{{asset('public/frontend/images/side-banner1.jfif')}}" style="max-width:100%">
                        <br><br>
                        <img class="d-none d-lg-block" src="{{asset('public/frontend/images/side-banner2.jfif')}}" style="max-width:100%">

                </div>
                <div class="col-md-10">
                    @if (count($featured_categories) > 0)
                        <div class="trending-category  d-none d-lg-block">
                            <ul class="d-flex">
                                @foreach ($featured_categories->take(5) as $key => $category)
                                    <li @if ($key == 0) class="active" @endif>
                                        <div class="trend-category-single">
                                            <a href="{{ route('products.category', $category->slug) }}" class="d-block">
                                                <!--<div class="name">{{ __($category->name) }}</div>-->
                                                <div class="img">
                                                    <img src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($category->banner) }}" alt="{{ __($category->name) }}" class="lazyload img-fit">
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                {{-- flash deal  --}}

                    @php
                    $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->first();
                    @endphp
                    {{-- @if($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date) --}}
                    <section class="mb-4">
                        <div class="">
                            <div class="px-2 py-4 p-md-4 bg-white">
                                <div class="section-title-1 clearfix ">
                                    <h3 class="heading-5 nrn-title-medium strong-700 mb-0 float-left pb-2">
                                        {{ translate('Flash Sale') }} <span style="font-size:13px;"> Ends in</span>
                                    </h3>
                                    <div class="flash-deal-box float-left">
                                       <div class="countdown countdown--style-1 countdown--style-1-v1 " data-countdown-date="{{ date('m/d/Y', $flash_deal->end_date) }}" data-countdown-label="show"></div>
                                    </div>
                                    <ul class="inline-links float-right d-flex align-items-center" style="padding-top: 13px;">
                                        <li><a href="{{ route('flash-deal-details', $flash_deal->slug) }}" >{{ translate('View More') }} <i class="fa fa-caret-right"></i></a> </li>
                                    </ul>
                                </div>
                                <div class="caorusel-box arrow-round gutters-5">
                                    <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="6" data-slick-lg-items="6"  data-slick-md-items="6" data-slick-sm-items="2" data-slick-xs-items="2">
                                    @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                                        @php
                                            $product = \App\Product::find($flash_deal_product->product_id);
                                        @endphp
                                        @if ($product != null && $product->published != 0)
                                        <div class="caorusel-card">
                                            <div class="product-box-2 bg-white alt-box my-2">
                                                <div class="position-relative overflow-hidden">
                                                    <a href="{{ route('product', $product->slug) }}" class="d-block product-image h-100 text-center">
                                                        <img class="img-fit lazyload" height="300" width="300" src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}">
                                                    </a>
                                                    @if($product->discount_tpye == "percent")
                                                    <div class="nrn-sale-off"> {{$product->discount}}%</div>
                                                    @endif

                                                    <div class="product-btns clearfix d-flex justify-content-center" style="margin-right:5px; margin-left:5px;">
                                                        <!-- -->
                                                        <button class="btn add-wishlist view-product" style="margin-right:15%;" title="Quick VIew" onclick="showAddToCartModal({{$product->id}})" tabindex="0">
                                                            <i class="la la-eye"></i>
                                                        </button>
                                                        <button class="btn quick-view " style=" margin-right:50%;" title="Add to Cart" onclick="addToCart({{$product->id}})" tabindex="0">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn add-wishlist" style="float:right !important; margin-right:10px !important;" title="Add to Wishlist" onclick="addToWishList({{$product->id}})" tabindex="0">
                                                            <i class="la la-heart-o"></i>
                                                        </button>
                                                        <!--<button class="btn add-compare" title="Add to Compare" onclick="addToCompare({{ $product->id }})" tabindex="0">-->
                                                        <!--    <i class="la la-refresh"></i>-->
                                                        <!--</button>-->

                                                    </div>

                                                </div>
                                                <div class="p-md-3 p-2">
                                                    <!--<div class="star-rating star-rating-sm mt-1 py-1">-->
                                                    <!--    {{ renderStarRating($product->rating) }}-->
                                                    <!--</div>-->
                                                    <div class="price-box py-1">
                                                        <span class="product-price strong-600">{{ home_discounted_base_price($product->id) }}</span>
                                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                            <del class="old-product-price strong-400">{{ home_base_price($product->id) }}</del>
                                                        @endif
                                                    </div>
                                                    <h2 class="product-title p-0 py-1">
                                                        <a href="{{ route('product', $product->slug) }}" class=" text-truncate">{{ __($product->name) }}</a>
                                                    </h2>
                                                    @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                                        <div class="club-point mt-2 bg-soft-base-1 border-light-base-1 border">
                                                            {{ translate('Club Point') }}:
                                                            <span class="strong-700 float-right">{{ $product->earn_point }}</span>
                                                        </div>
                                                    @endif
                                                    <div class="sales-bar clearfix"><div class="sales-bar-total"> <span style="width: 80.327868852459%"></span></div></div>
                                                    <!--<div class="stock-sold nrn-color-orange-normal">Stock: <span>{{ $product->current_stock }}</span></div>-->
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- @endif --}}
                    {{-- banner --}}

                    <div class="mb-4">

                            <div class="row gutters-10">
                                @foreach (\App\Banner::where('position', 1)->where('published', 1)->get() as $key => $banner)
                                    <div class="col-lg-{{ 12/count(\App\Banner::where('position', 1)->where('published', 1)->get()) }}">
                                        <div class="media-banner mb-3 mb-lg-0">
                                            <a href="{{ $banner->url }}" target="_blank" class="banner-container">
                                                <img src="{{ static_asset('frontend/images/placeholder-rect.jpg') }}" data-src="{{ my_asset($banner->photo) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>

                    <div id="section_featured">

                    </div>

                    {{-- <div id="section_best_selling">

                    </div> --}}

                    <div id="section_home_categories">

                    </div>

                    @if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1)
                        @php
                            $customer_products = \App\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
                        @endphp
                       @if (count($customer_products) > 0)
                           <section class="mb-4">
                               <div class="container">
                                   <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
                                       <div class="section-title-1 clearfix">
                                           <h3 class="heading-5 strong-700 mb-0 float-left">
                                               <span class="mr-4">{{ translate('Classified Ads') }}</span>
                                           </h3>
                                           {{dd('inside customer products')}}
                                           <ul class="inline-links float-right">
                                               <li><a href="{{ route('customer.products') }}" class="active">{{ translate('View More') }}</a></li>
                                           </ul>
                                       </div>
                                       <div class="caorusel-box arrow-round">
                                           <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                                               @foreach ($customer_products as $key => $customer_product)
                                                   <div class="product-card-2 card card-product my-2 mx-1 mx-sm-2 shop-cards shop-tech">
                                                       <div class="card-body p-0">
                                                           <div class="card-image">
                                                               <a href="{{ route('customer.product', $customer_product->slug) }}" class="d-block">
                                                                   <img class="img-fit lazyload mx-auto" src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($customer_product->thumbnail_img) }}" alt="{{ __($customer_product->name) }}">
                                                               </a>
                                                           </div>

                                                           <div class="p-sm-3 p-2">
                                                               <div class="price-box">
                                                                   <span class="product-price strong-600">{{ single_price($customer_product->unit_price) }}</span>
                                                               </div>
                                                               <h2 class="product-title p-0 text-truncate-1">
                                                                   <a href="{{ route('customer.product', $customer_product->slug) }}">{{ __($customer_product->name) }}</a>
                                                               </h2>
                                                               <div>
                                                                   @if($customer_product->conditon == 'new')
                                                                       <span class="product-label label-hot">{{translate('new')}}</span>
                                                                   @elseif($customer_product->conditon == 'used')
                                                                       <span class="product-label label-hot">{{translate('Used')}}</span>
                                                                   @endif
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               @endforeach
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </section>
                       @endif
                   @endif

                    <div class="mb-4">
                        <div class="">
                            <div class="row gutters-10">
                                @foreach (\App\Banner::where('position', 2)->where('published', 1)->get() as $key => $banner)
                                    <div class="col-lg-{{ 12/count(\App\Banner::where('position', 2)->where('published', 1)->get()) }}">
                                        <div class="media-banner mb-3 mb-lg-0">
                                            <a href="{{ $banner->url }}" target="_blank" class="banner-container">
                                                <img src="{{ static_asset('frontend/images/placeholder-rect.jpg') }}" data-src="{{ my_asset($banner->photo) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                    <div id="section_best_sellers">

                    </div>
                    @endif --}}



                    {{-- Publications --}}
                    @if(count(\App\Category::where('top', 1)->get()) != null && count(\App\Publication::where('top', 1)->get()) != null)
                    <section class="my-4">
                        <div class="container border rounded">
                            <div class="row gutters-10 ">

                                @foreach (\App\Publication::where('top', 1)->get() as $publication)
                                    <div class="col d-flex mb-3">
                                        <a href="{{ route('products.publication', $publication->slug) }}" >
                                                    <img src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($publication->logo) }}" alt="{{ __($publication->name) }}" class="img-fluid img lazyload">
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </section>
                    @endif
                    

                </div>
            </div>
            
            
        </div>
    </section>


@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                slickInit();
            });

            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                slickInit();
            });

            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                slickInit();
            });

            @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                slickInit();
            });
            @endif
        });
    </script>
@endsection
