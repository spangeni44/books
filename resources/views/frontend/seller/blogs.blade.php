@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @include('frontend.inc.seller_side_nav')
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{ translate('Blogs')}}
                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <!--<div class="float-md-right">-->
                                    <!--    <ul class="breadcrumb">-->
                                    <!--        <li><a href="{{ route('home') }}">{{ translate('Home')}}</a></li>-->
                                    <!--        <li><a href="{{ route('dashboard') }}">{{ translate('Dashboard')}}</a></li>-->
                                    <!--        <li><a href="{{ route('author-blogs.index') }}">{{ translate('Blogs')}}</a></li>-->
                                    <!--    </ul>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center green-widget text-white mt-4 c-pointer">
                                    <i class="la la-dropbox"></i>
                                    <span class="d-block title heading-3 strong-400">{{ max(0, Auth::user()->seller->remaining_uploads) }}</span>
                                    <span class="d-block sub-title">{{  translate('Remaining Uploads') }}</span>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4 mx-auto">
                                <a class="dashboard-widget text-center plus-widget mt-4 d-block" href="{{ route('author-blogs.create')}}">
                                    <i class="la la-plus"></i>
                                    <span class="d-block title heading-6 strong-400 c-base-1">{{  translate('Add New Blog') }}</span>
                                </a>
                            </div>
                            @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                            @php
                                $seller_package = \App\SellerPackage::find(Auth::user()->seller->seller_package_id);
                            @endphp
                            <div class="col-md-4">
                                <a href="{{ route('seller_packages_list') }}" class="dashboard-widget text-center red-widget text-white mt-4 d-block">
                                    @if($seller_package != null)
                                    <img src="{{ my_asset($seller_package->logo) }}" height="44" class="img-fit mw-100 mx-auto mb-1">
                                    <span class="d-block sub-title mb-2">{{ translate('Current Package')}}: {{ $seller_package->name }}</span>
                                    @else
                                        <i class="la la-frown-o mb-1"></i>
                                        <div class="d-block sub-title mb-2">{{ translate('No Package Found')}}</div>
                                    @endif
                                    <div class="btn btn-styled btn-white btn-outline py-1">{{ translate('Upgrade Package')}}</div>
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="card no-border mt-4">
                            <div class="card-header py-2">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-xl-3">
                                        <h6 class="mb-0">All Blogs</h6>
                                    </div>
                                    <div class="col-md-6 col-xl-3 ml-auto">
                                        <form class="" action="" method="GET">
                                            <input type="text" class="form-control" id="search" name="search" @isset($search) value="{{ $search }}" @endisset placeholder="{{ translate('Search blog') }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-hover table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ translate('Blog Title')}}</th>
                                            <th>{{ translate('Blog Image')}}</th>
                                            <th>{{ translate('Slug')}}</th>
                                            <th>{{translate('Status')}}</th>
                                            <th>{{ translate('Options')}}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($blogs as $key => $blog)
                                            <tr>
                                                <td>{{ ($key+1) + ($blogs->currentPage() - 1)*$blogs->perPage() }}</td>
                                                <td><a href="{{ route('blog-details', $blog->slug) }}" target="_blank">{{  __($blog->blog_title) }}</a></td>
                                                
                                                
                                                <td><img src="{{my_asset(@$blog->blog_image)}}" style="height:100px;"></td>
                                                <td>{{@$blog->slug}}</td>
                                                 <td>{{ucwords(@$blog->status)}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" id="dropdownMenuButton-{{ $key }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton-{{ $key }}">
                                                            <a href="{{route('author-blogs.edit', encrypt($blog->id))}}" class="dropdown-item">{{ translate('Edit')}}</a>
        					                                <button onclick="confirm_modal('{{route('author-blogs.destroy', $blog->id)}}')" class="dropdown-item">{{ translate('Delete')}}</button>
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                {{ $blogs->links() }}
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        
        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Published products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection
