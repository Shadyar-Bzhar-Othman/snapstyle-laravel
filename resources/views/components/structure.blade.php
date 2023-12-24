@props(['heading', 'model'])

<div class="flex flex-col justify-start items-center">
    <div class="w-full flex justify-between items-center">
        <p class="text-center">{{ ucfirst($heading) }}</p>
        <a href="{{ route('dashboard.' . $model . '.create') }}" class="px-3 py-1 bg-primaryColor text-white rounded">Add
            {{ ucfirst($heading) }}</a>
    </div>
    <div class="w-full">
        {{ $slot }}
    </div>
</div>
