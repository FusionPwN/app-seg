<div>
	<div>
		<x-partials.modal wire:ignore.self id="client-create-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("clients.form", [
					'modal_id' 	=> 'client-create-modal',
					'title' => __('backoffice.clients.create')
				])
			</x-slot:content>
		</x-partials.modal>
	</div>
	<div class="container-fluid {{ $base_classes ?? '' }}">
		<div class="row justify-content-center">
			<div class="col">
				<div class="row justify-content-between align-items-center mb-3">
					<div class="col-auto">
						<button class="btn btn-sm btn-outline-teal" data-bs-toggle="modal" data-bs-target="#client-create-modal">
							<i class="fa-solid fa-plus"></i>
							&nbsp;
							{{ __('backoffice.clients.create') }}
						</button>
					</div>
					<div class="col col-lg-3">
						<x-partials.inputs.floating-input id="search" type="search" name="search" :label="__('backoffice.global.search')" input-class="form-control-sm" autocomplete="search" wire="wire:model.live=q"/>
					</div>
				</div>	
				
				<div class="row justify-content-between align-items-center">
					<div class="col">
						<div class="row">
							<div class="col col-lg-2">
								<b><small>{{ __('backoffice.clients.name-number') }}</small></b>
							</div>
							<div class="col col-lg-2">
								<b><small>{{ __('backoffice.global.contacts') }}</small></b>
							</div>
							<div class="col-4 ms-auto d-none d-lg-flex">
								<b><small>{{ __('backoffice.global.created_updated_at') }}</small></b>
							</div>
							<div class="col-auto opacity-0">
								<i class="bi bi-chevron-right"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="list-group shadow-sm mb-3">
							@if ($clients->isNotEmpty())
								@foreach ($clients as $client)
									<a href="{{ route('clients.show', $client) }}" class="list-group-item list-group-item-action" aria-current="true">
										<div class="row justify-content-between align-items-center">
											<div class="col col-lg-2 text-truncate">
												<div class="text-primary"><b>{{ $client->name }}</b></div>
												<b><small class="text-secondary">{{ $client->nid }}</small></b>
											</div>
											<div class="col col-lg-2 text-truncate">
												<div class="text-secondary"><b>{{ $client->email }}</b></div>
												<b><small class="text-secondary">{{ $client->phone }}</small></b>
											</div>
											<div class="col-4 ms-auto d-none d-lg-flex">
												<div class="d-flex flex-column">
													<div>{{ __('backoffice.global.updated_at', ['date' => $client->updateDate()]) }}</div>
													<div class="text-secondary"><small>{{ __('backoffice.global.created_at', ['date' => $client->creationDate()]) }}</small></div>
												</div>
											</div>
											<div class="col-auto">
												<i class="bi bi-chevron-right"></i>
											</div>
										</div>
									</a>
								@endforeach
							@else
								<li class="list-group-item disabled p-4" aria-disabled="true">{{ __('backoffice.global.no-data') }}</li>
							@endif
						</div>
					</div>
				</div>

				{{ $clients->links() }}
			</div>
		</div>
	</div>
</div>