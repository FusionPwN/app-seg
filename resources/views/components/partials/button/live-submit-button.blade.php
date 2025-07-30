<button type="submit" {{ $attributes->class(['btn']) }}class="btn btn-sm btn-primary" wire:loading.attr="disabled" {{ $attributes }}>
	<span class="align-items-center" wire:loading.flex>
		<div class="spinner-grow spinner-grow-sm" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
		&nbsp;
		{{ $name }}
	</span>
	<span wire:loading.remove>
		{{ $name }}
	</span>
</button>