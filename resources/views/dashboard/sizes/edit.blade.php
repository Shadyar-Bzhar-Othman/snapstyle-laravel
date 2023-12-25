<x-layouts.dashboard>
    <x-form.form heading="Update Size Category" action="{{ route('dashboard.sizes.update', ['size' => $size]) }}"
        method="POST" type="PATCH">
        <x-form.input name="size" :value="$size->name" />

        <x-form.button class="self-center mt-2">Update Size Category</x-form.button>
    </x-form.form>
</x-layouts.dashboard>
