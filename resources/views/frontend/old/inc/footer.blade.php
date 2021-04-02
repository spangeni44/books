
@php
    $generalsetting = \App\GeneralSetting::first();
@endphp
<!--<section class="slice-sm footer-top-bar bg-white">-->
<!--    <div class="container sct-inner">-->
<!--        <div class="row no-gutters">-->
<!--            <div class="col-lg-3 col-md-6">-->
<!--                <div class="footer-top-box text-center">-->
<!--                    <a href="{{ route('sellerpolicy') }}">-->
<!--                        <i class="la la-file-text"></i>-->
<!--                        <h4 class="heading-5">{{ translate('Seller Policy') }}</h4>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-6">-->
<!--                <div class="footer-top-box text-center">-->
<!--                    <a href="{{ route('returnpolicy') }}">-->
<!--                        <i class="la la-mail-reply"></i>-->
<!--                        <h4 class="heading-5">{{ translate('Return Policy') }}</h4>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-6">-->
<!--                <div class="footer-top-box text-center">-->
<!--                    <a href="{{ route('supportpolicy') }}">-->
<!--                        <i class="la la-support"></i>-->
<!--                        <h4 class="heading-5">{{ translate('Support Policy') }}</h4>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-6">-->
<!--                <div class="footer-top-box text-center">-->
<!--                    <a href="{{ route('profile') }}">-->
<!--                        <i class="la la-dashboard"></i>-->
<!--                        <h4 class="heading-5">{{ translate('My Profile') }}</h4>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--<div class="nrn-p-32">-->

<!--</div>-->

<style>
    @media only screen and (max-width: 768px) {
   .subscription-form{
    margin-bottom:10px;
  }
  .footer-top{
      padding:4rem 0 0 0;
  }
  ul.footer-links > li > a::before{
      position:relative !important;
      
  }
  footer h4.nrn-top-heading{
      
  }
  .nrn-p-32{
      padding:10px;
  }
  .footer{
   /*text-align:left !important;   add textcenter class for center  */ 
  }
  .nrn-subscribe-field{
      max-width:250px;
  }
}
.news-letter{
    position:relative !important;
}
.footer-top{
    padding:4rem 0 0 0;
}
.social-nav a{
    line-height:0 !important;
    padding:8px 0 0 0;
}
</style>


