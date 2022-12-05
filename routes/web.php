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

Route::get('/reset-password/{token}', function ($token) {
	return view('reset-password', ['token' => $token, 'lang'=>app()->getLocale()]);
})->middleware('guest')->name('password.reset');

Route::middleware('setLocale')->group(function () {
	Route::post('/{lang}/reset-password', [AuthController::class, 'postResetPassword'])->middleware('guest')->name('password.update');

	Route::view('/{lang}/forgot-password', 'forgot-password')->middleware('guest')->name('password.request');

	Route::post('/{lang}/forgot-password', [AuthController::class, 'postVerificationMail'])->middleware('guest')->name('password.email');

	Route::view('/{lang}/login', 'login')->name('login.show');

	Route::view('/{lang}/singup', 'singup')->name('register.show')->middleware('guest');

	Route::post('/{lang}/register', [AuthController::class, 'postRegistration'])->name('register.store')->middleware('guest');

	Route::post('/{lang}/login', [AuthController::class, 'login'])->name('login');

	Route::get('/{lang}/account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

	Route::post('/{lang}/logout', [AuthController::class, 'logout'])->name('logout');

	Route::get('/{lang}/worldwide', [LandingController::class, 'showWorldwide'])->name('worldwide')->middleware(['auth', 'verified']);

	Route::get('/{lang}/bycountry', [LandingController::class, 'showByCountry'])->name('bycountry')->middleware(['auth', 'verified']);

	Route::view('/{lang}/success-password', 'messages.success-password')->name('success.password');

	Route::view('/{lang}/confirmation', 'messages.confirmation')->name('confirmation');

	Route::view('/{lang}/success-account', 'messages.success-account')->name('verified.account');
});
