<?php

namespace App\View\Components\Partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
		public string 	$dialogClass 				= '',
		public string 	$primaryButtonType 			= 'button',
		public string 	$primaryButtonLabel 		= '',
		public string 	$title 						= ''
	)
    {
		$this->primaryButtonLabel = empty($primaryButtonLabel) ? __('backoffice.global.save') : $primaryButtonLabel;
	}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.modal');
    }
}
