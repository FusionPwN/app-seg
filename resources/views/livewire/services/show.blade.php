@section('title')
    {{ __('backoffice.global.services') }} / {{ $service->nid }}
@endsection

@section('breadcrumbs')
	<x-partials.breadcrumbs :breadcrumbs="$service->breadcrumbs()"/>
@endsection

<div>
    <div>
		<button id="service-edit-btn" class="d-none" data-bs-toggle="modal" data-bs-target="#service-edit-modal">
			<i class="fa-regular fa-pen-to-square"></i>
			&nbsp;
			{{ __('backoffice.global.edit') }}
		</button>
		<x-partials.modal wire:ignore.self id="service-edit-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("services.form", [
					'modal_id' 	=> 'service-edit-modal',
					'service'	=> $service,
					'title' 	=> __('backoffice.services.edit-target', ['target' => $service->nid])
				])
			</x-slot:content>
		</x-partials.modal>
		<x-partials.modal wire:ignore.self id="section-create-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("sections.form", [
					'modal_id' 	=> 'section-create-modal',
					'title' 	=> __('backoffice.sections.create'),
					'parent' 	=> $service
				])
			</x-slot:content>
		</x-partials.modal>
		<x-partials.modal wire:ignore.self id="section-edit-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("sections.form", [
					'modal_id' 	=> 'section-edit-modal',
					'section'	=> new App\Models\Section(),
					'title' 	=> __('backoffice.sections.edit-target', ['target' => (new App\Models\Section())->nid])
				])
			</x-slot:content>
		</x-partials.modal>
	</div>

	<x-partials.loading-screen wire:loading.flex/>
	<div wire:loading.class="opacity-50">
		<x-partials.show-actions :previous-url="route('leads.show', $service->lead)" modal-edit-btn="service-edit-btn" type="service">
			<x-slot:title>
				{{ __('backoffice.global.services') }} / {{ $service->nid }}
			</x-slot:title>
		</x-partials.show-actions>
		<x-partials.delete-modal type="service" :message="__('backoffice.global.delete-msg', ['slot1' => strtolower(__('backoffice.global.service')), 'slot2' => $service->nid])"/>

		<div class="container-fluid">
			<div class="row mt-4 gy-4">
				<div class="col-12 col-lg-4">
					<x-partials.card class="h-100">
						<x-slot:heading>
							{{ __('backoffice.global.info') }}
						</x-slot:heading>
						<x-slot:body>
							<div class="d-flex justify-content-between">
								<div class="d-flex flex-column w-100">
									<div>
										<h4 class="d-flex align-items-center gap-3">
											<i class="fa-regular fa-file-lines fa-2x"></i>
											<small>{{ $service->nid }}</small>
										</h4>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.address') }}</small>
										<small>{{ $service->address ?? '-' }}</small>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.floor') }}</small>
										<small>{{ $service->floor ?? '-' }}</small>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.door') }}</small>
										<small>{{ $service->door ?? '-' }}</small>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.postal_code') }}</small>
										<small>{{ $service->postal_code ?? '-' }}</small>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.city') }}</small>
										<small>{{ $service->city ?? '-' }}</small>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.district') }}</small>
										<small>{{ $service->district ?? '-' }}</small>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.county') }}</small>
										<small>{{ $service->county ?? '-' }}</small>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.phone') }}</small>
										<small>{{ $service->phone ?? '-' }}</small>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.receiver_name') }}</small>
										<small>{{ $service->receiver_name ?? '-' }}</small>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.receiver_contact') }}</small>
										<small>{{ $service->receiver_contact ?? '-' }}</small>
									</div>
									<div class="d-flex justify-content-between">
										<small>{{ __('backoffice.global.receiver_relation') }}</small>
										<small>{{ $service->receiver_relation ?? '-' }}</small>
									</div>
								</div>
							</div>
						</x-slot:body>
					</x-partials.card>
				</div>
				<div class="col-12 col-lg-8">
					<x-partials.card class="h-100">
						<x-slot:heading>
							{{ __('backoffice.global.media') }}
						</x-slot:heading>
						<x-slot:body class="overflow-card-body">
							<x-partials.static-media :model="$service"/>
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
									{{ null !== $service->description && !empty($service->description) ? $service->description : __('backoffice.global.no-description') }}
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
							{{ __('backoffice.global.sections') }}
						</x-slot:heading>
						<x-slot:body>
							@livewire('sections.listing', [
								'parent' => $service, 
								'base_classes' => 'p-0',
								'base_element_id' => class_basename($service) . '_show_' . $service->id
							], key(rand(100000, 999999)))
						</x-slot:body>
					</x-partials.card>
				</div>
			</div>
		</div>
	</div>
</div>
