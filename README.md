# Laravel Importent File

![Current Version](https://img.shields.io/badge/version-v0.1-blue)
![GitHub contributors](https://img.shields.io/github/contributors/madhur-taneja/README-Template)
![GitHub stars](https://img.shields.io/github/stars/madhur-taneja/README-Template?style=social)
![GitHub forks](https://img.shields.io/github/forks/madhur-taneja/README-Template?style=social)

A template for README files that can be used for your future projects. A small description about the project, shields as well as the link to your repo.

Open and view the Project using the `.zip` file provided or at my [GitHub Repository]

The project is also hosted on [GitHub Pages]

## Table of Contents
- [Getting Started](#getting-started)
	- [Tools Required](#tools-required)
	- [Installation](#installation)
- [Development](#development)
    - [Part 1: Heading](#part-1-heading)
	  - [Step 1: Subheading](#step-1-subheading)
	  - [Step 2: Subheading](#step-2-subheading)
	- [Part 2: Heading](#part-2-heading)
- [Running the App](#running-the-app)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [Versioning](#versioning)
- [Authors](#authors)
- [License](#license)
- [Acknowledgments](#acknowledgments)

# Laravel-important-files documentation
## Laravel Task Scheduling

  1. First of all,write a command -- php artisan make:command InactiveUsers  
      It is create on consol->command folder->InactiveUsers.php  
      
  2.In InactiveUsers.php File, At $singhature section we write command Name Like as: $singnature = email:inactive  
  
  3.At Discription section we write discription of this command.  
  
  4.All kind of logic are apply on handle section.Like as:  
  
         public function handle()
                                {
                                    $limit = Carbon::now()->subDay(7);
                                    $cartdata = DB::table('cart_storage')->where('created_at','<',$limit)->delete();
                                    $this->info($cartdata);
                                }
  5.Now we go to console->kernel.php file.  
  
  6.In  protected $commands section we write command class name.Like  as:  
  
      protected $commands = [
        InactiveUsers::class;
    ];
    
  7.In here InactiveUsers is command class name that we create before.  
  
  8.In schedule method we write how many later this command work.Like as.  
    
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('cart:delete')
                 ->everyMinute();
    }
   
   
   ## Laravel url define condition
   1. We can not make url as name of public folder name. As like if we create a folder name "admin" in public folder. we can not make a url like "http://localhost.com/admin". It create a problems. 
   
   ## Set Same token field after page refresh
    *First at all make a method that show the from like as:<br>
      public function showFroggotPasswordFrom($token){
        return view('froggotpassword');
      }
    *For this funtion we create route like this:<br>
      Route::get('forgot/password/{token}','AuthController@forgotPassword')->name('forgot.password');
    *Now create another method like this:<br>
      public function createToken(){
        $token = $user->token;
        retun redirect()->route('forgot.passowr',$token);
      }
     *now if we refresh page again and again this token can not remove.
     
   ## Laravel Multi Auth
    1.Go to config ->auth.php file.
    2. Make A guards in auth.php file like this:
    
        'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin_users',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'admin_users',
            'hash' => false,
        ],
    ],
    
    *In here provider is provider section name . In here provider name is 'admin_users'.
    
    3.In auth.php file at provider section we write like this:
    
       'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'admin_users' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],
    
    4.In auth.php file at password section we write:
      'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admin_users' => [
            'provider' => 'admin_users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
    
    5. After that we go to app->Exceptions->handler.php :
    6.In hander.php file we write below code in render method:
    
     public function render($request, Exception $exception)
    {
        // return parent::render($request, $exception);

        $class = get_class($exception);
        switch ($class) {
            case 'Illuminate\Auth\AuthenticationException':
            $guard = arr::get($exception->guards(), 0);
                switch ($guard) {
                    case 'admin':
                        $login = 'admin.login';
                    break;
                    case 'web':
                        $login = 'login';
                    break;
                    default;
                        $login ='login';
                        break;
                }
                return redirect()->route($login);
                break; 
        }
        //return parent::render($request, $exception);
        return parent::render($request, $exception);
    }
    
    7.GO to Middleware->rdirectifautenticated.php file...
      
       */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        // return $next($request);

        switch ($guard) {
            case 'admin':
                if (Auth::guard()->check()) {
                    return redirect()->route('admin.home');
                }
            break;
            case 'web':
                if (Auth::guard()->check()) {
                    return redirect()->route('home');
                }
            break;
           
        }
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }
        return $next($request);
    }
    
    8.How to use this:
      $this->middleware('auth:admin');
      
    9. In Login file controller
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
      public function login(Request $request)
    {
        $data = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
       
        $admin = Admin::where('email', request('email'))->first();
        
            if ($admin) {
                if (Auth::guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], 
                request('remember'))) {
                    return redirect()->intended(route('admin.home'));
                } else {
                    session()->flash('successMsg', 'Sorry !! Email or Password not matched!');
                    return redirect()->back();
                }
            }else{
                session()->flash('successMsg', 'Sorry !! Email or Password not matched!');
                return redirect()->back();
            }
    }
      
    9.This file is upload on repository.
    
   ## Laravel custom route
    1. Make a file in route folder like as admin.php
    2.Go To RouteServiceProvider 
    3.Create a method like this........
    
      protected function mapApi2Routes()
    {
        Route::prefix('api')
             ->middleware(['api', 'auth:api'])
             ->namespace('App\Api\V2\Controllers')
             ->group(base_path('routes/api2.php'));
    }
    4.Diclar it in map method........
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        $this->mapApi2Routes();

        
    }
      
   ## Laravel Some method
   1.If we went to go back in privious page we use {{ URL::previous() }}.
   
   ## Some json data show in laravel blade
    $products = json_decode($products,true);
        foreach($products as $row){
            
            $someArray = json_decode($row, true);
            
            echo $someArray[0]["name"] .'<br>';
            echo $someArray[0]["quantity"] .'<br>';
            
            
        }
   
## In Laravel-7's Auth::routes(); uses a function auth() defined in vendor/laravel/ui/src/AuthRouteMethods.php

## if web went to show input form fill up if user exist or show placeholder value then:
  <input type="text" name="name" value="{{$user->name??''}}"class="form-control" placeholder="Full Name">
