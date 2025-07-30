@props([
    'items',
])

@if (isset($items) && !$items->isEmpty())
	<div {{ $attributes->class(['accordion', 'shadow-sm']) }}>
		{{ $items }}
	</div>
@endif