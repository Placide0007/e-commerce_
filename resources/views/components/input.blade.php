@if ($withWrapper)
    <div class="input-wrapper">
@endif

@if ($withLabel)
    <label for="{{ $name }}">{{ $label }}</label>
@endif

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" {{ $attributes }} value="{{ old($name, $value ?? '')}}">

<div class="error">
    @error($name)
        {{ $message }}
    @enderror
</div>

@if ($withWrapper)
    </div>
@endif
