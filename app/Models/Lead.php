<?php

namespace App\Models;

use App\Enums\LeadStatus;
use App\Helpers\DocumentNumberGenerator;
use App\Traits\CarbonDates;
use App\Traits\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;

class Lead extends Model
{
	use CarbonDates, Media, SerializesModels;
	
	protected $casts = [
		'status' => LeadStatus::class
	];

	protected $guarded = ['id'];

	public static function boot()
	{
		parent::boot();

		static::creating(function ($model) {
			if (is_null($model->nid)) {
				$model->generateNid();
			}
		});
	}

	public function generateNid()
	{
		$numberGenerator = new DocumentNumberGenerator();
		$this->nid = $numberGenerator->generateNumber($this, 'SLP');

		return $this->nid;
	}

	/**
	 * Get the route key for the model.
	 */
	public function getRouteKeyName(): string
	{
		return 'nid';
	}
	
	# START RELATIONS
	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function services()
	{
		return $this->hasMany(Service::class);
	}

	public function media()
	{
		return $this->morphToMany(Upload::class, 'model', 'model_uploads')->withPivot('default')->withTimestamps();
	}

	public function defaultMedia()
	{
		return $this->media()->withPivotValue('default', 1)->first();
	}

	/* public function thumbnails()
	{
		return $this->morphMany(Thumbnail::class, 'model');
	} */
	# END RELATIONS

	public function scopeTree($query)
	{
		return $query->with([
			'client', 
			'services' => function($s) {
				$s->with('recursiveChildren');
			},
			'media'
		]);
	}

	# START FUNCTIONS
	public function isOpen(): bool
	{
		return $this->status->isOpen();
	}

	public function breadcrumbs()
	{
		$obj = [
			(object) [
				'nid' 		=> $this->nid,
				'name' 		=> $this->name,
				'url'		=> route('leads.show', $this)
			]
		];

		return $obj;
	}
	
	# END FUNCTIONS

	public static function serialize(int $id)
	{
		return self::tree()->where('id', $id)->get();
	}
}
