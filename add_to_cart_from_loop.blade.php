<script>
    function addtocart(id) {
        
        $.ajax({
            type: 'GET',
            url: "{{ route('product.add.cart') }}",
            data: $('#option-choice-form'+id).serializeArray(),

            success: function(data) {

                toastr.success(data.data);
                const cart = document.querySelector('#cart');
                cart.dataset.totalitems = data.count;
                document.getElementById('cartdatacount').innerHTML = data.count;
            }
        });
    }
</script>


<form id="option-choice-form{{$pro->id}}">
                            
                        <input type="hidden" name="product_id" value="{{$pro->id}}"/>
                                    <input type="hidden" name="product_type" value="1"/>
                                    <input type="hidden" id="package_id" name="package_id" value="1"/>
                        <div class="product_price_right">
                            <span><a href="{{url('/product/details/'.$pro->id)}}">Preview</a></span>
                            <span onclick="addtocart({{$pro->id}})"><a href="#"><i class="fas fa-cart-plus"></i></a></span>
                        </div>
                        </form>
