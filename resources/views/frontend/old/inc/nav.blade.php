<style>
    .top-navbar .inline-links > li:not(:last-of-type) {
        margin-right:-5px;
    }
    hover_link:hover{
        color:orange !important;
    }
    .nrn-top-130{
        top:130px !important;
    }
    .bg-orange{
        background-color:#ff5c00 !important;
        /*rgb(247,69,31) !important;*/
    }
</style>
@php
    $generalsetting = \App\GeneralSetting::first();
@endphp
<div class="header bg-white">
    <!-- Top Bar -->
    <div class="top-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col">
                
                    <div class="d-flex align-self-center" >
                        <!--style="max-height:5px;"-->
                        <ul class="inline-links" style="padding-top:0px;">
                            
                                
                                <li><a href="tel:+9779862713352" class="top-bar-item" style="padding-top:5px;"><img src="{{asset('public/frontend/images/icons/whatsapp.png')}}" style="width:24px;"></a></li>
                                <!--<li style="padding-left:0px; padding-right:0px;"><a class="top-bar-item" >|</a></li>-->
                                <li><a href="tel:+977{{ $generalsetting->phone }}" class='top-bar-item' style="padding-top:5px;"><img src="{{asset('public/frontend/images/icons/viber.png')}}" style="width:24px;"></a></li>
                                <!--<li><a href="tel:+977{{ $generalsetting->phone }}" class="top-bar-item" style="padding-top:5px;"><i class="fa fa-mobile fa-2x"></i></a></li> -->
                                <li> <a href="tel:+977{{ $generalsetting->phone }}" class="top-bar-item" style="margin-right:20px; font-weight:bold;" >+977-{{ $generalsetting->phone }} </a> </li>
                                <!--<li class="d-none d-md-block" style="margin-left:0px;" ><a class="top-bar-item" style="margin-left:0px;"><b>9801051468</b></a></li>-->
                                
                                    <!--<a href="{{ route('orders.track') }}" class="top-bar-item ">{{ translate('Track Order')}}</a>-->
                                
                            @auth
                                <li>
                                    <a href="{{ route('dashboard') }}" class="top-bar-item d-md-none">{{ translate('My Panel')}}</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="top-bar-item d-md-none">{{ translate('Logout')}}</a>
                                </li>
                            @else
                                <li class="">
                                    <a href="{{ route('user.login') }}" class="top-bar-item d-md-none">{{ translate('Login')}}</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.registration') }}" class="top-bar-item d-md-none">{{ translate('Registration')}}</a>
                                </li>
                            @endauth
                        </ul>
                        
                </div>
                 
                </div>
                <div class="col-lg-3">
                    
                    <marquee behavior="alternate" class=""><a href="" class="top-bar-item" style="font-size:1.02rem;"><b><i class="fa fa-phone"></i> {{ $generalsetting->phone }}</b></a></marquee>
                    
                       
                </div>
                <div class="col-5 text-right d-none d-lg-block">
                    <ul class="inline-links">
                         <li>
                            <a href="{{ route('orders.track') }}" class="top-bar-item "><b>{{ translate('Track Your Order')}}</b></a>
                                 
                        </li>
                        <li><a class="top-bar-item" style="padding-left:0px; margin-left:0px;">|</a></li>
                        <li>
                            <a href="{{ route('shops.create') }}" class="top-bar-item">
                                        <b>{{ translate('sell on Gobazaar') }}</b>
                                    </a>
                                   
                        </li>
                        <li><a class="top-bar-item" style="padding-left:0px; margin-left:0px;">|</a></li>
                        <li>
                            
                            <a href="{{ route('compare') }}" class="top-bar-item" >
                                <b style="font-size:13px !important;">
                                <i class="la la-refresh"></i>
                                {{translate('Compare')}}
                                @if(Session::has('compare'))
                                    <span class="badge" id="compare_items_sidenav">{{ count(Session::get('compare'))}}</span>
                                @else
                                    <span class="badge" id="compare_items_sidenav">0</span>
                                @endif
                                </b>
                            </a>
                            
                        </li>
                        
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Top Bar -->

    <!-- mobile menu -->
    <div class="mobile-side-menu d-lg-none">
        <div class="side-menu-overlay opacity-0" onclick="sideMenuClose()"></div>
        <div class="side-menu-wrap opacity-0">
            <div class="side-menu closed">
                <div class="side-menu-header ">
                    <div class="side-menu-close" onclick="sideMenuClose()">
                        <i class="la la-close"></i>
                    </div>
                    
                    
                    @auth
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                            @if (Auth::user()->avatar_original != null)
                                <div class="image " style="background-image:url('{{ my_asset(Auth::user()->avatar_original) }}')"></div>
                            @else
                                <div class="image " style="background-image:url('{{ static_asset('frontend/images/user.png') }}')"></div>
                            @endif

                            <div class="name">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="{{ route('logout') }}">{{translate('Sign Out')}}</a>
                        </div>
                    @else
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                            <div class="image " style="background-image:url('{{ static_asset('frontend/images/icons/user-placeholder.jpg') }}')"></div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="{{ route('user.login') }}">{{translate('Sign In')}}</a>
                            <a href="{{ route('user.registration') }}">{{translate('Registration')}}</a>
                        </div>
                    @endauth
                </div>
                <div class="side-menu-list px-3">
                    <ul class="side-user-menu">
                         @foreach (\App\Category::take(11)->get() as $key => $category)
                            <li>
                            <a href="{{ route('products.category', $category->slug) }}" class="text-truncate">
                                        <img class="cat-image lazyload" src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($category->icon) }}" width="13" alt="{{ __($category->name) }}">
                                        <span>{{ __($category->name) }}</span>
                                    </a>
                                </li>
                        @endforeach
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="la la-home"></i>
                                <span>{{translate('Home')}}</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="la la-dashboard"></i>
                                <span>{{translate('Dashboard')}}</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('purchase_history.index') }}">
                                <i class="la la-file-text"></i>
                                <span>{{translate('Purchase History')}}</span>
                            </a>
                        </li>
                        @auth
                            @php
                                $conversation = \App\Conversation::where('sender_id', Auth::user()->id)->where('sender_viewed', '1')->get();
                            @endphp
                            @if (\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1)
                                <li>
                                    <a href="{{ route('conversations.index') }}" class="{{ areActiveRoutesHome(['conversations.index', 'conversations.show'])}}">
                                        <i class="la la-comment"></i>
                                        <span class="category-name">
                                            {{translate('Conversations')}}
                                            @if (count($conversation) > 0)
                                                <span class="ml-2" style="color:green"><strong>({{ count($conversation) }})</strong></span>
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @endauth
                        <li>
                            <a href="{{ route('compare') }}">
                                <i class="la la-refresh"></i>
                                <span>{{translate('Compare')}}</span>
                                @if(Session::has('compare'))
                                    <span class="badge" id="compare_items_sidenav">{{ count(Session::get('compare'))}}</span>
                                @else
                                    <span class="badge" id="compare_items_sidenav">0</span>
                                @endif
                            </a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="{{ route('cart') }}">-->
                        <!--        <i class="la la-shopping-cart"></i>-->
                              
                        <!--        <span>{{translate('Cart')}}</span>-->
                        <!--        @if(Session::has('cart'))-->
                        <!--            <span class="badge" id="cart_items_sidenav">{{ count(Session::get('cart'))}}</span>-->
                        <!--        @else-->
                        <!--            <span class="badge" id="cart_items_sidenav">0</span>-->
                        <!--        @endif-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--    <a href="{{ route('wishlists.index') }}" >-->
                        <!--        <i class="la la-heart-o" ></i>-->
                        <!--        <span>{{translate('Wishlist')}}</span>-->
                        <!--    </a>-->
                        <!--</li>-->

                        @if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1)
                            <li>
                                <a href="{{ route('customer_products.index') }}">
                                    <i class="la la-diamond"></i>
                                    <span>{{translate('Classified Products')}}</span>
                                </a>
                            </li>
                        @endif

                        @if (\App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1)
                            <li>
                                <a href="{{ route('wallet.index') }}">
                                    <i class="la la-dollar"></i>
                                    <span>{{translate('My Wallet')}}</span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="{{ route('profile') }}">
                                <i class="la la-user"></i>
                                <span>{{translate('Manage Profile')}}</span>
                            </a>
                        </li>

                        @php
                            $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                            $club_point_addon = \App\Addon::where('unique_identifier', 'club_point')->first();
                        @endphp
                        @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                            <li>
                                <a href="{{ route('customer_refund_request') }}" class="{{ areActiveRoutesHome(['customer_refund_request'])}}">
                                    <i class="la la-file-text"></i>
                                    <span class="category-name">
                                        {{translate('Sent Refund Request')}}
                                    </span>
                                </a>
                            </li>
                        @endif

                        @if ($club_point_addon != null && $club_point_addon->activated == 1)
                            <li>
                                <a href="{{ route('earnng_point_for_user') }}" class="{{ areActiveRoutesHome(['earnng_point_for_user'])}}">
                                    <i class="la la-dollar"></i>
                                    <span class="category-name">
                                        {{translate('Earning Points')}}
                                    </span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="{{ route('support_ticket.index') }}" class="{{ areActiveRoutesHome(['support_ticket.index', 'support_ticket.show'])}}">
                                <i class="la la-support"></i>
                                <span class="category-name">
                                    {{translate('Support Ticket')}}
                                </span>
                            </a>
                        </li>

                    </ul>
                    @if (Auth::check() && Auth::user()->user_type == 'seller')
                        <div class="sidebar-widget-title py-0">
                            <span>{{translate('Shop Options')}}</span>
                        </div>
                        <ul class="side-seller-menu">
                            <li>
                                <a href="{{ route('seller.products') }}">
                                    <i class="la la-diamond"></i>
                                    <span>{{translate('Products')}}</span>
                                </a>
                            </li>

                            @if (\App\Addon::where('unique_identifier', 'pos_system')->first() != null && \App\Addon::where('unique_identifier', 'pos_system')->first()->activated)
                                <li>
                                    <a href="{{route('poin-of-sales.seller_index')}}">
                                        <i class="la la-fax"></i>
                                        <span>
                                            {{translate('POS Manager')}}
                                        </span>
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a href="{{ route('orders.index') }}">
                                    <i class="la la-file-text"></i>
                                    <span>{{translate('Orders')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shops.index') }}">
                                    <i class="la la-cog"></i>
                                    <span>{{translate('Shop Setting')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('withdraw_requests.index') }}">
                                    <i class="la la-money"></i>
                                    <span>
                                        {{translate('Money Withdraw')}}
                                    </span>
                                </a>
                            </li>

                            @php
                                $conversation = \App\Conversation::where('receiver_id', Auth::user()->id)->where('receiver_viewed', '1')->get();
                            @endphp
                            @if (\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1)
                                <li>
                                    <a href="{{ route('conversations.index') }}" class="{{ areActiveRoutesHome(['conversations.index', 'conversations.show'])}}">
                                        <i class="la la-comment"></i>
                                        <span class="category-name">
                                            {{translate('Conversations')}}
                                            @if (count($conversation) > 0)
                                                <span class="ml-2" style="color:green"><strong>({{ count($conversation) }})</strong></span>
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a href="{{ route('payments.index') }}">
                                    <i class="la la-cc-mastercard"></i>
                                    <span>{{translate('Payment History')}}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-widget-title py-0">
                            <span>{{translate('Earnings')}}</span>
                        </div>
                        <div class="widget-balance py-3">
                            <div class="text-center">
                                <div class="heading-4 strong-700 mb-4">
                                    @php
                                        $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-30d'))->get();
                                        $total = 0;
                                        foreach ($orderDetails as $key => $orderDetail) {
                                            if($orderDetail->order != null && $orderDetail->order != null && $orderDetail->order->payment_status == 'paid'){
                                                $total += $orderDetail->price;
                                            }
                                        }
                                    @endphp
                                    <small class="d-block text-sm alpha-5 mb-2">{{translate('Your earnings (current month)')}}</small>
                                    <span class="p-2 bg-base-1 rounded">{{ single_price($total) }}</span>
                                </div>
                                <table class="text-left mb-0 table w-75 m-auto">
                                    <tbody>
                                    <tr>
                                        @php
                                            $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                                            $total = 0;
                                            foreach ($orderDetails as $key => $orderDetail) {
                                                if($orderDetail->order != null && $orderDetail->order->payment_status == 'paid'){
                                                    $total += $orderDetail->price;
                                                }
                                            }
                                        @endphp
                                        <td class="p-1 text-sm">
                                            {{translate('Total earnings')}}:
                                        </td>
                                        <td class="p-1">
                                            {{ single_price($total) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        @php
                                            $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-60d'))->where('created_at', '<=', date('-30d'))->get();
                                            $total = 0;
                                            foreach ($orderDetails as $key => $orderDetail) {
                                                if($orderDetail->order != null && $orderDetail->order->payment_status == 'paid'){
                                                    $total += $orderDetail->price;
                                                }
                                            }
                                        @endphp
                                        <td class="p-1 text-sm">
                                            {{translate('Last Month earnings')}}:
                                        </td>
                                        <td class="p-1">
                                            {{ single_price($total) }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                @endif
                <!-- <div class="sidebar-widget-title py-0">
                        <span>Categories</span>
                    </div>
                    <ul class="side-seller-menu">
                        @foreach (\App\Category::all() as $key => $category)
                    <li>
                    <a href="{{ route('products.category', $category->slug) }}" class="text-truncate">
                                <img class="cat-image lazyload" src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($category->icon) }}" width="13" alt="{{ __($category->name) }}">
                                <span>{{ __($category->name) }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    <!-- end mobile menu -->

    <div class="position-relative logo-bar-area  text-black">
<!--orange background css: nrn-header-style-->
        <div class="container-fluid pb-2">
            <div class="row no-gutters align-items-center">
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="d-flex justify-content-center text-center text-md-left">
                        

                        <!-- Brand/Logo -->
                        <a class="navbar-brand w-100 text-center" href="{{ route('home') }}">
                            @php
                                $generalsetting = \App\GeneralSetting::first();
                            @endphp
                            @if($generalsetting->logo != null)
                                <img src="{{ my_asset($generalsetting->logo) }}" alt="{{ env('APP_NAME') }}">
                            @else
                                <img src="{{ static_asset('frontend/images/logo/logo.png') }}" alt="{{ env('APP_NAME') }}">
                            @endif
                        </a>


                    </div>
                </div>
                <div class="col-12 d-block d-md-none">
                     <form class="pt-3" action="{{ route('search') }}" method="GET">
                                <div class="d-flex position-relative">
                                    <div class="w-100 d-block">
                                        <input type="text" aria-label="Search" id="search" name="q" class="form-control w-100 rounded" placeholder="{{translate('I am shopping for...')}}" autocomplete="off">
                                    </div>

                                    <button class="d-lg-block" style="line-height: 27px !important;width: 63px ;margin: 0 ;position: absolute;left: auto;right: 0;top: 0 ;font-size: 16px ;color: #fff !important;border-radius: 0 4px 4px 0 ;background-color: rgb(247,69,31) ;border: 2px solid white ;" type="submit">
                                        <i class="la la-search la-flip-horizontal"></i>
                                    </button>
                                    <div class="typed-search-box d-none">
                                        <div class="search-preloader">
                                            <div class="loader"><div></div><div></div><div></div></div>
                                        </div>
                                        <div class="search-nothing d-none">

                                        </div>
                                        <div id="search-content">

                                        </div>
                                    </div>
                                </div>
                            </form>

                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 position-static">
                    <div class="d-flex justify-content-between">
                        <div class="search-box flex-grow-1 px-4">
                            <form action="{{ route('search') }}" method="GET">
                                <div class="d-flex position-relative" style="border-style:solid; border-color:rgb(247,69,31) !important; border-width:1px;  border-radius:7px;">
                                    <!--<div class="d-lg-none search-box-back">-->
                                    <!--    <button class="" type="button"><i class="la la-long-arrow-left"></i></button>-->
                                    <!--</div>-->
                                    <div class="form-group category-select d-none d-xl-block">
                                        <select class="form-control selectpicker" name="category">
                                            <option value="">{{translate('All Categories')}}</option>
                                            @foreach (\App\Category::get() as $key => $category)
                                                <option value="{{ $category->slug }}"
                                                        @isset($category_id)
                                                        @if ($category_id == $category->id)
                                                        selected
                                                    @endif
                                                    @endisset
                                                >{{ __($category->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-100 d-block">
                                        <input type="text" aria-label="Search" id="search" name="q" class="rounded-right w-100" placeholder="{{translate('I am shopping for...')}}" autocomplete="off">
                                    </div>

                                    <button class="d-none d-lg-block nrn-search-btn bg-orange" type="submit">
                                        <i class="la la-search la-flip-horizontal"></i>
                                    </button>
                                    <div class="typed-search-box d-none">
                                        <div class="search-preloader">
                                            <div class="loader"><div></div><div></div><div></div></div>
                                        </div>
                                        <div class="search-nothing d-none">

                                        </div>
                                        <div id="search-content">

                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mt-4">
                    
                    
                   <div>
                       <div class="d-block d-lg-none mobile-menu-icon-box bg-black rounded">
                            <!-- Navbar toggler  -->
                            <a href="" onclick="sideMenuOpen(this)">
                                <div class="hamburger-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </div>
                   </div>
                        
                    <div class="logo-bar-icons d-flex ml-auto">
                        <!--<div class="d-inline-block d-lg-none">-->
                        <!--    <div class="nav-search-box">-->
                        <!--        <a href="#" class="nav-box-link">-->
                        <!--            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        <div class="d-none d-lg-inline-block px-2">
                            <div class="nav-wishlist-box" id="wishlist">
                                <a href="{{ route('wishlists.index') }}" class="nav-box-link">
                                    <i class="la la-heart d-inline-block nav-box-icon" style="color:rgb(247,69,31) !important; font-size:30px !important;"></i>
                                    <span class="nav-box-text d-none d-xl-inline-block text-uppercase text-black" >{{translate('Wishlist')}}</span>
                                </a>
                            </div>
                        </div>
                        <div class="d-none d-lg-block " data-hover="dropdown">
                            <!--d-inline-block-->
                            <div class="nav-cart-box dropdown" id="cart_items" style="margin-top:0px !important;">
                                <a href="" class="nav-box-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-shopping-cart d-inline-block nav-box-icon nrn-nav-cart-icon" style="font-size:30px !important; margin-top:0px; padding-top:0px;"></i>
                                    <span class="nav-box-text d-none d-xl-inline-block text-uppercase text-black" >{{translate('Cart')}}</span>
                                    
                                    @if(Session::has('cart'))
                                        <span class="nav-box-number bg-black">{{ count(Session::get('cart'))}}</span>
                                    @else
                                        <span class="nav-box-number bg-black">0</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right px-0">
                                    <li>
                                        <div class="dropdown-cart px-0">
                                            @if(Session::has('cart'))
                                                @if(count($cart = Session::get('cart')) > 0)
                                                    <div class="dc-header">
                                                        <h3 class="heading heading-6 strong-700">{{translate('Cart Items')}}</h3>
                                                    </div>
                                                    <div class="dropdown-cart-items c-scrollbar">
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach($cart as $key => $cartItem)
                                                            @php
                                                                $product = \App\Product::find($cartItem['id']);
                                                                $total = $total + $cartItem['price']*$cartItem['quantity'];
                                                            @endphp
                                                            <div class="dc-item">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="dc-image">
                                                                        <a href="{{ route('product', $product->slug) }}">
                                                                            <img src="{{ static_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($product->thumbnail_img) }}" class="img-fluid lazyload" alt="{{ __($product->name) }}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="dc-content">
                                                                                <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                                                    <a href="{{ route('product', $product->slug) }}">
                                                                                        {{ __($product->name) }}
                                                                                    </a>
                                                                                </span>

                                                                        <span class="dc-quantity">x{{ $cartItem['quantity'] }}</span>
                                                                        <span class="dc-price">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>
                                                                    </div>
                                                                    <div class="dc-actions">
                                                                        <button onclick="removeFromCart({{ $key }})">
                                                                            <i class="la la-close"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="dc-item py-3">
                                                        <span class="subtotal-text">{{translate('Subtotal')}}</span>
                                                        <span class="subtotal-amount">{{ single_price($total) }}</span>
                                                    </div>
                                                    <div class="py-2 text-center dc-btn">
                                                        <ul class="inline-links inline-links--style-3">
                                                            <li class="px-1">
                                                                <a href="{{ route('cart') }}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                                                    <i class="la la-shopping-cart"></i> {{translate('View cart')}}
                                                                </a>
                                                            </li>
                                                            @if (Auth::check())
                                                                <li class="px-1">
                                                                    <a href="{{ route('checkout.shipping_info') }}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                                                        <i class="la la-mail-forward"></i> {{translate('Checkout')}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                @else
                                                    <div class="dc-header">
                                                        <h3 class="heading heading-6 strong-700">{{translate('Your Cart is empty')}}</h3>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="dc-header">
                                                    <h3 class="heading heading-6 strong-700">{{translate('Your Cart is empty')}}</h3>
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container-fluid px-0 bg-orange">
            <!--px-0-->
            <div class="row no-gutters align-items-center">
                
                <!--<div class="col-lg-2 col-8">-->
                    <!--<div class="category-sidebar mega-left-title d-none d-md-block">-->
                        <!--d-flex mega-left-title w-100 d-none d-md-block-->
                         <!--<ul class="categories no-scrollbar d-flex">-->
                         <!--       <li class="all-category-nav-element border-bottom-0">-->
                         <!--           <a href="{{ route('categories.all') }}" class="text-truncate text-white">-->
                         <!--               <span class="cat-name font-weight-bold">All Categories</span>-->
                         <!--               <i class="fa fa-caret-down px-2"></i>-->
                         <!--           </a>-->
                         <!--            <div class="sub-cat-menu c-scrollbar nrn-top-130">-->
                         <!--               <div class="c-preloader">-->
                         <!--                   <i class="fa fa-spin fa-spinner"></i>-->
                         <!--               </div>-->
                         <!--           </div>-->
                         <!--       </li>-->
                         <!--   </ul>-->
                        <!--<div class="mega-left-title w-100 d-none d-md-block all-category-nav-element"> <a href="{{ route('categories.all') }}"> <strong class="text-white" >All Categories</strong></a>-->
                        <!--    <div class="sub-cat-menu c-scrollbar nrn-top-130">-->
                        <!--        <div class="c-preloader">-->
                        <!--            <i class="fa fa-spin fa-spinner"></i>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                <div class="col-lg-9 col-4 position-static">
                    <div class="d-flex justify-content-between">
                        <div class="search-box flex-grow-1 px-4">
                            <div class="category-sidebar" style="margin-left:0px !important; padding-left:0px !important;">
                                
                                <ul class="categories no-scrollbar d-flex" style="margin-left:0px; padding-left:0px;">
                                   
                                    <li class="all-category-nav-element border-bottom-0" style="background:black; color:white; margin-right:0px; padding-right:0px; ">
                                        <div class="hamburger-icon text-truncate" style="margin-left:5px; margin-top:5px; " >
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                         <div class="sub-cat-menu c-scrollbar nrn-top-130">
                                            <div class="c-preloader">
                                                <i class="fa fa-spin fa-spinner"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="all-category-nav-element border-bottom-0" style="background-color:black;">
                                        
                                        <a href="{{ route('categories.all') }}" class="text-truncate text-white">
                                            
                                            <span class="cat-name font-weight-bold"> 
                                             All Categories</span>
                                            <i class="fa fa-caret-down px-2"></i>
                                        </a>
                                        
                                         <div class="sub-cat-menu c-scrollbar nrn-top-130">
                                            <div class="c-preloader">
                                                <i class="fa fa-spin fa-spinner"></i>
                                            </div>
                                        </div>
                                    </li>
                                @foreach (\App\Category::where('top_cat', '1')->orderBy('updated_at','asc')->get() as $key => $category)
                                    @php
                                        $brands = array();
                                    @endphp
                                    <li class="category-nav-element border-bottom-0" data-id="{{ $category->id }}">
                                        <a href="{{ route('products.category', $category->slug) }}" class="text-truncate text-white">
                                            <span class="cat-name font-weight-bold">{{ __($category->name) }}</span>
                                            <i class="fa fa-caret-down px-1"></i>
                                        </a>
                                        @if(count($category->subcategories)>0)
                                            <div class="sub-cat-menu c-scrollbar nrn-top-132">
                                                <div class="c-preloader">
                                                    <i class="fa fa-spin fa-spinner"></i>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                                <!--<div class="dropdown">-->
                                <!--      <a href="#" class="dropbtn" style="font-size:13px !important;">Dropdown</a>-->
                                <!--      <div class="dropdown-content">-->
                                <!--        <a href="#">Link 1</a>-->
                                <!--        <a href="#">Link 2</a>-->
                                <!--        <a href="#">Link 3</a>-->
                                <!--      </div>-->
                                <!--</div>-->
                                @foreach (\App\Menu::where(['location'=>'top','menu_id'=>null])->get() as $key=>$menu)
                                    @php
                                        $brands = array();
                                    @endphp
                                    
                                    @php 
                                       $tmp_menu=array();
                                        @$tmp_menu=\App\Menu::where('menu_id',@$menu->id)->get(); 
                                        if(!isset($tmp_menu[0]->id)){
                                            @$tmp_menu=null;
                                        }
                                    @endphp
                                    
                                    <li class="category-nav-element border-bottom-0">
                                        <a href="{{@$menu->link}}" class="text-truncate text-white">
                                            <span class="cat-name font-weight-bold">{{@$menu->name}}</span>
                                            @if(isset($tmp_menu[0]->id))<i class="fa fa-caret-down px-1"></i>@endif
                                        </a>
                                         @if(isset($tmp_menu[0]->id))                                 
                                        <div class="sub-cat-menu c-scrollbar nrn-top-130 loaded" style=" position:absolute;">
                                            <div class="sub-cat-main no-gutters">
                                                <div class="col-6">
                                                    <div class="sub-cat-content">
                                                        <div class="sub-cat-list">
                                                            <div class="card-columns">
                                                                <div class="card">
                                                                    <ul class="sub-cat-items">
                                                                         @foreach($tmp_menu as $ind_sub_menu)
                                                                        <li class="sub-cat-name"><a href="{{@$ind_sub_menu->link}}" class="hover_link">{{@$ind_sub_menu->name}}</a></li>
                                                                        @endforeach
                                                                        <!--<li><a href="http://servernp.com/search?subsubcategory=suv-wKPjj">suv</a></li>-->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    
                                @endforeach
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none col-lg-3 d-md-flex justify-content-end align-self-center" style="padding-right:8px !important;">
                        <ul class="inline-links">
                            @auth
                                <li>
                                    <a href="{{ route('dashboard') }}" class="top-bar-item text-white">{{ translate('My Panel')}}</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="top-bar-item text-white">{{ translate('Logout')}}</a>
                                </li>
                            @else
                                <i class="fa fa-lock"></i>
                                <li>
                                    <a href="{{ route('user.login') }}" class="top-bar-item text-white">{{ translate('Login')}}</a>
                                </li>|
                                <li>
                                    <a href="{{ route('user.registration') }}" class="top-bar-item text-white">{{ translate('Registration')}}</a>
                                </li>
                            @endauth
                        </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="hover-category-menu" id="hover-category-menu">
        <div class="container">
            <div class="row no-gutters position-relative">
                <div class="col-lg-2 col-md-3 col-sm-2 col-xs-2 position-static">
                    <div class="category-sidebar" id="category-sidebar">
                        <div class="all-category">
                            <span>{{translate('CATEGORIES')}}</span>
                            <a href="{{ route('categories.all') }}" class="d-inline-block">{{ translate('See All') }} ></a>
                        </div>
                        <ul class="categories">
                            @foreach (\App\Category::all()->take(11) as $key => $category)
                                @php
                                    $brands = array();
                                @endphp
                                <li class="category-nav-element" data-id="{{ $category->id }}">
                                    <a href="{{ route('products.category', $category->slug) }}">
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

            </div>
        </div>
    </div>
</div>





<!-- Navbar -->
{{--<div class="main-nav-area d-none d-lg-block">--}}
{{--        <nav class="navbar navbar-expand-lg navbar--bold navbar--style-2 navbar-light bg-default">--}}
{{--            <div class="container">--}}
{{--                <div class="collapse navbar-collapse align-items-center justify-content-center" id="navbar_main">--}}
{{--                    <ul class="navbar-nav">--}}
{{--                        @foreach (\App\Search::orderBy('count', 'desc')->get()->take(5) as $key => $search)--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ route('suggestion.search', $search->query) }}">{{ $search->query }}</a>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--    </ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}
{{--</div> --}}
