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
<link type="text/css" href="{{ static_asset('frontend/css/custom/main.css') }}" rel="stylesheet" media="all">
@if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
     <!-- RTL -->
    <link type="text/css" href="{{ static_asset('frontend/css/active.rtl.css') }}" rel="stylesheet" media="all">
@endif
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
     .top-navbar .d-flex .align-self-center{
        max-height:30px !important;
     }
}
 @media(min-width: 600px) {
    .top-navbar .d-flex .align-self-center{
        max-height:5px !important;
     }
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

<div class="container">
<div class="header-affiliate">
	<div class="container">
	<div class="row">
		<div class="col-md-6 left-column">
			<h3>Become a vendor on {{.env('APP_NAME'}}</h3>
			<!-- <h2>Goto</h2> -->
			<span><b>and start selling to millions of customers today!</b><!-- <br />shopping every day--></span><br class="clearfix" />
			<a href="{{ route('shops.create') }}" class="btn-signup">Sign Up Now</a>
		</div>
		<div class="col-md-6 right-column">
		<div class="desktop-video">
			<!--<iframe width="100%" height="300" src="https://www.youtube.com/embed/bcahJa0A_y4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
			</div>
		<div class="mobile-video">	
	
		<!--<iframe width="100%" height="200" src="https://www.youtube.com/embed/bcahJa0A_y4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
		</div>
		</div>
	</div>
	</div>
</div>
<div class="six-column-wraper">
	<div class="container"><div class="row">
		<div class="col col-md-4 col-sm-6 col-6"><div class="block-sop">
			<div class=""><img src="{{static_asset('frontend/images/map-nepal.png')}}" alt="" class="img-responsive" /></div>
			<div class="block">
				<h3>Nationwide Network</h3>
				<p class="comments text-center">We have one of the biggest nationwide ecommerce operations.</p>
			</div>
		</div></div>
		<div class="col col-md-4 col-sm-6 col-6"><div class="block-sop">
			<div class="icon payment"><img src="https://cdn.goto.com.pk/uploads/cms/2019/7/5d3838247ec0e.transparent.png" alt="" class="img-responsive" /></div>
			<div class="block ">
				<h3>Easy Payment</h3>
				<p class="comments">"{{.env('APP_NAME'}} pays sellers conveniently via IBFT on mutually agreed credit days whenever their product is sold through our website.</p>
			</div>
		</div></div>
		<div class="col col-md-4 col-sm-6 col-6"><div class="block-sop">
			<div class="icon delivery"><img src="https://cdn.goto.com.pk/uploads/cms/2019/7/5d3838247ec0e.transparent.png" alt="" class="img-responsive" /></div>
			<div class="block ">
				<h3>Delivery Option</h3>
				<p class="comments">You have the choice to deliver your products to the customers yourself or let {{.env('APP_NAME'}} manage the delivery of the orders to customers.</p>
			</div>
		</div></div>
		<div class="col col-md-4 col-sm-6 col-6"><div class="block-sop">
			<div class="icon return"><img src="https://cdn.goto.com.pk/uploads/cms/2019/7/5d3838247ec0e.transparent.png" alt="" class="img-responsive" /></div>
			<div class="block">
					<h3>Easy Return</h3>
					<p class="comments text-center">{{.env('APP_NAME'}} has an easy returns policy for customers and sellers. If a customer returns a product, we supply it back to you within a few days.</p>
			</div>
		</div></div>
		<div class="col col-md-4 col-sm-6 col-6"><div class="block-sop">
			<div class="icon listing"><img src="https://cdn.goto.com.pk/uploads/cms/2019/7/5d3838247ec0e.transparent.png" alt="" class="img-responsive" /></div>
			<div class="block">
				<h3>Unlimited Listing</h3>
				<p class="comments">Once you are registered with us as a Seller, there is no limit to the number of products you can enlist to sell on Goto.</p>
			</div>
		</div></div>
		<div class="col col-md-4 col-sm-6 col-6"><div class="block-sop">
			<div class="icon marketing"><img src="https://cdn.goto.com.pk/uploads/cms/2019/7/5d3838247ec0e.transparent.png" alt="" class="img-responsive" /></div>
			<div class="block">
				<h3>Free Marketing</h3>
				<p class="comments">{{.env('APP_NAME'}} promotes your products through various channels such as email, SMS, Facebook, Instagram, etc. without charging you anything.</p>
			</div>
		</div></div>
	</div></div>
</div>
<div class="easy-steps text-center">
	<div class="container ">
		<h2>Our three easy steps</h2>
		<p><img src="https://cdn.goto.com.pk/uploads/cms/2019/7/5d380c46c57c1.three-steps.jpg" class="desktop-image img img-responsive"  alt="" />
		<img src="https://cdn.goto.com.pk/uploads/cms/2019/7/5d39715966828.easy-step.png" class="mobile-image img-responsive" style="width:60%;" alt="" />
		</p>
		<a class="sign-up" href="{{ route('shops.create') }}" target="_blank">Sign Up Now</a>
	</div>
</div>
<div class="faq-accordian">
	<div class="container">
		<div class="row">
		<h2 class="col-md-12 text-center">Frequently Asked Questions</h2>
			<div class="col-md-6 text-center">
			<div id="accordion" class="text-left">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          What is {{.env('APP_NAME'}} Sellers Signup?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <p>It is a platform where anyone can fill in the form with their relevant details. Once verified, they can start selling. </p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          How long does your registration process take?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <p>It takes 48 hours after registration. We take some time to scrutinize your application but we get back to you within 3 working days.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          How do I manage my Seller account?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>Once your shop is created, you will receive a system-generated email where you can login to your Seller Hub and enjoy selling. There, you can update prices, add promotions, process orders and view your performance.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingfour">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
          Is there a joining fee?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
      <div class="card-body">
        <p>No. {{.env('APP_NAME'}} does not charge vendors any joining fee.</p>
      </div>
    </div>
  </div>
</div>
			<a class="faqs-data" rel="noindex nofollow" data-toggle="modal" data-target=".all-faqs">See all FAQs</a>
			</div>
			<div class="col-md-6"><img src="https://cdn.goto.com.pk/uploads/cms/2019/5/5cda816acfbfe.seller-faq.jpg" alt="" class="img-responsive" /><br /><br /></div>
		</div>
	</div>
	</div>
<div class="modal fade all-faqs" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="orig-pro">FAQs</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
			<div class="faq-accordian" style="padding-top: 0px;">
			<div id="accordion2">
  <div class="card">
    <div class="card-header" id="headingfive">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
          How many products can I upload? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion2">
      <div class="card-body">
       <p>There is no limit to the products you can upload and sell at Goto. </p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingsix">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
          How will you notify me when I have an order?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion2">
      <div class="card-body">
       <p>You will get a system-generated purchase order on your registered email ID along with a notification on Seller Hub. Also, through Seller Hub, you will be required to process the orders accordingly.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingseven">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
          How long after intimation will you pick up my product for delivery?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseseven" class="collapse" aria-labelledby="headingseven" data-parent="#accordion2">
      <div class="card-body">
       <p>On Cross Dock, our rider will come on the same day once you will mark order as Ready to Pick on Seller Hub.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingeight">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
          How much does {{.env('APP_NAME'}} charge when my product is purchased?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseeight" class="collapse" aria-labelledby="headingeight" data-parent="#accordion2">
      <div class="card-body">
       <p>A fixed amount of commission is charged depending upon the category in which your product falls in.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingnine">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
          Which channels does {{.env('APP_NAME'}} promote my products on?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsenine" class="collapse" aria-labelledby="headingnine" data-parent="#accordion2">
      <div class="card-body">
       <p>{{.env('APP_NAME'}} uses various channels such as Facebook, Google ads, Instagram, web notifications, emails, SMS, Affiliate marketing, etc. to promote products. </p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingten">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
          Do I have the choice to participate in a particular promotion or campaign?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseten" class="collapse" aria-labelledby="headingten" data-parent="#accordion2">
      <div class="card-body">
       <p>Yes, it is your choice to join a campaign or not.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingeleven">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
          What happens if a customer returns an order?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseeleven" class="collapse" aria-labelledby="headingeleven" data-parent="#accordion2">
      <div class="card-body">
       <p>The item is shipped back to you within a decided time frame.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="heading12">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
         What if I want to cancel an order due to some reason?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>

    <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion2">
      <div class="card-body">
        <p>You can cancel the order from Seller Hub by selecting a reason for cancellation. Cancellations will impact your overall performance.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingthirteen">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsethirteen" aria-expanded="false" aria-controls="collapsethirteen">
          Can I manage the delivery of my products myself? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>

    <div id="collapsethirteen" class="collapse" aria-labelledby="headingthirteen" data-parent="#accordion2">
      <div class="card-body">
        <p>Yes, once you choose ‘Drop Ship’ as delivery method, you can deliver the product to the customer yourself.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingfourteen">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefourteen" aria-expanded="false" aria-controls="collapsefourteen">
         How much does it cost to deliver my products to the customer?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsefourteen" class="collapse" aria-labelledby="headingfourteen" data-parent="#accordion2">
      <div class="card-body">
        <p>We don’t charge our sellers for delivery of their products to customers. Customers bear the delivery charges.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingfifteen">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefifteen" aria-expanded="false" aria-controls="collapsefifteen">
          When do we receive the payments for the completed orders?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsefifteen" class="collapse" aria-labelledby="headingfifteen" data-parent="#accordion2">
      <div class="card-body">
        <p>Payment is made on mutually agreed credit days.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingsixteen">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesixteen" aria-expanded="false" aria-controls="collapsesixteen">
          What is the mode of payment? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsesixteen" class="collapse" aria-labelledby="headingsixteen" data-parent="#accordion2">
      <div class="card-body">
       <p>We transmit the amount to you via IBFT. We need to have your IBAN in order to make the payment to you.</p>
      </div>
    </div>
  </div>
</div>
			</div>
			</div>
        </div>
    </div>
</div>			

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

@yield('script')

</body>
</html>




































