@php
	$rand_id = 'collapse-' . rand(10000, 99999);
@endphp

<div {{ $attributes->class(['accordion-item']) }}>
	<h2 class="accordion-header">
		<button class="accordion-button text-primary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $rand_id }}" aria-expanded="true" aria-controls="{{ $rand_id }}">
			{{ $heading }}
		</button>
	</h2>
	<div id="{{ $rand_id }}" class="accordion-collapse collapse {{ $extraClass ?? '' }}" data-bs-parent="#accordionExample">
		<div {{ $body->attributes->class(['accordion-body']) }}>
			{{ $body }}
		</div>
	</div>
</div>