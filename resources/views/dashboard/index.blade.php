<x-layouts.dashboard>
    <h1 class="text-2xl font-bold text-primaryColor mb-2">Dashboard</h1>
    <div class="flex-col sm:flex-row flex justify-center sm:justify-start items-center flex-wrap space-x-2 space-y-2">
        <div
            class="flex flex-col justify-center items-start p-4 bg-whiteColor border border-greyColor rounded-lg shadow">
            <div class="flex justify-start items-center space-x-2 mb-2">
                <h5 class="text-sm font-bold text-blackColor">Product Number: </h5>
                <h1 class="text-xs font-bold text-darkgreyColor">{{ $product }}</h1>
            </div>
            <div class="flex justify-start items-center space-x-2 mb-2">
                <h5 class="text-sm font-bold text-blackColor">User Number: </h5>
                <h1 class="text-xs font-bold text-darkgreyColor">{{ $user }}</h1>
            </div>
            <div class="flex justify-start items-center space-x-2 mb-2">
                <h5 class="text-sm font-bold text-blackColor">Order Number: </h5>
                <h1 class="text-xs font-bold text-darkgreyColor">{{ $order }}</h1>
            </div>
        </div>
        <div
            class="flex flex-col justify-center items-start p-4 bg-whiteColor border border-greyColor rounded-lg shadow">
            <div class="flex justify-start items-center space-x-2 mb-2">
                <h5 class="text-sm font-bold text-blackColor">Pending Order Number: </h5>
                <h1 class="text-xs font-bold text-darkgreyColor">{{ $orderpending }}</h1>
            </div>
            <div class="flex justify-start items-center space-x-2 mb-2">
                <h5 class="text-sm font-bold text-blackColor">Accepted Order Number: </h5>
                <h1 class="text-xs font-bold text-darkgreyColor">{{ $orderaccepted }}</h1>
            </div>
            <div class="flex justify-start items-center space-x-2 mb-2">
                <h5 class="text-sm font-bold text-blackColor">Finished Number: </h5>
                <h1 class="text-xs font-bold text-darkgreyColor">{{ $orderfinished }}</h1>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <h1 class="text-xl font-bold text-primaryColor mb-2">Newest Product</h1>
        <div class="flex justify-start items-start flex-wrap gap-2">
            @foreach ($products as $product)
                <x-cards.product :product="$product" link="false" />
            @endforeach
        </div>
    </div>
</x-layouts.dashboard>
