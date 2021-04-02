
@foreach (\App\HomeCategory::where('status', 1)->get() as $key => $homeCategory)
    
    @if($homeCategory->category != null)
       <!--=================================
    BIOGRAPHIES BOOKS
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
                                    
                                </a>
                                <h3><a href="{{ route('product', $product->slug) }}">{{@$product->name}}</a></h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="{{ my_asset($product->thumbnail_img) }}" alt="">
                                    <div class="hover-contents">
                                        <a href="{{ route('product', $product->slug) }}" class="hover-image">
                                            <img src="{{ my_asset(json_decode($product->photos)[0]) }}" alt="">
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
        
    @endif
@endforeach
