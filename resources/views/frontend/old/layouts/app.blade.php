<!DOCTYPE html>
@if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
<html dir="rtl" lang="en">
@else
<html lang="en">
@endif
<head>

@php
    $seosetting = \App\SeoSetting::first();
@endphp

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<title>@yield('meta_title', config('app.name', 'Laravel'))</title>
<meta name="description" content="@yield('meta_description', $seosetting->description)" />
<meta name="keywords" content="@yield('meta_keywords', $seosetting->keyword)">
<meta name="author" content="{{ $seosetting->author }}">
<meta name="sitemap_link" content="{{ $seosetting->sitemap_link }}">

@yield('meta')

@if(!isset($detailedProduct) && !isset($shop) && !isset($page))
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ config('app.name', 'Laravel') }}">
    <meta itemprop="description" content="{{ $seosetting->description }}">
    <meta itemprop="image" content="{{ static_asset(\App\GeneralSetting::first()->logo) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ $seosetting->description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ static_asset(\App\GeneralSetting::first()->logo) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:image" content="{{ static_asset(\App\GeneralSetting::first()->logo) }}" />
    <meta property="og:description" content="{{ $seosetting->description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
@endif

<!-- Favicon -->
<link type="image/x-icon" href="{{ static_asset(\App\GeneralSetting::first()->favicon) }}" rel="shortcut icon" />

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" media="none" onload="if(media!='all')media='all'">

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ static_asset('frontend/css/bootstrap.min.css') }}" type="text/css" media="all">

<!-- Icons -->
<link rel="stylesheet" href="{{ static_asset('frontend/css/font-awesome.min.css') }}" type="text/css" media="none" onload="if(media!='all')media='all'">
<link rel="stylesheet" href="{{ static_asset('frontend/css/line-awesome.min.css') }}" type="text/css" media="none" onload="if(media!='all')media='all'">

<link type="text/css" href="{{ static_asset('frontend/css/bootstrap-tagsinput.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ static_asset('frontend/css/jodit.min.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ static_asset('frontend/css/sweetalert2.min.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ static_asset('frontend/css/slick.css') }}" rel="stylesheet" media="all">
<link type="text/css" href="{{ static_asset('frontend/css/xzoom.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ static_asset('frontend/css/jssocials.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ static_asset('frontend/css/jssocials-theme-flat.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ static_asset('frontend/css/intlTelInput.min.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ static_asset('css/spectrum.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">

<!-- Global style (main) -->
<link type="text/css" href="{{ static_asset('frontend/css/active-shop.css') }}" rel="stylesheet" media="all">


<link type="text/css" href="{{ static_asset('frontend/css/main.css') }}" rel="stylesheet" media="all">

@if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
     <!-- RTL -->
    <link type="text/css" href="{{ static_asset('frontend/css/active.rtl.css') }}" rel="stylesheet" media="all">
@endif
@yield('custom-style')
<!-- color theme -->
<link href="{{ static_asset('frontend/css/colors/'.\App\GeneralSetting::first()->frontend_color.'.css')}}" rel="stylesheet" media="all">

<!-- Custom style -->
<link type="text/css" href="{{ static_asset('frontend/css/custom-style.css') }}" rel="stylesheet" media="all">
<style>
/*added for back to top*/
.intro-copy {
    
  padding: 1em;
  margin: 50vh auto;
  max-width: 15em;
  font-family: Helvetica;
  font-weight: lighter;
  font-size: 2em;
  line-height: 1.2;
  text-align: center;
}

.top-link {
    
  transition: all .25s ease-in-out;
  position: fixed;
  bottom: 30px;
  left: 0;
  display: inline-flex;
  
  cursor: pointer;
  align-items: center;
  justify-content: center;
  margin: 0 3em 3em 0;
  border-radius: 50%;
  padding: .25em;
  width: 80px;
  height: 80px;
  /*background-color: #F8F8F8;*/
  
  &.show {
    visibility: visible;
    opacity: 1;
  }
  
  &.hide {
    visibility: hidden;
    opacity: 0;
  }

  svg {
    fill: #000;
    width: 24px;
    height: 12px;
  }

  &:hover {
      top:-10px;
    /*background-color: #E8E8E8;*/

    svg {
      fill: #000000;
    }
  }
}
.fs-12{
    font-size:12px;
}
.top-link-img:hover{
    transform: scale(1.5);
}
#top-link-img{
    transition: all .2s ease-in-out;
}
#top-link-img:hover{
    transform:scale(1.2);
}
// Text meant only for screen readers.
.screen-reader-text {
  position: absolute;
  clip-path: inset(50%);
  margin: -1px;
  border: 0;
  padding: 0;
  width: 1px;
  height: 1px;
  overflow: hidden;
  word-wrap: normal !important;
  clip: rect(1px, 1px, 1px, 1px);

  &:focus {
    display: block;
    top: 5px;
    left: 5px;
    z-index: 100000; // Above WP toolbar
    clip-path: none;
    background-color: #eee;
    padding: 15px 23px 14px;
    width: auto;
    height: auto;
    text-decoration: none;
    line-height: normal;
    color: #444;
    font-size: 1em;
    clip: auto !important;
  }
}
/*ends */

