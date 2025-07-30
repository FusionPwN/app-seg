<div>
	<div class="container-fluid {{ $base_classes ?? '' }}">
		<div class="row justify-content-center">
			<div class="col">
				<div class="row justify-content-between align-items-center mb-3 gap-2">
					<div class="col-auto">
						<button class="btn btn-sm btn-outline-teal" @if (!$is_modal) data-bs-toggle="modal" data-bs-target="#section-create-modal" @else wire:click="newSection('{{ class_basename($parent) }}', {{ $parent->id }})" @endif @if ($mode == 'sort') disabled @endif>
							<i class="fa-solid fa-plus"></i>
							&nbsp;
							{{ __('backoffice.sections.create') }}
						</button>
					</div>
					<div class="col-auto">
						{{-- <x-partials.inputs.floating-input id="search" type="search" name="search" :label="__('backoffice.global.search')" input-class="form-control-sm" autocomplete="search" wire="wire:model.live=q"/> --}}

						<div class="d-flex flex-row gap-2">
							<label class="form-check-label" for="flexSwitchCheckDefault">{{ __('backoffice.global.sort-mode') }}</label>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" role="switch" wire:model.change="mode" value="creation">
							</div>
						</div>
					</div>
				</div>

				<x-partials.tree wire:ignore id="{{ $base_element_id }}" class="sortable-root sortable-list" :branches="$sections" :mode="$mode" :parent="$parent" data-parent-model="{{ class_basename($parent) }}" data-parent-id="{{ $parent->id }}"/>
				<x-partials.misc._branch-last-right class="reference-branch_{{ $base_element_id }} d-none"/>
				<x-partials.misc._branch-middle-right class="reference-branch_{{ $base_element_id }} d-none"/>
				<x-partials.misc._branch-empty class="reference-branch_{{ $base_element_id }} d-none"/>
				<script>
					let inUse_{{ $base_element_id }} = []
					let base_element_id_{{ $base_element_id }} = '{{ $base_element_id }}'
					let mode_{{ $base_element_id }} = 'creation'
					let sortables_{{ $base_element_id }} = []

					function initLists_{{ $base_element_id }}() {
						sortables_{{ $base_element_id }} = []
						let lists = $('#{{ $base_element_id }}.sortable-list')
						lists = $.merge(lists, $('#{{ $base_element_id }} .sortable-list'))

						for (let i = 0; i < lists.length; i++) {
							sortables_{{ $base_element_id }}.push(new Sortable(lists[i], {
								group: 'nested_{{ $base_element_id }}',
								handle: '.branch-grip',
								animation: 150,
								fallbackOnBody: true,
								swapThreshold: 0.65,
								onChange: e => {
									let el = $(e.item)
									let to = $(e.to)
									let branch = false

									if (to.hasClass('sortable-root')) {
										branch = $('.reference-branch_{{ $base_element_id }}.tree-branch.tree-branch-empty').clone()
									} else if (to.children().length - 1 == e.newIndex) {
										branch = $('.reference-branch_{{ $base_element_id }}.tree-branch.tree-branch-last-right').clone()
									} else {
										branch = $('.reference-branch_{{ $base_element_id }}.tree-branch.tree-branch-middle-right').clone()
									}

									if (branch) {
										branch.removeClass('d-none reference-branch_{{ $base_element_id }}')
										el.find('.tree-branch').remove()
										el.find('.branch-slot').append(branch)
									}	
								},
								onSort: e => {
									let mirror_element = base_element_id_{{ $base_element_id }}

									if (mirror_element.includes('form')) {
										mirror_element = mirror_element.replace('form', 'show')
									} else if (mirror_element.includes('show')) {
										mirror_element = mirror_element.replace('show', 'form')
									}

									let target_model 	= $(e.item).data('model')
									let target_id 		= $(e.item).data('section-id')
									let from_model 		= $(e.from).data('parent-model')
									let from_id 		= $(e.from).data('parent-id')
									let to_model 		= $(e.to).data('parent-model')
									let to_id 			= $(e.to).data('parent-id')

									let identifier 		= `${ target_model }-${ target_id }`

									if (!inUse_{{ $base_element_id }}.includes(identifier)) {
										inUse_{{ $base_element_id }}.push(identifier)
										@this.handleMove(target_model, target_id, from_model, from_id, to_model, to_id, e.newIndex)
									}
								}
							}))

							lists[i].addEventListener('hide.bs.collapse', event => {
								let children = event.target.querySelectorAll(':scope > .list-group-item');

								if (children.length == 0) {
									event.preventDefault()
								}	
							})
						}
					}

					function syncLists_{{ $base_element_id }}() {
						let mirror_element = base_element_id_{{ $base_element_id }}

						if (mirror_element.includes('form')) {
							mirror_element = mirror_element.replace('form', 'show')
						} else if (mirror_element.includes('show')) {
							mirror_element = mirror_element.replace('show', 'form')
						}

						let clones = $('#{{ $base_element_id }}.sortable-root').children().clone()
						$(`#${ mirror_element }.sortable-root`).empty().append(clones)

						eval(`initLists_${ base_element_id_{{ $base_element_id }} }`)(true)
						eval(`initLists_${ mirror_element }`)(true)
					}

					function updateBranchSymbols_{{ $base_element_id }}() {
						$('#{{ $base_element_id }} .branch-grip').parent().each((index, item) => {
							if (mode_{{ $base_element_id }} == 'sort') {
								$(item).removeClass('d-none')
							} else {
								$(item).addClass('d-none')
							}
						})
					}

					function updateBadgeCount_{{ $base_element_id }}(parent, element) {
						const children = element.querySelectorAll(':scope > .list-group-item');
						const childCount = children.length;
						
						if (parent) {
							const badge = parent.querySelector('.badge');
							if (badge) {
								badge.textContent = childCount.toString();
								if (childCount > 0) {
									badge.classList.remove('text-bg-danger');
									badge.classList.add('text-bg-primary');
								} else {
									badge.classList.remove('text-bg-primary');
									badge.classList.add('text-bg-danger');
								}
							}
						}
						children.forEach(child => {
							updateBadgeCount_{{ $base_element_id }}(child, child.querySelector('.list-group'));
						});
					}

					function updateBranchSlots_{{ $base_element_id }}() {
						let elems = $('#{{ $base_element_id }} .list-group-item')

						elems.each((i, el) => {
							el = $(el)
							let parent = el.parent()
							let branch = false

							if (parent.hasClass('sortable-root')) {
								branch = $('.reference-branch_{{ $base_element_id }}.tree-branch.tree-branch-empty').clone()
							} else if (parent.children().length - 1 == $(el).index()) {
								branch = $('.reference-branch_{{ $base_element_id }}.tree-branch.tree-branch-last-right').clone()
							} else {
								branch = $('.reference-branch_{{ $base_element_id }}.tree-branch.tree-branch-middle-right').clone()
							}

							if (branch) {
								branch.removeClass('d-none reference-branch_{{ $base_element_id }}')
								el.find('.tree-branch').remove()
								el.find('.branch-slot').append(branch)
							}	
						})

						let lists = $('#{{ $base_element_id }} .list-group')

						lists.each((i, el) => {
							el = $(el)

							if (el.children().length > 0) {
								el.closest('.list-group-item').find('.collapsable-chevron').attr('disabled', false)
							} else {
								el.closest('.list-group-item').find('.collapsable-chevron').attr('disabled', true)
							}
							
						})
					}
					
					window.addEventListener('DOMContentLoaded', function() {
						initLists_{{ $base_element_id }}()

						Livewire.on('tree-list:update-in-use', event => {
							console.log(mode_{{ $base_element_id }}, event.data.element_id, base_element_id_{{ $base_element_id }})
							if (event.data.element_id != base_element_id_{{ $base_element_id }}) {
								setTimeout(function() {
									updateBranchSymbols_{{ $base_element_id }}()
								}, 100)
								return
							} 

							inUse_{{ $base_element_id }} = inUse_{{ $base_element_id }}.filter(function(el) { return el !== event.data.identifier })
							updateBadgeCount_{{ $base_element_id }}(null, document.querySelector('#{{ $base_element_id }}.sortable-root'))
							updateBranchSlots_{{ $base_element_id }}()

							syncLists_{{ $base_element_id }}()
						})

						Livewire.on('section-created', event => {
							if (!event.data.item) return

							let item = $(event.data.item)
							let root = $(`#{{ $base_element_id }} .list-group.sortable-list[data-parent-model=${ event.data.parent_model }][data-parent-id=${ event.data.parent_id }]`)
							
							if (root.length == 0) {
								root = $('#{{ $base_element_id }}.sortable-root')
							}
							
							root.append(item)

							updateBadgeCount_{{ $base_element_id }}(null, document.querySelector('#{{ $base_element_id }}.sortable-root'))
							updateBranchSlots_{{ $base_element_id }}()

							initLists_{{ $base_element_id }}()
						})

						Livewire.on('tree-list:mode-update', event => {
							if (event.data.element_id != base_element_id_{{ $base_element_id }}) return;

							mode_{{ $base_element_id }} = event.data.mode
							updateBranchSymbols_{{ $base_element_id }}()
						})

						
					})
				</script>

				{{-- {{ $sections->links() }} --}}
			</div>
		</div>
	</div>
</div>
