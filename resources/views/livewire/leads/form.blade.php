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
					@if (null !== $lead->id)
						<div class="form-group mb-3">
							<x-partials.inputs.floating-select name="status" :label="__('backoffice.global.status')" wire="wire:model.defer=status" :options="$status_choices"/>
						</div>
					@endif
					<div class="form-group mb-3">
						<x-partials.inputs.floating-select2 id="leads-client-select2" :parent-id="$modal_id" name="client_id" :label="__('backoffice.global.client')" wire="wire:model.defer=client_id" :options="$client_list"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="text" name="name" :label="__('backoffice.global.name')" wire="wire:model.blur=name"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-textarea name="description" :label="__('backoffice.global.description')" wire="wire:model.defer=description"/>
					</div>

					<x-partials.media :model="$lead"/>
				</div>
			</x-slot:content>
		</x-partials.modal.body>
	</x-slot:body>
	<x-slot:footer>
		<x-partials.modal.footer>
			<x-slot:content>
				<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('backoffice.global.close') }}</button>
				@if (null !== $lead->id)
					<x-partials.button.live-submit-button class="btn btn-sm btn-primary" :name="__('backoffice.global.save')" wire:click="save"/>
					<x-partials.button.live-submit-button class="btn btn-sm btn-teal" :name="__('backoffice.global.save-then-close')" wire:click="save(true)"/>
				@else
					<x-partials.button.live-submit-button class="btn btn-sm btn-primary" :name="__('backoffice.global.save')" wire:click="save(true)"/>
				@endif
			</x-slot:content>
		</x-partials.modal.footer>
	</x-slot:footer>
</x-partials.modal.content>