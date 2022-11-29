<?php

use App\Http\Controllers\AuthController;
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

Route::redirect('/', '/login', 301);

Route::view('/login', 'login')->name('login.show');

Route::view('/singup', 'singup')->name('register.show')->middleware('guest');

Route::post('/register', [AuthController::class, 'postRegistration'])->name('register.store')->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/worldwide', 'landing.worldwide')->name('worldwide')->middleware(['auth', 'verified']);

Route::get('/reset-password', function () {
	return view('reset-password');
});

Route::get('/set-new-password', function () {
	return view('set-new-password');
});

Route::get('/confirmation', function () {
	return view('messages.confirmation');
})->name('confirmation');

Route::get('/success-password', function () {
	return view('messages.success-password');
});

Route::get('/success-account', function () {
	return view('messages.success-account');
})->name('verified.account');
