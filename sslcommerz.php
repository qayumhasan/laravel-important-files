 /* PHP */
    $post_data = array();
    $post_data['store_id'] = env('SSLCOMMERZ_STORE_ID');
    $post_data['store_passwd'] = env('SSLCOMMERZ_STORE_PASSWORD');
    $post_data['total_amount'] = 1200;
    $post_data['currency'] = "BDT";
    // $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
    $post_data['tran_id'] = 12540;
    $post_data['success_url'] = url('payment/ssl_commercez/success');
    $post_data['fail_url'] = url('payment/ssl_commercez/fail');
    $post_data['cancel_url'] = url('payment/ssl_commercez/cancel');
    # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

    # EMI INFO
    // $post_data['emi_option'] = "1";
    // $post_data['emi_max_inst_option'] = "9";
    // $post_data['emi_selected_inst'] = "9";

    # CUSTOMER INFORMATION
    $post_data['cus_name'] = 'Qayum Hasan';
    $post_data['cus_email'] ='dev.qayumhasan@gmail.com';
    $post_data['cus_add1'] = "";
    // $post_data['cus_add2'] = "Dhaka";
    //$post_data['cus_city'] = DB::table('divisions')->where('id', $request->user_division_id)->select('name')->first()->name;
    $post_data['cus_state'] = "Dhaka";
    $post_data['cus_postcode'] = "1216";
    $post_data['cus_country'] = "Bangladesh";
    $post_data['cus_phone'] = '01559505992';
    //$post_data['cus_fax'] = "01711111111";

 
    $post_data['ship_name'] = 'Qayum Hasan';
    $post_data['ship_add1 '] = "panana";
    $post_data['ship_state'] = "raj";
    $post_data['ship_postcode'] = "1216";
    $post_data['ship_country'] = "bangladesh";
    

    # SHIPMENT INFORMATION
    # OPTIONAL PARAMETERS
    // $post_data['value_a'] = "ref001";
    // $post_data['value_b '] = "ref002";
    // $post_data['value_c'] = "ref003";
    // $post_data['value_d'] = "ref004";

    # CART PARAMETERS
    // $post_data['cart'] = json_encode(array(
    //     array("product" => "DHK TO BRS AC A1", "amount" => "200.00"),
    //     array("product" => "DHK TO BRS AC A2", "amount" => "200.00"),
    //     array("product" => "DHK TO BRS AC A3", "amount" => "200.00"),
    //     array("product" => "DHK TO BRS AC A4", "amount" => "200.00")
    // ));
    // $post_data['product_amount'] = "100";
    // $post_data['vat'] = "5";
    // $post_data['discount_amount'] = "5";
    // $post_data['convenience_fee'] = "3";

    # REQUEST SEND TO SSLCOMMERZ
    $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";
    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $direct_api_url);
    curl_setopt($handle, CURLOPT_TIMEOUT, 30);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($handle, CURLOPT_POST, 1);
    curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


    $content = curl_exec($handle);
    $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    if ($code == 200 && !(curl_errno($handle))) {
        curl_close($handle);
        $sslcommerzResponse = $content;
    } else {
        curl_close($handle);
        echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
        exit;
    }

    # PARSE THE JSON RESPONSE
    $sslcz = json_decode($sslcommerzResponse, true);

    if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
        echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
        # header("Location: ". $sslcz['GatewayPageURL']);
        exit;
    } else {
        echo "JSON Data parsing error!";
    }
