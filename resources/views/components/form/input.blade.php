@props(['name', 'value', 'type' => 'text', 'disable' => false])

<x-form.field>
    <x-form.label :name="$name" />

    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        value="{{ $value ?? (old($name) ?? '') }}"
        class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl"
        @if ($disable) disabled @endif>

    <x-form.error :name="$name" />
</x-form.field>
