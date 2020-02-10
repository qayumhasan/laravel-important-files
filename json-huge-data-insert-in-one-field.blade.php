
        $orderid =$request->order_id;
        $usercartdatas =Cart::session(\Request::getClientIp(true))->getContent();
        
        $products = array();

        foreach($usercartdatas as $usercartdata){
            $item['name']=$usercartdata->name;
            $item['price']=$usercartdata->price;
            $item['quantity']=$usercartdata->quantity; 
            array_push($products, $item);
        }

        ProductStorage::insert([
            'product_details'=>json_encode($products),
            'order_id'=>$orderid,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]);
