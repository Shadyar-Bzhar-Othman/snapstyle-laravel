<x-layouts.dashboard>
    <div class="space-y-2">
        <h1>Dashboard</h1>
        <div class="flex-col sm:flex-row flex justify-start items-center space-x-2 space-y-2">
            <div class="flex flex-col justify-center items-start p-4 bg-white border border-gray-200 rounded-lg shadow">
                <div class="flex justify-start items-center space-x-2 mb-2">
                    <h5 class="mb-2 text-base font-bold">Product Number: </h5>
                    <h1 class="mb-2 text-sm font-bold text-slate-400">{{ $product }}</h1>
                </div>
                <div class="flex justify-start items-center space-x-2 mb-2">
                    <h5 class="mb-2 text-base font-bold">User Number: </h5>
                    <h1 class="mb-2 text-sm font-bold text-slate-400">{{ $user }}</h1>
                </div>
                <div class="flex justify-start items-center space-x-2 mb-2">
                    <h5 class="mb-2 text-base font-bold">Order Number: </h5>
                    <h1 class="mb-2 text-sm font-bold text-slate-400">{{ $order }}</h1>
                </div>
            </div>
            <div class="flex flex-col justify-center items-start p-4 bg-white border border-gray-200 rounded-lg shadow">
                <div class="flex justify-start items-center space-x-2 mb-2">
                    <h5 class="mb-2 text-base font-bold">Pending Order Number: </h5>
                    <h1 class="mb-2 text-sm font-bold text-slate-400">{{ $orderpending }}</h1>
                </div>
                <div class="flex justify-start items-center space-x-2 mb-2">
                    <h5 class="mb-2 text-base font-bold">Accepted Order Number: </h5>
                    <h1 class="mb-2 text-sm font-bold text-slate-400">{{ $orderaccepted }}</h1>
                </div>
                <div class="flex justify-start items-center space-x-2 mb-2">
                    <h5 class="mb-2 text-base font-bold">Finished Number: </h5>
                    <h1 class="mb-2 text-sm font-bold text-slate-400">{{ $orderfinished }}</h1>
                </div>

            </div>
        </div>
        <div>
            <h1>Newest Product</h1>
            <div class="flex justify-start items-center flex-wrap gap-2">
                @foreach ($products as $product)
                    <x-cards.product :product="$product" />
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.dashboard>
