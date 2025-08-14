@if ($withWrapper)
    <div class="input-wrapper">
@endif

@if ($withLabel)
    <label for="{{ $name }}">{{ $label }}</label>
@endif


<textarea name="{{ $name }}" id="{{ $name }}"  cols="30" rows="10">{{ old($name, $value)}}</textarea>


<div class="error">
    @error($name)
        {{ $message }}
    @enderror
</div>

@if ($withWrapper)
    </div>
@endif
