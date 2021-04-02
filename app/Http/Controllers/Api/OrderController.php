<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\BusinessSetting;
use App\User;
use DB;

class OrderController extends Controller
{
    public function processOrder(Request $request)
    {
        $shippingAddress = json_decode($request->shipping_address);

        $cartItems = Cart::where('user_id', $request->user_id)->get();

        $shipping = 0;
        $admin_products = array();
        $seller_products = array();
         // create an order
        $order = Order::create([
            'user_id' => $request->user_id,
            'shipping_address' => json_encode($shippingAddress),
            'payment_type' => $request->payment_type,
            'payment_status' => $request->payment_status,
            'grand_total' => $request->grand_total + $shipping,    //// 'grand_total' => $request->grand_total + $shipping,
            'coupon_discount' => $request->coupon_discount,
            'code' => date('Ymd-his'),
            'date' => strtotime('now')
        ]);

        if(Auth::check()){
            $order->user_id = Auth::user()->id;
        }
        else{
            $order->guest_id = mt_rand(100000, 999999);
        }
         if(isset($request->shipping_charge_type)){
            $order->shipping_charge_type=$request->shipping_charge_type;
        }
        $order->shipping_address = json_encode($request->session()->get('shipping_info'));

        $order->payment_type = $request->payment_option;
        $order->delivery_viewed = '0';
        $order->payment_status_viewed = '0';
        $order->code = date('Ymd-His').rand(10,99);
        $order->date = strtotime('now');

        if($order->save()){
            $subtotal = 0;
            $tax = 0;
            $shipping = 0;

            //calculate shipping is to get shipping costs of different types
            $admin_products = array();
            $seller_products = array();
            
             // for outside valley shipping charge calculation
            if(@$request->shipping_charge_type=='outside_valley'){
                @$shipping_city=ShippingCity::where(['id'=>$request->city_id,'status'=>'active'])->first();
                if(isset($shipping_city->id)){
                    if(isset($shipping_city->shipping_charge)){
                        $total_qty=0;
                        foreach(Session::get('cart') as $ind_cart){
                            if(!$ind_cart['digital']){
                               $total_qty=$total_qty+$ind_cart['quantity'];
                            }
                        }
                        $shipping=$total_qty*$shipping_city->shipping_charge;
                    }else{
                        flash(translate('Opps! Shipping Charge Not Set For This City! Contact Us or Choose Another City'))->warning();
                    }
                }else{
                     flash(translate('City Not Found! Select Available City'))->warning();
                }
               
            }
                // for inside valley shipping charge calculation
               if($request->shipping_charge_type=='inside_valley'){
                $total_qty=0;
                foreach(Session::get('cart') as $ind_cart){
                    if(!$ind_cart['digital']){
                       $total_qty=$total_qty+$ind_cart['quantity'];
                    }
                }
                // inside valley shipping code here
               if(isset($request->inside_valley_address)){
                   switch($request->inside_valley_address){
                        case 'inside_ringroad':
                           $shipping=$total_qty*@InsideValleyShipping::first()->inside_ringroad_price;
                           break;
                        case 'outside_ringroad':
                            $shipping=$total_qty*@InsideValleyShipping::first()->outside_ringroad_price;
                            break;
                        case 'lalitpur':
                             $shipping=$total_qty*@InsideValleyShipping::first()->lalitpur_shipping_price;
                             break;
                        case 'bhaktapur':
                            $shipping=$total_qty*@InsideValleyShipping::first()->bhaktapur_shipping_price;
                            break;
                   }
               }else{
                   flash(translate('Please Select One of The Shipping Address'))->warning();
                   return redirect()->back();
               }
            }
            
            // if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'flat_rate') {
            //     $shipping = \App\BusinessSetting::where('type', 'flat_rate_shipping_cost')->first()->value;
            // }
            // elseif (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'seller_wise_shipping') {
            //     foreach ($cartItems as $cartItem) {
            //         $product = \App\Product::find($cartItem->product_id);
            //         if($product->added_by == 'admin'){
            //             array_push($admin_products, $cartItem->product_id);
            //         }
            //         else{
            //             $product_ids = array();
            //             if(array_key_exists($product->user_id, $seller_products)){
            //                 $product_ids = $seller_products[$product->user_id];
            //             }
            //             array_push($product_ids, $cartItem->product_id);
            //             $seller_products[$product->user_id] = $product_ids;
            //         }
            //     }
            //         if(!empty($admin_products)){
            //             $shipping = \App\BusinessSetting::where('type', 'shipping_cost_admin')->first()->value;
            //         }
            //         if(!empty($seller_products)){
            //             foreach ($seller_products as $key => $seller_product) {
            //                 $shipping += \App\Shop::where('user_id', $key)->first()->shipping_cost;
            //             }
            //         }
            // }
    
           
            foreach ($cartItems as $cartItem) {
                $product = Product::findOrFail($cartItem->product_id);
                if ($cartItem->variation) {
                    $cartItemVariation = $cartItem->variation;
                    $product_stocks = $product->stocks->where('variant', $cartItem->variation)->first();
                    $product_stocks->qty -= $cartItem->quantity;
                    $product_stocks->save();
                } else {
                    $product->update([
                        'current_stock' => DB::raw('current_stock - ' . $cartItem->quantity)
                    ]);
                }
    
                $order_detail_shipping_cost= 0;
    
                if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'flat_rate') {
                   
                    if(!$cartItem['digital']){
                        
                        $order_detail_shipping_cost = $shipping/count($cartItems);
                    }
                }
                elseif (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'seller_wise_shipping') {
                    if($product->added_by == 'admin'){
                        if(!$cartItem['digital']){
                        $order_detail_shipping_cost = \App\BusinessSetting::where('type', 'shipping_cost_admin')->first()->value/count($admin_products);
                        }
                    }
                    else {
                        if(!$cartItem['digital']){
                        $order_detail_shipping_cost = \App\Shop::where('user_id', $product->user_id)->first()->shipping_cost/count($seller_products[$product->user_id]);
                        }
                    }
                }
                else{
                    $order_detail_shipping_cost = $product->shipping_cost;
                }
    
                // save order details
                OrderDetail::create([
                    'order_id' => $order->id,
                    'seller_id' => $product->user_id,
                    'product_id' => $product->id,
                    'variation' => $cartItem->variation,
                    'price' => $cartItem->price * $cartItem->quantity,
                    'tax' => $cartItem->tax * $cartItem->quantity,
                    'shipping_cost' => $order_detail_shipping_cost,
                    'quantity' => $cartItem->quantity,
                    'payment_status' => $request->payment_status
                ]);
                $product->update([
                    'num_of_sale' => DB::raw('num_of_sale + ' . $cartItem->quantity)
                ]);
            }
            // apply coupon usage
            if ($request->coupon_code != '') {
                CouponUsage::create([
                    'user_id' => $request->user_id,
                    'coupon_id' => Coupon::where('code', $request->coupon_code)->first()->id
                ]);
            }
            // calculate commission
            $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
            foreach ($order->orderDetails as $orderDetail) {
                if ($orderDetail->product->user->user_type == 'seller') {
                    $seller = $orderDetail->product->user->seller;
                    $price = $orderDetail->price + $orderDetail->tax + $orderDetail->shipping_cost;
                    $seller->admin_to_pay = ($request->payment_type == 'cash_on_delivery') ? $seller->admin_to_pay - ($price * $commission_percentage) / 100 : $seller->admin_to_pay + ($price * (100 - $commission_percentage)) / 100;
                    $seller->save();
                }
            }
            // clear user's cart
            $user = User::findOrFail($request->user_id);
            $user->carts()->delete();

            return response()->json([
            'success' => true,
            'message' => 'Your order has been placed successfully'
            ]);
        }
    }
    public function store(Request $request)
    {
        return $this->processOrder($request);
    }
}
