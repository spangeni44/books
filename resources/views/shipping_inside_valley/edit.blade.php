@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Sub Subcategory Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        @if(isset($inside_valley_shipping->id))
        <form class="form-horizontal"  action="{{ route('inside_valley_shipping.store')}}?id={{@$inside_valley_shipping->id}}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
        @else
        <form class="form-horizontal" action="{{ route('inside_valley_shipping.store') }}" method="POST" enctype="multipart/form-data">
        @endif
            @csrf
            <div class="panel-body">
                 <div class="form-group">
                    <label class="col-sm-4 control-label" for="name">{{translate('Inside Ring Road')}}</label>
                    <div class="col-sm-8">
                        <input type="number" placeholder="{{translate('Inside Ring Road Shipping Charge')}}" id="name" name="inside_ringroad_price" class="form-control"  value="{{@$inside_valley_shipping->inside_ringroad_price}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="name">{{translate('Outside Ring Road Price')}}</label>
                    <div class="col-sm-8">
                        <input type="number" placeholder="{{translate('Outside Ring Road Shipping Charge')}}" id="name" name="outside_ringroad_price" class="form-control" value="{{@$inside_valley_shipping->outside_ringroad_price}}" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-4 control-label" for="name">{{translate('Lalitpur Shipping Charge')}}</label>
                    <div class="col-sm-8">
                        <input type="number" placeholder="{{translate('Lalitpur Shipping Charge')}}" id="name" name="lalitpur_shipping_price" class="form-control" value="{{@$inside_valley_shipping->lalitpur_shipping_price}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="name">{{translate('Bhaktapur Shipping Charge')}}</label>
                    <div class="col-sm-8">
                        <input type="number" placeholder="{{translate('Bhaktapur Shipping Charge')}}" id="name" name="bhaktapur_shipping_price" class="form-control" value="{{@$inside_valley_shipping->bhaktapur_shipping_price}}" required>
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


