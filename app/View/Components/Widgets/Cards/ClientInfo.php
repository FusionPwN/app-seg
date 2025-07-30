<?php

namespace App\View\Components\Widgets\Cards;

use App\Models\Client;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClientInfo extends Component
{
	public Client 	$client;
	public bool 	$useLink = true;
	public string 	$heading;

    /**
     * Create a new component instance.
     */
    public function __construct($client, $useLink = true, $heading = null)
    {
		$this->client 	= $client;
		$this->useLink 	= $useLink;
		$this->heading 	= $heading ?? __('backoffice.global.info');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.widgets.cards.client-info');
    }
}
