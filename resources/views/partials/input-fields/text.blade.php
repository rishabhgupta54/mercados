<div class="mb-3">
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
        @if($errorHandling)
            <span class="required">*</span>
        @endif
    </label>
    <input id="{{ $name }}" type="text" class="form-control @error($name) is-invalid @enderror {{ $extraClasses }}" placeholder="{{ $label }}" name="{{ $name }}" value="{{ old($name) && !is_array(old($name)) ? old($name) : $default }}" {{ $disabled ? 'disabled' : '' }} >
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
