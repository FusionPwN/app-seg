<?php

namespace App\View\Components\Partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowActions extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
		public bool $hideTitle 		= false,
		public bool $hideCrud 		= false,
		public bool $showDelete		= true,
		public string $previousUrl 	= '',
		public string $modalEditBtn = '',
		public string $type 		= ''
	)
	{}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.show-actions');
    }
}
