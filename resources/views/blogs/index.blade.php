@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('blogs.create')}}" class="btn btn-rounded btn-info pull-right">{{translate('Add New Blogs')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{translate('Blogs')}}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_blogs" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{translate('Name')}}</th>
                    <th>{{translate('Blog Image')}}</th>
                     <th>Added By</th>
                    <th>{{translate('Status')}}</th>
                    <th width="10%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($blogs as $key => $blog)
                    <tr>
                        <td>{{ ($key+1) + ($blogs->currentPage() - 1)*$blogs->perPage() }}</td>
                        <td>{{@$blog->blog_title}}</td>
                        <td><img loading="lazy"  class="img-md" src="{{ my_asset(@$blog->blog_image) }}" alt="blog feature image"></td>
                         <td>{{ucwords(@$blog->author->user_type)}}</td>
                        <td><label class="switch">
                            <input onchange="update_status(this)" value="{{ $blog->id }}" type="checkbox" <?php if($blog->status == 'active') echo "checked";?> >
                            <span class="slider round"></span></label></td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{translate('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('blogs.edit', encrypt(@$blog->id))}}">{{translate('Edit')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('blogs.destroy', @$blog->id)}}');">{{translate('Delete')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $blogs->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script type="text/javascript">
         function sort_blogs(el){
            $('#sort_blogs').submit();
        }
        function update_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('blogs.update_status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Blog status updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
        </script>
@endsection