.home-slide .slick-dots {
    position: absolute;
    margin: 0;
    padding: 0;
    right: 45%;
    bottom: 20px;
}
.home-slide .slick-dots li button {
    background: #fff;
    height: 13px;
    width: 10px;
    border:0px;
    border-radius: 50%;
    /*height: 4px;*/
    /*width: 25px;*/
    /*border: 0px;*/
    color: transparent;
    font-size: 0;
}
 @media (max-width: 600px) {
     .top-navbar .d-flex align-self-center{
        max-height:30px !important;
     }
}
 @media(min-width: 600px) {
    .top-navbar .d-flex align-self-center{
        max-height:5px !important;
     }
}
.nrn-header-style {
    margin-bottom: 30px;
}
footer h4.nrn-top-heading:before {
    position: absolute;
    bottom: 0;
    left: 0;
    content: "";
    width: 110px;
    height: 2px;
    background: #ff5c00;
}
@media (max-width: 600px) {
     .top-navbar .d-flex .align-self-center{
        max-height:30px !important;
     }
}
 @media(min-width: 600px) {
    .top-navbar .d-flex .align-self-center{
        max-height:5px !important;
     }
}
footer h4.nrn-top-heading {
    font-size:13px !important;
}

    
#scrollToTopBtn {
  background-color: black;
  border: none;
  border-radius: 50%;
  color: white;
  cursor: pointer;
  font-size: 16px;
  line-height: 48px;
  width: 48px;
}


/* sticky footer */
@media(min-width: 800px) {
    .sticky-footer {
     visibility:hidden;
     display:none;
    }
    .fb_dialog_content iframe{
    bottom:30px !important;
}
}
@media(max-width: 800px) {
.sticky-footer {
  background-color:white ;
  /*#333*/
  visibility:visible;
  position: fixed;
  color:black;
  bottom: 0;
  width: 100%;
  z-index: 100;
  text-align:center;
  border-top: 2px solid orange;
}

.sticky-footer a {
  float: left;
  display: block;
  color: black;
  /*#f2f2f2*/
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.sticky-footer a:hover {
  background: #ddd;
  color: black;
}
.fb-customerchat iframe{
    bottom:100px !important;
}
.fb_dialog_content{
    bottom:100px !important;
}
.fb_dialog_content iframe{
    bottom:100px !important;
}
.sticky-nav-box-number {
    position: absolute;
    top: 8px;
    left: 42px;
    font-weight:bold;
    min-width: 25px;
   
    font-size: 12px;
}
}

.cat_menu_view_all_link{
        
         box-shadow:1px 1px 1px 0px silver;
        font-size:1.0rem;
        padding:15px;
    }
    .cat_menu_view_all_link:hover{
        
        box-shadow:0px 1px 1px 2px silver;
    }

/*sticky footer css ends*/
.nav-box-icon{
    color:#ff5c00 !important;
    
}

/*for all category dropdown*/
.category-sidebar .sub-cat-menu {
    left:20% !important;
}


</style>
<!-- jQuery -->
<script src="{{ static_asset('frontend/js/vendor/jquery.min.js') }}"></script>


@if (\App\BusinessSetting::where('type', 'google_analytics')->first()->value == 1)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('TRACKING_ID') }}"></script>

    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ env('TRACKING_ID') }}');
    </script>
@endif

@if (\App\BusinessSetting::where('type', 'facebook_pixel')->first()->value == 1)
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', {{ env('FACEBOOK_PIXEL_ID') }});
  fbq('track', 'PageView');
</script>
<noscript>
  <img height="1" width="1" style="display:none"
       src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}/&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
@endif

</head>
<body>



