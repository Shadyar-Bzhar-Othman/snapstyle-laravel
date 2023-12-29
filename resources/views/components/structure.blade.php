@props(['heading', 'model', 'param' => []])

{{-- This component used to structure the dashboard tables to be responsive and display the page with title and action properly --}}

<div class="flex flex-col justify-start items-center">
    <div class="w-full flex justify-between items-center flex-col sm:flex-row space-y-2">
        <h1 class="text-2xl font-bold text-primaryColor">{{ ucfirst($heading) }}</h1>
        <a href="{{ route('dashboard.' . $model . '.create', $param) }}"
            class="px-3 py-1 bg-primaryColor text-white rounded">Add
            {{ ucfirst($heading) }}</a>
    </div>
    <div class="w-full">
        <div class="overflow-auto rounded-lg shadow mt-4">
            <table class="w-full">
                {{ $slot }}
            </table>
        </div>
    </div>
</div>
