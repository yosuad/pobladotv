@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'form-group__input form-group__input--with-icon']) }}>