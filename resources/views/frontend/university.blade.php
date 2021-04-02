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

 <link rel="stylesheet" href="{{asset('public/frontend/css/custom/theme.css')}}">
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
@media (min-width: 768px) {
	.header-university {
		background: url('https://university.goto.com.pk/images/banner-bg.jpg') no-repeat top center transparent;
		background-size: cover;
		padding: 0px 0px 30px 0px;
	}
	.left-column h3 {
		font-size: 34px;
		margin-top: 25px;
	}
	.left-column .btn-joinus{
		margin: 20px 0px 0px 0px!important;
	}
	.btn-joinus {
		font-size: 18px;
		padding: 10px 45px;
	}
	.hidden-mobile-portrait {
		display: block;
	}
	.visible-mobile-portrait {
		display: none;
	}
}

@media (max-width: 767px) {
	.header-university {background: url('https://university.goto.com.pk/images/banner-bg.jpg') no-repeat top center transparent; background-size: cover; padding: 20px 0px;	}
	.header-university .parent-block{ display: inline-block; margin: 25px 0px; }
	.header-university .parent-block .left-column, .right-column { width: 100%; display: inline-block;}
	.header-university .parent-block .left-column p{ margin-right: 0%; font-size: 30px;}
	.header-university .parent-block .left-column p strong{ display: block;}
	.left-column,.right-column {text-align: center;	}
	.left-column h3 {	font-size: 16px;}
	.btn-joinus {font-size: 20px;padding: 12px 45px;margin: 15px 0px 0px 0px!important;	}
	.hidden-mobile-portrait {display: none;	}
	.visible-mobile-portrait {display: block;	}
	.faq-accordian h2 {	padding: 0px 0px 10px 0px;}
	.how-can-sell h4{ font-size: 18px; } 
	.how-can-sell .child-block p{ font-size: 13px;}
	.expand-business h2 { font-size: 22px;  margin: 30px 0px;   text-transform: uppercase;}
	.how-can-sell h2{ font-size: 26px; text-transform: uppercase; margin: 10px 0px 30px 0px; }
	.how-can-sell .parent-block{ margin-bottom: 40px;} 
	.become-a-seller{ text-align: center; }
	.become-a-seller span{ display: block; font-size: 20px;}
	.become-a-seller .btn-joinus{ float: none!important; font-size: 15px;}
	.faq-accordion{ width: 90%;} 
	.how-can-sell .child-block{ vertical-align: middle;}
	.tutorials-banner h2{ font-size: 22px; line-height: 28px; }
	.tutorials-list { padding: 20px 0px;}
	.tutorials .video-title{ font-size: 13px; }
}

@media (max-width: 480px) {}

@media (min-width: 481px) {}

@media only screen and (min-width: 768px) and (max-width: 992px) {
	.header-university .left-column,.header-university  .video.right-column  { max-width: 50%!important; min-width: 50%!important; width: 50%!important; }
	.left-column p{ margin-right: 0px;}
	.btn-joinus { font-size: 18px;padding: 8px 40px;	margin: 10px 0px 0px 0px!important;	}
	.left-column p { font-size: 30px; margin-right: 10%;}
	.video.right-column iframe{ height:185px;  }
	.tutorials-banner h2{ font-size: 25px; line-height: 35px; }
	.tutorials-list { padding: 30px 0px;}
	.tutorials .video-title{ font-size: 15px; }
}

