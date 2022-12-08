<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\UsersVerify;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
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
		return redirect()->route('confirmation', ['lang'=>app()->getLocale()]);
	}

	public function login(StoreAuthRequest $request)
	{
		$attributes = $request->validated();
		$isEmail = Str::contains($attributes['name_mail'], '@');
		$credentials['password'] = $attributes['password'];
		if ($isEmail)
		{
			$credentials['email'] = $attributes['name_mail'];
		}
		else
		{
			$credentials['name'] = $attributes['name_mail'];
		}

		if (!auth()->attempt($credentials))
		{
			throw ValidationException::withMessages(['password'=>__('auth.failed')]);
		}

		session()->regenerate();
		return redirect()->route('worldwide', ['lang'=>app()->getLocale()]);
	}

	public function verifyAccount($lang, $token)
	{
		$verifyUser = UsersVerify::where('token', $token)->first();

		if (!is_null($verifyUser))
		{
			$user = $verifyUser->user;
			$verifyUser->user->email_verified_at = now();
			$verifyUser->user->save();
		}

		return redirect()->route('verified.account', ['lang'=>app()->getLocale()]);
	}

	public function logout()
	{
		auth()->logout();
		return redirect()->route('login.show', ['lang'=>app()->getLocale()]);
	}

	public function postVerificationMail(Request $request)
	{
		$request->validate(['email' => 'required|email']);

		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
					? redirect()->route('confirmation', ['lang'=>app()->getLocale()])->with(['status' => __($status)])
					: back()->withErrors(['email' => __($status)]);
	}

	public function postResetPassword(Request $request)
	{
		$request->validate([
			'token'    => 'required',
			'email'    => 'required|email',
			'password' => 'required|min:3|confirmed',
		]);

		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password),
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		return redirect()->route('success.password', ['lang'=>app()->getLocale()])->with('status', __($status));
	}
}
