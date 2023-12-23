@props(['name', 'field', 'value' => ''])

<div>
    <input type="checkbox" id="{{ $name }}" name="{{ $field }}" value="{{ $value }}"
        class="outline-none text-sm border border-gray-400 rounded-xl" onclick="addSizeEntry('{{ $name }}')">

    <x-form.label :name="$name" />
</div>
