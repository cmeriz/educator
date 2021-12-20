@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-secondary-500']) }}>
    {{ $value ?? $slot }}
</label>
