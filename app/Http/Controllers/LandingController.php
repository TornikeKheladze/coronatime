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
		$countries = Countries::latest()->filter(request(['search']))->get();
		$allCountry = Countries::all();
		$confirmed = $allCountry->sum('confirmed');
		$recovered = $allCountry->sum('recovered');
		$death = $allCountry->sum('deaths');

		$sort = $countries->sortBy(request('sort'));
		if (request('by') == 'desc')
		{
			$sort = $countries->sortByDesc(request('sort'));
		}

		return view('landing.bycountry', [
			'countries'=> $sort,
			'newcases' => $confirmed,
			'recovered'=> $recovered,
			'death'    => $death,
		]);
	}
}
