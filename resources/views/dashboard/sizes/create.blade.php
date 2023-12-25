<x-layouts.dashboard>
    <x-form.form heading="Add Size Category" action="{{ route('dashboard.sizes.store') }}" method="POST">
        <x-form.input name="size" />

        <x-form.button class="self-center mt-2">Add Size Category</x-form.button>
    </x-form.form>
</x-layouts.dashboard>
