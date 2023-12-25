<x-layouts.dashboard>
    <x-form.form heading="Add User" action="{{ route('dashboard.users.store') }}" method="POST">
        <x-form.input name="name" />
        <x-form.input name="email" type="email" />
        <x-form.input name="password" type="password" />
        <x-form.field>
            <x-form.label name="role" />
            <select name="role" id="role"
                class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
                <option value="1" @if (old('role') == 1) selected @endif>Admin</option>
                <option value="0" @if (old('role') == 0) selected @endif>Normal User</option>
            </select>
            <x-form.error name="role" />
        </x-form.field>

        <x-form.button class="self-center mt-2">Add User</x-form.button>
    </x-form.form>
</x-layouts.dashboard>
