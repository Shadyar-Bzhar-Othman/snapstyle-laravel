<x-layouts.dashboard>
    <x-form.form heading="Add Sub Category" action="{{ route('dashboard.subcategories.store') }}" method="POST">
        <x-form.input name="subcategory" />
        <x-form.field>
            <x-form.label name="category" />
            <select name="category" id="category"
                class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-form.error name="category" />
        </x-form.field>

        <x-form.button class="self-center mt-2">Add Sub Category</x-form.button>
    </x-form.form>
</x-layouts.dashboard>
