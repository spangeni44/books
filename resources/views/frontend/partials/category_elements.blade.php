@php
    $brands = array();
   
@endphp

<div class="sub-cat-main row no-gutters">
    <div class="col-12">
        <div class="sub-cat-content">
            <div class="sub-cat-list">
                <div class="card-columns">
                
                    @foreach ($category->subcategories as $subcategory)
                        <div class="card">
                            <ul class="sub-cat-items">
                               
                                <li classs='sub-cat-name'>
                                   
                                    @if(isset($subcategory->image))
                                    <a href="{{ route('products.subcategory', $subcategory->slug) }}"><img src="{{asset('public/uploads/sub-categories/'.@$subcategory->image)}}"  class="img-fit lazyload" style="width:100%; height:130px; border:none;"></a>
                                    @else
                                         <a href="{{ route('products.subcategory',$subcategory->slug) }}"><img src="{{asset('public/frontend/images/placeholder.jpg')}}" class="img-fit lazyload" style="height:130px; border:none;"></a>
                                    @endif
                                </li>
                                <li class="sub-cat-name"><a href="{{ route('products.subcategory', $subcategory->slug) }}">{{ __($subcategory->name) }}</a></li>
                                @foreach ($subcategory->subsubcategories as $subsubcategory)
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
