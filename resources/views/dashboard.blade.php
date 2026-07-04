<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">
                Dashboard
            </h2>

            <p class="text-gray-500 mt-1">
                Welcome back, {{ auth()->user()->name }}
            </p>
        </div>
    </x-slot>

    <div class="space-y-8">

        {{-- Statistics --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500">Total Products</p>
                <h2 class="text-3xl font-bold mt-2">{{ $totalProducts }}</h2>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500">Available Products</p>
                <h2 class="text-3xl font-bold text-green-600 mt-2">
                    {{ $availableProducts }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500">Borrowed Products</p>
                <h2 class="text-3xl font-bold text-red-600 mt-2">
                    {{ $borrowedProducts }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500">Total Borrowings</p>
                <h2 class="text-3xl font-bold text-blue-600 mt-2">
                    {{ $totalBorrowings }}
                </h2>
            </div>

        </div>

        {{-- Second Row --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500">Categories</p>
                <h2 class="text-3xl font-bold">
                    {{ $totalCategories }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500">Departments</p>
                <h2 class="text-3xl font-bold">
                    {{ $totalDepartments }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500">Locations</p>
                <h2 class="text-3xl font-bold">
                    {{ $totalLocations }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500">Late Borrowings</p>
                <h2 class="text-3xl font-bold text-red-600">
                    {{ $lateBorrowings }}
                </h2>
            </div>

        </div>
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-bold mb-6">
                Borrowings Per Month
            </h2>

            <canvas id="borrowingChart" height="90"></canvas>

        </div>
        {{-- Recent Borrowing --}}
        <div class="bg-white rounded-xl shadow">

            <div class="px-6 py-4 border-b">
                <h2 class="text-xl font-bold">
                    Recent Borrowings
                </h2>
            </div>

            <table class="w-full text-sm">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-6 py-3 text-left">Borrower</th>

                        <th class="px-6 py-3 text-left">Borrow Date</th>

                        <th class="px-6 py-3 text-left">Return Date</th>

                        <th class="px-6 py-3 text-left">Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($recentBorrowings as $borrowing)
                        <tr class="border-b">

                            <td class="px-6 py-4">
                                {{ $borrowing->borrower_name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $borrowing->borrow_date }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $borrowing->return_date }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $borrowing->borrowing_status }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center py-6">
                                No borrowing data.
                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('borrowingChart');

        new Chart(ctx, {

            type: 'bar',

            data: {

                labels: [
                    @foreach ($borrowingChart as $item)
                        "{{ $item->month }}",
                    @endforeach
                ],

                datasets: [{

                    label: 'Borrowings',

                    data: [
                        @foreach ($borrowingChart as $item)
                            {{ $item->total }},
                        @endforeach
                    ],

                    backgroundColor: '#FF0025',

                    borderRadius: 8

                }]

            },

            options: {

                responsive: true,

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }

                }

            }

        });
    </script>
</x-app-layout>
