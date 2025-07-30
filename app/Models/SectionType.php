<?php

namespace App\Models;

use App\Traits\CarbonDates;
use Illuminate\Database\Eloquent\Model;

class SectionType extends Model
{
	use CarbonDates;
	
	protected $guarded = ['id'];
}
