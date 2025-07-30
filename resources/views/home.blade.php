@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col">
				<div class="card">
					<div class="card-header">{{ __('Dashboard') }}</div>
					<div class="card-body">
						{{ __('Bem vindo!') }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
