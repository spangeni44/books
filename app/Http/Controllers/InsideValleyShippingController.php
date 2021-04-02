<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\InsideValleyShipping;
use Illuminate\Support\Str;
class InsideValleyShippingController extends Controller
{
    
    public function index()
    {
        $inside_valley_shipping=@InsideValleyShipping::first();
        if(isset($inside_valley_shipping->id)){
            return view('shipping_inside_valley.edit',compact('inside_valley_shipping'));
        }
        return view('shipping_inside_valley.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->id)){
            $inside_valley_shipping=@InsideValleyShipping::find($request->id);
            $act='updat';
        }else{
            $act='add';
            $inside_valley_shipping = new InsideValleyShipping;
        }
        $inside_valley_shipping->inside_ringroad_price = $request->inside_ringroad_price;
        $inside_valley_shipping->outside_ringroad_price = $request->outside_ringroad_price;
        $inside_valley_shipping->lalitpur_shipping_price=$request->lalitpur_shipping_price; 
        $inside_valley_shipping->bhaktapur_shipping_price=$request->bhaktapur_shipping_price;
        
        if($inside_valley_shipping->save()){
            flash(translate('Shipping Price has been '.@$act.'ed successfully'))->success();
            return redirect()->route('inside_valley_shipping.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $inside_valley_shipping = new InsideValleyShipping;
        $inside_valley_shipping->inside_ringroad_price = $request->inside_ringroad_price;
        $inside_valley_shipping->outside_ringroad_price = $request->outside_ringroad_price;
        $inside_valley_shipping->lalitpur_shipping_price=$request->lalitpur_shipping_price; 
        $inside_valley_shipping->bhaktapur_shipping_price=$request->bhaktapur_shipping_price;
        if($inside_valley_shipping->save()){
            flash(translate('Shipping Price has been updated successfully'))->success();
            return redirect()->route('inside_valley_shipping.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }
}
