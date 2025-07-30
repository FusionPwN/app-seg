<?php

namespace App\Livewire\Services;

use App\Models\Lead;
use App\Models\Section;
use App\Models\Service;
use App\Traits\Media;
use Livewire\Component;
use Spatie\LivewireFilepond\WithFilePond;

class Form extends Component
{
	use WithFilePond;
	use Media;
	
	public Lead 	$lead;
	public Service 	$service;
	public string 	$title;
	public string 	$modal_id 			= '';

	public array 	$rules 				= [];

	public string 	$nid 				= '';
	public ?string 	$address;
	public ?string 	$floor;
	public ?string 	$door;
	public ?string 	$postal_code;
	public ?string 	$district;
	public ?string 	$city;
	public ?string 	$county;
	public ?string 	$phone;
	public ?string 	$description;
	public ?string 	$receiver_name;
	public ?string 	$receiver_contact;
	public ?string 	$receiver_relation;
	public ?array 	$media 				= [];

	public function mount(?Service $service = null)
	{
		$this->rules = [
			'nid'				=> [],
			'address'			=> [],
			'floor'				=> [],
			'door'				=> [],
			'postal_code' 		=> ['postal_code:PT'],
			'district' 			=> [],
			'city' 				=> [],
			'county' 			=> [],
			'phone' 			=> [],
			'description' 		=> [],
			'receiver_name' 	=> [],
			'receiver_contact' 	=> [],
			'receiver_relation' => [],
			'media.*'			=> ['mimes:mp4,quicktime,png,jpeg']
		];

		$this->service = $service;

		if (null !== $this->service->id) {
			$this->lead 				= $this->service->lead;

			$this->nid					= $this->service->nid;
			$this->address				= $this->service->address;
			$this->floor				= $this->service->floor;
			$this->door					= $this->service->door;
			$this->postal_code			= $this->service->postal_code;
			$this->district				= $this->service->district;
			$this->city					= $this->service->city;
			$this->county				= $this->service->county;
			$this->phone				= $this->service->phone;
			$this->description			= $this->service->description;
			$this->receiver_name		= $this->service->receiver_name;
			$this->receiver_contact		= $this->service->receiver_contact;
			$this->receiver_relation 	= $this->service->receiver_relation;
		} else {
			$this->nid					= $this->service->generateNid($this->lead);
			$this->address				= $this->lead->services->last()->address ?? '';
		}
	}

	public function updated()
	{
		if (null !== $this->service->id) {
			$this->validate($this->rules);
		}
	}

	public function save(bool $saveAndClose = false)
	{
		$data = $this->validate($this->rules);

		if (null !== $this->service->id) {
			$this->service->update($data);
			$this->dispatch('service-updated');
		} else {
			$this->service = $this->lead->services()->create($data);
			$this->service->children()->create([
				'nid'	=> (new Section())->generateNid($this->service),
				'name' 	=> 'Interior'
			]);
			$this->service->children()->create([
				'nid'	=> (new Section())->generateNid($this->service),
				'name' => 'Exterior'
			]);

			$this->dispatch('service-created');
		}

		$this->makeMedia($data, $this->service);

		if (config('app.form_request_sleep') > 0) {
			sleep(config('app.form_request_sleep'));
		}

		if ($saveAndClose) {
			$this->dispatch('close-modal', data: ['modal_id' => $this->modal_id]);
		}
	}

	public function render()
	{
		return view('livewire.services.form');
	}
}
