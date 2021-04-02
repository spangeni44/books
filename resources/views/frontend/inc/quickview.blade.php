@if(isset($detailedProduct))
@php $qty=$detailedProduct->current_stock; @endphp
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close" onclick="hideQuickView()">
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
                        @if(isset(json_decode($detailedProduct->photos)[0]))
                            <div class="single-slide">
								<img src="{{ my_asset(json_decode($detailedProduct->photos)[0]) }}" alt="" style="width:300px">
							</div>
                        @endif
                        
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
                         @foreach (json_decode($detailedProduct->photos) as $key => $photo)
							<div class="single-slide">
								<img src="{{ my_asset($photo) }}" alt="" style="width:100px">
							</div>
						@endforeach
                        
                    </div>
                </div>
                <div class="col-lg-7 mt--30 mt-lg--30">
                    <div class="product-details-info pl-lg--30 ">
                        <p class="tag-block">Tags: @if(isset($detailedProduct->tags)) @foreach(explode(',',$detailedProduct->tags) as $ind_tag) <a href="#">{{@$ind_tag}}</a> @if(!$loop->last), @endif @endforeach @endif</p>
                        <h3 class="product-title">{{$detailedProduct->name}}</h3>
                        <ul class="list-unstyled">
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
                        <div class="price-block">
                             @if(home_price($detailedProduct->id) != home_discounted_price($detailedProduct->id))
						            <span class="price-new">{{home_discounted_price($detailedProduct->id)}}</span>
						            <del class="price-old">
                                        {{ home_price($detailedProduct->id) }}
                                        @if($detailedProduct->unit != null)
                                            <span>/{{ $detailedProduct->unit }}</span>
                                        @endif
                                    </del>
                                    
                                @else
                                    <span class="price-new">{{home_discounted_price($detailedProduct->id)}}</span>
                               
                                @endif
                          
                        </div>
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
                                <a href="#">({{count($detailedProduct->reviews)}} Reviews)</a> <span>|</span>
                                <!--<a href="#">Write a review</a>-->
                            </div>
                        </div>
                        <article class="product-details-article">
                            <h4 class="sr-only">Product Summery</h4>
                            <p>{!!@$detailedProduct->excerpt!!}</p>
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
                                    <!--<span class="widget-label">Qty</span>-->
                                    <!--<input type="number"  class="form-control text-center" value="1">-->
                                </div>
                                <div class="add-cart-btn">
                                    <button type="button" class="btn btn-outlined--primary" onclick="addToCart()"><span
                                            class="plus-icon">+</span>Add to Cart</button>
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
@endif
            