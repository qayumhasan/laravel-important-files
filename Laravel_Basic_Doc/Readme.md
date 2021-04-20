## Start number with 01 - 10
``
$invID = 9;
echo $resturl =str_pad($invID, 2, '0', STR_PAD_LEFT)
``

## Get Previous 3 month in php
``
echo date('n', strtotime('0 month')).'<br>';
echo date('n', strtotime('-1 month')).'<br>';
echo date('n', strtotime('-2 month')).'<br>';
echo date('n', strtotime('-3 month')).'<br>';
``

## Send Encrypt peramiter
  ```
    ## Send With parametar
      return redirect()->route('admin.checkout.invoice.page', [\Crypt::encrypt($roomID), \Crypt::encrypt($id)])->with($notification);
    ##Get It on controller
      $room_id = \Crypt::decrypt($room_id);
      $checkoutID = \Crypt::decrypt($checkoutID);
    
  ```
  
  
## Image Get From Storage
  ```
  url('storage/app/public/'.$data->main_image)
  ```
 ## Laravel sesson data
 ```
 // store sesson data
 $request->session()->put('kotdata',$kotdetails);
 //get sesson data
  session('kotdata')
 ```
