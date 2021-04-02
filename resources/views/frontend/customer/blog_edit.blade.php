@extends('frontend.layouts.app')

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
    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @if(Auth::user()->user_type == 'customer')
                        @include('frontend.inc.customer_side_nav')
                    @endif
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{ translate('Add A Blog')}}
                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <!--<div class="float-md-right">-->
                                    <!--    <ul class="breadcrumb">-->
                                    <!--        <li><a href="{{ route('home') }}">{{ translate('Home')}}</a></li>-->
                                    <!--        <li><a href="{{ route('dashboard') }}">{{ translate('Dashboard')}}</a></li>-->
                                    <!--        <li><a href="{{ route('customer-blogs.index') }}">{{ translate('Blogs')}}</a></li>-->
                                    <!--        <li class="active"><a href="#">{{ translate('Edit Blog')}}</a></li>-->
                                    <!--    </ul>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                        <form class="" action="{{route('customer-blogs.update',encrypt(@$blog->id))}}" method="POST" enctype="multipart/form-data" id="choice_form">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                    		<input type="hidden" name="added_by" value="{{\Auth::user()->id}}">
                            
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    <!--{{ translate('Meta Tags')}}-->
                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{ translate('Blog Title')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name="blog_title" class="form-control mb-3" value="{{@$blog->blog_title}}" placeholder="{{ translate('Blog Title')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{ translate('Permalink')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name="slug" class="form-control mb-3" value="{{@$blog->slug}}" placeholder="{{ translate('Blog Slug')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{ translate('Meta Title')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name="meta_title" class="form-control mb-3" value="{{@$blog->meta_title}}" placeholder="{{ translate('Meta Title')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{ translate('Description')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="description" rows="8" class="form-control mb-3">{!! @$blog->description !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{ translate('Blog Image')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                @if ($blog->blog_image != null)
                                                    <div class="col-md-3">
                                                        <div class="img-upload-preview">
                                                            <img loading="lazy"  src="{{ my_asset($blog->blog_image) }}" alt="" class="img-responsive">
                                                            <input type="hidden" name="previous_meta_img" value="{{ $blog->blog_image }}">
                                                            <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <input type="file" name="blog_image" id="file-5" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" accept="image/*" />
                                            <label for="file-5" class="mw-100 mb-3">
                                                <span></span>
                                                <strong>
                                                    <i class="fa fa-upload"></i>
                                                    {{ translate('Choose image')}}
                                                </strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-box mt-4 text-right">
                                <button type="submit" class="btn btn-styled btn-base-1">{{  translate('Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

@endsection

