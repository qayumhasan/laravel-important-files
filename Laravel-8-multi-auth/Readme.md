## Go to auth.php and work like auth.php file
## Make A middleware AdminRedirectIfAuthenticated
## write this code on middleware 
```
public function handle(Request $request, Closure $next, ...$guards)
    {
       
            if (Auth::guard($guard)->check()) {
                return redirect()->route('admin.dashboard');
            }
        
        return $next($request);
  
    }
```
## Register it on kernel.php


## In controller write this

   // Attempt to log the user in
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

       return "login";
    }  else {
        return "Email/password Doesnot Match!'";
    }
