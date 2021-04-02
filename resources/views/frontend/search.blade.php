@extends('frontend.layouts.app')
@section('content')


<section class="breadcrumb-section">
	<h2 class="sr-only">Site Breadcrumb</h2>
	<div class="container">
		<div class="breadcrumb-contents">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active">Shop</li>
				</ol>
			</nav>
		</div>
	</div>
</section>
<main class="inner-page-sec-padding-bottom">
			<div class="container">
			    <form class="" id="search-form" action="{{ route('search') }}" method="GET">
				<div class="row">
					<div class="col-lg-9 order-lg-2">
						<div class="shop-toolbar with-sidebar mb--30">
							<div class="row align-items-center">
								<div class="col-lg-2 col-md-2 col-sm-6">
									<!-- Product View Mode -->
									<div class="product-view-mode">
										<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
										<a href="#" class="sorting-btn" data-target="grid-four">
											<span class="grid-four-icon">
												<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
											</span>
										</a>
										<a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
									</div>
								</div>
								<div class="col-xl-4 col-md-4 col-sm-6  mt--10 mt-sm--0">
									<span class="toolbar-status">
										Showing 1 to 9 of 14 (2 Pages)
									</span>
								</div>
								
								<div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
									<div class="sorting-selection">
										<span>Show:</span>
										<select class="form-control nice-select sort-select" name="per_page_item" onchange="filter()">
											<option value="9" @if($per_page_item==9) selected @endif>9</option>
											<option value="12" @if($per_page_item==12) selected @endif>12</option>
											<option value="16" @if($per_page_item==16) selected @endif>16</option>
											<option value="20" @if($per_page_item==20) selected @endif>20</option>
											<option value="32" @if($per_page_item==32) selected @endif>32</option>
										</select>
										<!--<div class="nice-select form-control sort-select" tabindex="0"><span class="current">3</span><ul class="list"><li data-value="" class="option selected">3</li><li data-value="" class="option">9</li><li data-value="" class="option">5</li><li data-value="" class="option">10</li><li data-value="" class="option">12</li></ul></div>-->
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
									<div class="sorting-selection">
										<span>Sort By:</span>
										<select class="form-control sortSelect form-control nice-select sort-select mr-0" data-minimum-results-for-search="Infinity" name="sort_by" onchange="filter()">
                                            <option value="1" @isset($sort_by) @if ($sort_by == '1') selected @endif @endisset>{{ translate('Newest')}}</option>
                                            <option value="2" @isset($sort_by) @if ($sort_by == '2') selected @endif @endisset>{{ translate('Oldest')}}</option>
                                            <option value="3" @isset($sort_by) @if ($sort_by == '3') selected @endif @endisset>{{ translate('Price low to high')}}</option>
                                            <option value="4" @isset($sort_by) @if ($sort_by == '4') selected @endif @endisset>{{ translate('Price high to low')}}</option>
                                        </select>
									</div>
								</div>
							</div>
						</div>
						
						<div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
								@foreach($products as $product)
                        			<div class="col-lg-4 col-sm-6">
                        				<div class="product-card">
                        					<div class="product-grid-content">
                        						<div class="product-header">
                        							<a href="#" class="author">
                        								{{$product->author_name}}
                        							</a>
                        							<h3><a href="#">{{$product->name}}</a></h3>
                        						</div>
                        						<div class="product-card--body">
                        								<div class="card-image">
                        									<img src="{{my_asset($product->thumbnail_img)}}" style="height:221px; width:221px;"  alt="">
                        									<div class="hover-contents">
                            								    <a href="{{ route('product', $product->slug) }}" class="hover-image">
                                                                        @if(isset(json_decode($product->photos)[1]))
                                                                        <img src="{{ my_asset(json_decode(@$product->photos)[1]) }}" style="height:221px; width:221px;"  alt="{{@$product->name}}">
                                                                        @endif
                                                                    </a>
                        										<div class="hover-btns">
                        											<button type="button"  onclick="addToCart({{$product->id}})" class="single-btn">
                        												<i class="fas fa-shopping-basket"></i>
                        											</button>
                        											<button type="button" onclick="addToWishList({{ $product->id }})" class="single-btn">
                        												<i class="fas fa-heart"></i>
                        											</button>
                        											<button onclick="addToCompare({{ $product->id }})" class="single-btn">
                        												<i class="fas fa-random"></i>
                        											</button>
                        											<a href="#" data-toggle="modal" data-id="{{@$product->id}}" data-target="#quickModal" class="single-btn">
                        												<i class="fas fa-eye"></i>
                        											</a>
                        										
                        										</div>
                        									</div>
                        								</div>
                        							<div class="price-block">
                        								<span class="price">Rs.{{$product->unit_price}}</span>
                        							</div>
                        						</div>
                        					</div>
                        					<div class="product-list-content">
                        						<div class="card-image">
                        							<img src="{{my_asset($product->thumbnail_img)}}" alt="">
                        						</div>
                        						<div class="product-card--body">
                        							<div class="product-header">
                        								<a href="#" class="author">
                        									{{$product->author_name}}
                        								</a>
                        								<h3><a href="#" tabindex="0">{{$product->name}}</a></h3>
                        							</div>
                        							<article>
                        								<h2 class="sr-only">Card List Article</h2>
                        								<p>{{$product->description}}</p>
                        							</article>
                        							<div class="price-block">
                        								<span class="price">Rs.{{$product->unit_price}}</span>
                        							</div>
                        							<div class="rating-block">
                        								<span class="fas fa-star star_on"></span>
                        								<span class="fas fa-star star_on"></span>
                        								<span class="fas fa-star star_on"></span>
                        								<span class="fas fa-star star_on"></span>
                        								<span class="fas fa-star "></span>
                        							</div>
                        							<div class="btn-block">
                        								<a href="#" class="btn btn-outlined">Add To Cart</a>
                        								<a href="#" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                        								<a href="#" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>
                        							</div>
                        						</div>
                        					</div>
                        				</div>
                        			</div>
                        			@endforeach
						</div>
						<!-- Pagination Block -->
						<div class="row pt--30">
							<div class="col-md-6 offset-md-3">
							    @if(isset($products[0]->id))
							       
							        {{ $products->appends(\Request::all())->links() }}
							    @endif
								
							</div>
						</div>
						<!-- Modal -->
						<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<div class="product-details-modal">
										<div class="row">
											<div class="col-lg-5">
												<!-- Product Details Slider Big Image-->
												<div class="product-details-slider sb-slick-slider arrow-type-two slick-initialized slick-slider" data-slick-setting="{
              &quot;slidesToShow&quot;: 1,
              &quot;arrows&quot;: false,
              &quot;fade&quot;: true,
              &quot;draggable&quot;: false,
              &quot;swipe&quot;: false,
              &quot;asNavFor&quot;: &quot;.product-slider-nav&quot;
              }"><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1950px;"><div class="slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" style="width: 390px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-1.jpg" alt="">
													</div></div></div><div class="slick-slide slick-current slick-active" data-slick-index="1" aria-hidden="false" style="width: 390px; position: relative; left: -390px; top: 0px; z-index: 999; opacity: 1;"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-2.jpg" alt="">
													</div></div></div><div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 390px; position: relative; left: -780px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-3.jpg" alt="">
													</div></div></div><div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 390px; position: relative; left: -1170px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-4.jpg" alt="">
													</div></div></div><div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 390px; position: relative; left: -1560px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-5.jpg" alt="">
													</div></div></div></div></div></div>
												<!-- Product Details Slider Nav -->
												<div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two slick-initialized slick-slider" data-slick-setting="{
            &quot;infinite&quot;:true,
              &quot;autoplay&quot;: true,
              &quot;autoplaySpeed&quot;: 8000,
              &quot;slidesToShow&quot;: 4,
              &quot;arrows&quot;: true,
              &quot;prevArrow&quot;:{&quot;buttonClass&quot;: &quot;slick-prev&quot;,&quot;iconClass&quot;:&quot;fa fa-chevron-left&quot;},
              &quot;nextArrow&quot;:{&quot;buttonClass&quot;: &quot;slick-next&quot;,&quot;iconClass&quot;:&quot;fa fa-chevron-right&quot;},
              &quot;asNavFor&quot;: &quot;.product-details-slider&quot;,
              &quot;focusOnSelect&quot;: true
              }"><button class="slick-prev slick-arrow" style=""><i class="fa fa-chevron-left"></i></button><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1442px; transform: translate3d(-515px, 0px, 0px);"><div class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 103px;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-2.jpg" alt="">
													</div></div></div><div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 103px;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-3.jpg" alt="">
													</div></div></div><div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 103px;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-4.jpg" alt="">
													</div></div></div><div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 103px;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-5.jpg" alt="">
													</div></div></div><div class="slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" style="width: 103px;"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-1.jpg" alt="">
													</div></div></div><div class="slick-slide slick-current slick-active" data-slick-index="1" aria-hidden="false" style="width: 103px;"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-2.jpg" alt="">
													</div></div></div><div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 103px;"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-3.jpg" alt="">
													</div></div></div><div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 103px;"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-4.jpg" alt="">
													</div></div></div><div class="slick-slide slick-active" data-slick-index="4" aria-hidden="false" style="width: 103px;"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-5.jpg" alt="">
													</div></div></div><div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" style="width: 103px;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-1.jpg" alt="">
													</div></div></div><div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 103px;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-2.jpg" alt="">
													</div></div></div><div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 103px;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-3.jpg" alt="">
													</div></div></div><div class="slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" style="width: 103px;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-4.jpg" alt="">
													</div></div></div><div class="slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" style="width: 103px;" tabindex="-1"><div><div class="single-slide" style="width: 100%; display: inline-block;">
														<img src="image/products/product-details-5.jpg" alt="">
													</div></div></div></div></div><button class="slick-next slick-arrow" style=""><i class="fa fa-chevron-right"></i></button></div>
											</div>
											<div class="col-lg-7 mt--30 mt-lg--30">
												<div class="product-details-info pl-lg--30 ">
													<p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
													<h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
													<ul class="list-unstyled">
														<li>Ex Tax: <span class="list-value"> £60.24</span></li>
														<li>Brands: <a href="#" class="list-value font-weight-bold">
																Canon</a></li>
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
														<p>Long printed dress with thin adjustable straps. V-neckline
															and wiring under the Dust with ruffles at the bottom
															of the
															dress.</p>
													</article>
													<div class="add-to-cart-row">
														<div class="count-input-block">
															<span class="widget-label">Qty</span>
															<input type="number" class="form-control text-center" value="1">
														</div>
														<div class="add-cart-btn">
															<a href="#" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to Cart</a>
														</div>
													</div>
													<div class="compare-wishlist-row">
														<a href="#" class="add-link"><i class="fas fa-heart"></i>Add to
															Wish List</a>
														<a href="#" class="add-link"><i class="fas fa-random"></i>Add to
															Compare</a>
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
					</div>
					<div class="col-lg-3  mt--40 mt-lg--0">
						<div class="inner-page-sidebar">
						     
							<!-- Accordion -->
							<div class="single-block">
								<h3 class="sidebar-title">Categories</h3>
							
								 <ul class="sidebar-menu--shop">
                                        @if(!isset($category_id) && !isset($category_id) && !isset($subcategory_id) && !isset($subsubcategory_id))
                                            @foreach(\App\Category::all() as $category)
                                                <li class=""><a href="{{ route('products.category', $category->slug) }}">{{  __($category->name) }}</a></li>
                                            @endforeach
                                        @endif
                                        @if(isset($category_id))
                                            <li class="active"><a href="{{ route('products') }}">{{ translate('All Categories')}}</a></li>
                                            <li class="active"><a href="{{ route('products.category', \App\Category::find($category_id)->slug) }}">{{  translate(\App\Category::find($category_id)->name) }}</a></li>
                                            @foreach (\App\Category::find($category_id)->subcategories as $key2 => $subcategory)
                                                <li class="child"><a href="{{ route('products.subcategory', $subcategory->slug) }}">{{  __($subcategory->name) }}</a></li>
                                            @endforeach
                                        @endif
                                        @if(isset($subcategory_id))
                                            <li class="active"><a href="{{ route('products') }}">{{ translate('All Categories')}}</a></li>
                                            <li class="active"><a href="{{ route('products.category', \App\SubCategory::find($subcategory_id)->category->slug) }}">{{  translate(\App\SubCategory::find($subcategory_id)->category->name) }}</a></li>
                                            <li class="active"><a href="{{ route('products.subcategory', \App\SubCategory::find($subcategory_id)->slug) }}">{{  translate(\App\SubCategory::find($subcategory_id)->name) }}</a></li>
                                            @foreach (\App\SubCategory::find($subcategory_id)->subsubcategories as $key3 => $subsubcategory)
                                                <li class="child"><a href="{{ route('products.subsubcategory', $subsubcategory->slug) }}">{{  __($subsubcategory->name) }}</a></li>
                                            @endforeach
                                        @endif
                                        @if(isset($subsubcategory_id))
                                            <li class="active"><a href="{{ route('products') }}">{{ translate('All Categories')}}</a></li>
                                            <li class="active"><a href="{{ route('products.category', \App\SubsubCategory::find($subsubcategory_id)->subcategory->category->slug) }}">{{  translate(\App\SubSubCategory::find($subsubcategory_id)->subcategory->category->name) }}</a></li>
                                            <li class="active"><a href="{{ route('products.subcategory', \App\SubsubCategory::find($subsubcategory_id)->subcategory->slug) }}">{{  translate(\App\SubsubCategory::find($subsubcategory_id)->subcategory->name) }}</a></li>
                                            <li class="current"><a href="{{ route('products.subsubcategory', \App\SubsubCategory::find($subsubcategory_id)->slug) }}">{{  translate(\App\SubsubCategory::find($subsubcategory_id)->name) }}</a></li>
                                        @endif
                                    </ul>
							</div>
							
							<!-- Price -->
							<div class="single-block">
								<h3 class="sidebar-title">Filter By Price</h3>
								<div class="range-slider pt--30">
									<div class="sb-range-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 10.6242%; width: 31.8725%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 10.6242%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 42.4967%;"></span></div>
									<div class="slider-price">
										<p>
											<input type="text" id="amount" readonly="" >
										</p>
									</div>
								</div>
							</div>
							 @isset($category_id)
                                <input type="hidden" name="category" value="{{ \App\Category::find($category_id)->slug }}">
                            @endisset
                            @isset($subcategory_id)
                                <input type="hidden" name="subcategory" value="{{ \App\SubCategory::find($subcategory_id)->slug }}">
                            @endisset
                            @isset($subsubcategory_id)
                                <input type="hidden" name="subsubcategory" value="{{ \App\SubSubCategory::find($subsubcategory_id)->slug }}">
                            @endisset
							<input type="hidden" name="min_price" id="min_price" value="">
                            <input type="hidden" name="max_price"  id="max_price" value="">
							<!-- Size -->
							<div class="single-block">
								<h3 class="sidebar-title">Publications</h3>
							
								<ul class="sidebar-menu--shop menu-type-2">
								    <li><a href="{{route('products.publication',0)}}">All Publicaiton</a></li>
									@foreach(\App\Publication::take(10)->get() as $publication)
    									<li><a href="{{route('products.publication',@$publication->slug)}}">{{$publication->name}} <span>(@if(isset(\App\Product::where(['publication_id'=>$publication->id,'published'=>1])->get()[0])) {{ count(\App\Product::where(['publication_id'=>$publication->id,'published'=>1])->get()) }}  @endif )</span></a></li>
									@endforeach
								</ul>
							</div>
						   
							<!-- Promotion Block -->
							<div class="single-block">
								<a href="#" class="promo-image sidebar">
									<img src="{{asset('public/frontend1/image/others/home-side-promo.jpg')}}" alt="">
								</a>
							</div>
							
						</div>
					</div>
				</div>
				</form>
			</div>
		</main>
