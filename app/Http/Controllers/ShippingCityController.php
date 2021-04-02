<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\ShippingDistrict;
use App\ShippingCity;
use App\Brand;
use App\Product;
use App\Language;
use Illuminate\Support\Str;

class ShippingCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $cities = ShippingCity::orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $cities = $cities->where('city_name', 'like', '%'.$sort_search.'%');
        }
        $cities = $cities->paginate(15);
        return view('shipping_cities.index', compact('cities', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = ShippingDistrict::all();
        
        return view('shipping_cities.create',compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $city = new ShippingCity;
        $city->city_name = $request->city_name;
        $city->status=$request->status; 
        $city->district_id=$request->district_id;
        $city->shipping_charge=(int)$request->shipping_charge;
        $data = openJSONFile('en');
        $data[$city->city_name] = $city->city_name;
        saveJSONFile('en', $data);

        if($city->save()){
            flash(translate('ShippingCity has been inserted successfully'))->success();
            return redirect()->route('shipping_cities.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = ShippingCity::findOrFail(decrypt($id));
        $districts = ShippingDistrict::all();
        $cities = ShippingCity::all();
        return view('shipping_cities.edit', compact('city','cities','districts'));
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
        $city = ShippingCity::findOrFail($id);
        
        foreach (Language::all() as $key => $language) {
            $data = openJSONFile($language->code);
            unset($data[$city->city_name]);
            $data[$request->city_name] = "";
            saveJSONFile($language->code, $data);
        }

        $city->city_name = $request->city_name;
        $city->status=$request->status; 
        $city->district_id=$request->district_id;
        $city->shipping_charge=(int)$request->shipping_charge;
        if($city->save()){
            flash(translate('ShippingCity has been updated successfully'))->success();
            return redirect()->route('shipping_cities.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = ShippingCity::findOrFail($id);
       
        if(ShippingCity::destroy($id)){
            foreach (Language::all() as $key => $language) {
                $data = openJSONFile($language->code);
                unset($data[$city->city_name]);
                saveJSONFile($language->code, $data);
            }
            flash(translate('ShippingCity has been deleted successfully'))->success();
            return redirect()->route('shipping_cities.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    public function get_district_by_city(Request $request)
    {
        return ShippingCity::where('id',$request->district_id)->first();
    }
     public function updateStatus(Request $request)
    {
        $city = ShippingCity::findOrFail($request->id);
        if($request->check_status){
             $city->status = 'active';
        }else{
            $city->status ='inactive';
        }
        if($city->save()){
            return 1;
        }
        return 0;
    }
}
