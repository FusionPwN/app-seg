<x-partials.card class="h-100">
	<x-slot:heading>
		{{ $heading }}
	</x-slot:heading>
	<x-slot:body>
		<div class="d-flex justify-content-between">
			<div class="d-flex flex-column w-100">
				<div>
					<h4 class="d-flex align-items-center gap-3">
						<i class="fa-solid fa-id-badge fa-2x"></i>
						@if ($useLink)
							<a href="{{ route('clients.show', $client) }}">
								<small>{{ $client->nid }}</small>
							</a>
						@else
							<small>{{ $client->nid }}</small>
						@endif
					</h4>
				</div>
				<div class="d-flex flex-row justify-content-between">
					<div>
						<h3>{{ $client->name }}</h3>
					</div>
					<div class="d-flex flex-column justify-content-end align-items-end">
						<small>
							<a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
						</small>
						<small>
							<a href="tel:{{ $client->phone }}">{{ $client->phone }}</a>
						</small>
					</div>
				</div>
			</div>
			
		</div>
	</x-slot:body>
</x-partials.card>