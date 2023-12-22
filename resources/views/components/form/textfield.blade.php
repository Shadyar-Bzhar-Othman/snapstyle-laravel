@props(['name'])

<x-form.field>
    <x-form.label :name="$name" />
    <input type="text" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}"
        class="rounded px-4 py-2 outline-none text-sm">

    <textarea id="{{ $name }}" name="{{ $name }}" rows="5"
        class="outline-none text-sm border border-gray-400 p-2 w-full rounded-xl">{{ old($name) }}</textarea>
</x-form.field>
