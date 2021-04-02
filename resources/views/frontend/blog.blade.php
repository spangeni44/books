@extends('frontend.layouts.app')

@section('content')
    <section class="breadcrumb-section">
      <h2 class="sr-only">Site Breadcrumb</h2>
      <div class="container">
        <div class="breadcrumb-contents">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
            </ol>
          </nav>
        </div>
      </div>
    </section>
    <section class="inner-page-sec-padding-bottom space-db--30">
      <div class="container">
        <div class="row space-db-lg--60 space-db--30">
       
        @if(isset($blogs[0]->id))
            @foreach($blogs as $ind_blog)
              <div class="col-lg-4 col-md-6 mb-lg--60 mb--30">
                <div class="blog-card card-style-grid">
                  <a href="{{route('blog-details',@$ind_blog->slug)}}" class="image d-block">
                    <img src="{{my_asset(@$ind_blog->blog_image)}}" style="height:250px;" alt="{{@$ind_blog->blog_title}}">
                    <!--image/others/blog-grid-1.jpg-->
                  </a>
                 
                  <div class="card-content">
                    <h3 class="title"><a href="{{route('blog-details',@$ind_blog->slug)}}">{{@$ind_blog->blog_title}}</a></h3>
                    <p class="post-meta"><span>{{@$ind_blog->created_at->diffForHumans()}} </span> | <a href="#">@if(@$ind_blog->author->user_type=='admin') Admin @else {{@$ind_blog->author->name}} @endif</a></p>
                    <article>
                      <h2 class="sr-only">
                        Blog Article
                      </h2>
                      <p>
                          @if(isset($ind_blog->description))
                         {{ strip_tags(str_replace('&nbsp;','',substr(@$ind_blog->description,0,120))).'...' }}
                         @endif
                       </p>
                      <a href="{{route('blog-details',@$ind_blog->slug)}}" class="blog-link">Read More</a>
                    </article>
                  </div>
                </div>
              </div>
              @endforeach
          @endif
          
        </div>
      </div>
    </section>
  </div>
@endsection