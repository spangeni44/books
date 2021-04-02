@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Sub Subcategory Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('shipping_districts.update', $district->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('District Name')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('District Name Here')}}" id="name" name="district_name" value="{{@$district->district_name}}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Status')}}</label>
                    <div class="col-sm-9">
                        <select name="status" id="status" class="form-control demo-select2-placeholder" required>
                            <option value="active" @if(@$district->status=='active') selected @endif>Active</option>
                            <option value="inactive" @if(@$district->status=='inactive') selected @endif>Inactive</option>
                        </select>
                    </div>
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

