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
						<x-partials.inputs.floating-input type="text" name="address" :label="__('backoffice.global.address')" wire="wire:model.defer=address"/>
					</div>
					<div class="row mb-3 g-3">
						<div class="col">
							<x-partials.inputs.floating-input type="text" name="door" :label="__('backoffice.global.door')" wire="wire:model.defer=door"/>
						</div>
						<div cLass="col">
							<x-partials.inputs.floating-input type="text" name="floor" :label="__('backoffice.global.floor')" wire="wire:model.defer=floor"/>
						</div>
					</div>
					<div class="row mb-3 g-3">
						<div cLass="col">
							<x-partials.inputs.floating-input type="text" name="postal_code" :label="__('backoffice.global.postal_code')" wire="wire:model.defer=postal_code"/>
						</div>
						<div class="col">
							<x-partials.inputs.floating-input type="text" name="city" :label="__('backoffice.global.city')" wire="wire:model.defer=city"/>
						</div>
						<div class="col">
							<x-partials.inputs.floating-input type="text" name="district" :label="__('backoffice.global.district')" wire="wire:model.defer=district"/>
						</div>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="text" name="county" :label="__('backoffice.global.county')" wire="wire:model.defer=county"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="phone" name="phone" :label="__('backoffice.global.phone')" wire="wire:model.defer=phone"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="text" name="receiver_relation" :label="__('backoffice.global.receiver_relation')" wire="wire:model.defer=receiver_relation"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="text" name="receiver_name" :label="__('backoffice.global.receiver_name')" wire="wire:model.defer=receiver_name"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="text" name="receiver_contact" :label="__('backoffice.global.receiver_contact')" wire="wire:model.defer=receiver_contact"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-textarea name="description" :label="__('backoffice.global.description')" wire="wire:model.defer=description"/>
					</div>

					<x-partials.media :model="$service"/>

					<div class="row mt-4" disabled>
						<div class="col-12">
							<x-partials.card id="{{ class_basename($service) }}_modal_{{ $service->id }}" class="h-100">
								<x-slot:heading>
									{{ __('backoffice.global.sections') }}
								</x-slot:heading>
								<x-slot:body>
									@if (isset($service->id))
										@livewire('sections.listing', [
											'parent' => $service, 
											'base_classes' => 'p-0', 
											'is_modal' => true,
											'base_element_id' => class_basename($service) . '_form_' . $service->id
										], key(rand(100000, 999999)))
									@else
										<div class="text-muted">
											{{ __('backoffice.global.create-service-to-create-sections') }}
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
				@if (null !== $service->id)
					<x-partials.button.live-submit-button class="btn btn-sm btn-primary" :name="__('backoffice.global.save')" wire:click="save"/>
					<x-partials.button.live-submit-button class="btn btn-sm btn-teal" :name="__('backoffice.global.save-then-close')" wire:click="save(true)"/>
				@else
					<x-partials.button.live-submit-button class="btn btn-sm btn-primary" :name="__('backoffice.global.save')" wire:click="save(true)"/>
				@endif
			</x-slot:content>
		</x-partials.modal.footer>
	</x-slot:footer>
</x-partials.modal.content>