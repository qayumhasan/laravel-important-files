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
## Make A middleware AdminAuthenticate
   ```
   protected function authenticate($request, array $guards)
    {
      
	        
	    if($this->auth->guard('admin')->check()) {
	        return $this->auth->shouldUse('admin');
	    }
      $this->unauthenticated($request, ['admin']);
    }
    
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }
   ```
## Register it on kernel.php

'admin' => \App\Http\Middleware\AdminAuthenticate::class,
 'admin.guest' => \App\Http\Middleware\AdminRedirectIfAuthenticated::class,
## In controller write this

   // Attempt to log the user in
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

       return "login";
    }  else {
        return "Email/password Doesnot Match!'";
    }
