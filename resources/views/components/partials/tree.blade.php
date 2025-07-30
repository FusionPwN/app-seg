@props([
	'mode'			=> 'creation',
	'parent'		=> null,
	'branches' 		=> []
])

@aware(['isChild' => false])

<div {{ $attributes->class(['list-group']) }}>
	@foreach ($branches->sortBy('order') as $branch)
		@php
			$id = 'section-' . rand(100000, 999999)
		@endphp
		<x-partials.tree.item :id="$id" :loop="$loop" :mode="$mode" :parent="$parent" :branch="$branch" :is-child="$isChild"/>
	@endforeach
</div>