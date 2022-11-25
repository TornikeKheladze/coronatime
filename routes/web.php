<?php

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
	return view('login');
});

Route::get('/singup', function () {
	return view('singup');
});

Route::get('/reset-password', function () {
	return view('reset-password');
});

Route::get('/set-new-password', function () {
	return view('set-new-password');
});

Route::get('/email-sent', function () {
	return view('email-sent');
});

Route::get('/success-password', function () {
	return view('success-password');
});

Route::get('/success-account', function () {
	return view('success-account');
});