<!-- MAIN WRAPPER -->
<div class="body-wrap shop-default shop-cards shop-tech gry-bg">
    <!--sticky footer-->
    <div class="sticky-footer">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4 col-4">
                <a href="{{route('home')}}"><i class="fa fa-home" style="color:#ff5c00;" ></i><br><span class="fs-12">Home</span></a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 col-3">
                <a href="{{route('cart')}}"><i class="fa fa-shopping-cart" style="color:#ff5c00;"></i><br><span class="fs-12">Cart</span>
                <!--@if(Session::has('cart'))-->
                <!--    <span class="sticky-nav-box-number" id="cart_items_sidenav">{{ count(Session::get('cart'))}}</span>-->
                <!--@else-->
                <!--    <span class="sticky-nav-box-number" id="cart_items_sidenav">0</span>-->
                <!--@endif-->
                </a>
                
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 col-4" style="margin-right:5px;">
                <a href="{{route('login')}}"><i class="fa fa-user" style="color:#ff5c00;"></i><br><span  class="fs-12">Login/Register</span></a>
            </div>
      </div>
    </div>
    <!-- Header -->
    @include('frontend.inc.nav')
    
    @yield('content')

    @include('frontend.inc.footer')

    @include('frontend.partials.modal')

    @if (\App\BusinessSetting::where('type', 'facebook_chat')->first()->value == 1)
        <div id="fb-root"></div>
        <!-- Your customer chat code -->
        <div class="fb-customerchat"
          attribution=setup_tool
          page_id="{{ env('FACEBOOK_PAGE_ID') }}">
        </div>
    @endif

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>
    
    <a class="top-link hide" href="" id="js-top">
      <!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 6"><path d="M12 6H0l6-6z"/></svg>-->
      <!--<span class="screen-reader-text">-->
          <img id='top-link-img' src="{{asset('public/img/back-to-top.png')}}" style="height:50px;">
           
         
    </a>
    <!--<div class="container-fluid" id='mob-nav-footer'>-->
    <!--    <a class="bottom-link hide" href="" id="js-bottom">-->
    <!--          <img id='bottom-link-img' src="{{asset('public/img/back-to-top.png')}}" style="height:50px;">-->
    <!--    </a>-->
    <!--    <a class="bottom-link hide" href="" id="js-bottom">-->
    <!--         <img id='bottom-link-img' src="{{asset('public/img/back-to-top.png')}}" style="height:50px;">-->
    <!--    </a>-->
    <!--        <img id='bottom-link-img' src="{{asset('public/img/back-to-top.png')}}" style="height:50px;">-->
    <!--    </a>-->
    <!--</div>-->
</div><!-- END: body-wrap -->

<!-- SCRIPTS -->
<!-- <a href="#" class="back-to-top btn-back-to-top"></a> -->

<!-- Core -->
<script src="{{ static_asset('frontend/js/vendor/popper.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/vendor/bootstrap.min.js') }}"></script>

<!-- Plugins: Sorted A-Z -->
<script src="{{ static_asset('frontend/js/jquery.countdown.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/select2.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/nouislider.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/sweetalert2.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/slick.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/jssocials.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/jodit.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/xzoom.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/fb-script.js') }}"></script>
<script src="{{ static_asset('frontend/js/lazysizes.min.js') }}"></script>
<script src="{{ static_asset('frontend/js/intlTelInput.min.js') }}"></script>

<!-- App JS -->
<script src="{{ static_asset('frontend/js/active-shop.js') }}"></script>
<script src="{{ static_asset('frontend/js/main.js') }}"></script>


<script>
    function showFrontendAlert(type, message){
        if(type == 'danger'){
            type = 'error';
        }
        swal({
            position: 'top-end',
            type: type,
            title: message,
            showConfirmButton: false,
            timer: 3000
        });
    }
</script>

@foreach (session('flash_notification', collect())->toArray() as $message)
    <script>
        showFrontendAlert('{{ $message['level'] }}', '{{ $message['message'] }}');
    </script>
