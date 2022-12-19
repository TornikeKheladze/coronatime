<?php

namespace App\Http\Controllers;

use App\Models\Country;

class LandingController extends Controller
{
	public function showWorldwide()
	{
		$countries = Country::all();
		$confirmed = $countries->sum('confirmed');
		$recovered = $countries->sum('recovered');
		$death = $countries->sum('deaths');

		return view('landing.worldwide', [
			'newcases' => $confirmed,
			'recovered' => $recovered,
			'death'    => $death,
		]);
	}

	public function showByCountry()
	{
		$countries = Country::latest()->filter(request(['search']))->get();
		$allCountry = Country::all();
		$confirmed = $allCountry->sum('confirmed');
		$recovered = $allCountry->sum('recovered');
		$death = $allCountry->sum('deaths');

		$sort = $countries->sortBy(request('sort'));
		if (request('by') == 'desc') {
			$sort = $countries->sortByDesc(request('sort'));
		}

		return view('landing.bycountry', [
			'countries' => $sort,
			'newcases' => $confirmed,
			'recovered' => $recovered,
			'death'    => $death,
		]);
	}
}
