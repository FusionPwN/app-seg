<?php

namespace App\Livewire\Services;

use App\Models\Lead;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class Listing extends Component
{
	use WithPagination;

	public Lead $lead;
	public string $q = '';

	public string $base_classes = '';
	
	public function mount(Lead $lead)
	{
		$this->lead = $lead;
	}

	#[On('service-created')]
	#[On('service-updated')]
	public function updateListing()
	{
		$this->render();
	}

    public function render()
    {
		$services = $this->lead->services();

		if (!empty($this->q)) {
			$services->where(function ($q) {
				$q->orWhere('name', 'like', "%$this->q%")
				->orWhere('nid', 'like', "%$this->q%");
			});
		}

		$services->orderBy('created_at', 'DESC');

		return view('livewire.services.listing', [
			'services' => $services->paginate(10)
		])->extends('layouts.app');
    }
}
