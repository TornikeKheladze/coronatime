<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
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

Route::redirect('/', 'login.show', 301)->middleware('guest');

Route::redirect('/', '/en/worldwide', 301)->middleware(['auth', 'verified']);

Route::get('/reset-password/{token}', [AuthController::class, 'getResetPassword'])->middleware('guest')->name('password.reset');


Route::middleware('setLocale')->group(function () {
	Route::prefix('/{lang}')->group(function () {

		Route::post('/reset-password', [AuthController::class, 'postResetPassword'])->middleware('guest')->name('password.update');

		Route::view('/forgot-password', 'forgot-password')->middleware('guest')->name('password.request');

		Route::post('/forgot-password', [AuthController::class, 'postVerificationMail'])->middleware('guest')->name('password.email');

		Route::view('/login', 'login')->name('login.show');

		Route::view('/singup', 'singup')->name('register.show')->middleware('guest');

		Route::post('/register', [AuthController::class, 'postRegistration'])->name('register.store')->middleware('guest');

		Route::post('/login', [AuthController::class, 'login'])->name('login');

		Route::get('/account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

		Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

		Route::get('/worldwide', [LandingController::class, 'showWorldwide'])->name('worldwide')->middleware(['auth', 'verified']);

		Route::get('/bycountry', [LandingController::class, 'showByCountry'])->name('bycountry')->middleware(['auth', 'verified']);

		Route::view('/success-password', 'messages.success-password')->name('success.password');

		Route::view('/confirmation', 'messages.confirmation')->name('confirmation');

		Route::view('/success-account', 'messages.success-account')->name('verified.account');
	});
});
