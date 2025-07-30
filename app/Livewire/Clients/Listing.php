<?php

namespace App\Livewire\Clients;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class Listing extends Component
{
	use WithPagination;

	public string $q = '';

	#[On('client-created')]
	#[On('client-updated')]
	public function updateListing()
	{
		$this->render();
	}

	public function render()
	{
		$clients = Client::select();

		if (!empty($this->q)) {
			$clients->where(function ($q) {
				$q->orWhere('name', 'like', "%$this->q%")
					->orWhere('nid', 'like', "%$this->q%")
					->orWhere('email', 'like', "%$this->q%")
					->orWhere('phone', 'like', "%$this->q%");
			});
		}

		$clients->orderBy('created_at', 'DESC');

		return view('livewire.clients.listing', [
			'clients' => $clients->paginate(10)
		])->extends('layouts.app');
	}
}
