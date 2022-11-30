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

Route::redirect('/', '/login/en', 301)->middleware('guest');

Route::redirect('/', '/worldwide/en', 301)->middleware(['auth', 'verified']);

Route::get('/reset-password/{token}', function ($token) {
	return view('reset-password', ['token' => $token, 'lang'=>app()->getLocale()]);
})->middleware('guest')->name('password.reset');

Route::middleware('setLocale')->group(function () {
	Route::post('/reset-password/{lang}', [AuthController::class, 'postResetPassword'])->middleware('guest')->name('password.update');

	Route::view('/forgot-password/{lang}', 'forgot-password')->middleware('guest')->name('password.request');

	Route::post('/forgot-password/{lang}', [AuthController::class, 'postVerificationMail'])->middleware('guest')->name('password.email');

	Route::view('/login/{lang}', 'login')->name('login.show');

	Route::view('/singup/{lang}', 'singup')->name('register.show')->middleware('guest');

	Route::post('/register/{lang}', [AuthController::class, 'postRegistration'])->name('register.store')->middleware('guest');

	Route::post('/login/{lang}', [AuthController::class, 'login'])->name('login');

	Route::get('account/verify/{token}/{lang}', [AuthController::class, 'verifyAccount'])->name('user.verify');

	Route::post('/logout/{lang}', [AuthController::class, 'logout'])->name('logout');

	Route::view('/worldwide/{lang}', 'landing.worldwide')->name('worldwide')->middleware(['auth', 'verified']);

	Route::view('/success-password/{lang}', 'messages.success-password')->name('success.password');

	Route::view('/confirmation/{lang}', 'messages.confirmation')->name('confirmation');

	Route::view('/success-account/{lang}', 'messages.success-account')->name('verified.account');
});
