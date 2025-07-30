@section('title')
    {{ __('backoffice.global.clients') }} / {{ $client->nid }}
@endsection

<div>
	<div>
		<button id="client-edit-btn" class="d-none" data-bs-toggle="modal" data-bs-target="#client-edit-modal">
			<i class="fa-regular fa-pen-to-square"></i>
			&nbsp;
			{{ __('backoffice.global.edit') }}
		</button>
		<x-partials.modal wire:ignore.self id="client-edit-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("clients.form", [
					'modal_id' 	=> 'client-edit-modal',
					'client' 	=> $client, 
					'title' 	=> __('backoffice.clients.edit-target', ['target' => $client->nid])
				])
			</x-slot:content>
		</x-partials.modal>
	</div>

	<x-partials.loading-screen wire:loading.flex/>
	<div wire:loading.class="opacity-50">
		<x-partials.show-actions :previous-url="route('clients.index')" modal-edit-btn="client-edit-btn" :show-delete="$client->leads->count() <= 0" type="client">
			<x-slot:title>
				{{ __('backoffice.global.clients') }} / {{ $client->nid }}
			</x-slot:title>
		</x-partials.show-actions>
		<x-partials.delete-modal type="client" :message="__('backoffice.global.delete-msg', ['slot1' => strtolower(__('backoffice.global.client')), 'slot2' => $client->nid])"/>

		<div class="container-fluid">
			<div class="row mt-4">
				<div class="col-12 col-lg-4">
					<x-widgets.cards.client-info :client="$client" :use-link="false"/>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12 col-lg-12">
					<x-partials.accordion>
						<x-slot:items>
							<x-partials.accordion.item>
								<x-slot:heading>
									{{ __('backoffice.global.description') }}
								</x-slot:heading>
								<x-slot:body>
									{{ null !== $client->description && !empty($client->description) ? $client->description : __('backoffice.global.no-description') }}
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
							{{ __('backoffice.global.leads') }}
						</x-slot:heading>
						<x-slot:body>
							@livewire('leads.listing', ['client' => $client, 'base_classes' => 'p-0'])
						</x-slot:body>
					</x-partials.card>
				</div>
			</div>
		</div>
	</div>

	
</div>