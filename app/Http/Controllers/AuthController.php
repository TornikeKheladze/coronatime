<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\UsersVerify;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function showRegister()
	{
		return view('singup');
	}

	public function showLogin()
	{
		return view('login');
	}

	// public function store(StoreUserRequest $request)
	// {
	// 	$attributes = $request->validated();
	// 	$attributes['password'] = bcrypt($attributes['password']);
	// 	User::create($attributes);
	// 	return redirect('confirmation');
	// }

	public function postRegistration(StoreUserRequest $request)
	{
		$request->validated();
		$data = $request->all();
		$data['password'] = bcrypt($data['password']);
		$createUser = User::create($data);
		$token = Str::random(64);
		UsersVerify::create([
			'user_id' => $createUser->id,
			'token'   => $token,
		]);
		Mail::send('email.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
			$message->to($request->email);
			$message->subject('Email Verification Mail');
		});
		return redirect()->route('confirmation');
	}

	public function login(StoreAuthRequest $request)
	{
		$attributes = $request->validated();
		$isEmail = Str::contains($attributes['nameOrMail'], '@');
		$credentials['password'] = $attributes['password'];
		if ($isEmail)
		{
			$credentials['email'] = $attributes['nameOrMail'];
		}
		else
		{
			$credentials['name'] = $attributes['nameOrMail'];
		}

		if (!auth()->attempt($credentials))
		{
			throw ValidationException::withMessages(['password'=>__('auth.failed')]);
		}

		session()->regenerate();
		return redirect()->route('confirmation');
	}

	public function verifyAccount($token)
	{
		$verifyUser = UsersVerify::where('token', $token)->first();

		if (!is_null($verifyUser))
		{
			$user = $verifyUser->user;
			$verifyUser->user->email_verified_at = now();
			$verifyUser->user->save();
		}

		return redirect()->route('verified.account');
	}
}
