    @foreach($countcartitems as $cartitems)
    
    <table class="table table-striped" style="margin-bottom:10px;">
        <tbody>
            <tr>
                @php
                    $thumbnail_img =$cartitems->attributes->thumbnail_img  
                @endphp
                
                <td class="text-center size-img-cart">
                    <a href="product.html"><img src="http:///public/uploads/products/thumbnail/<?php echo  $thumbnail_img ?>" alt="Bougainvilleas on Lombard Street,  San Francisco, Tokyo" title="Bougainvilleas on Lombard Street,  San Francisco, Tokyo" class="img-thumbnail"></a>
                </td>
                <td class="text-left"><a href="product.html">{{Illuminate\Support\Str::limit($cartitems->name,55)}}</a>
                    <br>
                <td class="text-right">x{{$cartitems->quantity}}</td>
                <td class="text-right">{{$cartitems->quantity * $cartitems->price}}</td>
                <td class="text-center">
                    <button onclick="myAddToCartDatadelete(this)" onclick="cart.add('30');" value="{{$cartitems->id}}" type="button" title="Remove" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    
    @endforeach
    <script>
    function myAddToCartDatadelete(el) {
       
        $.post('{{ route('add.cart.delete') }}', {_token: '{{ csrf_token() }}',user_id: el.value},
            function(data) {
                
                document.getElementById('cartdatacount').innerHTML =data.quantity;
                document.getElementById('product_price').innerHTML =data.price;
                if (data == 1) {
                    toastr.success("Product Delete From Cart");
                } 
               
            });
	}
	
	myAddToCartDatadelete();
</script>
                                    