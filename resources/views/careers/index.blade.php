@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('careers.create')}}" class="btn btn-rounded btn-info pull-right">{{translate('Add New Career')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{translate('Careers')}}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_categories" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type title & Enter') }}">
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
                    <th>{{translate('Job Title')}}</th>
                    <th>{{translate('No of Vacancy')}}</th>
                    <th>{{translate('Level')}}</th>
                    <th>{{translate('Status')}}</th>
                   
                    <th width="10%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($careers as $key => $career)
                    <tr>
                        <td>{{ ($key+1) + ($careers->currentPage() - 1)*$careers->perPage() }}</td>
                        <td>{{__($career->job_title)}}</td>
                        <td>{{__($career->no_of_vacancy)}}</td>
                        <td>{{__($career->level)}}</td>
                        <td><label class="switch">
                            <input onchange="update_status(this)" value="{{ @$career->id }}" type="checkbox" <?php if($career->status =='active') echo "checked";?> >
                            <span class="slider round"></span></label>
                        </td>
                            
                        
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{translate('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('careers.edit', encrypt($career->id))}}">{{translate('Edit')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('careers.destroy', $career->id)}}');">{{translate('Delete')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $careers->appends(request()->input())->links() }}
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
            $.post('{{ route('careers.updateStatus') }}', {_token:'{{ csrf_token() }}', id:el.value, check_status:check_status}, function(data){
                if(data == 1){
                    showAlert('success', 'Career Status updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection
