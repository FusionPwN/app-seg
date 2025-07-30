@props([
	'id'			=> null,
	'loop'			=> null,
	'mode'			=> 'creation',
	'parent'		=> null,
	'branch' 		=> [],
])

@aware(['isChild' => false])

<div class="list-group-item list-group-item-action" data-model="{{ class_basename($branch) }}" data-section-id="{{ $branch->id }}" data-order="{{ $branch->order }}">
	<div class="row">
		<div class="col-auto pe-0 d-none">
			<span class="branch-grip">
				<i class="fas fa-grip-vertical"></i>
			</span>
		</div>
		<div class="col">
			<div class="row justify-content-between align-items-center">
				<div class="col-auto branch-slot">
					@if ($isChild)
						@if ($loop->last)
							<x-partials.misc._branch-last-right/>
						@else
							<x-partials.misc._branch-middle-right/>
						@endif
					@else
						<x-partials.misc._branch-empty/>
					@endif
				</div>

				<div class="col col-lg-3 position-relative text-truncate">
					<a href="{{ route('sections.show', $branch) }}" class="d-block stretched-link text-primary text-decoration-none">
						<b>{{ $branch->name ?? '-'}}</b>
					</a>
					<b><small class="text-secondary">{{ $branch->nid }}</small></b>
				</div>
				<div class="col-1 ms-auto">
					<span class="badge @if ($branch->children->count() > 0) text-bg-primary @else text-bg-danger @endif">{{ $branch->children->count() }}</span>
				</div>
				<div class="col-4 ms-auto d-none d-lg-flex">
					<div class="d-flex flex-column">
						<div>{{ __('backoffice.global.updated_at', ['date' => $branch->updateDate()]) }}</div>
						<div class="text-secondary"><small>{{ __('backoffice.global.created_at', ['date' => $branch->creationDate()]) }}</small></div>
					</div>
				</div>
				<div class="col-auto">
					<a href="{{ route('sections.show', $branch) }}" class="btn btn-sm btn-outline-info border-0">
						<i class="fa-regular fa-eye"></i>
					</a>
					<button class="btn btn-sm btn-outline-warning border-0" wire:click="editSection('{{ class_basename($branch->parent->first()) }}', {{ $branch->parent->first()->id }}, {{ $branch->id }})">
						<i class="fa-regular fa-pen-to-square"></i>
					</button>
					<button class="btn collapsable-chevron" @if ($branch->children->count() == 0) disabled @endif data-bs-toggle="collapse" data-bs-target="#{{ $id }}">
						<i class="bi bi-chevron-right"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	
	<x-partials.tree :parent="$branch" :mode="$mode" :branches="$branch->children" :is-child="true" class="sortable-list collapse show" id="{{ $id }}"  data-parent-model="{{ class_basename($branch) }}" data-parent-id="{{ $branch->id }}"/> {{-- {{ $branch->children->count() == 0 ? 'show' : '' }} --}}
</div>