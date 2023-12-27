@props(['heading', 'type' => ''])


<form
    {{ $attributes->merge(['class' => 'lg:max-w-sm sm:max-w-auto mx-auto bg-greyColor border border-greyColor p-6 rounded flex flex-col items-center']) }}>
    @csrf
    @if (!empty($type))
        @method($type)
    @endif

    <h1 class="text-xl text-primaryColor font-bold self-center mb-2">{{ $heading }}</h1>
    {{ $slot }}
</form>
