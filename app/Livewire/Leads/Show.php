<?php

namespace App\Livewire\Leads;

use App\Models\Lead;
use Livewire\Component;
use Livewire\Attributes\On; 

class Show extends Component
{
	public Lead $lead;

	public function mount(Lead $lead)
	{
		$this->lead = $lead;
	}

	public function delete()
	{
		if (config('app.form_request_sleep') > 0) {
			sleep(config('app.form_request_sleep'));
		}

		$this->lead->delete();

		return redirect()->route('leads.index');
	}

	#[On('lead-updated')]
	public function updateModel()
	{
		$this->render();
	}
	
    public function render()
    {
		if (config('app.show_request_usleep') > 0) {
			usleep(config('app.show_request_usleep'));
		}

        return view('livewire.leads.show')
			->extends('layouts.app');
    }
}
