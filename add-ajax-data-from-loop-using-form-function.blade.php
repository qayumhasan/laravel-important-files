@extends('layouts.websiteapp')
@section('main_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

                                                @php
                                                $cate_id=$maincate->id;
                                                $products=App\Product::where('is_deleted',0)->where('cate_id',$cate_id)->orderBy('id','DESC')->skip(4)->limit(4)->get();
                                                @endphp
                                                @foreach($products as $product)
                                                <form class="option-choice-form" onclick="homeadtocart(this);">
                                                <input type="text" value="1" name="quantity">
                                                                            <input type="text" value="{{$product->id}}" name="product_id">
                                                                            <input type="text" value="{{$product->product_price}}" name="product_price">
                                                    <div class="ltabs-item col-md-3">

                                                        <div class="item-inner product-layout transition product-grid ">
                                                            <div class="product-item-container">
                                                                <div class="left-block">
                                                                    <div class="image product-image-container ">
                                                                        <a class="lt-image" href="#" target="_self" title="Anantara Dhigu Resort &amp;amp; Spa, Maldives Hair Spa">
                                                                            <img src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" alt="Anantara Dhigu Resort &amp;amp; Spa, Maldives Hair Spa">

                                                                            

                                                                            
                                                                        </a>
                                                                    </div>
                                                                    <div class="box-label"><span class="label-product label-sale">Sale</span></div>
                                                                </div>
                                                                <div class="right-block">
                                                                    <div class="caption">
                                                                        <h4><a href="{{url('/product/details/page/'.$product->id)}}">{{Str::limit($product->product_name,40)}}</a></h4>
                                                                        <div class="total-price clearfix">
                                                                            <div class="price price-left"><span class="price-new">${{$product->product_price}}</span><span class="price-old">$98.00</span></div>
                                                                            <div class="price-sale price-right"><span class="discount 123">-13%<strong>OFF</strong></span></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="button-group">
                                                                        <div class="button-inner so-quickview">
                                                                            <a class="lt-image hidden" href="#" target="_self" title="Anantara Dhigu Resort &amp;amp; Spa, Maldives Hair Spa"></a>
                                                                            <a class="btn-button btn-quickview quickview quickview_handler" href="{{url('product/details/'.$product->id)}}" title="Quick View" data-title="Quick View" data-fancybox-type="iframe">
                                                                                <i class="fa fa-search"></i>
                                                                            </a>
                                                                            <button class="mywishlist btn-button" type="button" data-toggle="tooltip" data-id="{{$product->id}}" title=""data-original-title="Add to Wish List">
                                                                            <i class="fa fa-heart"></i>
                                                                            </button>
                                                                            <button class="compare btn-button compareproduct" type="button"  id="compareproduct" value="{{$product->id }}">
                                                                            <i class="fa fa-exchange"></i>
                                                                            </button>
                                                                            <button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('114');" data-original-title="Add to cart">
                                                                            <span class="hidden">Add to cart</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- product -->
                                                    </div>
                                                </form>
                                                @endforeach
                                                <!-- grid -->
                                            </div>


    function homeadtocart(el){
        
        var product_id =el.product_id.value;

        var product_price =el.product_price.value;
        var quantity =el.quantity.value;
        $.ajax({
type:'GET',
url:"{{ route('product.add.cart') }}",
data: {product_id: product_id, product_price: product_price, quantity: quantity},
success: function (data) {
    // console.log(data);
    document.getElementById('cartdatacount').innerHTML =data.quantity;
    document.getElementById('product_price').innerHTML =data.total;

}
})
    }


</script>





@endsection