<!-- FOOTER -->
<footer id="footer" class="footer  " style="padding-top:5px !important; margin-top:5px !important;">
    <!--mt-5 pt-5-->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row cols-xs-space cols-sm-space cols-md-space pb-2">
                
                    <div class="col-md-3 col-lg-3 col-xl-3  text-md-left">
                        <div class="col">
                            <a href="{{ route('home') }}" class="d-block">
                                @if($generalsetting->footer_logo != null)
                                    <img loading="lazy" class="img-fluid "  src="{{ my_asset($generalsetting->footer_logo) }}" alt="{{ env('APP_NAME') }}" height="44">
                                @elseif($generalsetting->logo != null)
                                    <img loading="lazy" class="img-fluid"  src="{{ my_asset($generalsetting->logo) }}" alt="{{ env('APP_NAME') }}" height="44">
                                @else
                                    <img loading="lazy" class="nrn-img-100"  src="{{ static_asset('frontend/images/logo/logo.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                                @endif
                            </a>
                            <ul class="footer-links contact-widget pt-4">
                                <li>
                                    <i class="fa fa-home"></i>
                                   <span>{{ $generalsetting->address }}</span>
                                </li>
                                <li>
                                    <i class="fa fa-paper-plane"></i>
                                   <span>{{ $generalsetting->email  }}</a>
                                </span>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <span>{{ $generalsetting->phone }}</span>
                                </li>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="col text-md-left"> <!--text-center-->
                            <h4 class="heading heading-xs strong-600 text-uppercase mb-2 nrn-top-heading">
                                <i class="la la-dot-circle"></i>
                                <i class="las la-dot-circle"></i>
                                <i class="lar la-dot-circle"></i>
                                {{ translate('About Us') }}
                                <!--<hr style="width:100%; height: 2px;background: #ff5c00;">-->
                            </h4>
                            <ul class="footer-links">
                                @foreach (\App\Menu::where('location','footer-1')->get() as $key => $menu)
                                    <li>
                                        <a href="{{ $menu->link }}" title="">
                                            {{ $menu->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="col  text-md-left">
                            <h4 class="heading heading-xs strong-600 text-uppercase mb-2 nrn-top-heading">
                                <i class="la la-dot-circle"></i>
                                <i class="las la-dot-circle"></i>
                                <i class="lar la-dot-circle"></i>
                                {{ translate('Customer Service') }}
                            </h4>
                            <ul class="footer-links">
                                @foreach (\App\Menu::where('location','footer-2')->get() as $key => $menu)
                                    <li>
                                        <a href="{{ $menu->link }}" title="">
                                            {{ $menu->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <div class="col  text-md-left">
                            <h4 class="heading heading-xs strong-600 text-uppercase mb-2 nrn-top-heading">
                                {{ translate('Sell On Gobazar') }}
                            </h4>

                            <ul class="footer-links">
                                @foreach (\App\Menu::where('location','footer-3')->get() as $key => $menu)
                                    <li>
                                        <a href="{{ $menu->link }}" title="">
                                            {{ $menu->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <div class="col  text-md-left">
                            <h4 class="heading heading-xs strong-600 text-uppercase mb-2 nrn-top-heading">
                                {{ translate('My Account') }}
                            </h4>

                            <ul class="footer-links">
                                @foreach (\App\Menu::where('location','footer-4')->get() as $key => $menu)
                                    <li>
                                        <a href="{{ $menu->link }}" title="">
                                            {{ $menu->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--@if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)-->
                        <!--    <div class="col text-center text-md-left">-->
                        <!--        <div class="mt-4">-->
                        <!--            <h4 class="heading heading-xs strong-600 text-uppercase mb-2">-->
                        <!--                {{ translate('Be a Seller') }}-->
                        <!--            </h4>-->
                        <!--            <a href="{{ route('shops.create') }}" class="btn btn-base-1 btn-icon-left">-->
                        <!--                {{ translate('Apply Now') }}-->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--@endif-->
                    </div>


            </div>
            <!--email subscription-->
           <div class="news-letter" style=""> <!--padding-bottom:10px-->
                <div class="" style="width:100%;">
                    <div class="row">
                        <div class="col d-flex nrn-bg-orange-normal text-white nrn-p-32  flex-wrap">
                            <!--nrn-p-32 nrn-left-30-->
                            <h3>FOLLOW US</h3>
                            <div class="nrn-social-links">
                                                    <ul class="text-center my-3 my-md-0 social-nav model-2">
                                                        @if ($generalsetting->facebook != null)
                                                            <li>
                                                                <a href="{{ $generalsetting->facebook }}" class="nrn-bg-dark-orange" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($generalsetting->instagram != null)
                                                            <li>
                                                                <a href="{{ $generalsetting->instagram }}" class="nrn-bg-dark-orange" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                                                                    <i class="fa fa-instagram"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($generalsetting->twitter != null)
                                                            <li>
                                                                <a href="{{ $generalsetting->twitter }}" class="nrn-bg-dark-orange" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($generalsetting->youtube != null)
                                                            <li>
                                                                <a href="{{ $generalsetting->youtube }}" class="nrn-bg-dark-orange" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                                                    <i class="fa fa-youtube"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($generalsetting->google_plus != null)
                                                            <li>
                                                                <a href="{{ $generalsetting->google_plus }}" class="nrn-bg-dark-orange" target="_blank" data-toggle="tooltip" data-original-title="Google Plus">
                                                                    <i class="fa fa-google-plus"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                            </div>
                        </div>
                        <div class="col nrn-bg-orange-normal nrn-p-32 "> <!-- nrn-right-30 -->
                            <div class="d-inline-block d-md-block">
                                <form class="form-inline" method="POST" action="{{ route('subscribers.store') }}">
                                    @csrf
                                    <div class="form-group mb-md-0 mb-10 subscription-form">
                                        <input type="email" class="nrn-subscribe-field" placeholder="{{ translate('Your Email Address') }}" name="email" required>
                                    </div>
                                    <button type="submit" class="btn btn-base-1 btn-icon-left nrn-subscribe-btn">
                                        {{ translate('Subscribe') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- email subscription ends -->
            <!--<div class="row border-top">-->
            <!--    <div class="col d-flex justify-content-center py-4">-->
            <!--             <img loading="lazy" alt="paypal" src="{{ static_asset('/img/foo1.jpg')}}" height="30">-->

            <!--    </div>    -->
            <!--</div>-->
            <!--<div class="row">-->
            <!--    <div class="col d-flex justify-content-center ">-->
            <!--    <ul id="menu-menu-footer-4" class="d-flex justify-content-center list-unstyled">-->
                    
            <!--        @foreach (\App\Menu::where('location','footer-5')->get() as $key => $menu)-->
            <!--            <li class="menu-about-store px-1 font-weight-bold"><a class="item-link text-gray" href="{{ $menu->link }}"><span class="menu-title">{{ $menu->name }}</span></a></li>-->
            <!--        @endforeach-->
                
                
            <!--    </ul>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="row ">-->
            <!--    <div class="col d-flex justify-content-center py-2">-->
            <!--        <p class="mt-3 text-center px-4">{{ $generalsetting->description }}</p>-->
            <!--    </div>    -->
            <!--</div>-->
            <!--<div class="row d-sm-none">-->
            <!--   <div class="col">-->
            <!--       <div class="text-center">-->
                       <!--<ul class="inline-links" style="padding-bottom:30px;">-->
                           
                       <!--</ul>-->
                       <!--<ul class="inline-links">-->
                       <!--    @if (\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)-->
                       <!--        <li>-->
                       <!--            <img loading="lazy" alt="paypal" src="{{ static_asset('frontend/images/icons/cards/paypal.png')}}" height="30">-->
                       <!--        </li>-->
                       <!--    @endif-->
                       <!--    @if (\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)-->
                       <!--        <li>-->
                       <!--            <img loading="lazy" alt="stripe" src="{{ static_asset('frontend/images/icons/cards/stripe.png')}}" height="30">-->
                       <!--        </li>-->
                       <!--    @endif-->
                       <!--    @if (\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)-->
                       <!--        <li>-->
                       <!--            <img loading="lazy" alt="sslcommerz" src="{{ static_asset('frontend/images/icons/cards/sslcommerz-foo.png')}}" height="30">-->
                       <!--        </li>-->
                       <!--    @endif-->
                       <!--    @if (\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)-->
                       <!--        <li>-->
                       <!--            <img loading="lazy" alt="instamojo" src="{{ static_asset('frontend/images/icons/cards/instamojo.png')}}" height="30">-->
                       <!--        </li>-->
                       <!--    @endif-->
                       <!--    @if (\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)-->
                       <!--        <li>-->
                       <!--            <img loading="lazy" alt="razorpay" src="{{ static_asset('frontend/images/icons/cards/rozarpay.png')}}" height="30">-->
                       <!--        </li>-->
                       <!--    @endif-->
                       <!--    @if (\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)-->
                       <!--        <li>-->
                       <!--            <img loading="lazy" alt="voguepay" src="{{ static_asset('frontend/images/icons/cards/vogue.png')}}" height="30">-->
                       <!--        </li>-->
                       <!--    @endif-->
                       <!--    @if (\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)-->
                       <!--        <li>-->
                       <!--            <img loading="lazy" alt="paystack" src="{{ static_asset('frontend/images/icons/cards/paystack.png')}}" height="30">-->
                       <!--        </li>-->
                       <!--    @endif-->
                       <!--    @if (\App\BusinessSetting::where('type', 'payhere')->first()->value == 1)-->
                       <!--        <li>-->
                       <!--            <img loading="lazy" alt="payhere" src="{{ static_asset('frontend/images/icons/cards/payhere.png')}}" height="30">-->
                       <!--        </li>-->
                       <!--    @endif-->
                       <!--    @if (\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)-->
                       <!--        <li>-->
                       <!--            <img loading="lazy" alt="cash on delivery" src="{{ static_asset('frontend/images/icons/cards/cod.png')}}" height="30">-->
                       <!--        </li>-->
                       <!--    @endif-->
                           <!--@if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)-->
                           <!--    @foreach(\App\ManualPaymentMethod::all() as $method)-->
                           <!--        <li>-->
                           <!--            <img loading="lazy" alt="{{ $method->heading }}" src="{{ my_asset($method->photo)}}" height="30">-->
                           <!--        </li>-->
                           <!--    @endforeach-->
                           <!--@endif-->
                       <!--</ul>-->
            <!--       </div>-->
            <!--   </div>-->
            <!--</div>-->
        </div>
      </div>

    <div class="footer-bottom py-1 sct-color-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="copyright text-center text-md-left">
                        <ul class="copy-links no-margin">
                            <li>
                                © {{ date('Y') }} {{ $generalsetting->site_name }}
                            </li>
                            <li>
                                <a href="{{ route('terms') }}">{{ translate('Terms') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('privacypolicy') }}">{{ translate('Privacy policy') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--<div class="col-md-4">
{{--                    <ul class="text-center my-3 my-md-0 social-nav model-2">--}}
{{--                        @if ($generalsetting->facebook != null)--}}
{{--                            <li>--}}
{{--                                <a href="{{ $generalsetting->facebook }}" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">--}}
{{--                                    <i class="fa fa-facebook"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if ($generalsetting->instagram != null)--}}
{{--                            <li>--}}
{{--                                <a href="{{ $generalsetting->instagram }}" class="instagram" target="_blank" data-toggle="tooltip" data-original-title="Instagram">--}}
{{--                                    <i class="fa fa-instagram"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if ($generalsetting->twitter != null)--}}
{{--                            <li>--}}
{{--                                <a href="{{ $generalsetting->twitter }}" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">--}}
{{--                                    <i class="fa fa-twitter"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if ($generalsetting->youtube != null)--}}
{{--                            <li>--}}
{{--                                <a href="{{ $generalsetting->youtube }}" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">--}}
{{--                                    <i class="fa fa-youtube"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if ($generalsetting->google_plus != null)--}}
{{--                            <li>--}}
{{--                                <a href="{{ $generalsetting->google_plus }}" class="google-plus" target="_blank" data-toggle="tooltip" data-original-title="Google Plus">--}}
{{--                                    <i class="fa fa-google-plus"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    </ul>--}}
                </div> -->
                <div class="col-md-4">
                    <div class="text-center text-md-right">
                        <ul class="inline-links">
                            @if (\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="paypal" src="{{ static_asset('frontend/images/icons/cards/paypal.png')}}" height="30">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="stripe" src="{{ static_asset('frontend/images/icons/cards/stripe.png')}}" height="30">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="sslcommerz" src="{{ static_asset('frontend/images/icons/cards/sslcommerz-foo.png')}}" height="30">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="instamojo" src="{{ static_asset('frontend/images/icons/cards/instamojo.png')}}" height="30">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="razorpay" src="{{ static_asset('frontend/images/icons/cards/rozarpay.png')}}" height="30">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="voguepay" src="{{ static_asset('frontend/images/icons/cards/vogue.png')}}" height="30">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="paystack" src="{{ static_asset('frontend/images/icons/cards/paystack.png')}}" height="30">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'payhere')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="payhere" src="{{ static_asset('frontend/images/icons/cards/payhere.png')}}" height="30">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="cash on delivery" src="{{ static_asset('frontend/images/icons/cards/cod.png')}}" height="30">
                                </li>
                            @endif
                            @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
                                @foreach(\App\ManualPaymentMethod::all() as $method)
                                  <li>
                                    <img loading="lazy" alt="{{ $method->heading }}" src="{{ my_asset($method->photo)}}" height="30">
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

