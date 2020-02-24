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
   ## Laravel Some method
   1.If we went to go back in privious page we use {{ URL::previous() }}.
   
