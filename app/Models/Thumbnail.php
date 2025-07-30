<?php

namespace App\Models;

use App\Traits\CarbonDates;
use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
	use CarbonDates;

	protected $guarded = [];

	public function original()
	{
		return $this->belongsTo(Upload::class);
	}
}
