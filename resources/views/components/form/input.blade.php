@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label :name="$name" />

    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) ?? '' }}"
        class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">

    <x-form.error :name="$name" />
</x-form.field>
