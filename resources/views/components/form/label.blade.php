@props(['name'])

<label for="{{ $name }}" {{ $attributes->merge(['class' => '']) }}>{{ ucfirst($name) }}</label>
