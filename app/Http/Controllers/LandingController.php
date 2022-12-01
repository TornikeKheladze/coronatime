<?php

namespace App\Http\Controllers;

use App\Models\Countries;

class LandingController extends Controller
{
	public function showWorldwide()
	{
		$countries = Countries::all();
		$confirmed = $countries->sum('confirmed');
		$recovered = $countries->sum('recovered');
		$death = $countries->sum('deaths');

		return view('landing.worldwide', [
			'newcases' => $confirmed,
			'recovered'=> $recovered,
			'death'    => $death,
		]);
	}

	public function showByCountry()
	{
		$countries = Countries::all();
		$confirmed = $countries->sum('confirmed');
		$recovered = $countries->sum('recovered');
		$death = $countries->sum('deaths');
		return view('landing.bycountry', [
			'countries'=> $countries,
			'newcases' => $confirmed,
			'recovered'=> $recovered,
			'death'    => $death,
		]);
	}
}
