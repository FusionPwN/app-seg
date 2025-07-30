<div class="offcanvas offcanvas-start side-menu" tabindex="-1" id="side-menu" aria-labelledby="side-menuLabel">
	<div class="offcanvas-header">
		<a class="navbar-brand ms-3 me-auto" href="{{ route('dashboard') }}">
			{{ config('app.name', 'Laravel') }}
		</a>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<ul class="nav nav-pills flex-column flex-grow-1">
			<li class="nav-item">
				<a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-current="dashboard" href="{{ route('dashboard') }}">
					<i class="bi bi-house fs-5"></i>
					{{ __('backoffice.global.dashboard') }}
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ request()->routeIs('clients.*') ? 'active' : '' }}" aria-current="clients" href="{{ route('clients.index') }}">
					<i class="bi bi-diagram-3 fs-5"></i>
					{{ __('backoffice.global.clients') }}
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ request()->routeIs('leads.*') ? 'active' : '' }}" aria-current="leads" href="{{ route('leads.index') }}">
					<i class="bi bi-diagram-3 fs-5"></i>
					{{ __('backoffice.global.leads') }}
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" aria-current="users" href="{{ route('users.index') }}">
					<i class="bi bi-people fs-5"></i>
					{{ __('backoffice.global.users') }}
				</a>
			</li>
		</ul>
	</div>
</div>