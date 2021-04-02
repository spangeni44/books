@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Sub Subcategory Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('shipping_cities.update', $city->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
            <div class="panel-body">
                 <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('City Name')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('City Name')}}" id="name" name="city_name" value="{{@$city->city_name}}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('District Name')}}</label>
                    <div class="col-sm-9">
                        <select name="district_id" class="form-control">
                            @if(isset($districts))
                                @foreach($districts as $ind_district)
                                <option value="{{@$ind_district->id}}" @if(@$city->district_id==@$ind_district->id) selected @endif>{{@$ind_district->district_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Shipping Price')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('Enter City Wise Price')}}" id="name" name="shipping_charge" value="{{@$city->shipping_charge}}" class="form-control" required>
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


