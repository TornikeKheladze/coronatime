<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessible()
	{
		$response = $this->get(route('login.show', ['lang'=>app()->getLocale()]));
		$response->assertSuccessful();
		$response->assertViewIs('login');
	}

	public function test_logout_is_successful()
	{
		$response = $this->post(route('logout', ['lang'=>app()->getLocale()]));
		$response->assertStatus(302);
	}

	public function test_auth_should_give_us_error_if_input_is_not_provided()
	{
		$response = $this->post(route('login', ['lang'=>app()->getLocale()]));
		$response->assertSessionHasErrors([
			'name_mail',
			'password',
		]);
	}

	public function test_auth_should_give_us_error_if_email_input_is_not_provided()
	{
		$response = $this->post(route('login', ['lang'=>app()->getLocale()]), ['password'=>'my-password']);

		$response->assertSessionHasErrors(['name_mail']);
		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_auth_should_give_us_error_if_password_input_is_not_provided()
	{
		$response = $this->post(route('login', ['lang'=>app()->getLocale()]), ['name_mail'=>'myemail@gmail.com']);

		$response->assertSessionHasErrors(['password']);
		$response->assertSessionDoesntHaveErrors(['name_mail']);
	}

	public function test_auth_should_give_us_credentials_error_if_such_user_does_not_exists()
	{
		$response = $this->post(route('login', ['lang'=>app()->getLocale()]), [
			'name_mail'=> 'myemail@gmail.com',
			'password' => 'password',
		]);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_auth_should_redirect_after_successful_login_with_email()
	{
		$email = 'xeladze.tornike@gmail.com';
		$password = 'password';
		User::create([
			'name'             => 'tornike',
			'email'            => $email,
			'password'         => bcrypt($password),
		]);

		$response = $this->post(route('login', ['lang'=>app()->getLocale()]), [
			'name_mail'                             => $email,
			'password'                              => $password,
		]);

		$response->assertStatus(302);
	}

	public function test_auth_should_redirect_after_successful_login_with_name()
	{
		$email = 'xeladze.tornike@gmail.com';
		$password = 'password';
		$name = 'tornike';
		User::create([
			'name'             => $name,
			'email'            => $email,
			'password'         => bcrypt($password),
		]);

		$response = $this->post(route('login', ['lang'=>app()->getLocale()]), [
			'name_mail'                             => $name,
			'password'                              => $password,
		]);

		$response->assertStatus(302);
	}
}
