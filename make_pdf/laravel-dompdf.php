composer require barryvdh/laravel-dompdf
   $order = Billing::where('order_id',$order)->where('user_id',auth()->user()->id)->first();

        $pdf = PDF::loadView('frontend.shopping.invoicedownload',compact('order'));
        $ordername='invoice_no_'.$order->order_id;
        return $pdf->download($ordername.'.pdf');
