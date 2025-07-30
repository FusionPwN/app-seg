@section('title')
    {{ __('backoffice.global.sections') }} / {{ $section->nid }}
@endsection

@section('breadcrumbs')
	<x-partials.breadcrumbs :breadcrumbs="$section->breadcrumbs()"/>
@endsection

<div>
    <div>
		<button id="section-edit-btn" class="d-none" wire:click="editSection('{{ class_basename($section->parent->first()) }}', {{ $section->parent->first()->id }}, {{ $section->id }})">
			<i class="fa-regular fa-pen-to-square"></i>
			&nbsp;
			{{ __('backoffice.global.edit') }}
		</button>
		
		<x-partials.modal wire:ignore.self id="section-edit-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("sections.form", [
					'modal_id' 	=> 'section-edit-modal',
					'section'	=> $section,
					'title' 	=> __('backoffice.sections.edit-target', ['target' => $section->nid])
				])
			</x-slot:content>
		</x-partials.modal>
		<x-partials.modal wire:ignore.self id="section-create-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("sections.form", [
					'modal_id' 	=> 'section-create-modal',
					'title' 	=> __('backoffice.sections.create'),
					'parent' 	=> $section
				])
			</x-slot:content>
		</x-partials.modal>
	</div>

	<x-partials.loading-screen wire:loading.flex/>
	<div wire:loading.class="opacity-50">
		<x-partials.show-actions :previous-url="route($section->parent->first() instanceof App\Models\Service ? 'services.show' : 'sections.show', $section->parent->first())" modal-edit-btn="section-edit-btn" type="section">
			<x-slot:title>
				{{ __('backoffice.global.sections') }} / {{ $section->nid }}
			</x-slot:title>
		</x-partials.show-actions>
		<x-partials.delete-modal type="section" :message="__('backoffice.global.delete-msg', ['slot1' => strtolower(__('backoffice.global.section')), 'slot2' => $section->nid])"/>

		<div class="container-fluid">
			<div class="row mt-4">
				<div class="col-12 col-lg-4">
					<x-partials.card class="h-100">
						<x-slot:heading>
							{{ __('backoffice.global.info') }}
						</x-slot:heading>
						<x-slot:body>
							<div class="d-flex justify-content-between">
								<div class="d-flex flex-column w-100">
									<div>
										<h4 class="d-flex align-items-center gap-3">
											<i class="fa-regular fa-file-lines fa-2x"></i>
											<small>{{ $section->name }}</small>
										</h4>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.nid') }}</small>
										<small>{{ $section->nid ?? '-' }}</small>
									</div>
								</div>
							</div>
						</x-slot:body>
					</x-partials.card>
				</div>
				<div class="col-12 col-lg-8">
					<x-partials.card class="h-100">
						<x-slot:heading>
							{{ __('backoffice.global.media') }}
						</x-slot:heading>
						<x-slot:body class="overflow-card-body">
							<x-partials.static-media :model="$section"/>
						</x-slot:body>
					</x-partials.card>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12">
					<x-partials.accordion>
						<x-slot:items>
							<x-partials.accordion.item extra-class="show">
								<x-slot:heading>
									{{ __('backoffice.global.description') }}
								</x-slot:heading>
								<x-slot:body>
									{{ null !== $section->description && !empty($section->description) ? $section->description : __('backoffice.global.no-description') }}
								</x-slot:body>
							</x-partials.accordion.item>
						</x-slot:items>
					</x-partials.accordion>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12">
					<x-partials.card class="h-100">
						<x-slot:heading>
							{{ __('backoffice.global.sections') }}
						</x-slot:heading>
						<x-slot:body>
							@livewire('sections.listing', [
								'parent' => $section, 
								'base_classes' => 'p-0',
								'base_element_id' => class_basename($section) . '_show_' . $section->id
							], key(rand(100000, 999999)))
						</x-slot:body>
					</x-partials.card>
				</div>
			</div>
		</div>
	</div>
</div>
