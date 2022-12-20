<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginWithGoogleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// //login with google
// Route::get('auth/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
// Route::get('auth/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);

// //login with facebook
// Route::get('auth/facebook', [LoginWithGoogleController::class, 'redirectToFacebook']);
// Route::get('auth/facebook/callback', [LoginWithGoogleController::class, 'handleFacebookCallback']);

// //login with twitter
// Route::get('auth/twitter/callback', [LoginWithGoogleController::class, 'TwitterCallback']);
Route::get('test', [LoginWithGoogleController::class, 'test']);


//optimize route and way
Route::controller(LoginWithGoogleController::class)->prefix('auth')->group(function (){
    Route::get('{provider}', 'redirect');
    Route::get('{provider}/callback', 'Callback');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
