<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">
                Borrowing Detail
            </h2>

            <p class="text-gray-500 mt-1">
                View borrowing transaction details.
            </p>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto space-y-6">

        <div class="bg-white rounded-xl shadow border p-8">

            <div class="grid md:grid-cols-2 gap-6">

                <div>
                    <label class="text-sm text-gray-500">
                        Borrower Name
                    </label>

                    <div class="mt-1 font-semibold">
                        {{ $borrowing->borrower_name }}
                    </div>
                </div>
                <div>
                    <label class="text-sm text-gray-500">
                        Borrower Phone
                    </label>

                    <div class="mt-1 font-semibold">
                        {{ $borrowing->borrower_phone ?? '-' }}
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Borrower Email
                    </label>

                    <div class="mt-1 font-semibold">
                        {{ $borrowing->borrower_email ?? '-' }}
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Status
                    </label>

                    <div class="mt-2">

                        @if ($borrowing->borrowing_status == 'Borrowed')
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">
                                Borrowed
                            </span>
                        @elseif($borrowing->borrowing_status == 'Returned')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                Returned
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                Late
                            </span>
                        @endif

                    </div>

                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Borrow Date
                    </label>

                    <div class="mt-1">
                        {{ \Carbon\Carbon::parse($borrowing->borrow_date)->format('d M Y') }}
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Return Date
                    </label>

                    <div class="mt-1">
                        {{ \Carbon\Carbon::parse($borrowing->return_date)->format('d M Y') }}
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Actual Return
                    </label>

                    <div class="mt-1">

                        @if ($borrowing->actual_return_date)
                            {{ \Carbon\Carbon::parse($borrowing->actual_return_date)->format('d M Y') }}
                        @else
                            -
                        @endif

                    </div>

                </div>

            </div>

        </div>


        <div class="bg-white rounded-xl shadow border">

            <div class="px-6 py-4 border-b">

                <h3 class="text-xl font-semibold">

                    Borrowed Products

                </h3>

            </div>

            <table class="w-full text-sm">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-6 py-3">
                            No
                        </th>

                        <th class="px-6 py-3">
                            Product
                        </th>

                        <th class="px-6 py-3">
                            Category
                        </th>

                        <th class="px-6 py-3">
                            Quantity
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($borrowing->borrowingDetails as $detail)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $detail->product->product_name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $detail->product->category->category_name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $detail->quantity }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>


        @if ($borrowing->notes)
            <div class="bg-white rounded-xl shadow border p-6">

                <label class="text-sm text-gray-500">

                    Notes

                </label>

                <div class="mt-2">

                    {{ $borrowing->notes }}

                </div>

            </div>
        @endif


        <div class="flex justify-center gap-4">

            <a href="{{ route('borrowing.index') }}"
                class="px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

                Back

            </a>

            @if ($borrowing->borrowing_status == 'Borrowed')
                <form action="{{ route('borrowing.return', $borrowing) }}" method="POST">

                    @csrf

                    <button onclick="return confirm('Return this borrowing?')"
                        class="px-6 py-3 rounded-lg bg-green-600 hover:bg-green-700 text-white">

                        Return Items

                    </button>

                </form>
            @endif

        </div>

    </div>

</x-app-layout>
