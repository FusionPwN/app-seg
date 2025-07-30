<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Listing extends Component
{
	use WithPagination;

	public string $q = '';

	public function create()
	{
		$this->dispatch('users-create');
	}

	public function edit(User $user)
	{
		$this->dispatch('users-edit', data: ['id' => $user->id]);
	}

    public function render()
    {
		$users = User::select();

		if (!empty($this->q)) {
			$users->where(function($q) {
				$q->orWhere('name', 'like', "%$this->q%")
					->orWhere('email', 'like', "%$this->q%");
			});
		}

		$users->orderBy('created_at', 'DESC');

        return view('livewire.users.listing', [
			'users' => $users->paginate(10)
		])->extends('layouts.app');
    }
}
