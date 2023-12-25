@props(['name', 'value'])

<x-form.field>
    <x-form.label :name="$name" />

    <textarea id="{{ $name }}" name="{{ $name }}" rows="5"
        class="outline-none text-sm border border-gray-400 p-2 w-full rounded-xl">{{ $value ?? old($name) }}</textarea>

    <x-form.error :name="$name" />
</x-form.field>
