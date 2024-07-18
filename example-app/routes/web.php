<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

//ログイン画面を表示する
Route::get('/', [LoginController::class, 'login'])->name('login');
// ログイン処理を行う
Route::post('/', [LoginController::class, 'show'])->name('show');


//メール認証のコード送信画面を表示する
Route::view('/send', 'send')->name('send');
//メール認証のメールアドレスが正しければトークンを送信する
Route::post('/verify', [RegisterController::class, 'mailCheck'])->name('mailCheck');


//メール認証画面を表示する
Route::view('/verify', 'verify')->name('verify');
//メール認証処理を行う
Route::post('/register', [RegisterController::class, 'tokenCheck'])->name('tokenCheck');


//会員情報登録画面
Route::post('/registerCreate', [RegisterController::class, 'registerCreate'])->name('registerCreate');

//パスワード変更画面(ログイン中)を表示する
Route::get('/change',  [LoginController::class, 'change'])->name('change');
//パスワード変更(ログイン中)の処理をする
Route::post('/changePassword',  [LoginController::class, 'changePassword'])->name('changePassword');



//パスワード再設定画面(パスワードを忘れた場合)を表示する
Route::view('/reset', 'reset')->name('reset');
//パスワード再設定画面(パスワードを忘れた場合)にメール認証処理をする
Route::post('/reset', [LoginController::class, 'resetMailCheck'])->name('resetMailCheck');

//パスワード再設定画面(パスワードを忘れた場合)にメール認証処理をする
Route::post('/resetTokenCheck', [LoginController::class, 'resetTokenCheck'])->name('resetTokenCheck');

//パスワード再設定画面(パスワードを忘れた場合)にパスワード変更をする
Route::post('/resetPassword', [LoginController::class, 'resetPassword'])->name('resetPassword');


//会員情報画面(登録した会員情報を表示)
Route::view('/registerCheck', 'registerCheck')->name('registerCheck');
