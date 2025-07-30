<?php

namespace App\Livewire\Leads;

use App\Models\Client;
use App\Models\Lead;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class Listing extends Component
{
	use WithPagination;

	public ?Client $client;
	public string $q = '';

	#[On('lead-created')]
	#[On('lead-updated')] 
	public function updateListing()
	{
		$this->render();
	}

	public function render()
	{
		$leads = isset($this->client) ? $this->client->leads() : Lead::select();

		if (!empty($this->q)) {
			$leads->where(function ($q) {
				$q->orWhere('leads.name', 'like', "%$this->q%")
					->orWhere('leads.nid', 'like', "%$this->q%");
			});
		}

		$leads->orderBy('created_at', 'DESC');

        return view('livewire.leads.listing', [
			'leads' => $leads->paginate(10)
		])->extends('layouts.app');
    }
}
