 $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            if(Auth::guard('web')->attempt(array($fieldType => $request['username'], 'password' => $request['password'],'role' => 1)))
            {
                $notification=array(
                  'messege'=>'You Are Log In',
                  'alert-type'=>'success'
                   );
                return redirect()->intended(route('admin.home'))->with($notification);
            }else{
              $notification=array(
                'messege'=>'Oppos! Admin/Password Is worng',
                'alert-type'=>'error'
                 );
                return redirect()->back()->with($notification);
            }
