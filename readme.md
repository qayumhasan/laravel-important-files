# Larvel Notes
## Detect IS USER ONLINE.
1.Frist of all, Make A middleware name IsOnline.php
2.Write below code in ISOnline middleware

   public function handle($request, Closure $next)
    {
        
        if(Auth::check()){
            $expiresAt = Carbon::now()->addMinute(1);
            Cache::put('online'.Auth::user()->id,true,$expiresAt);
        }
        return $next($request);
    }
    
   3.Register middleware in kernel.php
   
        protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            
            \App\Http\Middleware\IsOnline::class,
        ],

        
    ];
    
    4.Write below code in user.php model....
      
    public function isOnline()
    {
        return Cache::has('online'.$this->id);
    }
    
    
    5.Write below code in controller.....
    
     public function onlineUser()
     {
        $admins =Admin::all();
        return view('admin.user.online_user',compact('admins'));
     }
     
     6.USE this on blade like this.....
        
           @foreach($admins as $admin)
                   
                        <tr>
                        
                            <td>{{$loop->iteration}}</td>
                            <td>{{$admin->adminname}}</td>
                            <td>
                                @if($admin->isOnline())
                                <a href="" class="btn btn-success btn-sm ">
                                    <i class="fas fa-thumbs-up"></i></a>
                                @else
                                <a href="" class="btn btn-danger btn-sm">
                                    <i class="fas fa-thumbs-down"></i>
                                </a>
                                @endif                                
                            </td>
             
                           
                        </tr>
                    
                    @endforeach
