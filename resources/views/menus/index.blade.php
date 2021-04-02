@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('menus.create')}}" class="btn btn-rounded btn-info pull-right">{{translate('Add Menu')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{translate('Menus')}}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_subsubcategories" action="" method="GET">
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
                    <th>{{translate('Menu')}}</th>
                    <!--<th>{{translate('Parent Menu')}}</th>-->
                    <th>{{translate('Link')}}</th>
                    <th>{{translate('Location')}}</th> 
                    <th width="10%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $key => $menu)
                
                        <tr>
                            <td>{{ ($key+1) + ($menus->currentPage() - 1)*$menus->perPage() }}</td>
                            <td>{{__($menu->name)}}</td>
                            <!--<td>{{$menu->parent_menu}}</td>-->
                            <td>{{$menu->link}}</td>
                            <td>{{$menu->location}}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{translate('Actions')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('menus.edit', encrypt($menu->id))}}">{{translate('Edit')}}</a></li>
                                        <li><a onclick="confirm_modal('{{route('menus.destroy', $menu->id)}}');">{{translate('Delete')}}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $menus->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
