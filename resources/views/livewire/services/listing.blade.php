<div>
	<div>
		<x-partials.modal wire:ignore.self id="service-create-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("services.form", [
					'modal_id' 	=> 'service-create-modal',
					'title' 	=> __('backoffice.services.create'),
					'lead' 		=> $lead
				])
			</x-slot:content>
		</x-partials.modal>
	</div>
	<div class="container-fluid {{ $base_classes ?? '' }}">
		<div class="row justify-content-center">
			<div class="col">
				<div class="row justify-content-between align-items-center mb-3">
					<div class="col-auto">
						<button class="btn btn-sm btn-outline-teal" data-bs-toggle="modal" data-bs-target="#service-create-modal">
							<i class="fa-solid fa-plus"></i>
							&nbsp;
							{{ __('backoffice.services.create') }}
						</button>
					</div>
					<div class="col col-lg-3">
						<x-partials.inputs.floating-input id="search" type="search" name="search" :label="__('backoffice.global.search')" input-class="form-control-sm" autocomplete="search" wire="wire:model.live=q"/>
					</div>
				</div>	
				
				<div class="row justify-content-between align-items-center ps-3 pe-3 d-none d-sm-flex">
					<div class="col">
						<b><small>{{ __('backoffice.services.address-number') }}</small></b>
					</div>
					<div class="col ms-auto">
						<b><small>{{ __('backoffice.global.created_updated_at') }}</small></b>
					</div>
					<div class="col-auto opacity-0">
						<i class="bi bi-chevron-right"></i>
					</div>
				</div>
				<div class="list-group shadow-sm mb-3">
					@if ($services->isNotEmpty())
						@foreach ($services as $service)
							<a href="{{ route('services.show', $service) }}" class="list-group-item list-group-item-action" aria-current="true">
								<div class="row justify-content-between align-items-center">
									<div class="col col-lg-2 text-truncate">
										<div class="text-primary">
											<b>{{ $service->address ?? '-' }}</b>
											@if (null !== $service->door) 
												<b>{{ $service->door ?? '-' }}</b>
											@endif
											@if (null !== $service->floor) 
												<b>{{ $service->floor ?? '-' }}º</b>
											@endif
										</div>
										<b><small class="text-secondary">{{ $service->nid }}</small></b>
									</div>
									<div class="col-4 ms-auto d-none d-lg-flex">
										<div class="d-flex flex-column">
											<div>{{ __('backoffice.global.updated_at', ['date' => $service->updateDate()]) }}</div>
											<div class="text-secondary"><small>{{ __('backoffice.global.created_at', ['date' => $service->creationDate()]) }}</small></div>
										</div>
									</div>
									<div class="col-auto">
										<i class="bi bi-chevron-right"></i>
									</div>
								</div>
							</a>
						@endforeach
					@else
						<li class="list-group-item disabled" aria-disabled="true">{{ __('backoffice.global.no-data') }}</li>
					@endif
				</div>

				{{ $services->links() }}
			</div>
		</div>
	</div>
</div>