<?php

namespace App\Livewire\Sections;

use App\Models\Section;
use App\Models\Service;
use App\Traits\Media;
use Livewire\Component;
use App\View\Components\Partials\Tree\Item;
use Spatie\LivewireFilepond\WithFilePond;
use Livewire\Attributes\On;
use Illuminate\Support\Str;

class Form extends Component
{
	use WithFilePond;
	use Media;
	
	public mixed 	$parent;
	public Section 	$section;
	public string 	$title;
	public string 	$modal_id 		= '';

	public array 	$rules 			= [];

	public string 	$nid;
	public string 	$name;
	public ?string 	$description;
	public ?array 	$media 			= [];

	public function mount(mixed $parent = null, ?Section $section = null)
	{
		$this->rules = [
			'nid'			=> [],
			'name'			=> ['required'],
			'description' 	=> [],
			'media.*'		=> ['mimes:mp4,quicktime,png,jpeg']
		];
		
		$this->parent = $parent;
		$this->section = $section;

		if ($this->section->id !== null) {
			$this->nid 			= $this->section->nid;
			$this->name 		= $this->section->name;
			$this->description 	= $this->section->description;
		} else {
			$this->nid 			= $this->section->generateNid($this->parent);
		}
	}

	#[On('new-section')]
	public function newSection(?string $parent_class = null, ?int $parent_id = null)
	{
		if (Str::contains($this->modal_id, 'edit')) return;

		$this->dispatch('open-modal', data: [
			'modal_id' => $this->modal_id
		]);
	}

	#[On('edit-section')]
	public function editSection(?string $parent_class = null, ?int $parent_id = null, int $section_id)
	{
		if (Str::contains($this->modal_id, 'create')) return;
		$parent = null;

		if (null !== $parent_class) {
			$model = "\\App\\Models\\$parent_class";
			$parent = $model::find($parent_id);
		}

		$section = Section::find($section_id);

		$this->mount($parent, $section);

		$this->title = __('backoffice.sections.edit-target', ['target' => $this->section->nid]);

		$this->dispatch('open-modal', data: [
			'modal_id' => $this->modal_id
		]);
	}

	public function updated()
	{
		if (null !== $this->section->id) {
			$this->validate($this->rules);
		}
	}

	public function save(bool $saveAndClose = false)
	{
		$data = $this->validate($this->rules);
		
		if (null !== $this->section->id) {
			$this->section->update($data);
			$section = $this->section;
			$this->dispatch('section-updated');
		} else {
			$children_length = $this->parent->children()->count();
			$data['order'] = $children_length;
			
			$section = $this->parent->children()->create($data);

			$this->dispatch('section-created', data: [
				'parent_model' => class_basename($this->parent),
				'parent_id' => $this->parent->id,
				'item' => view('components.partials.tree.item', [
					'id' => 'section-' . rand(100000, 999999),
					'loop' => (object) ['last' => true],
					'parent' => $this->parent,
					'branch' => $section,
				])->render()
			]);
		}

		$this->makeMedia($data, $section);

		if (config('app.form_request_sleep') > 0) {
			sleep(config('app.form_request_sleep'));
		}

		if ($saveAndClose) {
			$this->dispatch('close-modal', data: ['modal_id' => $this->modal_id]);
		}
	}

    public function render()
    {
        return view('livewire.sections.form');
    }
}
