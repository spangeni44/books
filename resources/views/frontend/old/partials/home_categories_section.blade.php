@foreach (\App\HomeCategory::where('status', 1)->get() as $key => $homeCategory)
    
    @if ($homeCategory->category != null)
        <section class="mb-4">
            <div>
                <div>
                        <div class="section-title-1 clearfix">
                            <h3 class="nrn-cool-heading">
                                <span>{{ translate($homeCategory->category->name) }}</span>
                            </h3>
                            <ul class="inline-links float-right d-flex align-items-center" style="padding-top: 13px;">
                                @foreach (\App\HomeCategory::where('status',1)->take(5)->get() as $cat)
                                    <li><a href="{{ route('products.category', $cat->category->slug) }}" class="px-2">{{ $cat->category->name}}</a></li>
                                @endforeach
                                <li><a href="{{ route('products.category', $homeCategory->category->slug) }}" class="px-3">View More <i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </div>

                    <div class="caorusel-box arrow-round gutters-5">
                        <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                        @foreach (filter_products(\App\Product::where('published', 1)->where('category_id', $homeCategory->category->id))->latest()->limit(12)->get() as $key => $product)
                            <div class="caorusel-card">
                                <div class="product-box-2 bg-white alt-box my-2">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('product', $product->slug) }}" class="d-block product-image h-100 text-center">
                                            <img class="img-fit lazyload" src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}">
                                        </a>

                                        <div class="product-btns clearfix d-flex justify-content-between" style="left: 10px">
                                            <button class="btn add-wishlist view-product" style="left: 55px;" title="Quick VIew" onclick="showAddToCartModal({{ $product->id }})" tabindex="0">
                                                <i class="la la-eye"></i>
                                            </button>
                                            <button class="btn quick-view" title="Add to Cart" onclick="addToCart({{ $product->id }})" tabindex="0">
                                                <i class="fa fa-shopping-bag"></i>
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
                                        <div class="price-box">
                                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                <del class="old-product-price strong-400">{{ home_base_price($product->id) }}</del>
                                            @endif
                                            <span class="product-price strong-600">{{ home_discounted_base_price($product->id) }}</span>
                                        </div>
                                        <div class="star-rating star-rating-sm mt-1">
                                            {{ renderStarRating($product->rating) }}
                                        </div>
                                        <h2 class="product-title p-0">
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
            </div>
        </section>
    @endif
@endforeach
