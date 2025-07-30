<div class="spotlight-group">
	@forelse ($model->media as $media)
		<div class="spotlight-wrapper">
			<div class="spotlight clickable" data-src="{{ $media->url }}">
				<div class="spotlight-overlay rounded"></div>
				<img class="rounded" src="{{ $media->thumbnailUrl('160x160', $model) }}">
			</div>
		</div>
	@empty
		{{ __('backoffice.global.no-media') }}
	@endforelse
</div>