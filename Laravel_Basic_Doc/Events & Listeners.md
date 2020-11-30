## Write a Command for create an event
  php artisan make:event NewUserCreateEvent
## In controller 
    event(new NewUserCreateEvent($customar));
## Write a Command for create an listeners
  php artisan make:event NewUserCreateListeners
## Go to NewUserCreateEvent
  public $customar;
    
    public function __construct($customar)
    {
        $this->customar = $customar;
    }
## Go to NewUserCreateListeners
  ```public function handle($event)
    {
        Mail::to($event->customar['email'])->send(new newusermail());
    }
   ````
## Go to event service provider
  ``` protected $listen = [
        NewCustomarHasRegisterEvent::class => [
            welcomenewcustomarlisterner::class,
        ],
    ];
    ````