@endforeach
<script>

    $(document).ready(function() {
       
       $('.all-category-nav-element').on('mouseover', function(){
            if(!$('.all-category-nav-element').find('.sub-cat-menu').hasClass('loaded')){
                $.get('{{ route('category.all_cat') }}', {_token: '{{ csrf_token()}}'}, function(data){
                    $('.all-category-nav-element').find('.sub-cat-menu').addClass('loaded').html(data);
                });
            }
        });
        
        $('.category-nav-element').each(function(i, el) {
            $(el).on('mouseover', function(){
                if(!$(el).find('.sub-cat-menu').hasClass('loaded')){
                    $.post('{{ route('category.elements') }}', {_token: '{{ csrf_token()}}', id:$(el).data('id')}, function(data){
                        $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                    });
                }
            });
           
        });
        if ($('#lang-change').length > 0) {
            $('#lang-change .dropdown-item a').each(function() {
                $(this).on('click', function(e){
                    e.preventDefault();
                    var $this = $(this);
                    var locale = $this.data('flag');
                    $.post('{{ route('language.change') }}',{_token:'{{ csrf_token() }}', locale:locale}, function(data){
                        location.reload();
                    });

                });
            });
        }

        if ($('#currency-change').length > 0) {
            $('#currency-change .dropdown-item a').each(function() {
                $(this).on('click', function(e){
                    e.preventDefault();
                    var $this = $(this);
                    var currency_code = $this.data('currency');
                    $.post('{{ route('currency.change') }}',{_token:'{{ csrf_token() }}', currency_code:currency_code}, function(data){
                        location.reload();
                    });

                });
            });
        }
    });

    $('#search').on('keyup', function(){
        search();
    });

    $('#search').on('focus', function(){
        search();
    });

    function search(){
        var search = $('#search').val();
        if(search.length > 0){
            $('body').addClass("typed-search-box-shown");

            $('.typed-search-box').removeClass('d-none');
            $('.search-preloader').removeClass('d-none');
            $.post('{{ route('search.ajax') }}', { _token: '{{ @csrf_token() }}', search:search}, function(data){
                if(data == '0'){
                    // $('.typed-search-box').addClass('d-none');
                    $('#search-content').html(null);
                    $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+search+'"</strong>');
                    $('.search-preloader').addClass('d-none');

                }
                else{
                    $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                    $('#search-content').html(data);
                    $('.search-preloader').addClass('d-none');
                }
            });
        }
        else {
            $('.typed-search-box').addClass('d-none');
            $('body').removeClass("typed-search-box-shown");
        }
    }

    function updateNavCart(){
        $.post('{{ route('cart.nav_cart') }}', {_token:'{{ csrf_token() }}'}, function(data){
            $('#cart_items').html(data);
        });
    }

    function removeFromCart(key){
        $.post('{{ route('cart.removeFromCart') }}', {_token:'{{ csrf_token() }}', key:key}, function(data){
            updateNavCart();
            $('#cart-summary').html(data);
            showFrontendAlert('success', 'Item has been removed from cart');
            $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);
        });
    }

    function addToCompare(id){
        $.post('{{ route('compare.addToCompare') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
            $('#compare').html(data);
            showFrontendAlert('success', "{{ translate('Item has been added to compare list') }}");
            $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);
        });
    }

    function addToWishList(id){
        @if (Auth::check() && (Auth::user()->user_type == 'customer' || Auth::user()->user_type == 'seller'))
            $.post('{{ route('wishlists.store') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
                if(data != 0){
                    $('#wishlist').html(data);
                    showFrontendAlert('success', "{{ translate('Item has been added to wishlist') }}");
                }
                else{
                    showFrontendAlert('warning', "{{ translate('Please login first') }}");
                }
            });
        @else
            showFrontendAlert('warning', "{{ translate('Please login first') }}");
        @endif
    }

    function showAddToCartModal(id){
        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }
        $('#addToCart-modal-body').html(null);
        $('#addToCart').modal();
        $('.c-preloader').show();
        $.post("{{ route('cart.showCartModal') }}", {_token:'{{ csrf_token() }}', id:id}, function(data){
            $('.c-preloader').hide();
            $('#addToCart-modal-body').html(data);
            $('.xzoom, .xzoom-gallery').xzoom({
                Xoffset: 20,
                bg: true,
                tint: '#000',
                defaultScale: -1
            });
            getVariantPrice();
        });
    }

    $('#option-choice-form input,select').on('change', function(){
        getVariantPrice();
    });
    
   

    function getVariantPrice(){
        if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity() ){
            $.ajax({
               type:"POST",
               url: '{{ route('products.variant_price') }}',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){
                   $('#option-choice-form #chosen_price_div').removeClass('d-none');
                   $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                   $('#option-choice-form #delivery_charge_div ').removeClass('d-none');
                   $('#option-choice-form #delivery_charge_div #delivery_charge').html(data.delivery_charge);
                   $('#available-quantity').html(data.quantity);
                   $('.input-number').prop('max', data.quantity);
                   //console.log(data.quantity);
                   if(parseInt(data.quantity) < 1 && data.digital  != 1){
                       $('.buy-now').hide();
                       $('.add-to-cart').hide();
                   }
                   else{
                       $('.buy-now').show();
                       $('.add-to-cart').show();
                   }
               }
           });
        }
    }
    
    function checkAddToCartValidity(){
        var names = {};
        $('#option-choice-form input:radio').each(function() { // find unique names
              names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function() { // then count them
              count++;
        });

        if($('#option-choice-form input:radio:checked').length == count){
            return true;
        }

        return false;
    }

    function addToCart(id=null){
        if(checkAddToCartValidity()) {
            $('#addToCart').modal();
            $('.c-preloader').show();
            if(id!=null){
            var inputs={'_token':'{{csrf_token()}}','id':id,'quantity':1};
            }else{
              var  inputs=$('#option-choice-form').serializeArray();
            }
            $.ajax({
               type:"POST",
               url: '{{ route('cart.addToCart') }}',
               
               data: inputs,
               success: function(data){
                   console.log(data);
                   $('#addToCart-modal-body').html(null);
                   $('.c-preloader').hide();
                   $('#modal-size').removeClass('modal-lg');
                   $('#addToCart-modal-body').html(data);
                   updateNavCart();
                   $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
               }
           });
        }
        else{
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }

    function buyNow(){
        if(checkAddToCartValidity()) {
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.ajax({
               type:"POST",
               url: '{{ route('cart.addToCart') }}',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){
                   console.log(data);
                   updateNavCart();
                   $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
                   window.location.replace("{{ route('cart') }}");
               }
           });
        }
        else{
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }

    function show_purchase_history_details(order_id)
    {
        $('#order-details-modal-body').html(null);

        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }

        $.post('{{ route('purchase_history.details') }}', { _token : '{{ @csrf_token() }}', order_id : order_id}, function(data){
            $('#order-details-modal-body').html(data);
            $('#order_details').modal();
            $('.c-preloader').hide();
        });
    }

    function show_order_details(order_id)
    {
        $('#order-details-modal-body').html(null);

        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }

        $.post('{{ route('orders.details') }}', { _token : '{{ @csrf_token() }}', order_id : order_id}, function(data){
            $('#order-details-modal-body').html(data);
            $('#order_details').modal();
            $('.c-preloader').hide();
        });
    }

    function cartQuantityInitialize(){
        $('.btn-number').click(function(e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function() {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function() {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }

     function imageInputInitialize(){
         $('.custom-input-file').each(function() {
             var $input = $(this),
                 $label = $input.next('label'),
                 labelVal = $label.html();

             $input.on('change', function(e) {
                 var fileName = '';

                 if (this.files && this.files.length > 1)
                     fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                 else if (e.target.value)
                     fileName = e.target.value.split('\\').pop();

                 if (fileName)
                     $label.find('span').html(fileName);
                 else
                     $label.html(labelVal);
             });

             // Firefox bug fix
             $input
                 .on('focus', function() {
                     $input.addClass('has-focus');
                 })
                 .on('blur', function() {
                     $input.removeClass('has-focus');
                 });
         });
     }
 
//  added for back to top
// Set a variable for our button element.
const scrollToTopButton = document.getElementById('js-top');

// Let's set up a function that shows our scroll-to-top button if we scroll beyond the height of the initial window.
const scrollFunc = () => {
  // Get the current scroll value
  let y = window.scrollY;
  
  // If the scroll value is greater than the window height, let's add a class to the scroll-to-top button to show it!
  if (y > 0) {
    scrollToTopButton.className = "top-link show";
  } else {
    scrollToTopButton.className = "top-link hide";
  }
};

window.addEventListener("scroll", scrollFunc);

const scrollToTop = () => {
  // Let's set a variable for the number of pixels we are from the top of the document.
  const c = document.documentElement.scrollTop || document.body.scrollTop;
  
  // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
  // We'll also animate that scroll with requestAnimationFrame:
  // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
  if (c > 0) {
    window.requestAnimationFrame(scrollToTop);
    // ScrollTo takes an x and a y coordinate.
    // Increase the '10' value to get a smoother/slower scroll!
    window.scrollTo(0, c - c / 10);
  }
};

// When the button is clicked, run our ScrolltoTop function above!
scrollToTopButton.onclick = function(e) {
  e.preventDefault();
  scrollToTop();
}


</script>

@yield('script')

</body>
</html>
