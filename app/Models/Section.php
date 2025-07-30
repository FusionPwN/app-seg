<?php

namespace App\Models;

use App\Traits\CarbonDates;
use App\Traits\Media;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	use CarbonDates, Media;
	
	protected $guarded = ['id'];

	public static function boot()
	{
		parent::boot();

		static::creating(function ($model) {
			if (is_null($model->nid)) {
				$model->generateNid($model->parent);
			}
		});
	}

	public function generateNid(mixed $parent)
	{
		if (null !== $parent) {
			$children_length = $this->countAll($parent->children, $parent->children()->count());
			$this->nid = $parent->nid . '.S' . $children_length + 1;

			return $this->nid;
		} else {
			return '';
		}
	}

	protected function countAll($children, int $count): int
	{
		foreach ($children as $child) {
			$count += $child->children()->count();
		}
		
		return $count;
	}

	public function breadcrumbs()
	{
		$obj = (object) [
			'nid' 		=> $this->nid,
			'name' 		=> $this->name,
			'url'		=> route('sections.show', $this)
		];

		$obj = array_merge($this->parent->first()->breadcrumbs(), [$obj]);

		return $obj;
	}

	/**
	 * Get the route key for the model.
	 */
	public function getRouteKeyName(): string
	{
		return 'nid';
	}

	public function parentService()
	{
		return $this->morphToMany(Service::class, 'linkable', foreignPivotKey: 'section_id', relatedPivotKey: 'linkable_id', inverse: true);
	}

	public function parentSection()
	{
		return $this->morphToMany(Section::class, 'linkable', foreignPivotKey: 'section_id', relatedPivotKey: 'linkable_id', inverse: true);
	}

	public function parent()
	{
		if ($this->parentService()->count() > 0) {
			return $this->parentService();
		} else {
			return $this->parentSection();
		}
	}
	
	public function children()
	{
		return $this->morphToMany(self::class, 'linkable');
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
