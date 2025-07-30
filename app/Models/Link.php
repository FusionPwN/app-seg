<?php

namespace App\Models;

use App\Traits\CarbonDates;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	use CarbonDates;
	
	protected $guarded = ['id'];
}
