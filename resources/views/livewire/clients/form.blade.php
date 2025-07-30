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
						<x-partials.inputs.floating-input type="text" name="name" :label="__('backoffice.global.name')" wire="wire:model.blur=name"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="email" name="email" :label="__('backoffice.global.email')" wire="wire:model.blur=email"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="phone" name="phone" :label="__('backoffice.global.phone')" wire="wire:model.blur=phone"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-textarea name="description" :label="__('backoffice.global.description')" wire="wire:model.defer=description"/>
					</div>
				</div>
			</x-slot:content>
		</x-partials.modal.body>
	</x-slot:body>
	<x-slot:footer>
		<x-partials.modal.footer>
			<x-slot:content>
				<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('backoffice.global.close') }}</button>
				<x-partials.button.live-submit-button class="btn btn-sm btn-primary" :name="__('backoffice.global.save')" wire:click="save"/>
				<x-partials.button.live-submit-button class="btn btn-sm btn-teal" :name="__('backoffice.global.save-then-close')" wire:click="save(true)"/>
			</x-slot:content>
		</x-partials.modal.footer>
	</x-slot:footer>
</x-partials.modal.content>