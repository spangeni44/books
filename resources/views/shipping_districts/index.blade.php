@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('shipping_districts.create')}}" class="btn btn-rounded btn-info pull-right">{{translate('Add New Shipping District')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{translate('Shipping Districts')}}</h3>
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
                    <th>{{translate('District Name')}}</th>
                    <th>Status</th>
                    
                    <th width="10%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($districts as $key => $ind_district)
                    <tr>
                        <td>{{ ($key+1) + ($districts->currentPage() - 1)*$districts->perPage() }}</td>
                        <td>{{__($ind_district->district_name)}}</td>
                       <td><label class="switch">
                            <input onchange="update_status(this)" value="{{ @$ind_district->id }}" type="checkbox" <?php if(@$ind_district->status =='active') echo "checked";?> >
                            <span class="slider round"></span></label>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{translate('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('shipping_districts.edit', encrypt($ind_district->id))}}">{{translate('Edit')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('shipping_districts.destroy', $ind_district->id)}}');">{{translate('Delete')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                   
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $districts->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script type="text/javascript">
        function update_status(el){
            if(el.checked){
                var check_status = 1;
            }
            else{
                var check_status = 0;
            }
            $.post('{{ route('shipping_districts.updateStatus') }}', {_token:'{{ csrf_token() }}', id:el.value, check_status:check_status}, function(data){
                if(data == 1){
                    showAlert('success', 'Shipping District Status updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection
