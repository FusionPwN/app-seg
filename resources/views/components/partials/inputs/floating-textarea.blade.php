<div class="form-floating {{ $class ?? '' }}">
	<textarea 
		@if(isset($id)) id="{{ $id }}" @endif
		class="form-control {{ $inputClass ?? '' }} @error($name) is-invalid @enderror" 
		name="{{ $name }}" 
		@if(isset($required) && $required) required @endif  
		@if(isset($autofocus) && $autofocus) autofocus @endif 
		placeholder="{{ $placeholder ?? '' }}"
		@if(isset($wire)) {{ $wire }} @endif
	>{{ old($name) ?? $value ?? '' }}</textarea>
	<label for="{{ $id ?? $name }}">{{ $label ?? '' }}</label>
	@error($name)
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>