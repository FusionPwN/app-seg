<x-partials.modal.content>
	<x-slot:header>
		<x-partials.modal.header :title="$title"/>
	</x-slot:header>
	<x-slot:body>
		<x-partials.modal.body>
			<x-slot:content>
				<x-partials.loading-screen wire:loading.flex/>
				<div wire:loading.class="opacity-50">
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="text" name="nid" :label="__('backoffice.global.nid')" wire="wire:model.blur=nid"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="text" name="name" :label="__('backoffice.global.name')" wire="wire:model.defer=name"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-textarea name="description" :label="__('backoffice.global.description')" wire="wire:model.defer=description"/>
					</div>

					<x-partials.media :model="$section"/>

					
						<div class="row mt-4">
							<div class="col-12">
								<x-partials.card id="{{ class_basename($section) }}_modal_{{ $section->id }}" class="h-100">
									<x-slot:heading>
										{{ __('backoffice.global.sections') }}
									</x-slot:heading>
									<x-slot:body>
										@if (null !== $section->id)
											@livewire('sections.listing', [
												'parent' => $section, 
												'base_classes' => 'p-0', 
												'is_modal' => true,
												'base_element_id' => class_basename($section) . '_form_' . $section->id
											], key(rand(100000, 999999)))
										@else
											<div class="text-muted">
												{{ __('backoffice.global.create-section-to-create-sections') }}
											</div>
										@endif
									</x-slot:body>
								</x-partials.card>
							</div>
						</div>
					
				</div>
			</x-slot:content>
		</x-partials.modal.body>
	</x-slot:body>
	<x-slot:footer>
		<x-partials.modal.footer>
			<x-slot:content>
				<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('backoffice.global.close') }}</button>
				@if (null !== $section->id)
					<x-partials.button.live-submit-button class="btn btn-sm btn-primary" :name="__('backoffice.global.save')" wire:click="save"/>
					<x-partials.button.live-submit-button class="btn btn-sm btn-teal" :name="__('backoffice.global.save-then-close')" wire:click="save(true)"/>
				@else
					<x-partials.button.live-submit-button class="btn btn-sm btn-primary" :name="__('backoffice.global.save')" wire:click="save(true)"/>
				@endif
			</x-slot:content>
		</x-partials.modal.footer>
	</x-slot:footer>
</x-partials.modal.content>