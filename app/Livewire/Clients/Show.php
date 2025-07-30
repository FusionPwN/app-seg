<?php

namespace App\Livewire\Clients;

use App\Models\Client;
use Livewire\Component;
use Livewire\Attributes\On; 

class Show extends Component
{
	public Client $client;

	public function mount(Client $client)
	{
		$this->client = $client;
	}

	public function delete()
	{
		if (config('app.form_request_sleep') > 0) {
			sleep(config('app.form_request_sleep'));
		}

		$this->client->delete();

		return redirect()->route('clients.index');
	}

	#[On('client-updated')]
	public function updateModel()
	{
		$this->render();
	}

	public function render()
	{
		if (config('app.show_request_usleep') > 0) {
			usleep(config('app.show_request_usleep'));
		}

		return view('livewire.clients.show')
			->extends('layouts.app');
	}
}
