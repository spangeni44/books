@php
    $brands = array();
   
@endphp
<style>
    .category-sidebar .sub-cat-menu-all {
        /*left:15% !important;*/
        
    display: none;
    position: absolute;
    absolute
    width: calc(100% - 25%);
    left: 15% !important;
     height: 100%; 
    overflow: hidden;
    top: inherit;
    z-index: 100;
    background-color: #fff;
    border: 1px solid #eee;
    overflow-y: auto;
    margin-left: -105px;
    box-shadow:1px 0px 1px 0px silver;
}
</style>
<div class="sub-cat-main row no-gutters highlight">
    <div class="col-12">
        <div class="sub-cat-content">
            <div class="sub-cat-list">
                <div class="card-columns">
                <!--subcategories-->
                    @foreach ($category as $subcategory)
                        <div class="card">
                            <ul class="sub-cat-items">
                               
                                <li classs='sub-cat-name'>
                                   
                                    @if(isset($subcategory->banner))
                                    <a href="{{ route('products.subcategory', $subcategory->slug) }}"><img src="{{asset('public/'.@$subcategory->banner)}}"  class="img-fit lazyload" style="height:130px; border:none;"></a>
                                    @else
                                         <a href="{{ route('products.subcategory',$subcategory->slug) }}"><img src="{{asset('public/frontend/images/placeholder.jpg')}}" class="img-fit lazyload" style="height:130px; border:none;"></a>
                                    @endif
                                </li>
                                <li class="sub-cat-name"><a href="{{ route('products.subcategory', $subcategory->slug) }}">{{ __($subcategory->name) }}</a></li>
                                @foreach ($subcategory->subcategories as $subsubcategory)
                                    <li><a href="{{ route('products.subsubcategory', $subsubcategory->slug) }}">{{ __($subsubcategory->name) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
