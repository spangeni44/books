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

/*added from other */
   .fullwidth{ position: relative; }
.fullwidth img{min-width: 100%; margin: 0px auto; }
.header-affiliate{ position: relative; width: 100%; }
.left-column{ color: #fff; } 
.left-column h3{ font-weight: bold;}
.left-column h2{ font-weight: bold; margin: 0px; padding: 0px; }
.left-column .btn-signup{ background-color: #ff9c34; border: 0px solid #fff; color: #fff; text-decoration: none; border-radius: 5px 5px 5px 5px; -moz-border-radius: 5px 5px 5px 5px; -webkit-border-radius: 5px 5px 5px 5px;  display: inline-block; font-weight: bold; }
.left-column .btn-signup:hover{ background-color: #fd703d; }
.right-column { color: #fff; }
.right-column .block { /*display: list-item;*/ position: relative; padding: 0px 0px 15px 0px!important; }
.right-column .news-block{ padding: 10px 15px!important; border: solid 1px #fff; margin: 0px 0px 0px 0px!important; border-radius: 5px;    -moz-border-radius: 5px; -webkit-border-radius: 5px; }
.right-column .block span{ display: table-cell;  vertical-align: middle; width: 80%; }
.right-column .block span.count{ float: right; width: auto;  } 
.right-column .block span.icon{ width: 15%;  }
.right-column .block span.icon:before { display: block; width: 60px; height: 60px;   margin: 0px 10px 0px 0px; border-radius: 50%; -moz-border-radius: 50%; -webkit-border-radius: 50%; overflow: hidden; } 
.right-column .block span.icon.a:before { content: url(https://cdn.goto.com.pk/uploads/cms/2019/4/5cc1b788aa166.af-fashion1.png);}
.right-column .block span.icon.b:before { content: url(https://cdn.goto.com.pk/uploads/cms/2019/4/5cc1bda047fca.af-7.png);}
.right-column .block span.icon.c:before { content: url(https://cdn.goto.com.pk/uploads/cms/2019/4/5cc1b91c5bd97.af-shop-buy.png);}
.right-column .block span.icon.d:before { content: url(https://cdn.goto.com.pk/uploads/cms/2019/4/5cc1b89c3dc7b.af-bachat.png);}
.right-column .block span.icon.e:before { content: url(https://cdn.goto.com.pk/uploads/cms/2019/4/5cc1bacd6749e.af-samia1.png);}
.right-column .block span.icon.f:before { content: url(https://cdn.goto.com.pk/uploads/cms/2019/4/5cc1bb5f6864e.af-1.png);}
.right-column .block span.icon.g:before { content: url(https://cdn.goto.com.pk/uploads/cms/2019/4/5cc1ba191db1f.af-10.png);}
.right-column .block span.icon.h:before { content: url(https://cdn.goto.com.pk/uploads/cms/2019/4/5cc1bcf03f1bd.af-4.png);}
.right-column .block span.icon.i:before { content: url(https://cdn.goto.com.pk/uploads/cms/2019/5/5cdbed4d965f1.samishah.png);}
.right-column .block span.icon.j:before { content: url(https://cdn.goto.com.pk/uploads/cms/2019/5/5cdbeb816c793.pay-3Dearn.png);}
form#faq ul li { display: inline-block; float: none; width: 100%;list-style: none; position: relative;}
.close:focus, .close:hover{ outline: none;} 
@media (min-width: 768px){
.fullwidth .modal-dialog{ max-width: 740px; }
.header-affiliate{ background: url('https://cdn.goto.com.pk/uploads/cms/2019/3/5c7f78f2db629.green-banner-lr.jpg') no-repeat top center transparent; background-size: cover; padding: 30px 0px;}
.left-column h3{ font-size: 34px; margin-top: 25px; }
.left-column h2{ font-size: 70px; line-height: 70px; }
.left-column strong{ font-size: 30px;  }
.left-column span{ font-size: 24px; display: block; }
span.login-user { display : inline-block; }
.left-column .btn-signup{ font-size:18px; padding: 10px 45px; margin: 20px 0px 0px 0px!important; }
.right-column .normal{ font-size: 22px; }
#faq-list li:first-child{ margin-top: 0px!important; }
.hidden-mobile-portrait { display: block;}
.visible-mobile-portrait { display: none;}
#faq-list { overflow: hidden; margin-top: 15px; }
.easy-steps h2, .affiliate-commission-percentage h2, .what-to-say h2{ font-size: 36px; }
.What-say .item{ opacity: 0.5; margin-bottom: 10px; }
.What-say .active:hover .item { opacity: 1; }
}
@media (max-width: 767px){
.header-affiliate{ background: url('https://cdn.goto.com.pk/uploads/cms/2019/3/5c7f793710b0f.green-bg-mb-2.jpg') no-repeat top center transparent; background-size: cover; padding: 20px 0px; }
.fullwidth{ margin: 0px -15px; }
.left-column, .right-column{ text-align: center; }
.left-column h3{ font-size: 16px; }
.left-column h2{ font-size: 20px; line-height: 20px; }
.left-column strong{ font-size: 15px;  }
.left-column span{ font-size: 12px; display: block; }
.left-column .btn-signup{ font-size: 13px; padding: 5px 20px; margin: 5px 0px 0px 0px!important; }
.right-column{ margin-top: 5%;}
.right-column .normal{ font-size: 20px; font-weight: bold; }
.hidden-mobile-portrait { display: none;}
.visible-mobile-portrait { display: block;}
.easy-steps .sign-up, .wt-sig-prc-wrapper .sign-up{ font-size: 16px; padding: 12px 20px; margin: 15px 0px; }
#faq-list { height: 190px!important; overflow: hidden; margin-top: 15px;}
.easy-steps h2, .affiliate-commission-percentage h2, .what-to-say h2{ font-size: 22px; }
.What-say .item .block { -webkit-box-shadow: 1px 1px 20px 2px rgba(0,0,0,0.2);-moz-box-shadow: 1px 1px 20px 2px rgba(0,0,0,0.2); box-shadow: 1px 1px 20px 2px rgba(0,0,0,0.2); } 
.What-say .name{ color: #fd703d; }
.What-say .item{ margin-bottom: 10px; }
.faq-accordian h2{ padding: 0px 0px 25px 0px; }
.what-say-wraper {padding-bottom: 0px!important;}
.faqs-data { padding: 4px 9px;}
.faqs-data i{ font-size: 26px; }
}
@media (max-width: 480px){   }
@media (min-width: 481px){   }
@media only screen and (min-width: 768px) and (max-width: 992px){
.left-column h3{ font-size: 25px; }
.left-column h2 { font-size: 40px; line-height: 40px; }
.left-column strong{ font-size: 18px; }
.left-column span { font-size: 15px; }
#faq-list{ height: 180px!important; }
.offset-md-1.right-column{ margin-left: 0px;}
.right-column { width: 50%; flex: 0 0 50%; max-width: 50%;}
.right-column .block{ padding: 5px 10px; }
.left-column .btn-signup{ font-size: 18px;  padding: 8px 40px;  margin: 10px 0px 0px 0px!important;}
.easy-steps h2, .affiliate-commission-percentage h2, .what-to-say h2{ padding: 15px 0px!important; font-size: 28px; }
.easy-steps .sign-up, .wt-sig-prc-wrapper .sign-up{ font-size: 18px; padding: 10px 25px; margin: 10px 0px; }
.what-say-wraper{ padding: 0px 0px 15px 0px}
.faqs-data { padding: 8px 15px;}
.faqs-data i, .wt-sig-prc_ttl-box h2{ font-size: 36px; }
.wt-sig-prc_ttl-box h3{ font-size: 26px; }
}
@media (min-width: 993px){ 
#faq-list { height: 290px!important;}
span.login-user { margin: 0px 15px; font-size: 15px;}
.easy-steps .sign-up{ font-size: 18px; padding: 10px 45px; margin: 25px 0px; }
.wt-sig-prc-wrapper .sign-up{ font-size: 18px; padding: 10px 45px; margin: 5px 0px; }
.what-say-wraper { padding: 25px 0px 35px 0px; }
.faqs-data { padding: 10px 18px;}
.wt-sig-prc_ttl-box h2{ font-size: 36px; }
.wt-sig-prc_ttl-box h3{ font-size: 26px; }
}
.affiliate-container{ width:100%; overflow:hidden; }
.affiliate-container ul{ list-style:none;  position:absolute;  margin-top: 0px !important; width: 100%; }
.affiliate-container li{ height:auto;  width: 100%; -webkit-transition:ease-in-out background-color .15s .05s;-o-transition:ease-in-out background-color .15s .05s;transition:ease-in-out background-color .15s .05s}
.easy-steps, .affiliate-commission-percentage { padding: 50px 0px; }
.easy-steps, .what-to-say{ background-color: #f6f8f2; display: inline-block; width: 100%; }
.easy-steps h2, .affiliate-commission-percentage h2, .what-to-say h2{ font-weight: bold; padding: 0px 0px 25px 0px; margin: 0px; }
.easy-steps .sign-up, .wt-sig-prc-wrapper .sign-up{ background-color: #ff9c34; color: #ffffff; font-weight: bold; border-radius: 8px; -moz-border-radius: 8px; -webkit-border-radius: 8px; display: inline-block; }
.easy-steps .sign-up:hover, .wt-sig-prc-wrapper .sign-up:hover{ background-color:#fd703d; color: #ffffff; font-weight: bold; border-radius: 8px; -moz-border-radius: 8px; -webkit-border-radius: 8px; display: inline-block; }.affiliate-commission-percentage .table{ margin-bottom: 0px; }
.affiliate-commission-percentage .table-striped tbody{ height:200px; overflow-y:auto; width: 100%; background-color: #fff;}
.affiliate-commission-percentage .table-striped thead,.affiliate-commission-percentage .table-striped tbody{display:block;width: 100%;overflow-x: hidden;}
.affiliate-commission-percentage .table-striped thead tr{ background-color: #75b615; color:#fff; border-top-right-radius: 8px; -moz-border-top-right-radius: 8px; -webkit-border-top-right-radius: 8px; border-top-left-radius: 8px; -moz-border-top-left-radius: 8px; -webkit-border-top-left-radius: 8px; display: block; width: 100%; }
.affiliate-commission-percentage .table-striped tbody{ border-left: 1px solid #f6f6f6; border-right: 1px solid #f6f6f6; border-bottom: 0px solid #f6f6f6; }
.affiliate-commission-percentage .table-striped tbody tr{ display: block; width: 100%; border-bottom: 1px solid #f6f6f6;  }
.affiliate-commission-percentage .table-striped tbody tr:last-child { border-bottom: 0px solid transparent;}
.affiliate-commission-percentage .table-striped tbody tr:nth-of-type(odd){ background-color: transparent!important; }
.affiliate-commission-percentage .table-striped thead th,.affiliate-commission-percentage .table-striped tbody td{ width: 50%; display: inline-block; border: 0px solid transparent; padding: .40rem 0; }
.affiliate-commission-percentage .table-striped thead th{ font-weight: normal;}
.affiliate-commission-percentage .table-striped thead th:first-child, .affiliate-commission-percentage .table-striped tbody td:first-child, .affiliate-commission-percentage .table-striped thead th:last-child, .affiliate-commission-percentage .table-striped tbody td:last-child{ text-align: center; width: 25%;  }
.What-say .item{ max-width: 100%; display: inline-block; }
.What-say .block{ background-color:#fff; position: relative; border-radius: 8px; -moz-border-radius: 8px; -webkit-border-radius: 8px; width: 100%; padding: 30px; margin-top: 30px; }
.What-say .icon { border-radius: 50%; -moz-border-radius: 50%; -webkit-border-radius: 50%; display: inline-block;     width: 60px; height: 60px; overflow: hidden; padding: 0px; margin: 0px 0px 0px -30px; position: absolute; z-index: 999; }
.What-say .comments{ border-bottom: 1px solid #f6f6f6; padding: 15px 0px; display: block;}
.What-say .name{ font-size: 15px;  display: block; margin-top: 15px; }
.What-say .active:hover .block { -webkit-box-shadow: 1px 1px 20px 2px rgba(0,0,0,0.2);-moz-box-shadow: 1px 1px 20px 2px rgba(0,0,0,0.2); box-shadow: 1px 1px 20px 2px rgba(0,0,0,0.2); } 
.What-say .active:hover .name{ color: #fd703d; }
.What-say .designation{ font-size: 13px;  display: block;  }
.what-say-wraper { display: block; }

.what-to-say{ padding-bottom: 40px; }
.faqs-data { background-color: #ff9c34; color: #ffffff!important;font-weight: bold;border-radius: 8px;-moz-border-radius: 8px; -webkit-border-radius: 8px; display: inline-block; margin: 10px 0px; cursor: pointer; font-size: 18px; }
.faqs-data:hover{ background-color: #fd703d; }
.modal-header .close { color: #000!important; margin-top: -18px!important;right: 15px!important; opacity: 1!important;}
.modal-body h3 {font-size: 14px;  font-weight: bold;   margin: 10px 0px;}
.modal-body p, .modal-body ul { margin-bottom: 0px;}
.box-shadow{
 -webkit-box-shadow: 1px 0px 9px 2px #f5f5f5; -moz-box-shadow:1px 0px 9px 2px #f5f5f5; box-shadow: 1px 0px 9px 2px #f5f5f5; -webkit-border-radius: 8px; -moz-border-radius: 8px;
border-radius: 8px;}
.faq-accordian {  padding-top: 35px; }
.faq-accordian .card-header { border: 0px solid #fd703d!important; font-weight: normal;  text-align: left; position: relative;    border-radius: 0px;  -moz-border-radius: 0px; -webkit-border-radius: 0px; padding: 0px; background-color: transparent;}
.faq-accordian .card-header button{ border-radius: 8px;  -moz-border-radius: 8px; -webkit-border-radius: 8px; color: #fd703d; outline: none 0px;  background-color: transparent; display: block; width: 100%; text-align: left; padding: 15px; font-size: 14px; position: relative; white-space: normal;}
.faq-accordian .card-header button[aria-expanded="false"]{ border: 1px solid #444!important; color: #444; }
.faq-accordian .card-header button[aria-expanded="true"]{border: 1px solid #fd703d!important; color: #fd703d;}
.faq-accordian .card-header button span.arrow-icon{ position: absolute; right: 10px; top: 15px; font-family: 'Font Awesome 5 Free'; font-weight: 900; display: inline-block; width: 15px; height: 15px;}
.faq-accordian .card-header button[aria-expanded="true"] span.arrow-icon:before{  content: "\f107"; }
.faq-accordian .card-header button[aria-expanded="false"] span.arrow-icon:before{  content: "\f104"; }
.faq-accordian .card-header button:hover,.faq-accordian .card-header button:focus, .faq-accordian .card-header button:active { text-decoration: none;}
.faq-accordian .card .card-body { padding: 15px; }
.faq-accordian .card {  background-color: transparent; border: 0px solid rgba(0,0,0,.125); border-radius: 0rem; margin-bottom: 15px;}
/*** Cloud CSS ****/
.glb-stripe {
  height: 20px;
  background: rgb(253, 112, 61);
  display: inline-block;
  position: absolute;
  border-radius: 20px;
  box-shadow: 20px 30px 15px rgba(0,0,0,0.1);
  -ms-box-shadow: 20px 30px 15px rgba(0,0,0,0.1);
  -webkit-box-shadow: 20px 30px 15px rgba(0,0,0,0.1);
  -moz-box-shadow: 20px 30px 15px rgba(0,0,0,0.1);
  animation-duration: 3000ms;
  transition-timing-function: ease-in-out;
  animation-iteration-count: infinite;
}

@keyframes slidein1 {
  0% {
    left: 50px;
  }

  50% {
    left: 40px;
  }

  100% {
    left: 50px;
  }
}

@keyframes slidein2 {
  0% {
    left: -10px;
  }

  50% {
    left: -20px;
  }

  100% {
    left: -10px;
  }
}

@keyframes slidein3 {
  0% {
    left: -9px;
  }

  50% {
    left: -5px;
  }

  100% {
    left: -9px;
  }
}

@keyframes slidein4 {
  0% {
    left: 70px;
  }

  50% {
    left: 60px;
  }

  100% {
    left: 70px;
  }
}

@keyframes slidein5 {
  0% {
    left: 270px;
  }

  50% {
    left: 260px;
  }

  100% {
    left: 270px;
  }
}

@keyframes slidein6 {
  0% {
    left: -10px;
  }

  50% {
    left: -20px;
  }

  100% {
    left: -10px;
  }
}

@keyframes slidein7 {
  0% {
    right: 80px;
  }

  50% {
    right: 70px;
  }

  100% {
    right: 80px;
  }
}

@keyframes slidein8 {
  0% {
    right: -10px;
  }

  50% {
    right: -20px;
  }

  100% {
    right: -10px;
  }
}

@keyframes slidein9 {
  0% {
    right: -9px;
  }

  50% {
    right: -5px;
  }

  100% {
    right: -9px;
  }
}

@keyframes slidein10 {
  0% {
    right: 100px;
  }

  50% {
    right: 90px;
  }

  100% {
    right: 100px;
  }
}

@keyframes slidein11 {
  0% {
    right: 290px;
  }

  50% {
    right: 280px;
  }

  100% {
    right: 290px;
  }
}

@keyframes slidein12 {
  0% {
    right: -10px;
  }

  50% {
    right: -20px;
  }

  100% {
    right: -10px;
  }
}

#wt-signup-strp-1 {
  left: 5%;
  top: 80px;
  width: 130px;
  animation-name: slidein1;
background: rgb(61, 181, 253);
}

#wt-signup-strp-2 {
  left: -10px;
  top: 140px;
  width: 120px;
  background: rgb(173, 173, 173);
  animation-name: slidein2;
}

#wt-signup-strp-3 {
  left: -9px;
  top: 200px;
  width: 25px;
  background: rgba(183,100,216,0.5);
  animation-name: slidein3;
}

#wt-signup-strp-4 {
  left: 5%;
  top: 200px;
  width: 170px;
  animation-name: slidein4;
}

#wt-signup-strp-5 {
  left: 20%;
  top: 200px;
  width: 30px;
  animation-name: slidein5;
}

#wt-signup-strp-6 {
  left: -10px;
  top: 265px;
  width: 175px;
  background: #75b615;
  animation-name: slidein6;
}

#wt-signup-strp-7 {
  right: 8%;
  top: 80px;
  width: 135px;
  animation-name: slidein7;
background: rgb(117, 182, 21);
}

#wt-signup-strp-8 {
  right: -10px;
  top: 140px;
  width: 180px;
 background: rgb(61, 181, 253);
  animation-name: slidein8;
}

#wt-signup-strp-9 {
  right: -10px;
  top: 200px;
  width: 80px;
  background: rgba(183,100,216,0.5);
  animation-name: slidein9;
}

#wt-signup-strp-10 {
  right: 8%;
  top: 200px;
  width: 170px;
 background: #fd703d;
  animation-name: slidein10;
}

#wt-signup-strp-11 {
  right: 23%;
  top: 200px;
  width: 30px;
  animation-name: slidein11;
}

#wt-signup-strp-12 {
  right: -10px;
  top: 265px;
  width: 220px;
  background: rgb(173, 173, 173);
  animation-name: slidein12;
}
@media(max-width:1200px) {

  #wt-signup-strp-5, #wt-signup-strp-11 {
    display: none;
  }

  #wt-signup-strp-10 {
    width: 150px;
  }
}

@media(max-width:992px) {
  #wt-signup-strp-4 {
    left: -10px !important;
  }

  #wt-signup-strp-10 {
    right: -50px !important;
  }

  #wt-signup-strp-3,#wt-signup-strp-9 {
    display: none;
  }

  .glb-stripe {
    -webkit-animation: none !important;
    -moz-animation: none !important;
    -o-animation: none !important;
    -ms-animation: none !important;
    animation: none !important;
  }
}

@media(max-width:766px) {
  #wt-signup-strp-1,#wt-signup-strp-2,#wt-signup-strp-4,#wt-signup-strp-5,#wt-signup-strp-6 {
    left: -10px !important;
    width: 20px !important;
    box-shadow: none !important;
  }

  #wt-signup-strp-7,#wt-signup-strp-8,#wt-signup-strp-10,#wt-signup-strp-11,#wt-signup-strp-12 {
    right: -10px !important;
    width: 20px !important;
    box-shadow: none !important;
  }
  .wt-sig-prc_ttl-box h2{ font-size: 24px; }
  .wt-sig-prc_ttl-box h3{ font-size: 18px; }
}
.wt-sig-prc-wrapper {
  /*background-color: #2e39bf;*/
  padding:80px 15px;
  text-align: center;
  position: relative;
  overflow: hidden;
  margin-bottom: 0px;
}
.wt-sig-prc_ttl-box p {
    color: #444;
    font-size: 18px;
}
.wt-sig-prc_ttl-box a, .wt-sig-prc_ttl-box span.login-user a {
    color: #75b615;
    font-size: 18px;
}
span.login-user a {
    color: #fff;
    text-decoration: underline;
}

.wt-sig-prc_ttl-box h2, .wt-sig-prc_ttl-box h3 {
    color: #444;
    font-weight: 700;
}
.orig-pro { text-transform: unset; }
.earn-money-online h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 15px;
}
.modal.all-faqs { z-index: 10000; }
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
			<h3>Make Money online with</h3>
			<h2>Go Bazaar  Affiliates</h2>
			<strong>Promote anything listed on Go Bazaar </strong>
			<span>More than 500,000 products to choose from</span>
			<a href="{{ route('shops.create') }}" class="btn-signup">Sign Up Now</a>
			<span class="login-user">Already an affiliate? <a href="{{ route('user.login') }}">Login here</a></span>
		</div>
		<div class="col-md-5 offset-md-1 right-column">
			<!--<span class="normal">Happening Right Now!</span>-->
			<!--<div id="faq-list" class="affiliate-container">	-->
			<!--	<ul id="marquee-vertical">-->
			<!--		<li class="block">-->
			<!--		<div class="news-block"><span class="icon a"></span><span>Price Match signed up as an affiliate <span class="count">3 hours ago </span></span></div>-->
			<!--		</li>-->
			<!--		<li class="block">-->
			<!--		<div class="news-block"><span class="icon b"></span><span>All 4U signed up as our affiliate <span class="count">3 days ago </span></span></div></li>-->
			<!--		<li class="block">-->
			<!--		<div class="news-block"><span class="icon c"></span><span>Shazeel signed up as our affiliate <span class="count">5 hours ago </span></span></div></li>-->
			<!--		<li class="block">-->
			<!--		<div class="news-block"><span class="icon g"></span><span>Bachat Bazar signed up as an affiliate <span class="count">1 hours ago </span></span></div></li>-->
			<!--		<li class="block">-->
			<!--		<div class="news-block"><span class="icon e"></span><span>Areesha Collection signed up as our affiliate <span class="count">10 hours ago </span></span>-->
			<!--		</div></li>-->
			<!--		<li class="block">-->
			<!--		<div class="news-block"><span class="icon f"></span><span>Fahad earned Rs. 42,000/- this month <span class="count">5 days ago </span></span>-->
			<!--		</div></li>-->
   <!--                 <li class="block">-->
			<!--		<div class="news-block"><span class="icon d"></span><span>Sajjad earned Rs. 55,000/- this month <span class="count">3 hours ago </span></span>-->
			<!--		</div></li>-->
   <!--                 <li class="block">-->
			<!--		<div class="news-block"><span class="icon h"></span><span>Rustum earned Rs. 45,000/-<span class="count">1 month ago </span></span>-->
			<!--		</div></li>-->
			<!--		<li class="block">-->
			<!--		<div class="news-block"><span class="icon i"></span><span>Get & Pay earned Rs. 20,000/- this month <span class="count">15 days ago </span></span>-->
			<!--		</div></li>-->
			<!--		<li class="block">-->
			<!--		<div class="news-block"><span class="icon j"></span><span>Sami Shah earned Rs. 15,000/- this week <span class="count">1 day ago </span></span>-->
			<!--		</div></li>-->
			<!--	</ul>-->
			<!--</div>-->
		</div>
	</div>
	</div>
</div>
<div class="easy-steps">
<div class="container text-center">
	<h2>Our Five Easy Step</h2>
    <p><img src="https://cdn.goto.com.pk/uploads/cms/2019/2/easy-five-steps-lr.jpg" class="img-responsive" style="width:90%;" alt="" /></p>
	<a class="sign-up" href="{{ route('shops.create') }}" target="_blank">Sign Up Now</a>
</div>
</div>
<div class="affiliate-commission-percentage">
	<div class="container text-center">
		<h2>Affiliate Commission Percentage</h2>
			<div class="col-md-10 offset-md-1">
					<div class="table-responsive text-nowrap box-shadow">
					  <!--Table-->
						<table class="table table-striped">
						<thead>
						  <tr>
							<th>Category</th>
							<th>Old User</th>
							<th>New User</th>
						  </tr>
						</thead>
						<!--Table head-->
						<!--Table body-->
						<tbody>
						  <tr>
							<td>Women's Fashion</td>
							<td>4%</td>
							<td>5%</td>
						  </tr>
						  <tr>
							<td>Men's Fashion</td>
							<td>4%</td>
							<td>5%</td>
						  </tr>
						  <tr>
							<td>Baby, Toys & Kids</td>
							<td>2%</td>
							<td>2%</td>
						  </tr>
						  <tr>
							<td>Phones & Devices</td>
							<td>1%</td>
							<td>1.5%</td>
						  </tr>
						  <tr>
							<td>TVs & Home Appliances</td>
							<td>1%</td>
							<td>2%</td>
						  </tr>
						  <tr>
							<td>Computing & Gaming</td>
							<td>1%</td>
							<td>1.5%</td>
						  </tr>
						  <tr>
							<td>Home & Lifestyle</td>
							<td>2%</td>
							<td>3%</td>
						  </tr>
						  <tr>
							<td>Sports & Fitness</td>
							<td>2%</td>
							<td>3%</td>
						  </tr>
						  <tr>
							<td>Health & Beauty</td>
							<td>1.5%</td>
							<td>2%</td>
						  </tr>
						  <tr>
							<td>Cars & Motorbikes</td>
							<td>3%</td>
							<td>4%</td>
						  </tr>
						  <tr>
							<td>Grocery</td>
							<td>2%</td>
							<td>3%</td>
						  </tr>
						</tbody>
						<!--Table body-->
						</table>
						<!--Table-->
					</div>
			</div>
	</div>
</div>
<div class="what-to-say text-center">
	<!--<div class="container">-->
	<!--<div class="what-say-wraper hidden">-->
	<!--	<h2>What They Say!</h2>-->
 <!--       <div class="What-say owl-carousel owl-theme">-->
	<!--		<div class="item col-md-4">-->
	<!--			<div class="icon"><img src="https://cdn.goto.com.pk/uploads/cms/2019/2/agent.jpg" alt="" class="img-responsive" /></div>-->
	<!--			<div class="block">-->
	<!--			<p class="comments">Go Bazaar  is one of the best ecommerce platform in Nepal to earn more money to sellproduct as a vender</p>-->
	<!--			<span class="name">Muhammad Bilal</span>-->
	<!--			<span class="designation">Rochester, Mi.</span>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--		<div class="item col-md-4">-->
	<!--			<div class="icon"><img src="https://cdn.goto.com.pk/uploads/cms/2019/2/agent.jpg" alt="" class="img-responsive" /></div>-->
	<!--			<div class="block">-->
	<!--			<p class="comments">Go Bazaar  is one of the best ecommerce platform in Nepal to earn more money to sellproduct as a vender</p>-->
	<!--			<span class="name">Muhammad Bilal</span>-->
	<!--			<span class="designation">Rochester, Mi.</span>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--		<div class="item col-md-4">-->
	<!--			<div class="icon"><img src="https://cdn.goto.com.pk/uploads/cms/2019/2/agent.jpg" alt="" class="img-responsive" /></div>-->
	<!--			<div class="block">-->
	<!--			<p class="comments">Go Bazaar  is one of the best ecommerce platform in Nepal to earn more money to sellproduct as a vender</p>-->
	<!--			<span class="name">Muhammad Bilal</span>-->
	<!--			<span class="designation">Rochester, Mi.</span>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--		<div class="item col-md-4">-->
	<!--			<div class="icon"><img src="https://cdn.goto.com.pk/uploads/cms/2019/2/agent.jpg" alt="" class="img-responsive" /></div>-->
	<!--			<div class="block">-->
	<!--			<p class="comments">Go Bazaar is one of the best ecommerce platform in Nepal to earn more money to sellproduct as a vender</p>-->
	<!--			<span class="name">Muhammad Bilal</span>-->
	<!--			<span class="designation">Rochester, Mi.</span>-->
	<!--			</div>-->
	<!--		</div><div class="item col-md-4">-->
	<!--			<div class="icon"><img src="https://cdn.goto.com.pk/uploads/cms/2019/2/agent.jpg" alt="" class="img-responsive" /></div>-->
	<!--			<div class="block">-->
	<!--			<p class="comments">Go Bazaar is one of the best ecommerce platform in Nepal to earn more money to sellproduct as a vender</p>-->
	<!--			<span class="name">Muhammad Bilal</span>-->
	<!--			<span class="designation">Rochester, Mi.</span>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--		<div class="item col-md-4">-->
	<!--			<div class="icon"><img src="https://cdn.goto.com.pk/uploads/cms/2019/2/agent.jpg" alt="" class="img-responsive" /></div>-->
	<!--			<div class="block">-->
	<!--			<p class="comments">Go Bazaar is one of the best ecommerce platform in Nepal to earn more money to sellproduct as a vender</p>-->
	<!--			<span class="name">Muhammad Bilal</span>-->
	<!--			<span class="designation">Rochester, Mi.</span>-->
	<!--			</div>-->
	<!--		</div><div class="item col-md-4">-->
	<!--			<div class="icon"><img src="https://cdn.goto.com.pk/uploads/cms/2019/2/agent.jpg" alt="" class="img-responsive" /></div>-->
	<!--			<div class="block">-->
	<!--			<p class="comments">Go Bazaar is one of the best ecommerce platform in Nepal to earn more money to sellproduct as a vender</p>-->
	<!--			<span class="name">Muhammad Bilal</span>-->
	<!--			<span class="designation">Rochester, Mi.</span>-->
	<!--			</div>-->
	<!--		</div><div class="item col-md-4">-->
	<!--			<div class="icon"><img src="https://cdn.goto.com.pk/uploads/cms/2019/2/agent.jpg" alt="" class="img-responsive" /></div>-->
	<!--			<div class="block">-->
	<!--			<p class="comments">Go Bazaar is one of the best ecommerce platform in Nepal to earn more money to sellproduct as a vender</p>-->
	<!--			<span class="name">Muhammad Bilal</span>-->
	<!--			<span class="designation">Rochester, Mi.</span>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--		</div>-->
	<!--</div>-->
	<!--</div>-->
	<div class="faq-accordian">
	<div class="container">
		<div class="row">
		<h2 class="col-md-12 text-center">FAQs</h2>
			<div class="col-md-6"><img src="https://cdn.goto.com.pk/uploads/cms/2019/2/afiliate-faq-bottom.jpg" alt="" class="img-responsive" /></div>
			<div class="col-md-6 text-left">
			<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          What Is the Go Bazaar Affiliates Program?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <p>The Go Bazaar Affiliate Program is a way for anyone to earn a steady monthly income. All you have to do is promote the links on your website or social media pages. It’s really easy to use and you can see the results in real-time from your affiliate panel, which is provided to all Go Bazaar affiliates upon registration.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          How Does It Work?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <p>It’s really simple. All you have to do is sign up here. Once you fill in the form and conduct the signup procedure, you will get specific promotional links which you can promote on your website as well as your social media pages. If people use your link to buy products, you will get commissions for the sales as well – which is the beauty of our affiliates program!</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Is There a Fee I Need to Pay to Join the Program?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>It’s completely free with absolutely no hidden charges.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingfour">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
          What Is the Signup Process to Join the Go Bazaar Affiliates Program?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
      <div class="card-body">
        <ul>
					<li><b>Step 1:</b> Visit this link: www.goto.com.pk/affiliates and click sign up.</li>
					<li><b>Step 2:</b> Fill the registration form.</li>
					<li><b>Step 3:</b> Login to your account.</li>
					<li><b>Step 4:</b> Get tracking/promotional links for your website and/or social media pages.</li>
					<li><b>Step 5:</b> Enjoy the commissions that you earn monthly!</li>
					</ul>
      </div>
    </div>
  </div>
</div>
			<a class="faqs-data" rel="noindex nofollow" data-toggle="modal" data-target=".all-faqs">See all FAQs</a>
			</div>
		</div>
	</div>
	</div>
</div>
<section class="wt-sig-prc-wrapper ">
    <div class="wt-sig-prc-main">
<div class="wt-sig-prc_ttl-box text-center">
<h2>Earning online has not been easier</h2>
<h3>Get in touch with us</h3>
 <p>Email us: <a href="mailto:mail@gobazaar.com.np">mail@gobazaar.com.np</a></p>
 <p>Phone: +977-9862713352</p>
 <div class="clearfix">
 <a class="sign-up" href="{{ route('shops.create') }}" >Sign Up Now</a>
 <p><span class="login-user">Already an affiliate? <a href="{{ route('user.login') }}">Login here</a></span></p>
 </div>
</div>
    <div class="glb-stripe" id="wt-signup-strp-1"></div>
    <div class="glb-stripe" id="wt-signup-strp-2"></div>
    <div class="glb-stripe" id="wt-signup-strp-3"></div>
    <div class="glb-stripe" id="wt-signup-strp-4"></div>
    <div class="glb-stripe" id="wt-signup-strp-5"></div>
    <div class="glb-stripe" id="wt-signup-strp-6"></div>
    <div class="glb-stripe" id="wt-signup-strp-7"></div>
    <div class="glb-stripe" id="wt-signup-strp-8"></div>
    <div class="glb-stripe" id="wt-signup-strp-9"></div>
    <div class="glb-stripe" id="wt-signup-strp-10"></div>
    <div class="glb-stripe" id="wt-signup-strp-11"></div>
    <div class="glb-stripe" id="wt-signup-strp-12"></div>
    </div>
</section>
<section class="earn-money-online">
	<div class="container">
		<h2 class="text-center">Earn Money Online In Nepal</h2>
		<p>The internet has transformed people’s lives and is playing a key role in the daily lives of global population. People go online for almost everything now, from studying to making traveling plans to shopping online. With such widespread use of the Internet nowadays, it is no wonder that <b>online earning methods</b> are becoming popular and are being utilized by many to earn money through the internet. If you want to <b>make money online in Nepal</b>, affiliate marketing is one of the best options available to you.</p><br />
		<p>Affiliate marketing is a method of earning online through promoting someone else’s products or business. It is centered around the sharing of revenues. Affiliate marketers earn a commission if customers purchase as a result of their marketing efforts. Businesses that have products to sell and wish to generate more revenue offer financial incentive to affiliates to earn by marketing their products or business. The affiliate will attempt to promote the product to the customer on the medium the affiliate finds most convenient and appropriate.</p><br />
		<p>When you sign up for affiliate program, you will get a personalized affiliate link containing a unique code at the end. Our affiliate program uses this code to keep track of the customers that you have directed to our website. Another great part about affiliate marketing is that you don’t even need to have your own website, you can post your affiliate link on your social media pages or accounts or in the comments sections of different social media pages or blogs.</p><br />
		<p><b>Go Bazaar  affiliate program</b> is one of the <b>best affiliate programs in Nepal</b> if you are seriously thinking about entering this field. The sign up process is really quick and easy and can be done in just a few minutes. After filling in your registration form, you just log into your account, get the tracking links for your website and/or social media pages and start promoting. The best part about affiliate marketing with Go Bazaar is that there is a huge variety of available products for you to pick from. With Go Bazaar website displaying more than 500,000 items, it is very tough for you to run out of products to market and you can choose the ones you like the best. You can also view the results of your marketing efforts from the affiliate panel provided to you on Sign Up. Your commission is paid to you every month.</p><br />
		<p>So, if you really wish to <b>earn money online in Nepal without investment</b>, Go Bazaar is bringing one of the most amazing <b>affiliate programs in Nepal</b> right within your easy access. Try your hand at affiliate marketing with Go Bazaar and earn great commissions for yourself. The system of paying commission is quite transparent at Go Bazaar and the registration page gives the details for the commission being paid on various product categories, so there is no ambiguity when you decide to register and work as an affiliate marketer for this online store. You will not think about earning online with any other website and will decide to stick with Go Bazaar due to the amazing experience you will have earning as an affiliate marketer here.</p><br />
	</div>
</section>
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
          Did My Application Get Rejected? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion2">
      <div class="card-body">
       <p>Rejections are based purely on the information that is provided to us by you. So based on that information, if we feel that the applicant may not be a good fit for us, it gets rejected. You can always contact us by emailing at <a href="mailto:mail@gobazaar.com.np">mail@gobazaar.com.np</a> if you think you should be considered and that your application was rejected unfairly.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingsix">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
          What Will I Gain By Joining the Go Bazaar Affiliates Program? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion2">
      <div class="card-body">
       <p>You will have all our support in terms of creatives and banners and/or setting up the tracking links. A dedicated manager will be provided to you for further assistance.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingseven">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
          Will I Be Getting Any Promotional Links and/or Banners for My Own Website? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseseven" class="collapse" aria-labelledby="headingseven" data-parent="#accordion2">
      <div class="card-body">
       <p>Yes. You will get the banners and creatives for all the categories on our website. You can use your own creatives as well but you will have to get them approved by our team first.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingeight">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
          If I Have More Than One Website, Do I Need to Create Separate Accounts? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseeight" class="collapse" aria-labelledby="headingeight" data-parent="#accordion2">
      <div class="card-body">
       <p>No, you can use the tracking links on multiple website or social media pages. So, you do not need to make separate accounts for it.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingnine">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
          Will I Be Able to Choose Which Products I Want to Endorse? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsenine" class="collapse" aria-labelledby="headingnine" data-parent="#accordion2">
      <div class="card-body">
       <p>Yes. All our affiliates have the liberty to promote any product available on our website. The best way is to promote the products you think are relevant to your users’ interest. For instance, if your own blog, website or purpose lies in gadgets, then you can choose the latest phones and gadgets to stick to your own niche while also earning as an affiliate.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingten">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
          How Can I Monitor the Progress that I’ve Made? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseten" class="collapse" aria-labelledby="headingten" data-parent="#accordion2">
      <div class="card-body">
       <p>You can login to the affiliate dashboard and monitor your progress at any time of the day.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingeleven">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
          Who Do I Reach Out to If I Need Help? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapseeleven" class="collapse" aria-labelledby="headingeleven" data-parent="#accordion2">
      <div class="card-body">
       <p>You can send an email to <a href="mailto:mail@gobazaar.com.np">mail@gobazaar.com.np</a> for any assistance. We offer 24 hour customer service to all. Additionally, you will be assigned a dedicated manager who will help you with your queries.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="heading12">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
         How Will I Receive My Commission? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>

    <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion2">
      <div class="card-body">
        <p>You will receive all your commissions via bank transfer.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingthirteen">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsethirteen" aria-expanded="false" aria-controls="collapsethirteen">
          When do I get paid?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>

    <div id="collapsethirteen" class="collapse" aria-labelledby="headingthirteen" data-parent="#accordion2">
      <div class="card-body">
        <p>Validation period is 15 days. Your commission begins as soon as that is done.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingfourteen">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefourteen" aria-expanded="false" aria-controls="collapsefourteen">
         Any extra incentives I get for promotions?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsefourteen" class="collapse" aria-labelledby="headingfourteen" data-parent="#accordion2">
      <div class="card-body">
        <p>Yes, if you prove to be a really good affiliate and provide us with many conversions then you get extra incentives.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingfifteen">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefifteen" aria-expanded="false" aria-controls="collapsefifteen">
          How long is the cookie period?<span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsefifteen" class="collapse" aria-labelledby="headingfifteen" data-parent="#accordion2">
      <div class="card-body">
        <p>Cookie hold period is 30 days. This is when a user clicks on your link and lands on <a href="www.gobazaar.com.np">www.gobazaar.com.np</a> but does not make a purchase. If the same user returns within 30 days to <a href="www.gobazaar.com.np">www.gobazaar.com.np</a>, you will be awarded the commission.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingsixteen">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesixteen" aria-expanded="false" aria-controls="collapsesixteen">
          How much can I earn in a month? <span class="arrow-icon"></span>
        </button>
      </h5>
    </div>
    <div id="collapsesixteen" class="collapse" aria-labelledby="headingsixteen" data-parent="#accordion2">
      <div class="card-body">
       <p>Sky is the limit. Earn as much as you can since there is no cap on earning.</p>
      </div>
    </div>
  </div>
</div>
			</div>
			</div>
        </div>
    </div>
</div>
								

<script src="/scripts/jquery-3.3.1.min.js"></script>
<script src="/scripts/bootstrap.min.js"></script>
<script src="/scripts/owl.carousel.min.js"></script>
<script>
$(document).ready(function(){
	//$( "#accordion" ).accordion();
	//$( "#accordion2" ).accordion();
});

jQuery(".What-say").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    responsiveClass: true,
    navigation: false,
	autoplay:true,
	autoplayTimeout:1500,
	autoplaySpeed: 1000,
	autoplayHoverPause:true,
    responsive: {
        0: {
        items: 1,
        nav: false,
        },
        480: {
        items: 1,
        nav: false
        },
        768: {
        items: 2,
        nav: false,
        },
        992: {
        items: 3,
        nav: false,
        },
        1200: {
        items: 3,
        nav: false,
        }
    }
});
var owlCarousel = $('.owl-carousel');
    owlCarousel.mouseover(function(){
    owlCarousel.trigger('stop.owl.autoplay');
});
owlCarousel.mouseleave(function(){
    owlCarousel.trigger('play.owl.autoplay',[1000]);
});
</script>
<script src="https://cdn.goto.com.pk/uploads/cms/2019/3/5c7d08fad3bd4.jquery.marquee.js"></script>
<script type="text/javascript">
$('#marquee-vertical').marquee();  
</script>    
 
</div>
</div>

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
</script>



</body>
</html>
