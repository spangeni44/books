<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $menus = Menu::query();
        if ($request->has('search')){
            $sort_search = $request->search;
            $menus = $menus->where('name', 'like', '%'.$sort_search.'%');
        }
        $menus = $menus->paginate(15);
        return view('menus.index', compact('menus', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('menus.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->location = $request->location;
        if(isset($request->menu_id)){
            $menu->menu_id=$request->menu_id;
        }
        if ($request->slug != null) {
            $menu->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }
        else {
            $menu->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }
        if($request->parent_id){
            $menu->parent_id = $request->parent_id;
        }

        $data = openJSONFile('en');
        $data[$menu->name] = $menu->name;
        saveJSONFile('en', $data);

        if($menu->save()){
            flash(translate('Menu has been inserted successfully'))->success();
            return redirect()->route('menus.index');
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
        $menu = Menu::findOrFail(decrypt($id));
        $menus = Menu::all();
        return view('menus.edit', compact('menus', 'menu'));
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
        $menu= Menu::findOrFail($id);
        
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->location = $request->location;
         if(isset($request->menu_id)){
            $menu->menu_id=$request->menu_id;
        }else{
            $menu->menu_id=null;
        }
        if ($request->slug != null) {
            $menu->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }
        else {
            $menu->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }
        if($request->parent_id){
            $menu->parent_id = $request->parent_id;
        }

        $data = openJSONFile('en');
        $data[$menu->name] = $menu->name;
        saveJSONFile('en', $data);
        
        
        if($menu->save()){
            flash(translate('Menu has been updated successfully'))->success();
            return redirect()->route('menus.index');
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
        $menu = Menu::findOrFail($id);
        Menu::destroy($id);
        flash(translate('Menu has been deleted successfully'))->success();
        return redirect()->route('menus.index');
        
    }
}
