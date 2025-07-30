@foreach ($breadcrumbs as $crumb)
	@if ($loop->index > 0)
		&nbsp;/&nbsp;
	@endif
	<a class="crumb text-muted" href="{{ $crumb->url }}">{{ $crumb->nid }}</a>
@endforeach