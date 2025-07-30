@props([
    'heading',
    'body',
])

<div {{ $attributes->class(['card', 'card-custom', 'shadow-sm']) }}>
	@if (isset($heading) && !$heading->isEmpty())
		<div {{ $heading->attributes->class(['card-header', 'bg-transparent', 'text-primary', 'fw-bold']) }}>
			{{ $heading }}
		</div>
	@endif
	@if (isset($body) && !$body->isEmpty())
		<div {{ $body->attributes->class(['card-body']) }}>
			{{ $body }}
		</div>
	@endif
</div>