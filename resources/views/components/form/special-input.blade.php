@props(['name', 'field'])

<x-form.field id="number{{ $name }}">
    <x-form.label :name="$name" />

    <input type="number" id="{{ $name }}" name="{{ $field . '[' . $name . ']. ?>' }}" value="{{ 1 }}"
        oninput="validateInput(this)" class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
</x-form.field>
