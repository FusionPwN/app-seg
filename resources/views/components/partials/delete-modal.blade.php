<x-partials.modal wire:ignore.self id="{{ $type }}-delete-modal" class="fade" dialog-class="modal-dialog-centered" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
	<x-slot:content>
		<x-partials.modal.content>
			<x-slot:header>
				<x-partials.modal.header :title="__('backoffice.global.attention')"/>
			</x-slot:header>
			<x-slot:body>
				<x-partials.modal.body>
					<x-slot:content>
						{{ $message }}
					</x-slot:content>
				</x-partials.modal.body>
			</x-slot:body>
			<x-slot:footer>
				<x-partials.modal.footer>
					<x-slot:content>
						<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('backoffice.global.cancel') }}</button>
						<x-partials.button.live-submit-button class="btn btn-sm btn-danger" :name="__('backoffice.global.delete')" wire:click="delete()"/>
					</x-slot:content>
				</x-partials.modal.footer>
			</x-slot:footer>
		</x-partials.modal.content>
	</x-slot:content>
</x-partials.modal>