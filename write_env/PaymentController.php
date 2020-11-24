  public function paypalUpdate(Request $request)
    {
        foreach ($request->types as $key => $type) {
            $this->overWriteEnvFile($type, $request[$type]);
        }
        $notification=array(
            'messege'=>' Paypal Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }



public function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"',
                    $type . '=' . $val,
                    file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . $type . '=' . $val);
            }
        }
    }
