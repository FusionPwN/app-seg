@section('title')
    {{ __('backoffice.global.leads') }} / {{ $lead->nid }}
@endsection

@section('breadcrumbs')
	<x-partials.breadcrumbs :breadcrumbs="$lead->breadcrumbs()"/>
@endsection

<div>
	<div>
		<button id="lead-edit-btn" class="d-none" data-bs-toggle="modal" data-bs-target="#lead-edit-modal">
			<i class="fa-regular fa-pen-to-square"></i>
			&nbsp;
			{{ __('backoffice.global.edit') }}
		</button>
		<x-partials.modal wire:ignore.self id="lead-edit-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("leads.form", [
					'modal_id' 	=> 'lead-edit-modal',
					'lead' 		=> $lead, 
					'title' 	=> __('backoffice.leads.edit-target', ['target' => $lead->nid])
				])
			</x-slot:content>
		</x-partials.modal>
	</div>

	<x-partials.loading-screen wire:loading.flex/>
	<div wire:loading.class="opacity-50">
		<x-partials.show-actions :previous-url="route('leads.index')" modal-edit-btn="lead-edit-btn" :show-delete="$lead->services->count() <= 0" type="lead">
			<x-slot:title>
				{{ __('backoffice.global.leads') }} / {{ $lead->nid }}
			</x-slot:title>
		</x-partials.show-actions>
		<x-partials.delete-modal type="lead" :message="__('backoffice.global.delete-msg', ['slot1' => strtolower(__('backoffice.global.lead')), 'slot2' => $lead->nid])"/>

		<div class="container-fluid">
			<div class="row mt-4 gap-4 gap-lg-0">
				<div class="col-12 col-lg-4">
					<x-partials.card class="h-100">
						<x-slot:heading>
							{{ __('backoffice.global.info') }}
						</x-slot:heading>
						<x-slot:body>
							<div class="d-flex justify-content-between">
								<div>
									<h4 class="d-flex align-items-center gap-3">
										<i class="bi bi-diagram-3 fa-2x"></i>
										<small>{{ $lead->nid }}</small>
									</h4>
									<h3>{{ $lead->name }}</h3>
								</div>
								@if (null !== $lead->defaultMedia()?->url)
									<a class="spotlight" href="{{ $lead->defaultMedia()->url }}">
										<img src="{{ $lead->defaultThumbnail('130x98') }}">
									</a>
								@else
									<x-partials.image class="thumb-130">
										<x-slot:src>
											{{ Vite::asset('resources/images/no-image.png') }}
										</x-slot:src>
									</x-partials.image>
								@endif
							</div>
						</x-slot:body>
					</x-partials.card>
				</div>
				<div class="col-12 col-lg-4">
					<x-partials.card class="h-100">
						<x-slot:heading>
							{{ __('backoffice.global.status') }}
						</x-slot:heading>
						<x-slot:body>
							<h1>
								{!! $lead->status->icon() !!}
							</h1>
							<h3>{{ $lead->status->label() }}</h3>
							<div class="d-flex justify-content-between">
								<small>{{ __('backoffice.global.created_at', ['date' => '']) }}</small>
								<small>{{ $lead->creationDate() }}</small>
							</div>
							<div class="d-flex justify-content-between">
								<small>{{ __('backoffice.global.updated_at', ['date' => '']) }}</small>
								<small>{{ $lead->updateDate() }}</small>
							</div>
						</x-slot:body>
					</x-partials.card>
				</div>
				<div class="col-12 col-lg-4">
					<x-widgets.cards.client-info heading="{{ __('backoffice.leads.client-name') }}" :client="$lead->client"/>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12">
					<x-partials.card class="h-100">
						<x-slot:heading>
							{{ __('backoffice.global.media') }}
						</x-slot:heading>
						<x-slot:body class="overflow-card-body">
							<x-partials.static-media :model="$lead"/>
						</x-slot:body>
					</x-partials.card>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12">
					<x-partials.accordion>
						<x-slot:items>
							<x-partials.accordion.item extra-class="show">
								<x-slot:heading>
									{{ __('backoffice.global.description') }}
								</x-slot:heading>
								<x-slot:body>
									{{ null !== $lead->description && !empty($lead->description) ? $lead->description : __('backoffice.global.no-description') }}
								</x-slot:body>
							</x-partials.accordion.item>
						</x-slot:items>
					</x-partials.accordion>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12">
					<x-partials.card class="h-100">
						<x-slot:heading>
							{{ __('backoffice.global.services') }}
						</x-slot:heading>
						<x-slot:body>
							@livewire('services.listing', ['lead' => $lead, 'base_classes' => 'p-0'])
						</x-slot:body>
					</x-partials.card>
				</div>
			</div>
		</div>
	</div>
</div>