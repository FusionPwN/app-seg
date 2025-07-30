<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On; 

class Form extends Component
{
	public ?User $user;
	public string $title;
	public string $modal_id 	= '';

	public array $rules 		= [
		'name' 						=> ['required'],
		'email' 					=> ['required', 'email:rfc'],
		'password' 					=> ['required', 'confirmed'],
		'password_confirmation' 	=> ['required']
	];

	public string $name;
	public string $email;
	public string $password;
	public string $password_confirmation;

	#[On('users-create')]
	public function create()
	{
		$this->mount(new User());
		$this->dispatch('open-modal', data: ['modal_id' => 'user-create-modal']);
	}

	#[On('users-edit')]
	public function edit($data)
	{
		$this->mount(User::find($data['id']));
		$this->dispatch('open-modal', data: ['modal_id' => 'user-create-modal']);
	}

	public function mount(?User $user = null)
	{
		$this->user = $user;

		if ($this->user->id !== null) {
			$this->title 		= __('backoffice.users.edit-target', ['target' => $this->user->name]);

			$this->name 		= $this->user->name;
			$this->email 		= $this->user->email;
		} else {
			$this->title 					= __('backoffice.users.create');
			
			$this->name 					= '';
			$this->email 					= '';
			$this->password 				= '';
			$this->password_confirmation 	= '';
		}
	}

	public function generatePassword()
	{
		$pw = Str::password(12);

		$this->password 				= $pw;
		$this->password_confirmation 	= $pw;
	}

	public function save(bool $saveAndClose = false)
	{
		$data = $this->validate($this->rules);

		if (null !== $this->user->id) {
			$this->user->update($data);
			$this->dispatch('user-updated');
		} else {
			$this->user = User::create($data);

			$this->dispatch('user-created');
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
        return view('livewire.users.form');
    }
}
