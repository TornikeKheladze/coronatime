<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Countries extends Model
{
	use HasFactory;

	use HasTranslations;

	public function scopeFilter($query, array $filters)
	{
		$query->when($filters['search'] ?? false, function ($query, $search) {
			$query->where('country', 'like', '%' . $search . '%');
		});
	}

	public $translatable = [
		'country',
	];

	protected $fillable = [
		'id',
		'code',
		'country',
		'confirmed',
		'recovered',
		'critical',
		'deaths',
	];
}
