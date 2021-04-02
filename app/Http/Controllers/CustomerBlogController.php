<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CustomerBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $blogs = Blog::where('added_by',$request->user()->id)->orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $blogs = $blogs->where('blog_title', 'like', '%'.$sort_search.'%');
        }
        $blogs = $blogs->paginate(15);
        return view('frontend.customer.blogs', compact('blogs', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.customer.blog_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->blog_title = $request->blog_title;
        $blog->meta_title = $request->meta_title;
        $blog->description = $request->description;
        $blog->status='inactive';
        $blog->added_by=$request->user()->id;
        if ($request->slug != null) {
            $blog->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->blog_title)).'-'.Str::random(5);
        }
        if($request->hasFile('blog_image')){
            $blog->blog_image = $request->file('blog_image')->store('uploads/blogs');
        }

        if($blog->save()){
            flash(translate('Blog has been inserted successfully'))->success();
            return redirect()->route('customer-blogs.index');
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
    public function edit(Request $request,$id)
    {
       $blog = Blog::where(['added_by'=>$request->user()->id,'id'=>decrypt($id)])->first();
        return view('frontend.customer.blog_edit', compact('blog'));
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
        $blog = Blog::where(['added_by'=>$request->user()->id,'id'=>decrypt($id)])->first();
        $blog->blog_title = $request->blog_title;
        $blog->meta_title = $request->meta_title;
        $blog->description = $request->description;
        
        if($blog->blog_title!=$request->blog_title){
            if ($request->slug != null) {
                $blog->slug = str_replace(' ', '-', $request->slug);
            }
            else {
                $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->blog_title)).'-'.Str::random(5);
            }
        }
        if($request->hasFile('blog_image')){
            $blog->blog_image = $request->file('blog_image')->store('uploads/blogs');
        }

        if($blog->save()){
            flash(translate('Blog has been updated successfully'))->success();
            return redirect()->route('customer-blogs.index');
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
       $blog = Blog::where(['added_by'=>$request->user()->id,'id'=>decrypt($id)])->first();
        Product::where('blog_id', $blog->id)->delete();
        if(Blog::destroy($id)){
            if($blog->blog_image != null){
                if(hasFile(public_path().'/uploads/blogs/'.@$blog->blog_image)){
                    unlink($blog->blog_image);
                }
            }
            flash(translate('Blog has been deleted successfully'))->success();
            return redirect()->route('customer-blogs.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }
}
