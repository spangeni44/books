@extends('layouts.app')

@section('content')
<script src='https://cdn.tiny.cloud/1/ypn2gnue8a3gxq64szr1s7j2oynoczo4w60i4qwi4u52iris/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
  <script>
  tinymce.init({selector:'textarea',
  plugins:'table image code paste print preview searchreplace autolink directionality visualblocks visualchars fullscreen link media template codesample charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
  skin: 'oxide-dark',
  content_css: 'dark'
  
  });
  </script>
<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Publication Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
        	@csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="blog_title">{{translate('Blog Title')}}</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{translate('Blog Title')}}" id="blog_title" name="blog_title" class="form-control" required value="{{ $blog->blog_title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="blog_image">{{translate('Blog Image')}} </label>
                    <!--<small>({{ translate('120x80') }})</small>-->
                    <div class="col-sm-10">
                        <input type="file" accept="image/*" id="blog_image" name="blog_image" class="form-control">
                        @if(isset($blog->blog_image))
                            <img src="{{my_asset(@$blog->blog_image)}}" style="height:150px;">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{translate('Meta Title')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="meta_title" value="{{ $blog->meta_title }}" placeholder="{{translate('Meta Title')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{translate('Description')}}</label>
                    <div class="col-sm-10">
                        <textarea name="description" rows="8" class="form-control">{{ $blog->description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">{{translate('Slug')}}</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{translate('Slug')}}" id="slug" name="slug" value="{{ $blog->slug }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{translate('Status')}}</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="status">
                            <option value="active" @if(@$blog->status=='active') selected @endif>Active</option>
                            <option value="inactive" @if(@$blog->status=='inactive') selected @endif>Inactive</option>
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
