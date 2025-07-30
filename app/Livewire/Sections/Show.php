<?php

namespace App\Livewire\Sections;

use App\Models\Service;
use App\Models\Section;
use Livewire\Component;
use Livewire\Attributes\On; 

class Show extends Component
{
	public Section $section;

	public function mount(Section $section)
	{
		$this->section = $section;
		#dd($this->section->parent->first(), $this->section->parent->first() instanceof Service);
	}

	public function delete()
	{
		if (config('app.form_request_sleep') > 0) {
			sleep(config('app.form_request_sleep'));
		}

		$parent = $this->section->parent->first();

		$this->section->delete();

		return redirect()->route($parent instanceof Service ? 'services.show' : 'sections.show', $parent);
	}

	#[On('section-updated')]
	public function updateModel()
	{
		$this->render();
	}

	public function editSection(string $parent_class, int $parent_id, int $section_id)
	{
		$this->dispatch('edit-section', parent_class: $parent_class, parent_id: $parent_id, section_id: $section_id);
	}

	public function render()
	{
		if (config('app.show_request_usleep') > 0) {
			usleep(config('app.show_request_usleep'));
		}

		return view('livewire.sections.show')
		->extends('layouts.app');
	}
}
