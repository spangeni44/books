@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Sub Subcategory Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('inside_valley_shipping.store') }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Inside Ring Road')}}</label>
                    <div class="col-sm-9">
                        <input type="number" placeholder="{{translate('Inside Ring Road Shipping Charge')}}" id="name" name="inside_ringroad_price" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Outside Ring Road Price')}}</label>
                    <div class="col-sm-9">
                        <input type="number" placeholder="{{translate('Outside Ring Road Shipping Charge')}}" id="name" name="outside_ringroad_price" class="form-control" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Lalitpur Shipping Charge')}}</label>
                    <div class="col-sm-9">
                        <input type="number" placeholder="{{translate('Lalitpur Shipping Charge')}}" id="name" name="lalitpur_shipping_price" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Bhaktapur Shipping Charge')}}</label>
                    <div class="col-sm-9">
                        <input type="number" placeholder="{{translate('Bhaktapur Shipping Charge')}}" id="name" name="bhaktapur_shipping_price" class="form-control" required>
                    </div>
                </div>
                
                <div class="panel-footer text-right">
                    <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                </div>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection
@section('script')

<script type="text/javascript">
    function get_subcategories_by_category(){
        var category_id = $('#category_id').val();
        $.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
            $('#sub_category_id').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#sub_category_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
                $('.demo-select2').select2();
            }
        });
    }

    $(document).ready(function(){
        get_subcategories_by_category();

        // $(".add-colors").click(function(){
        //     console.log('test');
        //     var html = $(".clone-color").html();
        //     $(".increment").after(html);
        // });

        // $("body").on("click",".remove-colors",function(){
        //     $(this).parents(".control-group").remove();
        // });
    });

    $('#category_id').on('change', function() {
        get_subcategories_by_category();
    });

</script>

@endsection
