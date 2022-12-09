<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CommandTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	use RefreshDatabase;

	public function test_fetch_countries_command_successful()
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response([
				[
					'code'=> 'GE',
					'name'=> [
						'ka'=> 'საქართველო',
						'en'=> 'georgia',
					],
				],
				[
					'code'=> 'GE',
					'name'=> [
						'ka'=> 'საქართველო',
						'en'=> 'georgia',
					],
				],
			], 200),
		]);

		Http::fake(['https://devtest.ge/get-country-statistics']);

		$this->artisan('coronatime:fetch-countries')->expectsOutput('Countries fetched successfully');
	}
}
