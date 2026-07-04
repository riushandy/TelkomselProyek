<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">
                Product Management
            </h2>

            <p class="text-gray-500 mt-1">
                Manage all inventory products.
            </p>
        </div>
    </x-slot>

    <div class="space-y-6">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="p-4 rounded-lg bg-green-100 text-green-700 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- Add Button --}}
        <div class="flex justify-center">
            <a href="{{ route('product.create') }}"
                class="px-6 py-3 rounded-lg bg-[#FF0025] text-white hover:bg-red-700 transition">

                + Add Product

            </a>
        </div>
        <div class="flex justify-between items-center mb-6">

            <form action="{{ route('product.index') }}" method="GET" class="flex gap-2">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search product..."
                    class="border rounded-lg px-4 py-2 w-full">

                <button class="bg-[#FF0025] text-white px-4 py-2 rounded-lg">
                    Search
                </button>

            </form>

        </div>
        {{-- Table --}}
        <div class="relative overflow-x-auto bg-white shadow rounded-xl border">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-100 border-b">

                    <tr>

                        <th class="px-6 py-3">
                            Product ID
                        </th>

                        <th class="px-6 py-3">
                            Product Name
                        </th>

                        <th class="px-6 py-3">
                            Category
                        </th>

                        <th class="px-6 py-3">
                            Department
                        </th>

                        <th class="px-6 py-3">
                            Location
                        </th>

                        <th class="px-6 py-3 text-center">
                            Stock
                        </th>

                        <th class="px-6 py-3 text-center">
                            Condition
                        </th>

                        <th class="px-6 py-3 text-center">
                            Status
                        </th>

                        <th class="px-6 py-3 text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($products as $product)
                        <tr class="border-b hover:bg-gray-50">


                            <td class="px-6 py-4 font-semibold">

                                {{ $product->id }}

                            </td>

                            <td class="px-6 py-4 font-medium">

                                {{ $product->product_name }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $product->category->category_name }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $product->department->department_name }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $product->location->location_name }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                {{ $product->stock }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                @if ($product->product_condition == 'Good')
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">

                                        Good

                                    </span>
                                @elseif($product->product_condition == 'Minor Damage')
                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">

                                        Minor Damage

                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs">

                                        Damaged

                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-4 text-center">

                                @if ($product->product_status == 'Available')
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">

                                        Available

                                    </span>
                                @elseif($product->product_status == 'Borrowed')
                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs">

                                        Borrowed

                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-xs">

                                        Maintenance

                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('product.show', $product) }}"
                                        class="px-3 py-2 rounded-lg bg-sky-500 hover:bg-sky-600 text-white">

                                        Detail

                                    </a>

                                    <a href="{{ route('product.edit', $product) }}"
                                        class="px-3 py-2 rounded-lg bg-amber-400 hover:bg-amber-500 text-white">

                                        Edit

                                    </a>

                                    <form action="{{ route('product.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Delete this product?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="px-3 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="10" class="text-center py-10 text-gray-400">

                                No Product Found

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}

        <div>

            {{ $products->links() }}

        </div>

    </div>

</x-app-layout>
