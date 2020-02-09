@extends('layouts.websiteapp')
@section('main_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <form id="option-choice-form">
                <div class="product-view product-detail">
                    <div class="product-view-inner clearfix">
                        <div class="content-product-left  col-md-5 col-sm-6 col-xs-12">
                            <div class="so-loadeding"></div>
                            <div class="large-image  class-honizol">
                                <div class="box-label">
                                    <span class="label-product label-sale">
                                        -30%
                                    </span>
                                </div>
                                <img class="product-image-zoom" src="{{asset('public/uploads/products/thumbnail/productdetails/'.$productdetails->thumbnail_img)}}" data-zoom-image="{{asset('public/uploads/products/thumbnail/productdetails/'.$productdetails->thumbnail_img)}}" title="Canada Travel One or Two European Facials at  Studio" alt="Canada Travel One or Two European Facials at  Studio">
                            </div>
                            <div id="thumb-slider" class="full_slider category-slider-inner products-list yt-content-slider" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="3" data-items_column1="3" data-items_column2="3" data-items_column3="3" data-items_column4="2" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                @foreach (json_decode($productdetails->photos) as $key => $photo)
                                <div class="owl2-item ">
                                    <div class="image-additional">
                                        <a data-index="0" class="img thumbnail" data-image="{{url('storage/app/'.$photo) }}" title="Canada Travel One or Two European Facials at  Studio">
                                            <img src="{{url('storage/app/'.$photo) }}" title="Canada Travel One or Two European Facials at  Studio" alt="Canada Travel One or Two European Facials at  Studio">
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="content-product-right col-md-7 col-sm-6 col-xs-12">
                            <div class="countdown_box">
                                <div class="countdown_inner">
                                    <div class="Countdown-1">
                                    </div>
                                </div>
                            </div>
                            <div class="title-product">
                                <h1>{{$productdetails->product_name}}</h1>
                            </div>
                            <div class="box-review">
                                <div class="rating">
                                    <div class="rating-box">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    </div>
                                </div>
                                <a class="reviews_button" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews</a> / <a class="write_review_button" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
                            </div>
                            <div class="product_page_price price" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                                <span class="price-new"><span id="price-special"> ‎৳ {{$productdetails->product_price}}</span></span>
                                <span class="price-old" id="price-old">$122.00</span>
                                <!--    <div class="price-tax"><span>Ex Tax:</span> $70.00</div> -->
                            </div>
                            <div class="product-box-desc">
                                <div class="inner-box-desc">
                                    <div class="brand"><span>Brand: </span><a href="#">{{$productdetails->brand}}</a></div>
                                    <div class="model"><span>Product Code: </span>{{$productdetails-> product_sku}}</div>
                                    <div class="stock"><span>Availability:</span>
                                        @if($productdetails->product_qty > 0)
                                        <i class="fa fa-check-square-o"></i>In Stock({{$productdetails->product_qty}})
                                        @else
                                        <i class="fa fa-check-square-o"></i>Not Avaliable
                                        @endif
                                    </div>
                                    @if($productdetails->product_type==1)
                                    <!--variation start-->

                                    <div class="stock row">
                                        <div class="col-md-3">
                                            <span>Color:</span>
                                            <input type="hidden" name="id" value="{{$productdetails->id}}">
                                            @if (count(json_decode($productdetails->colors)) > 0)
                                            @foreach (json_decode($productdetails->colors) as $key => $color)
                                            <div class="radio radio-type-button">
                                                <label>
                                                    <input type="radio" id="{{ $productdetails->id }}-color-{{ $key }}" name="color" value="{{ $color }}" @if($key==0) checked @endif>
                                                    <span class="option-content-box active" data-title="" data-toggle="tooltip" data-original-title="" title="" style="background:{{ $color }};">
                                                        <span style="background:{{ $color }};"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>

                                        @foreach (json_decode($productdetails->choice_options) as $key => $choice)
                                        <div class="col-md-3">
                                            <div class="stock">
                                                <span>{{ $choice->title }}:</span>
                                                @foreach ($choice->options as $key => $option)
                                                <div class="radio radio-type-button">
                                                    <label>
                                                        <input id="{{ $choice->name }}-{{ $option }}" type="radio" name="{{ $choice->name }}" value="{{ $option }}" @if($key==0) checked @endif>
                                                        <label for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <!-- variation end -->
                                    @else

                                    @endif

                                </div>
                            </div>

                            <div class="short_description form-group">
                                <h3>OverView</h3>
                            </div>
                            <div id="product">
                                <div class="box-cart clearfix">
                                    <div class="form-group box-info-product">
                                        <div class="option quantity">
                                            <div class="input-group quantity-control" unselectable="on" style="user-select: none;">
					    
					    
					   ******************** get value into form ************************
                                                <input class="form-control" type="number" id="quantity" name="quantity" value="1">
                                                <input type="hidden" name="product_id" value="108">
						******************** get value into form ************************
						
                                                <span class="input-group-addon product_quantity_down fa fa-caret-down"></span>
                                                <span class="input-group-addon product_quantity_up fa fa-caret-up"></span>
						
                                            </div>
                                        </div>
                                        <div class="cart">
                                        <div class="product_page_price price" id="chosen_price_div">
                                            Final Price:<strong id="chosen_price">{{$productdetails->product_price}}</strong>
                                        </div>


                                  




                                            <button type="button" id="addtocart" value="{{$productdetails->id }}" class="addToCart btn btn-mega btn-lg " data-toggle="tooltip" title="" onclick="cart.add('30');" data-original-title="Add to cart" id="addtocart">Add to Cart</button>


                                        </div>
                                        <div class="add-to-links wish_comp">
                                            <ul class="blank">
                                                <li class="wishlist">
                                                    <a onclick="wishlist.add(108);"><i class="fa fa-heart"></i></a>
                                                </li>
                                                <li class="compare">
                                                    <a onclick="compare.add(108);"><i class="fa fa-random"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                           


                        </div>
                    </div>
                </div>
        
</form>


           

<!-- //Main Container -->

**********************add to cart script**********************

<script>

$(document).ready(function() {
$('#addtocart').on('click', function(){


$.ajax({
type:'GET',
url:"{{ route('product.add.cart') }}",
data: $('#option-choice-form').serializeArray(),
success: function (data) {
    console.log(data);
    document.getElementById('cartdatacount').innerHTML =data.quantity;
    document.getElementById('product_price').innerHTML =data.total;

}
});


});
});
</script>

**********************add to cart script**********************




<script>
    $(document).ready(function() {
        $('#option-choice-form input').on('change', function() {
            getVariantPrice();
        });
    });

    function getVariantPrice() {
        //alert("success");
        if ($('#option-choice-form input[id=quantity]').val() > 0) {

            $.ajax({
                type: "GET",
                url: '{{ route('products.variant_price')}}',
                data: $('#option-choice-form').serializeArray(),
                success: function(data) {

                    //console.log(data.price);
                    // $('#option-choice-form #chosen_price_div').removeClass('d-none');
                    $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                    // $('#available-quantity').html(data.quantity);
                }
            });
        }
    }
</script>







@endsection
