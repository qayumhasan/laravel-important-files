  public function authenticate(Request $request)
    {

        $admin = User::where('email', request('email'))->first();
        if ($admin) {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {

                return redirect()->intended(route('checkout.page.show'));
            }
        } else {
            session()->flash('successMsg', 'Sorry !! Email or Password not matched!');
            return redirect()->route('checkout.login.show');
        }
    }
