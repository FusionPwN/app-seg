@section('title')
    {{ __('backoffice.global.leads') }}
@endsection

<div>
	<div>
		<x-partials.modal wire:ignore.self id="lead-create-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("leads.form", [
					'modal_id' 	=> 'lead-create-modal',
					'title' => __('backoffice.leads.create')
				])
			</x-slot:content>
		</x-partials.modal>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col">
				<div class="row justify-content-between align-items-center mb-3">
					<div class="col-auto">
						<button class="btn btn-sm btn-outline-teal" data-bs-toggle="modal" data-bs-target="#lead-create-modal">
							<i class="fa-solid fa-plus"></i>
							&nbsp;
							{{ __('backoffice.leads.create') }}
						</button>
					</div>
					<div class="col col-lg-3">
						<x-partials.inputs.floating-input id="search" type="search" name="search" :label="__('backoffice.global.search')" input-class="form-control-sm" autocomplete="search" wire="wire:model.live=q"/>
					</div>
				</div>	
				
				<div class="row justify-content-between align-items-center ps-3 pe-3 d-none d-lg-flex">
					<div class="col">
						<div class="row">
							<div class="col-2">
								<b><small>{{ __('backoffice.leads.name-number') }}</small></b>
							</div>
							<div class="col-2">
								<b><small>{{ __('backoffice.leads.client-name') }}</small></b>
							</div>
							<div class="col-2">
								<b><small>{{ __('backoffice.global.status') }}</small></b>
							</div>
							<div class="col-auto d-none d-lg-flex">
								<b><small>{{ __('backoffice.global.city') }}</small></b>
							</div>
							<div class="col-2 ms-auto d-none d-lg-flex">
								<b><small>{{ __('backoffice.global.created_updated_at') }}</small></b>
							</div>
							<div class="col-auto opacity-0">
								<i class="bi bi-chevron-right"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="list-group shadow-sm mb-3">
					@if ($leads->isNotEmpty())
						@foreach ($leads as $lead)
							<a href="{{ route('leads.show', $lead) }}" class="list-group-item list-group-item-action" aria-current="true">
								<div class="row justify-content-between align-items-center">
									<div class="col">
										<div class="row">
											<div class="col-auto col-lg-2">
												<div class="text-primary"><b>{{ $lead->name }}</b></div>
												<b><small class="text-secondary">{{ $lead->nid }}</small></b>
											</div>
											<div class="w-100 mb-2 d-block d-lg-none"></div>
											<div class="col-auto col-lg-2">
												<div class="text-secondary"><b>{{ $lead->client->name ?? '-' }}</b></div>
												<b><small class="text-secondary">{{ $lead->client->nid ?? '-' }}</small></b>
											</div>
											<div class="w-100 mb-2 d-block d-lg-none"></div>
											<div class="col-auto col-lg-2">
												<span class="me-1">{!! $lead->status->icon() !!}</span>
												<span><small>{!! $lead->status->label() !!}</small></span>
											</div>
											<div class="col-auto d-none d-lg-flex">
												<span>{{ $lead->city ?? '-' }}</span>
											</div>
											<div class="col-2 ms-auto d-none d-lg-flex">
												<div class="d-flex flex-column">
													<div>{{ __('backoffice.global.updated_at', ['date' => $lead->updateDate()]) }}</div>
													<div class="text-secondary"><small>{{ __('backoffice.global.created_at', ['date' => $lead->creationDate()]) }}</small></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-auto">
										<div class="col-auto">
											<i class="bi bi-chevron-right"></i>
										</div>
									</div>
								</div>
							</a>
						@endforeach
					@else
						<li class="list-group-item disabled" aria-disabled="true">{{ __('backoffice.global.no-data') }}</li>
					@endif
				</div>

				{{ $leads->links() }}
			</div>
		</div>
	</div>
</div>