<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait CarbonDates
{
	protected function createdAt(): Attribute
	{
		return Attribute::make(
			get: fn (?string $value) => Carbon::create($value ?? ''),
		);
	}

	protected function updatedAt(): Attribute
	{
		return Attribute::make(
			get: fn (?string $value) => Carbon::create($value ?? ''),
		);
	}

	public function creationDate(): string
	{
		return $this->created_at->format('d-m-Y H:i');
	}

	public function updateDate(): string
	{
		return $this->updated_at->format('d-m-Y H:i');
	}
}
