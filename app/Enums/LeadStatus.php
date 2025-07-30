<?php

namespace App\Enums;

use Illuminate\Support\Arr;

enum LeadStatus: string
{
    case OPEN 	= 'open';
	case CLOSED = 'closed';

	public static function default()
	{
		return self::OPEN;
	}

	public static function choices()
	{
		$choices = Arr::mapWithKeys(self::cases(), function($item) {
			return [$item->value => $item->label()];
		});

		return $choices;
	}

	public static function values()
	{
		$values = Arr::map(self::cases(), function ($item) {
			return $item->value;
		});

		return $values;
	}

	public static function list()
	{
		$list = Arr::map(self::cases(), function ($item) {
			return [
				'id' 	=> $item->value,
				'name' 	=> $item->label()
			];
		});

		return $list;
	}

	public function isOpen(): bool
	{
		return match ($this) {
			self::OPEN 	=> true,
			default 	=> false
		};
	}

	public function label(): string
	{
		return match ($this) {
			self::OPEN 		=> __('backoffice.leads.status.open'),
			self::CLOSED 	=> __('backoffice.leads.status.closed'),
		};
	}

	public function icon(): string
	{
		return match ($this) {
			self::OPEN 		=> '<i class="fa-solid fa-spinner fa-spin text-warning"></i>',
			self::CLOSED 	=> '<i class="fa-solid fa-lock text-teal"></i>',
		};
	}
}