@media ( min-width: 993px ) {
	.header-university .left-column { width: 40%; }
	.header-university .video.right-column { width: 60%; }
	.left-column p {margin-right: 25%; font-size: 40px;}
	.tutorials-banner h2{ font-size: 45px; line-height: 55px; }
	.tutorials-list { padding: 50px 0px;}
	.tutorials .video-title{ font-size: 18px; 
	    
	}
}
col text-center text-md-left{
    text-align:left !important;
}
.footer-bottom, .footer-top {
     background-color:#F5F5F5;
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

    <!-- Header -->
    @include('frontend.inc.nav')
    <div class="container-fluid">
    <!-- Content Start -->
      <section class="expand-business" style="background: url('https://university.goto.com.pk/images/banner-bg.jpg') no-repeat top center transparent; background-size: cover; padding: 20px 0px;">
         <h2 class="text-center" style="color:white;">Expand your business throughout Nepal</h2>
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <img src="https://university.goto.com.pk/images/millions-of-customer.png" class="img-responsive" alt="" />
                  <span style="color:white;">Millions of Customers </span>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <img src="https://university.goto.com.pk/images/thousands-sellers.png" class="img-responsive" alt="" />
                  <span style="color:white;">Thousands of Sellers</span>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <img src="https://university.goto.com.pk/images/nationwide-shipment.png" class="img-responsive" alt="" />
                  <span style="color:white;">Nationwide Shipment</span>
               </div>
            </div>
         </div>
      </section>
      <section id="how-can-sell" class="how-can-sell text-center">
         <h2>How can I sell on Unique Store?</h2>
         <div class="container text-left">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="parent-block">
						<div class="child-block"><img src="https://university.goto.com.pk/images/product-listing.png" class="img-responsive" alt="" /></div>
						<div class="child-block"><h4>Product listing</h4>
						<p>List your products on Unique Store product catalogue. Unique Store takes care of photography and marketing of the products.</p>
						</div>
					</div>
			   </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="parent-block">
						<div class="child-block"><img src="https://university.goto.com.pk/images/packaging.png" class="img-responsive" alt="" /></div>
						<div class="child-block"><h4>Packaging</h4>
						<p>Pack the orders according to Unique Store guidelines within one business day.</p>
						</div>
					</div>
			   </div>
			</div>
			<div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="parent-block">
						<div class="child-block"><img src="https://university.goto.com.pk/images/delivery.png" class="img-responsive" alt="" /></div>
						<div class="child-block"><h4>Delivery</h4>
						<p>Send your packed product to the customer directly through our designated 3PL courier service.</p>
						</div>
					</div>
			   </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="parent-block">
						<div class="child-block"><img src="https://university.goto.com.pk/images/customer-support.png" class="img-responsive" alt="" /></div>
						<div class="child-block"><h4>Customer Support</h4>
						<p>Unique Store's 24/7 customer support deals with complaints and resolves them.</p>
						</div>
					</div>
			   </div>
			</div>
         </div>
      </section>
	  <section class="become-a-seller">
		<div class="container">
			<span>Become A Part Of Our <strong>Seller Team</strong> Today</span><a href="{{ route('shops.create') }}" class="btn-joinus pull-right">Join Us</a>
		</div>
	  </section>
      <div class="what-to-say text-center">
         <div id="faqs-list" class="faq-accordian">
            <div class="container">
               <div class="row">
                  <h2 class="col-md-12 text-center">Unique Store University FAQs</h2>
                  <div class="faq-accordion" id="accordion">
                     <div class="card">
                        <div class="card-header" id="headingOne">
                           <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                              What is ecommerce?<span class="arrow-icon"></span>
                              </button>
                           </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                           <div class="card-body">
                              <p>E-commerce is an online marketplace where customers meet the sellers and conduct transactions.</p>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="headingTwo">
                           <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              How does a marketplace operate?<span class="arrow-icon"></span>
                              </button>
                           </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                           <div class="card-body">
                              <p>Sellers list their product on the e-commerce platform and customers purchase it from there.</p>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="headingThree">
                           <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Why should I sell on Unique Store?<span class="arrow-icon"></span>
                              </button>
                           </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                           <div class="card-body">
                              <p>Goto is one of the largest e-commerce stores in Pakistan with millions of customers nationwide.</p>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="headingFour">
                           <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                              How should I sell?<span class="arrow-icon"></span>
                              </button>
                           </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                           <div class="card-body">
                              <p>
							  You can start by filling the Sell on Unique Store <a href="https://www.goto.com.pk/contacts/vendor/form">form</a> and our self signup representative will contact you.
							  </p>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="headingfive">
                           <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                              When will I get paid?<span class="arrow-icon"></span>
                              </button>
                           </h5>
                        </div>
                        <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                           <div class="card-body">
                              <p>You will be paid based on the locked credit days and orders fulfilled. </p>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="headingsix">
                           <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                              Are there any charges for product listing?<span class="arrow-icon"></span>
                              </button>
                           </h5>
                        </div>
                        <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
                           <div class="card-body">
                              <p>It’s free of cost! Unique Store will only charge a commission based on your product category.</p>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="headingseven">
                           <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                              How will I deliver the products?<span class="arrow-icon"></span>
                              </button>
                           </h5>
                        </div>
                        <div id="collapseseven" class="collapse" aria-labelledby="headingseven" data-parent="#accordion">
                           <div class="card-body">
                              <p>We use cross-dock and dropship as our shipment method. Our rider will create pickup from your given address, if your location falls in our service area.</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- End Content Here -->
    
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
        $('.category-nav-element').each(function(i, el) {
            $(el).on('mouseover', function(){
                if(!$(el).find('.sub-cat-menu').hasClass('loaded')){
                    $.post('{{ route('category.elements') }}', {_token: '{{ csrf_token()}}', id:$(el).data('id')}, function(data){
                        $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                    });
                }
            });
            // $(el).on('mouseout', function(){
            //     if($(el).find('.sub-cat-menu').hasClass('loaded')){
            //     $(el).find('.sub-cat-menu').delay(5000).removeClass('loaded');
            //     }
            // });
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
        $.post('{{ route('cart.showCartModal') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
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

    $('#option-choice-form input').on('change', function(){
        getVariantPrice();
    });

    function getVariantPrice(){
        if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){
            $.ajax({
               type:"POST",
               url: '{{ route('products.variant_price') }}',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){
                   $('#option-choice-form #chosen_price_div').removeClass('d-none');
                   $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
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

    function addToCart(){
        if(checkAddToCartValidity()) {
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.ajax({
               type:"POST",
               url: '{{ route('cart.addToCart') }}',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){
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
                   //$('#addToCart-modal-body').html(null);
                   //$('.c-preloader').hide();
                   //$('#modal-size').removeClass('modal-lg');
                   //$('#addToCart-modal-body').html(data);
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

</script>
<!-- <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap3/bootstrap.min.js"></script>
      <script src="js/popper.min.js"></script> -->
      <script src="{{asset('public/frontend/js/custom/owl-carousel.min.js')}}"></script>
      <script type="text/javascript">
         $(document).ready(function(){
            $('#backToTop').click(function() {
				$("html, body").animate({scrollTop: 0}, 2000);
			});
		
			$('#accordion .collapse').on('show.bs.collapse', function (e) {
				$('#accordion .in').collapse('hide');
			});
			
			$(".how-to").click(function() {
				$('html,body').animate({
				scrollTop: jQuery("#how-can-sell").offset().top},
			2000);
			});
			$(".faqs").click(function() {
				$('html,body').animate({
				scrollTop: jQuery("#faqs-list").offset().top},
			2000);
			});
		});
		 
		 
      </script>
@yield('script')

</body>
</html>















     
	 
   
     
      
      
 