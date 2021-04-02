<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\ShippingDistrict;
use App\Brand;
use App\Product;
use App\Language;
use Illuminate\Support\Str;

class ShippingDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $districts = ShippingDistrict::orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $districts = $districts->where('district_name', 'like', '%'.$sort_search.'%');
        }
        $districts = $districts->paginate(15);
        return view('shipping_districts.index', compact('districts', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('shipping_districts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $district = new ShippingDistrict;
        $district->district_name = $request->district_name;
        $district->status = $request->status;
        
        
        $data = openJSONFile('en');
        $data[$district->district_name] = $district->district_name;
        saveJSONFile('en', $data);

        if($district->save()){
            flash(translate('ShippingDistrict has been inserted successfully'))->success();
            return redirect()->route('shipping_districts.index');
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
        $district = ShippingDistrict::findOrFail(decrypt($id));
        
        return view('shipping_districts.edit', compact('district'));
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
        $district = ShippingDistrict::findOrFail($id);

        foreach (Language::all() as $key => $language) {
            $data = openJSONFile($language->code);
            unset($data[$district->district_name]);
            $data[$request->district_name] = "";
            saveJSONFile($language->code, $data);
        }

        $district->district_name = $request->district_name;
        $district->status = $request->status;
        
        if($district->save()){
            flash(translate('ShippingDistrict has been updated successfully'))->success();
            return redirect()->route('shipping_districts.index');
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
        $district = ShippingDistrict::findOrFail($id);
       
        if(ShippingDistrict::destroy($id)){
            foreach (Language::all() as $key => $language) {
                $data = openJSONFile($language->code);
                unset($data[$district->district_name]);
                saveJSONFile($language->code, $data);
            }
            flash(translate('ShippingDistrict has been deleted successfully'))->success();
            return redirect()->route('shipping_districts.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    public function get_cities_by_district(Request $request)
    {
        return ShippingCity::where('district_id',$request->district_id)->get();
    }
    
     public function updateStatus(Request $request)
    {
        $district = ShippingDistrict::findOrFail($request->id);
        if($request->check_status){
             $district->status = 'active';
        }else{
            $district->status ='inactive';
        }
        if($district->save()){
            return 1;
        }
        return 0;
    }
}
