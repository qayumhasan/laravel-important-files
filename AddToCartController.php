<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use App\FlashDealDetail;
use Illuminate\Http\Request;
use Cart;

class AddToCartController extends Controller
{
    public function addToCart(Request $request)
    {
        
        $product_price =$request->price;
        $product =Product::findOrFail($request->addtocart_id);

        $userid = $request->ip();
        $flashDealdiscounts = FlashDealDetail::where('product_id',$request->addtocart_id)->first();
        if($flashDealdiscounts){
            if($flashDealdiscounts->discount_type == 1){

                $product_price =$product_price - $flashDealdiscounts->discount;
            }else{
                $perdiscount =($flashDealdiscounts->discount *$product_price)/100;

                $product_price = $product_price -$perdiscount;
            }
            
        }else{
            $product_price =$product_price;
        }
        

        $add = Cart::session($userid)->add([
            'id'=>$product->id,
            'name'=>$product->product_name,
            'price'=>$product_price,
            'quantity'=> +1,
            'attributes'=>[
                'product_sku'=>$product->product_sku,
                'colors'=>$product->colors,
                'thumbnail_img'=>$product->thumbnail_img,
            ],
        ]);

        

         $getcartdatas =Cart::session($userid)->getContent();
        if($add){

            $items =0;
            $price =0;

            foreach(Cart::session($userid)->getContent() as $item){
                 $items += $item->quantity;
                 $price += $item->price * $items;
            }
            
            return response()->json([
                'quantity' => $items,
                'price' => $price
            ]);

        }else{
            return 0;
        }
      
    }


}
