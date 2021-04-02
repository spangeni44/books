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
        <h3 class="panel-title pull-left pad-no">{{translate('Job Applications')}}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_categories" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Name & Enter') }}">
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
                    <th>{{translate('Name')}}</th>
                    <th>{{translate('Phone')}}</th>
                     <th>{{translate('Address')}}</th>
                    <th>{{translate('Under Review/Reviewed')}}</th>
                   
                    <th width="10%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applied_jobs as $key => $ind_applied_job)
                    <tr>
                        <td>{{ ($key+1) + ($applied_jobs->currentPage() - 1)*$applied_jobs->perPage() }}</td>
                        <td>{{__($ind_applied_job->career->job_title)}}</td>
                        <td>{{__($ind_applied_job->name)}}</td>
                        <td>{{__($ind_applied_job->phone)}}</td>
                        <td>{{__($ind_applied_job->address)}}</td>
                        <td><label class="switch">
                            <input onchange="update_status(this)" value="{{ @$ind_applied_job->id }}" type="checkbox" <?php if($ind_applied_job->status =='reviewed') echo "checked";?> >
                            <span class="slider round"></span></label>
                        </td>
                            
                        
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{translate('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('job-application-detail',@$ind_applied_job->id)}}">{{translate('View')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('applied-jobs.destroy', $ind_applied_job->id)}}');">{{translate('Delete')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $applied_jobs->appends(request()->input())->links() }}
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
            $.post('{{ route('applied-jobs.updateStatus') }}', {_token:'{{ csrf_token() }}', id:el.value, check_status:check_status}, function(data){
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
