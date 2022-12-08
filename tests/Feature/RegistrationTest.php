<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UsersVerify;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

class RegistrationTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	private UsersVerify $users_verify;

	protected function setUp(): void
	{
		parent::setUp();

		$this->user = User::factory()->create([
			'name'    => 'tornike',
			'email'   => 'xeladze@redberry.ge',
			'password'=> bcrypt('password'),
		]);
		$this->users_verify = UsersVerify::create([
			'user_id'=> $this->user->id,
			'token'  => Str::random(64),
		]);
	}

	public function test_if_registration_page_is_shown()
	{
		$response = $this->get('/{lang}/singup');

		$response->assertViewIs('singup');
	}

	public function test_if_username_is_not_provided_should_return_error()
	{
		$response = $this->post('/{lang}/register', [
			'email'                => 'tornike@redberry.ge',
			'password'             => 'my-password',
			'password_confirmation'=> 'my-password',
		]);

		$response->assertSessionHasErrors(['name']);
		$response->assertSessionDoesntHaveErrors([
			'email',
			'password',
			'password_confirmation',
		]);
	}

	public function test_if_email_is_not_provided_should_return_error()
	{
		$response = $this->post('/{lang}/register', [
			'name'                 => 'toko',
			'password'             => 'my-password',
			'password_confirmation'=> 'my-password',
		]);

		$response->assertSessionHasErrors(['email']);
		$response->assertSessionDoesntHaveErrors([
			'name',
			'password',
			'password_confirmation',
		]);
	}

	public function test_if_password_is_not_provided_should_return_error()
	{
		$response = $this->post('/{lang}/register', [
			'name'                 => 'toko',
			'email'                => 'tornike@redberry.ge',
		]);

		$response->assertSessionHasErrors(['password']);
		$response->assertSessionDoesntHaveErrors([
			'name',
			'email',
		]);
	}

	public function test_if_password_provided_wrong_should_return_error()
	{
		$response = $this->post('/{lang}/register', [
			'name'                              => 'toko',
			'email'                             => 'tornike@redberry.ge',
			'password'                          => 'sm',
			'password_confirmation'             => 'sm',
		]);

		$response->assertSessionHasErrors(['password']);
		$response->assertSessionDoesntHaveErrors([
			'name',
			'email',
		]);
	}

	public function test_if_password_confirmation_is_wrong_should_return_error()
	{
		$response = $this->post('/{lang}/register', [
			'name'                 => 'toko',
			'email'                => 'tornike@redberry.ge',
			'password'             => 'my-password',
			'password_confirmation'=> 'wrong-password',
		]);

		$response->assertSessionHasErrors(['password']);
		$response->assertSessionDoesntHaveErrors([
			'name',
			'email',
		]);
	}

	public function test_if_registration_is_complete_should_redirect()
	{
		$response = $this->post('/{lang}/register');
		$response->assertStatus(302);
	}

	public function test_if_user_name_is_already_taken_should_return_error()
	{
		$response = $this->post('/{lang}/register', [
			'name'                 => 'tornike',
			'email'                => 'tornike@redberry.ge',
			'password'             => 'my-password',
			'password_confirmation'=> 'my-password',
		]);

		$response->assertSessionHasErrors(['name']);
	}

	public function test_if_email_is_already_taken_should_return_error()
	{
		$response = $this->post('/{lang}/register', [
			'name'                 => 'toko',
			'email'                => 'xeladze@redberry.ge',
			'password'             => 'my-password',
			'password_confirmation'=> 'my-password',
		]);

		$response->assertSessionHasErrors(['email']);
	}

	public function test_user_should_created_after_succesfull_registration()
	{
		$response = $this->post('/{lang}/register', [
			'name'                 => 'toko',
			'email'                => 'toko@redberry.ge',
			'password'             => 'my-password',
			'password_confirmation'=> 'my-password',
		]);

		$response->assertStatus(302);
	}

	public function test_after_verification_should_redirect()
	{
		$response = $this->get(route('user.verify', ['lang'=>app()->getLocale(), 'token'=>$this->users_verify->token]));

		$response->assertStatus(302);
	}

	public function test_forgot_password()
	{
		$response = $this->post('/{lang}/forgot-password', ['email'=>$this->user->email]);
		$response->assertStatus(302);
	}

	public function test_after_reset_password_should_redirect()
	{
		$user = $this->user;
		$token = Password::createToken($user);
		$response = $this->post('/{lang}/reset-password', [
			'token'                => $token,
			'email'                => $this->user->email,
			'password'             => 'password',
			'password_confirmation'=> 'password',
		]);

		$response->assertStatus(302);
	}
}
