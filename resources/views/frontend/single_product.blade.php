@extends('frontend.layouts.app')

@section('meta_title'){{ $detailedProduct->meta_title }}@stop

@section('meta_description'){{ $detailedProduct->meta_description }}@stop

@section('meta_keywords'){{ $detailedProduct->tags }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
    <meta itemprop="image" content="{{ my_asset($detailedProduct->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ my_asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
    <meta property="og:image" content="{{ my_asset($detailedProduct->meta_img) }}" />
    <meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
@endsection

@section('content')
@php $qty=$detailedProduct->current_stock; @endphp
<section class="breadcrumb-section">
	<h2 class="sr-only">Site Breadcrumb</h2>
	<div class="container">
		<div class="breadcrumb-contents">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="">Product Details</li>
				</ol>
			</nav>
		</div>
	</div>
</section>
<main class="inner-page-sec-padding-bottom mt--30">
	<div class="container">
				<div class="row mb--60">
					<div class="col-lg-4 mb--30">
						<!-- Product Details Slider Big Image-->
						<div id="products-details" class="product-details-slider sb-slick-slider arrow-type-two"
							data-slick-setting='{
                  "slidesToShow": 1,
                  "arrows": false,
                  "fade": true,
                  "draggable": false,
                  "swipe": false,
                  "asNavFor": ".product-slider-nav"
                  }'>
                        @foreach (json_decode($detailedProduct->photos) as $key => $photo)
							<div class="single-slide pink">
								<img src="{{ my_asset($photo) }}" alt="" style="width:300px">
							</div>
						@endforeach
						</div>
						<!-- Product Details Slider Nav -->
						<div id="product-nav" class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
							data-slick-setting='{
                  "slidesToShow": 4,
                  "asNavFor": ".product-details-slider",
                  "focusOnSelect": true
                  }'>
                        @foreach (json_decode($detailedProduct->photos) as $key => $photo)
							<div class="single-slide pink" style="padding-right:10px;">
							    <a href="#">
    								<img src="{{ my_asset($photo)}}" alt="">
							    </a>
							</div>
						@endforeach
						</div>
					</div>
					<div class="col-lg-8">
						<div class="product-details-info pl-lg--30 ">
							<h3> {{  translate($detailedProduct->name) }}</h3>
							<ul class="list-unstyled" style="line-height:30px;">
								<li>Price: 
								
								 @if(home_price($detailedProduct->id) != home_discounted_price($detailedProduct->id))
						            <del>
                                        {{ home_price($detailedProduct->id) }}
                                        @if($detailedProduct->unit != null)
                                            <span>/{{ $detailedProduct->unit }}</span>
                                        @endif
                                    </del>
                                    
								    <span class="list-value"> {{ home_discounted_price($detailedProduct->id) }}
                                    </span>
                                @else
                                    <span class="list-value"> {{ home_discounted_price($detailedProduct->id) }}
                                    </span>
                               
                                @endif
                                    </li>								
								<!--Rs. {{$detailedProduct->unit_price}}</span></li>-->
								<li>Author Name: <a href="{{ route('search', $detailedProduct->author_name) }}" class="list-value font-weight-bold"> {{$detailedProduct->author_name}}</a></li>
								<li>Sold By: 
								    <span class="list-value">
        								@if($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                                            <a href="{{ route('shop.visit', $detailedProduct->user->shop->slug) }}" class="name d-block">{{ $detailedProduct->user->shop->name }}
                                            @if ($detailedProduct->user->seller->verification_status == 1)
                                                <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                                            @else
                                                <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
                                            @endif
                                            </a>
                                            <div class="location">{{ $detailedProduct->user->shop->address }}</div>
                                        @else
                                            {{ env('APP_NAME') }}
                                        @endif
							        </span>
							    </li>
								<li>Publication: <span style="color:green">{{@$detailedProduct->publication->name}}</span></li>
								<li>Availability: <span class="list-value">  @if ($qty > 0) In Stock @else Out of Stock @endif </span></li>
							</ul>
							<div class="rating-widget">
								<div class="rating-block">
								    
								@php
                                $total = 0;
                                $rating = 0;
                                foreach ($detailedProduct->user->products as $key => $seller_product) {
                                    $total += $seller_product->reviews->count();
                                    $rating += $seller_product->reviews->sum('rating');
                                }
                                @endphp

                           
                                    @if ($total > 0)
                                        @for ($i=0; $i < $rating/$total; $i++)
                                                <span class="ion-android-star-outline star_on"></span>
                                            @endfor
                                            @for ($i=0; $i < (5-$rating/$total); $i++)
                                                <span class="ion-android-star-outline"></span>
                                            @endfor
                                       
                                    @else
                                        {{ renderStarRating(0) }}
                                    @endif
                               
								
									
								</div>
								<div class="review-widget">
									<a href="#">( {{count($detailedProduct->reviews)}} Reviews)</a>
									
								</div>
							</div>
							<article class="product-details-article">
								<h4 class="sr-only">Product Summery</h4>
								<?php echo htmlspecialchars_decode(stripslashes( $detailedProduct->meta_description )) ?>
							</article>
							
							 @if ($qty > 0)
							<div class="add-to-cart-row">
								<div class="count-input-block">
								    <form id="option-choice-form">
								         @csrf
                                        <input type="hidden" name="id" value="{{ $detailedProduct->id }}">
    									<span class="widget-label">Qty</span>
    									<input type="number" name="quantity" class="form-control text-center" value="1">
								    </form>
								</div>
								<div class="add-cart-btn">
									<button type="button" class="btn btn-outlined--primary" onclick="addToCart()"><span class="plus-icon">+</span>Add to
										Cart</button>
								</div>
							</div>
							@else
							    <div class="add-cart-btn">
									<button type="button" class="btn btn-outlined--primary">Out of Stock</a>
								</div>
							@endif
							<div class="compare-wishlist-row">
								<button type="button" class="add-link" onclick="addToWishList({{ $detailedProduct->id }})"><i class="fas fa-heart"></i>Add to Wish
									List</button>
								<!--<button type="button" class="add-link" onclick="addToCompare({{ $detailedProduct->id }})"><i class="fas fa-random"></i>Add to compare</button>-->
							</div>
						</div>
						<hr>
						<div class="single_product_div">
						    <h5>About This Book</h5>
						    <ul class="single_product_ul">
						       	<li><i class="fas fa-file-alt single_product_icon" ></i>  <span  class=" single_product_span">@isset($detailedProduct->no_of_pages) {{ $detailedProduct->no_of_pages }} @endisset  <br> Pages </span></li>
								<li><i class="fas fa-book-open single_product_icon" ></i> <span class=" single_product_span">@isset($detailedProduct->no_of_words) {{$detailedProduct->no_of_words}} @endisset <br> Words</span></li>
								<li><i class="fas fa-clock single_product_icon" ></i> <span  class=" single_product_span"> @isset($detailedProduct->duration) {{$detailedProduct->duration}} @endisset <br> Hours To Read</span></li>
						    </ul>
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
								REVIEWS ({{count($detailedProduct->reviews)}})
							</a>
						</li>
					</ul>
					<div class="tab-content space-db--20" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
							<article class="review-article">
								<h1 class="sr-only">Tab Article</h1>
								<p> <?php echo $detailedProduct->description; ?></p>
							</article>
						</div>
						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
							<div class="review-wrapper">
								<h2 class="title-lg mb--20" style="text-align:center;">{{count($detailedProduct->reviews)}} REVIEW for This Book</h2>
								 @foreach ($detailedProduct->reviews as $key => $review)
								<div class="review-comment mb--20">
									<div class="text">
										<div class="rating-block mb--15">
										     @for ($i=0; $i < $review->rating; $i++)
                                                <span class="ion-android-star-outline star_on"></span>
                                            @endfor
                                            @for ($i=0; $i < 5-$review->rating; $i++)
                                                <span class="ion-android-star-outline"></span>
                                            @endfor
											<!--<span class="ion-android-star-outline star_on"></span>-->
											<!--<span class="ion-android-star-outline star_on"></span>-->
											<!--<span class="ion-android-star-outline star_on"></span>-->
											<!--<span class="ion-android-star-outline"></span>-->
											<!--<span class="ion-android-star-outline"></span>-->
										</div>
										<h6 class="author">{{ $review->user->name }} – <span class="font-weight-400">{{ date('d M Y', strtotime($review->created_at)) }}</span>
										</h6>
										<p>{{ $review->comment }}</p>
									</div>
								</div>
								@endforeach
							

                                       
                                           @if(Auth::check())
                                            @php
                                                $commentable = false;
                                            @endphp
                                            @foreach ($detailedProduct->orderDetails as $key => $orderDetail)
                                                @if($orderDetail->order != null && $orderDetail->order->user_id == Auth::user()->id && $orderDetail->delivery_status == 'delivered' && \App\Review::where('user_id', Auth::user()->id)->where('product_id', $detailedProduct->id)->first() == null)
                                                    @php
                                                        $commentable = true;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if ($commentable)
                                           
            								<h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
            								<div class="rating-row pt-2">
            									<p class="d-block">Your Rating</p>
            								
            									<form action="{{ route('customer-reviews.store') }}" method="post" class="mt--15 ">
            									    @csrf
            									    <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}">
            									    <span class="rating-widget-block">
            										<input type="radio" name="rating" value="1"  id="star1">
            										<label for="star1"></label>
            										<input type="radio" name="rating" value="2" id="star2">
            										<label for="star2"></label>
            										<input type="radio" name="rating" value="3" id="star3">
            										<label for="star3"></label>
            										<input type="radio" name="rating" value="4" id="star4">
            										<label for="star4"></label>
            										<input type="radio" name="rating" value="5" id="star5">
            										<label for="star5"></label>
            									</span>
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
            													<input type="text" id="name" name="name" value="{{Auth::user()->name}}" disabled required class="form-control">
            												</div>
            											</div>
            											<div class="col-lg-4">
            												<div class="form-group">
            													<label for="email">Email *</label>
            													<input type="text" id="email" name="email" value="{{Auth::user()->email}}" disabled required class="form-control">
            												</div>
            											</div>
            											
            											<div class="col-lg-4">
            												<div class="form-group" style="margin-top:25px !important;">
            												    <label for="submitbtn">&nbsp;</label>
            													<button type="submit" class="btn btn-black">Post Comment</button>
            												</div>
            											</div>
            										</div>
            									</form>
            								</div>
            								@endif
            								@endif
            						
    							</div>
    						</div>
    					</div>
    				</div>
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
                                                <!--<a href="#" data-toggle="modal" data-target="#quickModal"-->
                                                <!--    class="single-btn">-->
                                                <!--    <i class="fas fa-eye"></i>-->
                                                <!--</a>-->
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
	<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
				aria-labelledby="quickModal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<div class="product-details-modal">
							<div class="row">
								<div class="col-lg-5">
									 Product Details Slider Big Image
									<div class="product-details-slider sb-slick-slider arrow-type-two"
										data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
										<div class="single-slide">
											<img src="image/products/product-details-1.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-2.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-3.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-4.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-5.jpg" alt="">
										</div>
									</div>
									 Product Details Slider Nav 
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
											<img src="image/products/product-details-1.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-2.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-3.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-4.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-5.jpg" alt="">
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
											<p>Long printed dress with thin adjustable straps. V-neckline and wiring
												under the Dust with ruffles at the bottom
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
</main>
@endsection
@section('script')

@endsection