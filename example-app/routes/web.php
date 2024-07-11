<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


/*Route::get('/', function () {
    return view('login');
});*/

Route::view('/', 'login')->name('login');
Route::view('/send', 'send')->name('send');
Route::view('/verify', 'verify')->name('verify');
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');
Route::post('/send', [RegisterController::class, 'sendToken'])->name('email.send');
