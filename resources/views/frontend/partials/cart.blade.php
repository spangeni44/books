
<div class="cart-total">
    <span class="text-number" id="nav-cart-count">
       @if(Session::has('cart'))
        {{ count(Session::get('cart'))}}
        @else
           0
        @endif
    </span>
    <span class="text-item">
        Shopping Cart
    </span>
    <!--<span class="price">-->
        
    <!--    {{ single_price(1) }}-->
    <!--    <i class="fas fa-chevron-down"></i>-->
    </span>
</div>
<div class="cart-dropdown-block">
     @if(Session::has('cart'))
     @php $total=0; 
     $cart=Session::get('cart');
    
     @endphp
     
     @foreach($cart as $key =>$cartItem)
                @php
                    $product = \App\Product::find($cartItem['id']);
                    
                @endphp
    <div class=" single-cart-block ">
        <div class="cart-product">
            <a href="{{ route('product', $product->slug) }}" class="image">
                
                <img src="{{ my_asset($product->thumbnail_img) }}" class="img-fluid lazyload" style="height:80px" alt="{{ __($product->name) }}">
            </a>
            
            <div class="content">
                <h3 class="title"><a href="{{ route('product', $product->slug) }}">{{$product->name}}</a>
                </h3>
                
                <p class="price" style="font-size:13px;"><span class="qty">{{$cartItem['quantity'] }} ×</span> {{ single_price($cartItem['price']) }}={{single_price($cartItem['quantity']*$cartItem['price']) }}</p>
                <button class="cross-btn"><i class="fas fa-times"></i></button>
                
            </div>
        </div>
    </div>
    
    @endforeach
    @endif
    <div class=" single-cart-block ">
        <div class="btn-block">
            <a href="{{route('cart')}}" class="btn">View Cart <i
                    class="fas fa-chevron-right"></i></a>
            <a href="{{route('checkout.shipping_info')}}" class="btn btn--primary">Check Out <i
                    class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</div>

