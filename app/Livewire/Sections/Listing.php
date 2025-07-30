<?php

namespace App\Livewire\Sections;

use App\Models\Section;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class Listing extends Component
{
	public mixed $parent;
	public mixed $container;
	public string $mode = 'create';
	public string $base_element_id = '';
	public bool $is_modal = false;

	use WithPagination;

	public string $q = '';

	public function mount(mixed $parent)
	{
		$this->parent = $parent;
	}

	public function updatedMode($value)
	{
		if ($value == "1") {
			$this->mode = 'sort';
		} else {
			$this->mode = 'creation';
		}

		$this->dispatch('tree-list:mode-update', data: [
			'mode' 			=> $this->mode, 
			'element_id' 	=> $this->base_element_id
		]);
	}

	#[On('section-created')]
	#[On('section-updated')]
	public function updateListing()
	{
		$this->render();
	}

	public function handleMove(string $target_model, int $target_id, string $from_model, int $from_id, string $to_model, int $to_id, int $newIndex)
	{
		if ($this->mode != 'sort') { return; }

		$event_data = [
			'element_id' 	=> $this->base_element_id,
			'identifier' 	=> "$target_model-$target_id",
			'from_model' 	=> $from_model,
			'from_id' 		=> $from_id,
			'to_model'		=> $to_model,
			'to_id'			=> $to_id,
		];

		$to 	= "App\\Models\\$to_model"::find($to_id);
		$target = "App\\Models\\$target_model"::find($target_id);

		if ($from_model != $to_model || $from_id != $to_id) {
			$from 	= "App\\Models\\$from_model"::find($from_id);

			$from->children()->detach($target->id);
			$to->children()->attach($target);

			foreach ($from->children->sortBy('order') as $key => $child) {
				$child->order = $key;
				$child->save();
			}

			$event_data['from_count'] = $from->children()->count();
			$event_data['to_count'] = $from->children()->count();
		}

		$i = $newIndex + 1;
		foreach ($to->children->where('order', '>=', $newIndex)->sortBy('order') as $child) {
			$child->order = $i;
			$child->save();
			$i++;
		}

		$target->order = $newIndex;
		$target->save();

		$this->dispatch('tree-list:update-in-use', data: $event_data);
	}

	public function newSection(string $parent_class, int $parent_id)
	{
		$this->dispatch('new-section', parent_class: $parent_class, parent_id: $parent_id);
	}

	public function editSection(string $parent_class, int $parent_id, int $section_id)
	{
		$this->dispatch('edit-section', parent_class: $parent_class, parent_id: $parent_id, section_id: $section_id);
	}

	public function render()
	{
		$sections = $this->parent->children();
		if (!empty($this->q)) {
			$sections->where(function ($q) {
				$q->orWhere('sections.description', 'like', "%$this->q%")
					->orWhere('sections.nid', 'like', "%$this->q%");
			});
		}

		$sections->orderBy('sections.created_at', 'DESC');

		return view('livewire.sections.listing', [
			'sections' => $sections->get()
		])->extends('layouts.app');
	}
}
