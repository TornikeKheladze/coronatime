<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchStatistics extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'coronatime:fetch-countries';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'fetch all countries with statistics about corona';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$countries = Http::get('https://devtest.ge/countries')->json();

		foreach ($countries as $country) {
			$statistics = Http::post('https://devtest.ge/get-country-statistics', ['code' => $country['code']])->json();

			$attributes = [
				'code'     => $statistics['code'],
				'country'  => $country['name'],
				'confirmed' => $statistics['confirmed'],
				'recovered' => $statistics['recovered'],
				'critical' => $statistics['critical'],
				'deaths'   => $statistics['deaths'],
			];
			Country::updateOrCreate($attributes);
			$this->info('Countries fetched successfully');
		}
	}
}
