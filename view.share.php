write this code in web.php

View::composer(['*'],function($view){
    $public_menu = Menu::getByName('Main Menu');
    $oursay =OurSay::first();
    // $view->with('public_menu',$public_menu)->with('oursay',$oursay);
    $view->with([
        'public_menu'=>$public_menu,
        'oursay'=>$oursay,
    ]);
});
