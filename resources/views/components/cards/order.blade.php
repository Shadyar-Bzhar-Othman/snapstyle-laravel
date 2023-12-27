@props(['order', 'route' => 'dashboard.orders.show'])

<div class="flex flex-col justify-center items-start p-4 bg-whiteColor border border-greyColor rounded-lg shadow">
    <div class="flex justify-start items-center space-x-2 mb-2">
        <h5 class="mb-2 text-sm font-bold text-blackColor">Order Number: </h5>
        <h1 class="mb-2 text-xs font-bold text-darkgreyColor">{{ $order->id }}</h1>
    </div>
    <div class="flex justify-start items-center space-x-2 mb-2">
        <h5 class="mb-2 text-sm font-bold text-blackColor">Order State: </h5>
        <h1 class="mb-2 text-xs font-bold text-darkgreyColor">{{ $order->state->name }}</h1>
    </div>
    <div class="flex justify-start items-center space-x-2 mb-2">
        <h5 class="mb-2 text-sm font-bold text-blackColor">User (Username): </h5>
        <h1 class="mb-2 text-xs font-bold text-darkgreyColor">{{ $order->user->name }}</h1>
    </div>
    <div class="flex justify-start items-center space-x-2 mb-2">
        <h5 class="mb-2 text-sm font-bold text-blackColor">Total Order Price: </h5>
        <h1 class="mb-2 text-xs font-bold text-darkgreyColor">${{ $order->total_price }}</h1>
    </div>
    <a href="{{ route($route, ['order' => $order]) }}"
        class="self-center px-3 py-2 text-xs font-medium text-whiteColor bg-primaryColor rounded-lg">
        Order Detail
    </a>
</div>
