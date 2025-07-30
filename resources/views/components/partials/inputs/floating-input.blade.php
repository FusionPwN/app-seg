<div class="form-floating {{ $class ?? '' }}">
	<input
		@if(isset($id)) id="{{ $id }}" @endif
		type="{{ $type }}" 
		class="form-control {{ $inputClass ?? '' }} @error($name) is-invalid @enderror" 
		name="{{ $name }}" 
		value="{{ old($name) ?? $value ?? '' }}" 
		@if(isset($required) && $required) required @endif  
		@if(isset($autofocus) && $autofocus) autofocus @endif 
		@if(isset($autocomplete)) autocomplete="{{ $autocomplete }}" @endif 
		placeholder="{{ $placeholder ?? '' }}"
		@if(isset($wire)) {{ $wire }} @endif
	>
	<label for="{{ $id ?? $name }}">{{ $label ?? '' }}</label>

	@if (isset($showHiddenToggle) && $showHiddenToggle)
		<div class="input-toggler-group">
			<input type="checkbox" class="btn-check" id="toggler-check" onclick="window.toggleVisibility(this)" autocomplete="off">
			<label class="btn input-content-toggler" for="toggler-check">
				<i class="fa-solid fa-eye"></i>
				<i class="fa-solid fa-eye-slash"></i>
			</label>
		</div>
	@endif

	@error($name)
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>