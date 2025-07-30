
@props([
    'src',
])

<div {{ $attributes->class(['image-container', 'rounded']) }}>
	<img src="{{ $src }}" alt="{{ $alt ?? '' }}">
</div>