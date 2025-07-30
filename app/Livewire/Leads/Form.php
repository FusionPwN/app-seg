<?php

namespace App\Livewire\Leads;

use App\Enums\LeadStatus;
use App\Models\Client;
use App\Models\Lead;
use App\Traits\Media;
use Livewire\Component;
use Spatie\LivewireFilepond\WithFilePond;

class Form extends Component
{
	use WithFilePond;
	use Media;
	
	public Lead 	$lead;
	public string 	$title;
	public string 	$modal_id 		= '';
	public array 	$status_choices;
	public array 	$client_list;

	public array 	$rules 			= [];

	public string 	$nid 			= '';
	public string 	$name 			= '';
	public ?string 	$description;
	public string 	$status 		= '';
	public int 		$client_id 		= -1;
	public ?array 	$media 			= [];

	public function mount(?Lead $lead = null)
	{
		$this->rules = [
			'nid'			=> [],
			'name' 			=> ['required', 'min:5', 'max:255'],
			'status' 		=> ['required', 'in:' . implode(',', LeadStatus::values())],
			'client_id' 	=> ['required', 'exists:clients,id'],
			'description' 	=> [],
			'media.*'		=> ['mimes:mp4,quicktime,png,jpeg']
		];

		$this->status_choices = LeadStatus::list();
		$this->client_list = Client::all()->map(function ($item) {
			return [
				'id' => $item->id,
				'name' => $item->name
			];
		})->toArray();
		$this->lead = $lead;

		if (null !== $this->lead->id) {
			$this->nid 			= $this->lead->nid;
			$this->name 		= $this->lead->name;
			$this->description 	= $this->lead->description;
			$this->status 		= $this->lead->status->value;
			$this->client_id 	= $this->lead->client->id;
		} else {
			$this->nid			= $lead->generateNid();
			$this->status 		= LeadStatus::default()->value;
		}
	}

	public function updated()
	{
		if (null !== $this->lead->id) {
			$this->validate($this->rules);
		}
	}

	public function save(bool $saveAndClose = false)
	{
		$data = $this->validate($this->rules);
		
		if (null !== $this->lead->id) {
			$this->lead->update($data);
			$this->dispatch('lead-updated');
		} else {
			$this->lead = Lead::create($data);
			$this->dispatch('lead-created');
		}

		$this->makeMedia($data, $this->lead);

		if (config('app.form_request_sleep') > 0) {
			sleep(config('app.form_request_sleep'));
		}

		if ($saveAndClose) {
			$this->dispatch('close-modal', data: ['modal_id' => $this->modal_id]);
		}
	}

    public function render()
    {
        return view('livewire.leads.form');
    }
}
