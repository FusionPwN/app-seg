<div {{ $attributes->class(['d-flex', 'flex-column', 'gap-2', 'fixable', 'p-3']) }}>
	@if (!$hideTitle)
		<h4 class="m-0 d-block d-lg-none">{{ $title ?? '' }}</h4>
	@endif

	<div class="d-flex gap-2">
		<a href="#" onclick="window.history.go(-1); return false;" class="btn btn-sm btn-outline-primary">
			<i class="fa-solid fa-chevron-left"></i>
			&nbsp;
			{{ __('backoffice.global.back') }}
		</a>

		@if (!$hideTitle)
			<h4 class="m-0 d-none d-lg-block">{{ $title ?? '' }}</h4>
		@endif
		
		@if (!$hideCrud)
			<button class="btn btn-sm btn-outline-warning ms-auto" x-on:click="document.getElementById('{{ $modalEditBtn }}').click()">
				<i class="fa-regular fa-pen-to-square"></i>
				&nbsp;
				{{ __('backoffice.global.edit') }}
			</button>
			@if ($showDelete)
				<button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#{{ $type }}-delete-modal">
					<i class="fa-solid fa-trash"></i>
					&nbsp;
					{{ __('backoffice.global.delete') }}
				</button>
			@endif
		@endif
	</div>
	<script>
		const stickyElm = document.querySelector('.fixable')
		const headerElm = document.querySelector('.top-menu')
		window.addEventListener("scroll", () => {
			const stickyTop = parseInt(window.getComputedStyle(stickyElm).top);
			const currentTop = stickyElm.getBoundingClientRect().top;
			stickyElm.classList.toggle('shadow-sm', currentTop === stickyTop)
			stickyElm.classList.toggle('fixed', currentTop === stickyTop)
			headerElm.classList.toggle('shadow-sm', !(currentTop === stickyTop))
		});
	</script>
</div>