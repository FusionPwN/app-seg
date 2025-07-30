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
						<x-partials.inputs.floating-input type="text" name="name" :label="__('backoffice.global.name')" wire="wire:model.defer=name"/>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="email" name="email" :label="__('backoffice.global.email')" wire="wire:model.defer=email"/>
					</div>
					<div class="row mb-3 gx-2">
						<div class="col">
							<x-partials.inputs.floating-input type="password" name="password" :label="__('backoffice.global.password')" wire="wire:model.defer=password" :show-hidden-toggle="true"/>
						</div>
						<div class="col-auto">
							<button class="btn btn-primary h-100" wire:click="generatePassword">{{ __('backoffice.users.password-generate') }}</button>
						</div>
					</div>
					<div class="form-group mb-3">
						<x-partials.inputs.floating-input type="password" name="password_confirmation" :label="__('backoffice.global.confirm-password')" wire="wire:model.defer=password_confirmation"/>
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