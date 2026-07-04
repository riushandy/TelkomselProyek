<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">
                Borrowing Management
            </h2>

            <p class="text-gray-500 mt-1">
                Manage all borrowing transactions.
            </p>
        </div>
    </x-slot>

    <div class="space-y-6">

        {{-- Success --}}
        @if (session('success'))
            <div class="p-4 rounded-lg bg-green-100 text-green-700 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error --}}
        @if (session('error'))
            <div class="p-4 rounded-lg bg-red-100 text-red-700 border border-red-300">
                {{ session('error') }}
            </div>
        @endif

        {{-- Button --}}
        <div class="flex justify-center">

            <a href="{{ route('borrowing.create') }}"
                class="px-6 py-3 rounded-lg bg-[#FF0025] text-white hover:bg-red-700 transition">

                + New Borrowing

            </a>

        </div>
        <form method="GET" action="{{ route('borrowing.index') }}" class="mb-6">

            <div class="flex gap-3">

                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search borrower, phone, status..." class="w-full rounded-lg border-gray-300">

                <button class="px-5 bg-[#FF0025] text-white rounded-lg">

                    Search

                </button>
            </div>

        </form>
        {{-- Table --}}

        <div class="relative overflow-x-auto bg-white shadow rounded-xl border">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-100 border-b">

                    <tr>

                        <th class="px-6 py-3 w-16">
                            No
                        </th>

                        <th class="px-6 py-3">
                            Borrower
                        </th>

                        <th class="px-6 py-3">
                            Borrow Date
                        </th>

                        <th class="px-6 py-3">
                            Return Date
                        </th>

                        <th class="px-6 py-3">
                            Status
                        </th>

                        <th class="px-6 py-3 text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($borrowings as $borrowing)
                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-6 py-4">

                                {{ $loop->iteration + ($borrowings->currentPage() - 1) * $borrowings->perPage() }}

                            </td>

                            <td class="px-6 py-4 font-semibold">

                                {{ $borrowing->borrower_name }}

                            </td>

                            <td class="px-6 py-4">

                                {{ \Carbon\Carbon::parse($borrowing->borrow_date)->format('d M Y') }}

                            </td>

                            <td class="px-6 py-4">

                                {{ \Carbon\Carbon::parse($borrowing->return_date)->format('d M Y') }}

                            </td>

                            <td class="px-6 py-4">

                                @if ($borrowing->borrowing_status == 'Borrowed')
                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs">

                                        Borrowed

                                    </span>
                                @elseif($borrowing->borrowing_status == 'Returned')
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">

                                        Returned

                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs">

                                        Late

                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2 flex-wrap">

                                    <a href="{{ route('borrowing.show', $borrowing) }}"
                                        class="px-3 py-2 bg-blue-500 text-white rounded">
                                        Detail
                                    </a>

                                    @if ($borrowing->borrowing_status == 'Borrowed')
                                        <form action="{{ route('borrowing.return', $borrowing) }}" method="POST"
                                            class="inline">

                                            @csrf
                                            @method('PATCH')

                                            <button onclick="return confirm('Return this borrowing?')"
                                                class="px-3 py-2 bg-green-600 text-white rounded">

                                                Return

                                            </button>

                                        </form>
                                    @endif



                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-10 text-gray-400">

                                No Borrowing Data

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div>

            {{ $borrowings->links() }}

        </div>

    </div>

</x-app-layout>
