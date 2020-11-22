use App\Http\Controllers\FacebookController;

Route::get('/auth/facebook/callback/{id}', function () {
    return view('welcome');
});

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
