<?php

namespace App\Livewire\Clients;

use App\Models\Client;
use Livewire\Component;

class Form extends Component
{
	public Client $client;
	public string $title;
	public string $modal_id 	= '';

	public array $rules 		= [];

	public string $name 		= '';
	public string $email 		= '';
	public string $phone 		= '';
	public ?string $description = '';

	public function mount(?Client $client = null)
	{
		$this->rules = [
			'name' 		=> ['required', 'min:5', 'max:255'],
			'email' 	=> ['required', 'email:rfc'],
			'phone'		=> ['required', 'phone:INTERNATIONAL,PT']
		];
		
		$this->client = $client;

		if (null !== $this->client->id) {
			$this->name 		= $this->client->name;
			$this->email 		= $this->client->email;
			$this->phone 		= $this->client->phone;
			$this->description 	= $this->client->description;
		}
	}

	public function updated()
	{
		if (null !== $this->client->id) {
			$this->validate($this->rules);
		}
	}

	public function save(bool $saveAndClose = false)
	{
		$data = $this->validate($this->rules);

		if (null !== $this->client->id) {
			$this->client->update($data);
			$this->dispatch('client-updated');
		} else {
			$this->client = Client::create($data);
			$this->dispatch('client-created');
		}

		if (config('app.form_request_sleep') > 0) {
			sleep(config('app.form_request_sleep'));
		}

		if ($saveAndClose) {
			$this->dispatch('close-modal', data: ['modal_id' => $this->modal_id]);
		}
	}

    public function render()
    {
        return view('livewire.clients.form');
    }
}
