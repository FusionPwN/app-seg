<div class="form-floating {{ $class ?? '' }}" wire:ignore>
	<select 
		@if(isset($id)) id="{{ $id }}" @endif
		class="form-control {{ $inputClass ?? '' }} @error($name) is-invalid @enderror" 
		name="{{ $name }}" 
		value="{{ old($name) ?? $value ?? '' }}"
		@if(isset($required) && $required) required @endif  
		@if(isset($autofocus) && $autofocus) autofocus @endif 
		placeholder="{{ $placeholder ?? '' }}"
		@if(isset($wire)) {{ $wire }} @endif
		@if(isset($multiple) && $multiple) multiple @endif
	>
		@if (!isset($multiple) || (isset($multiple) && !$multiple))
			<option value="-1"></option>
		@endif
		@isset($options)
			@foreach ($options as $option)
				<option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
			@endforeach
		@endisset
	</select>
	<label for="{{ $id ?? $name }}">{{ $label ?? '' }}</label>
	@error($name)
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
	
	<script>
		window.addEventListener('DOMContentLoaded', function() {
			$(function() {
				let options= {
					theme: "bootstrap-5",
    				width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
					allowClear: true
				}

				@if (isset($parentId)) 
					options.dropdownParent = $('#{{ $parentId }}')
				@endif

				@if (!isset($multiple) || (isset($multiple) && !$multiple))
					// wtf? isto tem de estar aqui pq o parser banza-se e nao deteta o objeto abaixo
					options.placeholder = {
						id: '-1', // the value of the option
						text: '{{ __("backoffice.global.select-an-option") }}'
					}
				@endif

				$('#{{ $id }}').select2(options)

				@if (isset($wire))
				
					$('#{{ $id }}').on('change', function(e) {
						@this.set("{{ $name }}", $(this).val());
					})
				@endif
			})
		});
	</script>
</div>