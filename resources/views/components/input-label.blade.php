@props(['value'])

<label {{ $attributes->merge(['class' => 'form-group__label']) }}>
    {{ $value ?? $slot }}
</label>