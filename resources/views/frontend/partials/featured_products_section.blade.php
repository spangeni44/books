<section class="mb-4">
        <div class="">
            <div class="section-title-1 clearfix">
                <h3 class="nrn-cool-heading">
                    <span>{{ translate('Featured Products')}}</span>
                </h3>
            </div>
            <div class="caorusel-box arrow-round gutters-5">
                <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="5"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                    @foreach (filter_products(\App\Product::where('published', 1)->where('featured', '1'))->limit(12)->get() as $key => $product)
                    <div class="caorusel-card">
                        <div class="product-box-2 bg-white alt-box my-2">
                            <div class="position-relative overflow-hidden">
                                <a href="{{ route('product', $product->slug) }}" class="d-block product-image h-100 text-center">
                                    <img class="img-fit lazyload" height="300" width="300" src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}">
                                </a>
                                @if($product->discount_tpye == "percent")
                                <div class="nrn-sale-off"> {{$product->discount}}%</div>
                                @endif

                                <div class="product-btns clearfix d-flex justify-content-between" style="left: 10px">
                                    <button class="btn add-wishlist view-product" style="left: 55px;" title="Quick View" onclick="showAddToCartModal({{ $product->id }})" tabindex="0">
                                        <i class="la la-eye"></i>
                                    </button>
                                    <button class="btn quick-view" title="Add to Cart" onclick="addToCart({{ $product->id }})" tabindex="0">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                    <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList({{ $product->id }})" tabindex="0">
                                        <i class="la la-heart-o"></i>
                                    </button>
                                    <button class="btn add-compare" title="Add to Compare" onclick="addToCompare({{ $product->id }})" tabindex="0">
                                        <i class="la la-refresh"></i>
                                    </button>

                                </div>

                            </div>
                            <div class="p-md-3 p-2">
                                <div class="star-rating star-rating-sm mt-1 py-1">
                                    {{ renderStarRating($product->rating) }}
                                </div>
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

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>
