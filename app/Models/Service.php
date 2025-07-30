<?php

namespace App\Models;

use App\Models\Traits\ImageSrc;
use App\Traits\CarbonDates;
use App\Traits\Media;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	use CarbonDates, Media;
	
	protected $guarded = ['id'];

	public static function boot()
	{
		parent::boot();

		static::creating(function ($model) {
			if (is_null($model->nid)) {
				$model->generateNid($model->lead);
			}
		});
	}

	public function generateNid(Lead $lead)
	{
		$this->nid = $lead->nid . '.' . chr(ord('A') + $lead->services()->count());

		return $this->nid;
	}

	public function breadcrumbs()
	{
		$obj = (object) [
			'nid' 		=> $this->nid,
			'name' 		=> $this->name,
			'url'		=> route('services.show', $this)
		];

		$obj = array_merge($this->parent->breadcrumbs(), [$obj]);

		return $obj;
	}
	
	/**
	 * Get the route key for the model.
	 */
	public function getRouteKeyName(): string
	{
		return 'nid';
	}

	public function lead()
	{
		return $this->belongsTo(Lead::class);
	}

	public function parent()
	{
		return $this->lead();
	}
	
	public function sections()
	{
		return $this->morphToMany(Section::class, 'linkable');
	}

	public function children()
	{
		return $this->sections();
	}

	public function recursiveChildren()
	{
		return $this->children()->with('media')->with('recursiveChildren');
	}

	public function media()
	{
		return $this->morphToMany(Upload::class, 'model', 'model_uploads')->withPivot('default')->withTimestamps();
	}

	public function defaultMedia()
	{
		return $this->media()->withPivotValue('default', 1)->first();
	}
}
