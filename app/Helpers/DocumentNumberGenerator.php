<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentNumberGenerator
{
	/** @var int */
	protected $startSequenceFrom;

	/** @var string */
	protected $prefix;

	/** @var int */
	protected $padLength;

	/** @var string */
	protected $padString;

	public function __construct()
	{
		$this->startSequenceFrom 	= 1;
		$this->prefix 				= '';
		$this->padLength 			= 4;
		$this->padString 			= '0';
	}

	/**
	 * @inheritDoc
	 */
	public function generateNumber(mixed $model, ?string $prefix = null): string
	{
		if (null !== $prefix) {
			$this->prefix = $prefix;
		}

		$lastDoc = $model::orderBy('id', 'desc');
		if (in_array(SoftDeletes::class, class_uses_recursive(get_class($model)))) {
			$lastDoc->withTrashed();
		}
		$lastDoc = $lastDoc->limit(1)->first();

		$last = $lastDoc ? $lastDoc->id : 0;
		$next = $this->startSequenceFrom + $last;

		return sprintf(
			'%s.%s',
			$this->prefix . date('Y'),
			str_pad((string) $next, $this->padLength, $this->padString, STR_PAD_LEFT)
		);
	}
}
