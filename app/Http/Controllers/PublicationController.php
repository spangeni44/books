<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Product;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $publications = Publication::orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $publications = $publications->where('name', 'like', '%'.$sort_search.'%');
        }
        $publications = $publications->paginate(15);
        return view('publications.index', compact('publications', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publication = new Publication;
        $publication->name = $request->name;
        $publication->meta_title = $request->meta_title;
        $publication->meta_description = $request->meta_description;
        if ($request->slug != null) {
            $publication->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $publication->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }
        if($request->hasFile('logo')){
            $publication->logo = $request->file('logo')->store('uploads/publications');
        }

        if($publication->save()){
            flash(translate('Publication has been inserted successfully'))->success();
            return redirect()->route('publications.index');
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
        $publication = Publication::findOrFail(decrypt($id));
        return view('publications.edit', compact('publication'));
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
        $publication = Publication::findOrFail($id);
        $publication->name = $request->name;
        $publication->meta_title = $request->meta_title;
        $publication->meta_description = $request->meta_description;
        if ($request->slug != null) {
            $publication->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $publication->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }
        if($request->hasFile('logo')){
            $publication->logo = $request->file('logo')->store('uploads/publications');
        }

        if($publication->save()){
            flash(translate('Publication has been updated successfully'))->success();
            return redirect()->route('publications.index');
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
        $publication = Publication::findOrFail($id);
        Product::where('publication_id', $publication->id)->delete();
        if(Publication::destroy($id)){
            if($publication->logo != null){
                //unlink($publication->logo);
            }
            flash(translate('Publication has been deleted successfully'))->success();
            return redirect()->route('publications.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }
}
