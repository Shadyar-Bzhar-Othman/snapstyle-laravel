<x-layouts.dashboard>
    <x-form.form heading="Update Sub Category"
        action="{{ route('dashboard.subcategories.update', ['subcategory' => $subcategory]) }}" method="POST"
        type="PATCH">
        <x-form.input name="subcategory" :value="$subcategory->name" />
        <x-form.field>
            <x-form.label name="category" />
            <select name="category" id="category"
                class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id === $subcategory->category_id) selected @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            <x-form.error name="category" />
        </x-form.field>

        <x-form.button class="self-center mt-2">Update Sub Category</x-form.button>
    </x-form.form>
</x-layouts.dashboard>
