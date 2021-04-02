@extends('frontend.layouts.app')

@section('content')
<style>
    .hidden{
        display:none;
    }
    .text-center{
        text-align:center;
    }
</style>
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">{{ translate('Home')}}</a></li>
                        <li><a href="#">{{ translate('Checkout')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="page-content">

        <section class="py-4 gry-bg">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-7">

                        {{--shopping Info--}}
                        <form class="form-default" id="checkout-form" data-toggle="validator" action="{{ route('payment.checkout') }}" role="form" method="POST">
                            @csrf
                           
                                <!-- auth if else code removed from here-->
                                
                                     <!--Shipping Address-->
                                     
                                     <div class="col-md-10">
                                            <label for="shipping-address">Shipping Address</label>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                            <input type="radio" name="shipping_charge_type" value="inside_valley" checked class="d-none" onchange="show_inside_shipping_address(this)" data-target=".inside_valley">
                                                            <span class="radio-box"></span>
                                                            <span class="d-block ml-2 strong-600">
                                                            {{  translate('Inside Valley') }}
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <!--@if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)-->
                                                        <div class="col-6">
                                                            <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                                <input type="radio" name="shipping_charge_type" value="outside_valley" class="d-none" onchange="show_outside_shipping_address(this)" data-target=".outside_valley">
                                                                <span class="radio-box"></span>
                                                                <span class="d-block ml-2 strong-600">
                                                                {{  translate('Outside Valley') }}
                                                            </span>
                                                            </label>
                                                        </div>
                                                    <!--@endif-->
                                                </div>
                                                  <!--@if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)-->
                                                    
                                                    <div class="mt-3 inside_valley" style="box-shadow:1px 1px 1px 0px silver;">
                                                        <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                            <div class="col-md-4">
                                                               
                                                                    <label class="d-flex align-items-center  border p-3 rounded gry-bg c-pointer">
                                                                        <input type="radio"  name="inside_valley_address" id="inside_ringroad" value="inside_ringroad" checked class="d-none inside_valley_address" onchange="show_inside_shipping_charge('inside_ringroad')" >
                                                                        <span class="radio-box"></span>
                                                                        <span class="d-block ml-2 strong-600">
                                                                        {{  translate('Inside Ringroad') }}
                                                                        </span>
                                                                    </label>
                                                                    <br>
                                                                    <label class="d-flex align-items-center  border p-3 rounded gry-bg c-pointer">
                                                                        <input type="radio" name="inside_valley_address" id="outside_ringroad" value="outside_ringroad"  class="d-none inside_valley_address" onchange="show_inside_shipping_charge('outside_ringroad')" >
                                                                        <span class="radio-box"></span>
                                                                        <span class="d-block ml-2 strong-600">
                                                                        {{  translate('Outside Ringroad') }}
                                                                        </span>
                                                                    </label>
                                                                    <br>
                                                                    <label class="d-flex align-items-center border p-3 rounded gry-bg c-pointer">
                                                                        <input type="radio" name="inside_valley_address" id="lalitpur" value="lalitpur"  class="d-none inside_valley_address" onchange="show_inside_shipping_charge('lalitpur')">
                                                                        <span class="radio-box"></span>
                                                                        <span class="d-block ml-2 strong-600">
                                                                        {{  translate('Lalitpur') }}
                                                                        </span>
                                                                    </label>
                                                                    <br>
                                                                    <label class="d-flex align-items-center border p-3 rounded gry-bg c-pointer">
                                                                        <input type="radio" name="inside_valley_address" id="bhaktapur" value="bhaktapur"  class="d-none inside_valley_address" onchange="show_inside_shipping_charge('bhaktapur')">
                                                                        <span class="radio-box"></span>
                                                                        <span class="d-block ml-2 strong-600">
                                                                        {{  translate('Bhaktapur') }}
                                                                        </span>
                                                                    </label>
                                                                    
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{ translate('Name')}}</label>
                                                                        <input type="text" class="form-control" name="inside_name" placeholder="{{ translate('Name')}}" required>
                                                                    </div>
                                                                </div>
                                                           
                                                                <div class="col-md-12">
                                                                    <div class="form-group has-feedback">
                                                                        <label class="control-label">{{ translate('Phone')}}</label>
                                                                        <input type="tel" min="0" class="form-control" placeholder="{{ translate('Phone')}}" name="inside_phone" required>
                                                                    </div>
                                                                </div>
                                                           
                                                                <div class="col-md-12">
                                                                    <div class="form-group has-feedback">
                                                                        <label class="control-label">{{ translate('City')}}</label>
                                                                        <input type="text" class="form-control" placeholder="{{ translate('City')}}" name="inside_city" required>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-12">
                                                                    <div class="form-group has-feedback">
                                                                        <label class="control-label">{{ translate('Street/Apartment')}}</label>
                                                                        <input type="text" class="form-control" placeholder="{{ translate('Street/Apartment')}}" name="inside_address" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            @if(Auth::check())
                                                                <input type="hidden" name="checkout_type" value="logged">
                                                            @else
                                                                <input type="hidden" name="checkout_type" value="guest">
                                                            @endif
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="outside_valley d-none" style="box-shadow:1px 1px 1px 0px silver;">
                                                        <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{ translate('Name')}}</label>
                                                                        <input type="text" class="form-control" name="name" placeholder="{{ translate('Name')}}" required>
                                                                    </div>
                                                                </div>
                                                           
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group has-feedback">
                                                                        <label class="control-label">{{ translate('Phone')}}</label>
                                                                        <input type="number" min="0" class="form-control" placeholder="{{ translate('Phone')}}" name="phone" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{ translate('Country')}}</label>
                                                                        <select name="country" class="form-control">
                                                                            <option value="Nepal" selected>{{__('Nepal')}}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">{{ translate('District')}}</label>
                                                                        <select name="district_id" id="district_id" class="form-control">
                                                                            @if(isset($districts[0]->id))
                                                                                @foreach($districts as $ind_district)
                                                                                <option value="{{@$ind_district->id}}">{{@$ind_district->district_name}}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group has-feedback">
                                                                        <label class="control-label">{{ translate('City')}}</label>
                                                                        <select name="city_id" id="city_id" class="form-control">
                                                                           <option selected disabled>Select City</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-12">
                                                                    <div class="form-group has-feedback">
                                                                        <label class="control-label">{{ translate('Street/Apartment')}}</label>
                                                                        <input type="text" class="form-control" placeholder="{{ translate('Street/Apartment')}}" name="address" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                            <input type="hidden" name="checkout_type" value="guest">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                               <!-- auth check else ended here-->
                                                </div>

                                    
                                <!--@endif-->
                            @php
                                $admin_products = array();
                                $seller_products = array();
                                foreach (Session::get('cart') as $key => $cartItem){
                                    if(\App\Product::find($cartItem['id'])->added_by == 'admin'){
                                        array_push($admin_products, $cartItem['id']);
                                    }
                                    else{
                                        $product_ids = array();
                                        if(array_key_exists(\App\Product::find($cartItem['id'])->user_id, $seller_products)){
                                            $product_ids = $seller_products[\App\Product::find($cartItem['id'])->user_id];
                                        }
                                        array_push($product_ids, $cartItem['id']);
                                        $seller_products[\App\Product::find($cartItem['id'])->user_id] = $product_ids;
                                    }
                                }
                            @endphp

                            @if (!empty($admin_products))
                                <div class="card mb-3">
                                    <div class="card-header bg-white py-3">
                                        <h5 class="heading-6 mb-0">{{ \App\GeneralSetting::first()->site_name }} Products</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table-cart">
                                                    <tbody>
                                                    @foreach ($admin_products as $key => $id)
                                                        <tr class="cart-item">
                                                            <td class="product-image" width="25%">
                                                                <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank">
                                                                    <img loading="lazy"  src="{{ my_asset(\App\Product::find($id)->thumbnail_img) }}">
                                                                </a>
                                                            </td>
                                                            <td class="product-name strong-600">
                                                                <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank" class="d-block c-base-2">
                                                                    {{ \App\Product::find($id)->name }}
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                            <input type="radio" name="shipping_type_admin" value="home_delivery" checked class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_admin">
                                                            <span class="radio-box"></span>
                                                            <span class="d-block ml-2 strong-600">
                                                            {{  translate('Home Delivery') }}
                                                        </span>
                                                        </label>
                                                    </div>
                                                    @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                        <div class="col-6">
                                                            <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                                <input type="radio" name="shipping_type_admin" value="pickup_point" class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_admin">
                                                                <span class="radio-box"></span>
                                                                <span class="d-block ml-2 strong-600">
                                                                {{  translate('Local Pickup') }}
                                                            </span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                </div>

                                                @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                    <div class="mt-3 pickup_point_id_admin d-none">
                                                        <select class="pickup-select form-control-lg w-100" name="pickup_point_id_admin" data-placeholder="{{ translate('Select a pickup point') }}">
                                                            <option>{{ translate('Select your nearest pickup point')}}</option>
                                                            @foreach (\App\PickupPoint::where('pick_up_status',1)->get() as $key => $pick_up_point)
                                                                <option value="{{ $pick_up_point->id }}" data-address="{{ $pick_up_point->address }}" data-phone="{{ $pick_up_point->phone }}">
                                                                    {{ $pick_up_point->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($seller_products))
                                @foreach ($seller_products as $key => $seller_product)
                                    <div class="card mb-3">
                                        <div class="card-header bg-white py-3">
                                            <h5 class="heading-6 mb-0">{{ \App\Shop::where('user_id', $key)->first()->name }} Products</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row no-gutters">
                                                <div class="col-md-6">
                                                    <table class="table-cart">
                                                        <tbody>
                                                        @foreach ($seller_product as $id)
                                                            <tr class="cart-item">
                                                                <td class="product-image" width="25%">
                                                                    <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank">
                                                                        <img loading="lazy"  src="{{ my_asset(\App\Product::find($id)->thumbnail_img) }}">
                                                                    </a>
                                                                </td>
                                                                <td class="product-name strong-600">
                                                                    <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank" class="d-block c-base-2">
                                                                        {{ \App\Product::find($id)->name }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                                <input type="radio" name="shipping_type_{{ $key }}" value="home_delivery" checked class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_{{ $key }}">
                                                                <span class="radio-box"></span>
                                                                <span class="d-block ml-2 strong-600">
                                                                    {{  translate('Home Delivery') }}
                                                                </span>
                                                            </label>
                                                        </div>
                                                        
                                                        @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                            @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                                                                <div class="col-6">
                                                                    <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                                        <input type="radio" name="shipping_type_{{ $key }}" value="pickup_point" class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_{{ $key }}">
                                                                        <span class="radio-box"></span>
                                                                        <span class="d-block ml-2 strong-600">
                                                                            {{  translate('Local Pickup') }}
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>

                                                    @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                        @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                                                            <div class="mt-3 pickup_point_id_{{ $key }} d-none">
                                                                <select class="pickup-select form-control-lg w-100" name="pickup_point_id_{{ $key }}" data-placeholder="{{ translate('Select a pickup point') }}">
                                                                    <option>{{ translate('Select your nearest pickup point')}}</option>
                                                                    @foreach (json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id) as $pick_up_point)
                                                                        @if (\App\PickupPoint::find($pick_up_point) != null)
                                                                            <option value="{{ \App\PickupPoint::find($pick_up_point)->id }}" data-address="{{ \App\PickupPoint::find($pick_up_point)->address }}" data-phone="{{ \App\PickupPoint::find($pick_up_point)->phone }}">
                                                                                {{ \App\PickupPoint::find($pick_up_point)->name }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="card">
                                <div class="card-title px-4 py-3">
                                    <h3 class="heading heading-5 strong-500">
                                        {{ translate('Select a payment option')}}
                                    </h3>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <div class="row">
                                                @if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Paypal">
                                                            <input type="radio" id="" name="payment_option" value="paypal" class="online_payment" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/paypal.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Stripe">
                                                            <input type="radio" id="" name="payment_option" value="stripe" class="online_payment" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/stripe.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="sslcommerz">
                                                            <input type="radio" id="" name="payment_option" value="sslcommerz" class="online_payment" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/sslcommerz.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Instamojo">
                                                            <input type="radio" id="" name="payment_option" value="instamojo" class="online_payment" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/instamojo.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Razorpay">
                                                            <input type="radio" id="" name="payment_option" value="razorpay" class="online_payment" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/rozarpay.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Paystack">
                                                            <input type="radio" id="" name="payment_option" value="paystack" class="online_payment" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/paystack.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="VoguePay">
                                                            <input type="radio" id="" name="payment_option" value="voguepay" class="online_payment" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/vogue.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'payhere')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="payhere">
                                                            <input type="radio" id="" name="payment_option" value="payhere" class="online_payment" checked>
                                                            <span>
                                                               <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/payhere.png')}}" class="img-fluid">
                                                           </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'ngenius')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="ngenius">
                                                            <input type="radio" id="" name="payment_option" value="ngenius" class="online_payment" checked>
                                                            <span>
                                                           <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/ngenius.png')}}" class="img-fluid">
                                                       </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\Addon::where('unique_identifier', 'african_pg')->first() != null && \App\Addon::where('unique_identifier', 'african_pg')->first()->activated)
                                                    @if(\App\BusinessSetting::where('type', 'mpesa')->first()->value == 1)
                                                        <div class="col-6">
                                                            <label class="payment_option mb-4" data-toggle="tooltip" data-title="mpesa">
                                                                <input type="radio" id="" name="payment_option" value="mpesa" class="online_payment" checked>
                                                                <span>
                                                            <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/mpesa.png')}}" class="img-fluid">
                                                        </span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                    @if(\App\BusinessSetting::where('type', 'flutterwave')->first()->value == 1)
                                                        <div class="col-6">
                                                            <label class="payment_option mb-4" data-toggle="tooltip" data-title="flutterwave">
                                                                <input type="radio" id="" name="payment_option" value="flutterwave" class="online_payment" checked>
                                                                <span>
                                                            <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/flutterwave.png')}}" class="img-fluid">
                                                        </span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if(\App\Addon::where('unique_identifier', 'paytm')->first() != null && \App\Addon::where('unique_identifier', 'paytm')->first()->activated)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Paytm">
                                                            <input type="radio" id="" name="payment_option" value="paytm" class="online_payment" checked>
                                                            <span>
                                                                <img loading="lazy" src="{{ static_asset('frontend/images/icons/cards/paytm.jpg')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)
                                                    @php
                                                        $digital = 0;
                                                        foreach(Session::get('cart') as $cartItem){
                                                            if($cartItem['digital'] == 1){
                                                                $digital = 1;
                                                            }
                                                        }
                                                    @endphp
                                                    @if($digital != 1)
                                                        <div class="col-6">
                                                            <label class="payment_option mb-4" data-toggle="tooltip" data-title="Cash on Delivery">
                                                                <input type="radio" id="" name="payment_option" value="cash_on_delivery" class="online_payment" checked>
                                                                <span>
                                                                    <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/cod.png')}}" class="img-fluid">
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if (Auth::check())
                                                    @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
                                                        @foreach(\App\ManualPaymentMethod::all() as $method)
                                                            <div class="col-6">
                                                                <label class="payment_option mb-4" data-toggle="tooltip" data-title="{{ $method->heading }}">
                                                                    <input type="radio" id="" name="payment_option" value="{{ $method->heading }}" onchange="toggleManualPaymentData({{ $method->id }})">
                                                                    <span>
                                                                      <img loading="lazy"  src="{{ static_asset($method->photo)}}" class="img-fluid">
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        @endforeach

                                                        @foreach(\App\ManualPaymentMethod::all() as $method)
                                                            <div id="manual_payment_info_{{ $method->id }}" class="d-none">
                                                                @php echo $method->description @endphp
                                                                @if ($method->bank_info != null)
                                                                    <ul>
                                                                        @foreach (json_decode($method->bank_info) as $key => $info)
                                                                            <li>Bank Name - {{ $info->bank_name }}, Account Name - {{ $info->account_name }}, Account Number - {{ $info->account_number}}, Routing Number - {{ $info->routing_number }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3 bg-gray text-left p-3 d-none">
                                        <div id="manual_payment_description">

                                        </div>
                                    </div>
                                    @if (Auth::check() && \App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1)
                                        <div class="or or--1 mt-2">
                                            <span>or</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xxl-6 col-lg-8 col-md-10 mx-auto">
                                                <div class="text-center bg-gray py-4">
                                                    <i class="fa"></i>
                                                    <div class="h5 mb-4">{{ translate('Your wallet balance :')}} <strong>{{ single_price(Auth::user()->balance) }}</strong></div>
                                                    @if(Auth::user()->balance < $total)
                                                        <button type="button" class="btn btn-base-2" disabled>{{ translate('Insufficient balance')}}</button>
                                                    @else
                                                        <button  type="button" onclick="use_wallet()" class="btn btn-base-1">{{ translate('Pay with wallet')}}</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="pt-3">
                                <input id="agree_checkbox" type="checkbox" required>
                                <label for="agree_checkbox">{{ translate('I agree to the')}}</label>
                                <a href="{{ route('terms') }}">{{ translate('terms and conditions')}}</a>,
                                <a href="{{ route('returnpolicy') }}">{{ translate('return policy')}}</a> &
                                <a href="{{ route('privacypolicy') }}">{{ translate('privacy policy')}}</a>
                            </div>

                            <div class="row align-items-center pt-3">
                                <div class="col-6">
                                    <a href="{{ route('home') }}" class="link link--style-3">
                                        <i class="ion-android-arrow-back"></i>
                                        {{ translate('Return to shop')}}
                                    </a>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" onclick="submitOrder(this)" class="btn btn-styled btn-base-1">{{ translate('Complete Order')}}</button>
                                </div>
                            </div>

                        </form>


                    </div>
                    
                    <div class="col-lg-5 ml-lg-auto">
                       
                        <div class="card sticky-top">
                            <div class="card-title py-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h3 class="heading heading-3 strong-400 mb-0">
                                            <span>{{translate('Summary')}}</span>
                                        </h3>
                                    </div>
                        
                                    <div class="col-6 text-right">
                                        <span class="badge badge-md badge-success">{{ count(Session::get('cart')) }} {{translate('Items')}}</span>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="card-body">
                                @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                    @php
                                        $total_point = 0;
                                    @endphp
                                    @foreach (Session::get('cart') as $key => $cartItem)
                                        @php
                                            $product = \App\Product::find($cartItem['id']);
                                            $total_point += $product->earn_point*$cartItem['quantity'];
                                        @endphp
                                    @endforeach
                                    <div class="club-point mb-3 bg-soft-base-1 border-light-base-1 border">
                                        {{ translate("Total Club point") }}:
                                        <span class="strong-700 float-right">{{ $total_point }}</span>
                                    </div>
                                @endif
                                <table class="table-cart table-cart-review">
                                    <thead>
                                        <tr>
                                            <th class="product-name">{{translate('Product')}}</th>
                                            <th class="product-name">{{translate('Quantity')}}</th>
                                            <th class="product-total">{{translate('Rate')}}</th>
                                             <th class="product-total text-right">{{translate('Total')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                            $tax = 0;
                                            $shipping = 0;
                                        @endphp
                                        @foreach (Session::get('cart') as $key => $cartItem)
                                            @php
                                                $product = \App\Product::find($cartItem['id']);
                                                $subtotal += $cartItem['price']*$cartItem['quantity'];
                                                $tax += $cartItem['tax']*$cartItem['quantity'];
                                               // $shipping += $cartItem['shipping'];
                        
                                                $product_name_with_choice = $product->name;
                                                if ($cartItem['variant'] != null) {
                                                    $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                                                }
                                            @endphp
                                            
                                            <tr class="cart_item">
                                                <td class="product-image" width="25%">
                                                    <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank">
                                                        <img loading="lazy"  src="{{ my_asset(\App\Product::find($id)->thumbnail_img) }}">
                                                    </a>
                                                </td>
                                                <!--<td class="product-name">-->
                                                <!--    {{ $product_name_with_choice }}-->
                                                    
                                                <!--</td>-->
                                                <td><strong class="product-quantity text-center">{{ $cartItem['quantity'] }}</strong></td>
                                                <td><strong class="gold-bold text-center">{{single_price($cartItem['price'])}}</strong></td>
                                                <td class="product-total text-right">
                                                    <span class="pl-4">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        
                                <table class="table-cart table-cart-review" style="width:70%; float:right;">
                        
                                    <tfoot>
                                       
                                        <tr class="cart-subtotal">
                                            <th>{{translate('Subtotal')}}</th>
                                            <td class="text-right">
                                                <span class="strong-600">{{ single_price($subtotal) }}</span>
                                            </td>
                                        </tr>
                        
                                        <!--<tr class="cart-shipping">-->
                                        <!--    <th>{{translate('Tax')}}</th>-->
                                        <!--    <td class="text-right">-->
                                        <!--        <span class="text-italic">{{ single_price($tax) }}</span>-->
                                        <!--    </td>-->
                                        <!--</tr>-->
                                       
                                         @if(Request::is('checkout'))
                                        
                                        <tr class="cart-shipping">
                                            <th>{{translate('Total Shipping')}}</th>
                                            <td class="text-right">
                                                <span class="text-italic" id='shipping_charge'>Rs. 0</span>
                                                <!--<span class="text-italic">{{ single_price($shipping) }}</span>-->
                                            </td>
                                        </tr>
                                        @endif
                                        @if (Session::has('coupon_discount'))
                                            <tr class="cart-shipping">
                                                <th>{{translate('Coupon Discount')}}</th>
                                                <td class="text-right">
                                                    <span class="text-italic">{{ single_price(Session::get('coupon_discount')) }}</span>
                                                </td>
                                            </tr>
                                        @endif
                                        
                                        @php
                                            $total = $subtotal+$tax;
                                            //+$shipping
                                            if(Session::has('coupon_discount')){
                                                $total -= Session::get('coupon_discount');
                                            }
                                        @endphp
                                        
                                        <tr class="cart-total">
                                            <th><span class="strong-600">{{translate('Total (tax included)')}}</span></th>
                                            <td class="text-right">
                                                <strong><span id="total_without_shipping" class="">{{ single_price($total) }}</span>
                                                <span id='total_after_shipping' class="hidden">Rs. 0</span>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                        
                                @if (Auth::check() && \App\BusinessSetting::where('type', 'coupon_system')->first()->value == 1)
                                    @if (Session::has('coupon_discount'))
                                        <div class="mt-3">
                                            <form class="form-inline" action="{{ route('checkout.remove_coupon_code') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group flex-grow-1">
                                                    <div class="form-control bg-gray w-100">{{ \App\Coupon::find(Session::get('coupon_id'))->code }}</div>
                                                </div>
                                                <button type="submit" class="btn btn-base-1">{{translate('Change Coupon')}}</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="mt-3">
                                            <form class="form-inline" action="{{ route('checkout.apply_coupon_code') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group flex-grow-1">
                                                    <input type="text" class="form-control w-100" name="code" placeholder="{{translate('Have coupon code? Enter here')}}" required>
                                                </div>
                                                <button type="submit" class="btn btn-base-1">{{translate('Apply')}}</button>
                                            </form>
                                        </div>
                                    @endif
                                @endif
                        
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>






    </div>

    <div class="modal fade" id="new-address-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">{{ translate('New Address')}}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-default" role="form" action="{{ route('addresses.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Address')}}</label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control textarea-autogrow mb-3" placeholder="{{ translate('Your Address')}}" rows="1" name="address" required></textarea>
                            </div>
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-md-2">--}}
{{--                                <label>{{ translate('Country')}}</label>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-10">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <select class="form-control mb-3 selectpicker" data-placeholder="{{ translate('Select your country')}}" name="country" required>--}}
{{--                                        @foreach (\App\Country::where('status', 1)->get() as $key => $country)--}}
{{--                                            <option value="{{ $country->name }}">{{ $country->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row">

                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-md-2">--}}
{{--                                <label>{{ translate('Postal code')}}</label>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-10">--}}
{{--                                <input type="text" class="form-control mb-3" placeholder="{{ translate('Your Postal Code')}}" name="postal_code" value="" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('City')}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="{{ translate('Your City')}}" name="city" value="" required>
                            </div>
                            <div class="col-md-2">
                                <label>{{ translate('Phone')}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="{{ translate('+880')}}" name="phone" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-base-1">{{  translate('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    function add_new_address(){
        $('#new-address-modal').modal('show');
    }

    // Delivery Information



    function display_option(key){

    }
    function show_pickup_point(el) {
        var value = $(el).val();
        var target = $(el).data('target');

        console.log(value);

        if(value == 'home_delivery'){
            if(!$(target).hasClass('d-none')){
                $(target).addClass('d-none');
            }
        }else{
            $(target).removeClass('d-none');
        }
    }
      function show_inside_shipping_address(el) {
        reset_shipping();
        var value = $(el).val();
        var target = $(el).data('target');

         if(!$(".outside_valley").hasClass('d-none')){
             $(".outside_valley").addClass("d-none");
         }
        $(".inside_valley").removeClass("d-none");
        

        // if(value == 'inside_valley'){
        //     if($(target).hasClass('d-none')){
        //         $(target).removeClass('d-none');
        //     }
        // }else{
        //     $(target).addClass('d-none');
        // }
        
    }
      function show_outside_shipping_address(el) {
          reset_shipping();
        var value = $(el).val();
        console.log(value);
        var target = $(el).data('target');
         if(!$(".inside_valley").hasClass('d-none')){
             $(".inside_valley").addClass("d-none");
         }
        $(".outside_valley").removeClass("d-none");
        
        console.log(value);

        // if(value == 'outside_valley'){
        //     if($(target).hasClass('d-none')){
        //         $(target).addClass('d-none');
        //     }
        // }else{
        //     $(target).removeClass('d-none');
        // }
        
    }




    // payment methods

    $(document).ready(function(){
        $(".online_payment").click(function(){
            $('#manual_payment_description').parent().addClass('d-none');
        });
    });

    function use_wallet(){
        $('input[name=payment_option]').val('wallet');
        if($('#agree_checkbox').is(":checked")){
            $('#checkout-form').submit();
        }else{
            showFrontendAlert('error','{{ translate('You need to agree with our policies') }}');
        }
    }
    function submitOrder(el){
        $(el).prop('disabled', true);
        if($('#agree_checkbox').is(":checked")){
            $('#checkout-form').submit();
        }else{
            showFrontendAlert('error','{{ translate('You need to agree with our policies') }}');
            $(el).prop('disabled', false);
        }
    }

    function toggleManualPaymentData(id){
        $('#manual_payment_description').parent().removeClass('d-none');
        $('#manual_payment_description').html($('#manual_payment_info_'+id).html());
    }

    // for getting relative selection of district and city
    function get_cities_by_district(){
        //  reset_shipping();
		var district_id = $('#district_id').val();
		$.post('{{ route('checkout.get_cities_by_district') }}',{_token:'{{ csrf_token() }}', district_id:district_id}, function(data){
		    $('#city_id').html(null);
		    $('#city_id').html('<option selected disabled>Select City</option>');
            var extra = "";
		    for (var i = 0; i < data.length; i++) {
                $('#city_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].city_name
                }));
                
		    }	    
            
		    $('.sub-demo-select2').select2();		    
		});
	}
    function get_shipping_charge_by_city(){
        
		var city_id = $('#city_id').val();
		$.post('{{ route('checkout.get_shipping_charge_by_city') }}',{_token:'{{ csrf_token() }}', city_id:city_id}, function(data){
		    $('#shipping_charge').html(null);
            var extra = "";
		        var total_quantity="@php $total_qty=0; foreach(Session::get('cart') as $ind_cart){ $total_qty+=$ind_cart['quantity'];} echo $total_qty;  @endphp";
		      //  alert(total_quantity);
		        $('#shipping_charge').html('Rs &nbsp;');
                $('#shipping_charge').append(total_quantity*data.shipping_charge);
                
                // for grand total calculation
                
                
                // var total=$('#grand_total').html();
                // alert($('#total_without_shipping').html().filternumbers());
                calculate_grand_total();
		    $('.sub-demo-select2').select2();		    
		});
	}
	
	function show_inside_shipping_charge(id){
	    
	    var total_quantity="@php $total_qty=0; foreach(Session::get('cart') as $ind_cart){ $total_qty+=$ind_cart['quantity'];} echo $total_qty;  @endphp";
	    
	    if(id=="inside_ringroad"){
	        var per_shipping_charge="@php echo @$inside_valley_shipping->inside_ringroad_price @endphp";
            $('#shipping_charge').html('Rs &nbsp;');
            $('#shipping_charge').append(total_quantity*per_shipping_charge);
	    }
	    if(id=='outside_ringroad'){
	        var per_shipping_charge="@php echo @$inside_valley_shipping->outside_ringroad_price @endphp";
            $('#shipping_charge').html('Rs &nbsp;');
            $('#shipping_charge').append(total_quantity*per_shipping_charge);
	    }
	    if(id=='lalitpur'){
	        var per_shipping_charge="@php echo @$inside_valley_shipping->lalitpur_shipping_price @endphp";
            $('#shipping_charge').html('Rs &nbsp;');
            $('#shipping_charge').append(total_quantity*per_shipping_charge);
	    }
	    if(id=='bhaktapur'){
	        var per_shipping_charge="@php echo @$inside_valley_shipping->bhaktapur_shipping_price @endphp";
            $('#shipping_charge').html('Rs &nbsp;');
            $('#shipping_charge').append(total_quantity*per_shipping_charge);
	    }
	    calculate_grand_total();       
	}
        
    function calculate_grand_total(){
        var total=parseInt($('#total_without_shipping').html().replace(/\D/g, ''),10);
        var shipping_charge=parseInt($('#shipping_charge').html().replace(/\D/g, ''),10);
       
        var grand_total=shipping_charge+total;
        
        if(parseInt($('#shipping_charge').html().replace(/\D/g,''),10)>0){
            $('#total_without_shipping').addClass('hidden');
            $('#total_after_shipping').html('Rs '+grand_total);
            $('#total_after_shipping').removeClass('hidden');
        }
    }
	
	function reset_shipping(){
	    $('#shipping_charge').html(null);
	    $('#total_without_shipping').removeClass('hidden');
	    $('#total_after_shipping').addClass('hidden');
	}
	
    $('.demo-select2').select2();

    $(document).ready(function(){
        
        // show_inside_shipping_charge('inside_ringroad');
        var total_quantity="@php $total_qty=0; foreach(Session::get('cart') as $ind_cart){ $total_qty+=$ind_cart['quantity'];} echo $total_qty;  @endphp";
        
             $('#shipping_charge').html(null);
            var per_shipping_charge="@php echo @$inside_valley_shipping->inside_ringroad_price @endphp";
            $('#shipping_charge').html('Rs &nbsp;');
            $('#shipping_charge').append(total_quantity*per_shipping_charge);
            calculate_grand_total();
       
       
        
        get_cities_by_district();
        //get_shipping_charge_by_city();
        // $(".add-colors").click(function(){
        //     console.log('test');
        //     var html = $(".clone-color").html();
        //     $(".increment").after(html);
        // });

        // $("body").on("click",".remove-colors",function(){
        //     $(this).parents(".control-group").remove();
        // });
        
         
    });
    
    $('#district_id').on('change', function() {
        get_cities_by_district();
    });
    $('#city_id').on('change', function() {
            get_shipping_charge_by_city();
    });
    
   
</script>
@endsection
