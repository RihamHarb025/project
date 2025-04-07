@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-green-950 dark:text-green-950 !important']) }}>
    {{ $value ?? $slot }}
</label>
