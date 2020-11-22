## Install Laravel 8
 ``` composer create-project --prefer-dist laravel/laravel facebookLogin ````

## Install JetStream
``` composer require laravel/jetstream ````
``` php artisan jetstream:install livewire ```
``` npm install ```
``` npm run dev ```
```` php artisan migrate ```
##  Install Socialite
 ``` composer require laravel/socialite ```
## Create Facebook App
** Go to https://developers.facebook.com <br>
** click on create app button <br>
** click on build connected experiences <br>
** Write Your App Name and click on Created App ID , Do on security check <br>
** Click on "Facebook Login " -> WEB -> Enter Your site URL ->SAVE <br>
** Than go to setting->save Redirect Url <br>
** Setting ->Basic , and than collect your app id and secret id <br>

## config/services.php
  'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => 'https://localhost:8000/auth/facebook/callback',
    ],
## .env file
FACEBOOK_CLIENT_ID =706389089986606
FACEBOOK_CLIENT_SECRET =28f94b9ee244e8e54216fe4b45b091e1
## Add Database Column
`` php artisan make:migration add_facebook_id_column ``
** Fillup it like as migrat.php file
## app/Models/User.php
** Fillup it like as User.php file
## Create Routes
** Fillup it like as web.php file
## Create Controller
** Fillup it like as FacebookController.php file
## Update Blade File
** Fillup it like as login.blade.php file <br>
<b>new got your site url login form</b>
