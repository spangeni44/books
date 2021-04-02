@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Blog Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="blog_title">{{translate('Blog Title')}}</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{translate('Blog Title')}}" id="blog_title" name="blog_title" class="form-control" required>
                        <input type="hidden" name="added_by" value="{{\Auth::user()->id}}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="blog_image">{{translate('Blog Image')}} </label>
                    <!--<small>({{ translate('120x80') }})</small>-->
                    <div class="col-sm-10">
                        <input type="file" id="blog_image" name="blog_image" accept="image/*" class="form-control">
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{translate('Meta Title')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="meta_title" placeholder="{{translate('Meta Title')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{translate('Description')}}</label>
                    <div class="col-sm-10">
                        <textarea name="description" rows="8" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{translate('Status')}}</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection
