@props(['order', 'route' => 'dashboard.orders.show'])

<div class="flex flex-col justify-center items-start p-4 bg-white border border-gray-200 rounded-lg shadow">
    <div class="flex justify-start items-center space-x-2 mb-2">
        <h5 class="mb-2 text-base font-bold">Order Number: </h5>
        <h1 class="mb-2 text-sm font-bold text-slate-400">{{ $order->id }}</h1>
    </div>
    <div class="flex justify-start items-center space-x-2 mb-2">
        <h5 class="mb-2 text-base font-bold">Order State: </h5>
        <h1 class="mb-2 text-sm font-bold text-slate-400">{{ $order->state->name }}</h1>
    </div>
    <div class="flex justify-start items-center space-x-2 mb-2">
        <h5 class="mb-2 text-base font-bold">User (Username): </h5>
        <h1 class="mb-2 text-sm font-bold text-slate-400">{{ $order->user->name }}</h1>
    </div>
    <div class="flex justify-start items-center space-x-2 mb-2">
        <h5 class="mb-2 text-base font-bold">Total Order Price: </h5>
        <h1 class="mb-2 text-sm font-bold text-slate-400">${{ $order->total_price }}</h1>
    </div>
    <a href="{{ route($route, ['order' => $order]) }}"
        class="self-center px-3 py-2 text-sm font-medium text-white bg-primaryColor rounded-lg">
        Order Detail
    </a>
</div>
