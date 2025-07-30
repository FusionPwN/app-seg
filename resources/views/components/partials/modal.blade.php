<div {{ $attributes->class(['modal']) }}>
	<div class="modal-dialog {{ $dialogClass }}">
		@if (!isset($content) || $content->isEmpty())
			<x-partials.modal.content>
				<x-slot:header>
					<x-partials.modal.header :title="$title"/>
				</x-slot:header>
				<x-slot:body>
					<x-partials.modal.body>
						<x-slot:content>
							{{ $body }}
						</x-slot:content>
					</x-partials.modal.body>
				</x-slot:body>
				<x-slot:footer>
					<x-partials.modal.footer>
						<x-slot:content>
							<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('backoffice.global.close') }}</button>
							<button type="button" class="btn btn-sm btn-primary">{{ $primaryButtonLabel }}</button>
						</x-slot:content>
					</x-partials.modal.footer>
				</x-slot:footer>
			</x-partials.modal.content>
		@else
			{{ $content }}
		@endif
	</div>
</div>