@endsection
@section('script')

<script type="text/javascript">
        function filter(){
           
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
   
    $(function() {
            $(".sb-range-slider").slider({
                range: true,
                min: 0,
                max: 753,
                values: [80, 320],
                slide: function(event, ui) {
                    $("#amount").val("Rs" + ui.values[0] + " - Rs" + ui.values[1]);
                    $('#min_price').val(ui.values[0]);
                    $('#max_price').val(ui.values[1]);
                }
            });
            $("#amount").val("Rs" + $(".sb-range-slider").slider("values", 0) +
                " - Rs" + $(".sb-range-slider").slider("values", 1));
        });

        /*-------------------------------------
        	--> Product View Mode
        ---------------------------------------*/
        $('.product-view-mode a').on('click', function(e) {
            e.preventDefault();

            var shopProductWrap = $('.shop-product-wrap');
            var viewMode = $(this).data('target');

            $('.product-view-mode a').removeClass('active');
            $(this).addClass('active');
            shopProductWrap.removeClass('grid list').addClass(viewMode);
            if (shopProductWrap.hasClass('grid')) {
                $('.pm-product').removeClass('product-type-list')
            } else {
                $('.pm-product').addClass('product-type-list')
            }
        })

        /*-------------------------------------
        	--> Quantity
        ---------------------------------------*/
        $('.count-btn').on('click', function() {
            var $button = $(this);
            var oldValue = $button.parent('.count-input-btns').parent().find('input').val();
            if ($button.hasClass('inc-ammount')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent('.count-input-btns').parent().find('input').val(newVal);
        });
        </script>
@endsection