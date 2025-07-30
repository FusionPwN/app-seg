<?php

namespace App\Models;

use App\Traits\CarbonDates;
use App\Traits\Media;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
	use CarbonDates, Media;

	protected $fillable = [0];
	protected $appends = ['url'];

	public function thumbnails()
	{
		return $this->hasMany(Thumbnail::class);
	}

	public function thumbnail(string $size)
	{
		return $this->hasMany(Thumbnail::class)->where('size', $size)->first();
	}
}
