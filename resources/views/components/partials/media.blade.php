@if ($model->media->count() > 0)
	<x-partials.accordion class="mb-3">
		<x-slot:items>
			<x-partials.accordion.item>
				<x-slot:heading>
					{{ __('backoffice.global.media') }}
				</x-slot:heading>
				<x-slot:body>
					<div class="spotlight-group">
						@foreach ($model->media as $media)
							<div class="spotlight-wrapper">
								<div class="btn-group dropstart">
									<button class="filepond--file-action-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
											<path d="M11.586 13l-2.293 2.293a1 1 0 0 0 1.414 1.414L13 14.414l2.293 2.293a1 1 0 0 0 1.414-1.414L14.414 13l2.293-2.293a1 1 0 0 0-1.414-1.414L13 11.586l-2.293-2.293a1 1 0 0 0-1.414 1.414L11.586 13z" fill="currentColor" fill-rule="nonzero"></path>
										</svg>
										<span>Remover</span>
									</button>
									<ul class="dropdown-menu">
										<li><span class="dropdown-item-text">{{ __('backoffice.global.delete-upload') }}</span></li>
										<li><hr class="dropdown-divider"></li>
										<li><button class="dropdown-item" type="button">{{ __('backoffice.global.cancel') }}</button></li>
										<li><button class="dropdown-item text-light bg-danger" type="button" wire:click="deleteMedia({{ $media->id }})">{{ __('backoffice.global.confirm') }}</button></li>
									</ul>
								</div>
								<div class="spotlight clickable" data-src="{{ $media->url }}">
									<div class="spotlight-overlay rounded"></div>
									<img class="rounded" src="{{ $media->thumbnailUrl('160x160', $model) }}">
								</div>
							</div>
						@endforeach
					</div>
				</x-slot:body>
			</x-partials.accordion.item>
		</x-slot:items>
	</x-partials.accordion>
@endif

@if (!isset($allowUpload) || (isset($allowUpload) && $allowUpload))
	<x-filepond::upload wire:model="media" multiple acceptedFileTypes="image/*, video/*;capture=camera"/>
	@error('media.*') <span class="error">{{ $message }}</span> @enderror
@endif