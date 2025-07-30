@section('title')
    {{ __('backoffice.global.users') }}
@endsection

<div>
	<div>
		<x-partials.modal wire:ignore.self id="user-create-modal" class="fade" dialog-class="modal-side modal-lg modal-dialog-scrollable modal-fullscreen-xl-down" primary-button-type="submit" data-bs-backdrop="static" data-bs-keyboard="false">
			<x-slot:content>
				@livewire("users.form", [
					'modal_id' 	=> 'user-create-modal',
					'title' 	=> __('backoffice.users.create')
				], key('user-create-form'))
			</x-slot:content>
		</x-partials.modal>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col">
				<div class="row justify-content-between align-items-center mb-3">
					<div class="col-auto">
						<button class="btn btn-sm btn-outline-primary" wire:click="create">
							<i class="fa-solid fa-plus"></i>
							&nbsp;
							{{ __('backoffice.users.create') }}
						</button>
					</div>
					<div class="col-3">
						<x-partials.inputs.floating-input id="search" type="search" name="search" :label="__('backoffice.global.search')" input-class="form-control-sm" autocomplete="search" wire="wire:model.live=q"/>
					</div>
				</div>	
				
				<div class="list-group shadow-sm mb-3">
					@if ($users->isNotEmpty())
						@foreach ($users as $user)
							<a href="#" class="list-group-item list-group-item-action" aria-current="true" wire:click="edit({{ $user->id }})">
								<div class="row align-items-center">
									<div class="col-auto">
										<div><b>{{ $user->name }}</b></div>
										<small class="text-secondary">{{ $user->email }}</small>
									</div>
									<div class="col-auto ms-auto">
										<i class="bi bi-chevron-right"></i>
									</div>
								</div>
							</a>
						@endforeach
					@else
						<li class="list-group-item disabled" aria-disabled="true">{{ __('backoffice.global.no-data') }}</li>
					@endif
				</div>

				{{ $users->links() }}
			</div>
		</div>
	</div>
</div>