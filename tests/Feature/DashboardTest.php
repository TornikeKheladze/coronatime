<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();

		$this->user = User::factory()->create([
			'name'    => 'tornike',
			'email'   => 'xeladze@redberry.ge',
			'password'=> bcrypt('password'),
		]);
	}

	public function test_if_worldwide_page_is_shown()
	{
		$response = $this->actingAs($this->user)->get(route('worldwide', ['lang'=>app()->getLocale()]));

		$response->assertSuccessful();
		$response->assertViewHasAll([
			'newcases',
			'recovered',
			'death',
		]);
	}

	public function test_if_bycountry_page_is_shown()
	{
		$response = $this->actingAs($this->user)->get(route('bycountry', ['lang'=>app()->getLocale()]));

		$response->assertSuccessful();
		$response->assertViewHasAll([
			'countries',
			'newcases',
			'recovered',
			'death',
		]);
	}

	public function test_sort_by_desc()
	{
		$response = $this->actingAs($this->user)->get('/{lang}/bycountry?sort=country&by=desc');

		$response->assertSuccessful();
		$response->assertViewHasAll([
			'countries',
			'newcases',
			'recovered',
			'death',
		]);
	}

	public function test_search_by_country()
	{
		$response = $this->actingAs($this->user)->get('/en/bycountry?search=geo&sort=confirmed&by=desc');

		$response->assertSuccessful();
		$response->assertViewHasAll([
			'countries',
			'newcases',
			'recovered',
			'death',
		]);
	}
}
