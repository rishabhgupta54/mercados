<div class="mb-3">
    <label for="{{ $name }}"  class="form-label">
        {{ $label }}
        @if($errorHandling)
            <span class="required">*</span>
        @endif
    </label>
    <select id="{{ $name }}" class="form-control @error($name) is-invalid @enderror {{ $extraClasses }}" name="{{ $name }}" data-placeholder="{{ $label }}">
        <option></option>
        @foreach($options as $option)
            @if(in_array($option->{$optionValue}, $optionsSkip))
                @continue
            @endif
            <option value="{{ $option->{$optionValue} }}" {{ $option->{$optionValue} == $selectedValue ? 'selected' : '' }}>{{ $option->{$optionText} }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
