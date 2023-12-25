<x-layouts.dashboard>
    <x-form.form heading="Add Category" action="{{ route('dashboard.categories.store') }}" method="POST">
        <x-form.input name="category" />

        <x-form.button class="self-center mt-2">Add Category</x-form.button>
    </x-form.form>
</x-layouts.dashboard>
