@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Menu Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Name')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('Name')}}" id="name" name="name" class="form-control" value="{{ $menu->name }}" required>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Link')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('Link')}}" id="link" value="{{ $menu->link }}" name="link" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="menu_id">{{translate('Parent Menu')}}</label>
                    <div class="col-sm-9">
                        <select name="menu_id" id="menu_id" class="form-control demo-select2-placeholder" required>
                            <option disabled @if(!isset($menu->menu_id)) selected @endif>Select Parent Menu</option>
                            @foreach(\App\Menu::whereNull('menu_id')->get() as $ind_menu)
                                <option value="{{@$ind_menu->id}}" @php if(isset($menu->menu_id)){ if(@$menu->menu_id==@$ind_menu->id){ echo 'selected'; } } @endphp >{{@$ind_menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="location">{{translate('Location')}}</label>
                    <div class="col-sm-9">
                                <select name="location" id="location" value="{{ $menu->location }}" class="form-control demo-select2-placeholder" required>
                                    <option value="top">Top</option>
                                    <option value="footer-1">Footer 1</option>
                                    <option value="footer-2">Footer 2</option>
                                    <option value="footer-3">Footer 3</option>
                                    <option value="footer-4">Footer 4</option>
                                    <option value="footer-5">Footer 5</option>
                                </select>
                    </div>
                </div>
                
                <!--<div class="form-group">-->
                <!--    <label class="col-sm-3 control-label" for="name">{{translate('Parent Menu')}}</label>-->
                <!--    <div class="col-sm-9">-->
                <!--        <select name="menu_id" id="category_id" class="form-control demo-select2-placeholder" required>-->
                <!--            @foreach($menus as $menu)-->
                <!--                <option value="{{$menu->id}}">{{__($menu->name)}}</option>-->
                <!--            @endforeach-->
                <!--        </select>-->
                <!--    </div>-->
                <!--</div>-->
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


@section('script')

<script type="text/javascript">

</script>

@endsection
