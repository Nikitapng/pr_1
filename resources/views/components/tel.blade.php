@props(['disabled' => false])

<input x-data x-mask="+7(999)999-99-99" type="tel" @disabled($disabled) {{ $attributes->merge(['class' => 'form-control']) }}>
