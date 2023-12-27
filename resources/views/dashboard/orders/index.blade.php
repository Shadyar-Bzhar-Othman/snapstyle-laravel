<x-layouts.dashboard>
    <div class="flex flex-col justify-start items-center">
        <h1 class="text-2xl font-bold text-primaryColor mb-2">Orders</h1>
        <form id="filterForm" action="{{ route('dashboard.orders.index') }}" method="GET">
            <x-form.field>
                <select name="state" id="filter"
                    class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl"
                    onchange="submitForm()">
                    <option value="" @if (request('state') == null) selected @endif>
                        All
                    </option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}" @if (request('state') == $state->id) selected @endif>
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="page" value="{{ request('page') }}">
            </x-form.field>
        </form>
        @if (count($orders))
            <div class="flex justify-center items-center flex-wrap gap-2">
                @foreach ($orders as $order)
                    <x-cards.order :order="$order" />
                @endforeach
            </div>
        @else
            <p class="text-center mt-2">There's no order yet!</p>
        @endif

        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>

    <script>
        function submitForm() {
            var form = document.getElementById('filterForm');

            form.submit();
        }
    </script>
</x-layouts.dashboard>
