<x-layouts.dashboard>
    <x-form.form heading="Update Category" action="{{ route('dashboard.categories.update', ['category' => $category]) }}"
        method="POST" type="PATCH">
        <x-form.input name="category" :value="$category->name" />

        <x-form.button class="self-center mt-2">Update Category</x-form.button>
    </x-form.form>
</x-layouts.dashboard>
