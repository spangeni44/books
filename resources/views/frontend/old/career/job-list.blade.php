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

.collection-info-wrap a:link {color: #80bd01; text-decoration: underline;}

.all-brand-banner {display:none;}
#messages2 ul li { list-style-position: inside;  list-style-type: disc;}
#description img { width: auto !important; max-width: 100%;}
div#become-an-affiliate a:link { color: #75b511; font-weight: bold;}
.cod-notallow {color: #ff0000; text-transform: uppercase;  font-weight: bold;  font-size: 14px;  margin-bottom: 0px;}
.jobs-list a.applyNowBtn {
    background: #ff6f32;
    border-color: #ff6f32;
    color:white;
    font-weight:bolder;
}
.jobs-list a.applyNowBtn:hover{
    background:blue;
}
.jobs-list {
    margin-left:10px; margin-right:10px;
    margin-bottom: 20px;
    padding: 12px;
}
.border{
        border: 1px solid #f1f1f1 !important;
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
<body style="background-color:#FAFAFA;">


<!-- MAIN WRAPPER -->
<div class="body-wrap shop-default shop-cards shop-tech" style="background-color:#FAFAFA;">

    <!-- Header -->
    @include('frontend.inc.nav')


    <div id="content-section">
       
        <div class="row">
            <div class="col-md-1" style="background-color:#FAFAFA;"></div>
            <div class="col-md-10" style="background-color:white;">
                <h4><b>Available Positions</b></h4>
                @if(isset($careers[0]->id))
                @foreach($careers as $ind_career)
                <div class="row mLR0 border rounded jobs-list" style="border:2px border-radius:12px; padding:10px; ">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-12">
                        <a href=""><b>{{@$ind_career->job_title}}  </b> </a>
                        @if(isset($ind_career->no_of_vacancy))<br><i>Positions :{{@$ind_career->no_of_vacancy}}</i>@endif
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                        <a class="applyNowBtn jopApply btn btn-warning float-right" href="{{route('apply-job',@$ind_career->slug)}}">Apply Now</a>
                    </div>
                </div>
                @endforeach
                @endif
                <!--<div class="row mLR0 border rounded jobs-list">-->
                <!--    <div class="col-lg-8 col-md-8 col-sm-8 col-12">-->
        
                <!--        <a href="/applynow?id=244"><b>Sourcing Specialist  - Logistics-KHI </b> </a>-->
                <!--        <br><i>Positions : 1</i>-->
                <!--    </div>-->
                <!--    <div class="col-lg-4 col-md-4 col-sm-4 col-12">-->
                <!--        <a class="applyNowBtn jopApply btn btn-primary float-right" href="/applynow?id=244">Apply Now</a>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="row mLR0 border rounded jobs-list">-->
                <!--    <div class="col-lg-8 col-md-8 col-sm-8 col-12">-->
    
                <!--        <a href="/applynow?id=177"><b>Jr. Vendor Manager  - Vendor Management </b> </a>-->
                <!--        <br><i>Positions : 1</i>-->
                <!--    </div>-->
                <!--    <div class="col-lg-4 col-md-4 col-sm-4 col-12">-->
                <!--        <a class="applyNowBtn jopApply btn btn-primary float-right" href="/applynow?id=177">Apply Now</a>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <div class="col-md-1" style="background-color:#FAFAFA;"></div>
        </div>
    </div> 
</div>
								

<script src="/scripts/jquery-3.3.1.min.js"></script>
<script src="/scripts/bootstrap.min.js"></script>
<script src="/scripts/owl.carousel.min.js"></script>

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
