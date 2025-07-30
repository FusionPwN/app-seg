<div class="form-floating {{ $class ?? '' }}">
	<select 
		@if(isset($id)) id="{{ $id }}" @endif
		class="form-control {{ $inputClass ?? '' }} @error($name) is-invalid @enderror" 
		name="{{ $name }}" 
		value="{{ old($name) ?? $value ?? '' }}"
		@if(isset($required) && $required) required @endif  
		@if(isset($autofocus) && $autofocus) autofocus @endif 
		placeholder="{{ $placeholder ?? '' }}"
		@if(isset($wire)) {{ $wire }} @endif
	>
		@foreach ($options as $option)
			<option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
		@endforeach
	</select>
	<label for="{{ $id ?? $name }}">{{ $label ?? '' }}</label>
	@error($name)
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>