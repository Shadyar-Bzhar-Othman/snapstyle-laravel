<x-layouts.main>
    <x-form.form heading="Login" action="{{ route('login') }}" method="POST">
        <x-form.input name="email" type="email" />
        <x-form.input name="password" type="password" />

        <x-form.button class="self-center mt-2">Login</x-form.button>
    </x-form.form>
</x-layouts.main>
