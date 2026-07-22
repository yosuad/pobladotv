@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'auth__status']) }}>
        {{ $status }}
    </div>
@endif