<?php

namespace App\Livewire\Services;

use App\Models\Service;
use App\Models\Lead;
use Livewire\Component;
use Livewire\Attributes\On; 

class Show extends Component
{
	public Lead $lead;
	public Service $service;

	public function mount(Service $service)
	{
		$this->lead = $service->lead;
		$this->service = $service;
	}

	public function delete()
	{
		if (config('app.form_request_sleep') > 0) {
			sleep(config('app.form_request_sleep'));
		}

		$this->service->delete();

		return redirect()->route('leads.show', $this->lead);
	}

	#[On('service-updated')]
	public function updateModel()
	{
		$this->render();
	}

	public function render()
	{
		if (config('app.show_request_usleep') > 0) {
			usleep(config('app.show_request_usleep'));
		}

		return view('livewire.services.show')
			->extends('layouts.app');
	}
}
