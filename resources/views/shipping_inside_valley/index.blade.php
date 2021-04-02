@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('shipping_cities.create')}}" class="btn btn-rounded btn-info pull-right">{{translate('Add New Shipping City')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{translate('Shipping City')}}</h3>
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
                    <th>{{translate('Ring Road')}}</th>
                    <th>{{translate('Outside Ring Road')}}</th>
                    <th>{{translate('Lalitpur Shipping')}}</th>
                    <th>{{translate('Bhaktapur Shipping')}}</th>
                   
                    
                    <th width="10%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inside_valley_shippings as $key => $ind_inside_valley_shipping)
                    <tr>
                        <td>{{ ($key+1) + ($inside_valley_shippings->currentPage() - 1)*$inside_valley_shippings->perPage() }}</td>
                        <td>{{__($ind_inside_valley_shipping->inside_ringroad_price)}}</td>
                        <td>{{__($ind_inside_valley_shipping->district->outside_ringroad_price)}}</td>
                        <td>{{__($ind_inside_valley_shipping->lalitpur_shipping_price)}}</td>
                        <td>{{__($ind_inside_valley_shipping->bhaktapur_shipping_price)}}</td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{translate('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('shipping_cities.edit', encrypt($ind_inside_valley_shipping->id))}}">{{translate('Edit')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('shipping_cities.destroy', $ind_inside_valley_shipping->id)}}');">{{translate('Delete')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                   
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $cities->appends(request()->input())->links() }}
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
            $.post('{{ route('shipping_cities.updateStatus') }}', {_token:'{{ csrf_token() }}', id:el.value, check_status:check_status}, function(data){
                if(data == 1){
                    showAlert('success', 'Shipping City Status updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection

