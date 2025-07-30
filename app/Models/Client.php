<?php

namespace App\Models;

use App\Helpers\DocumentNumberGenerator;
use App\Traits\CarbonDates;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	use CarbonDates;
	
	protected $guarded = ['id'];

	public static function boot()
	{
		parent::boot();

		static::creating(function ($model) {
			$numberGenerator = new DocumentNumberGenerator();
			$model->nid = $numberGenerator->generateNumber($model, 'C');
		});
	}
	
	/**
	 * Get the route key for the model.
	 */
	public function getRouteKeyName(): string
	{
		return 'nid';
	}

	public function leads()
	{
		return $this->hasMany(Lead::class);
	}
}
