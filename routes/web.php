<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::get('/block', function () {
    return view('block');
});

Route::post('register-user', [AuthController::class, 'registerUser'])->name('register-user'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::post('login', [AuthController::class, 'login'])->name('login'); 

Route::resource('user', UserController::class);

Route::get('/search',[UserController::class, 'search'])->name('search');

Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);