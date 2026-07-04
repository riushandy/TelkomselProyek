<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">
                Product Detail
            </h2>

            <p class="text-gray-500 mt-1">
                Detailed information about the selected product.
            </p>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-xl shadow border p-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="text-sm text-gray-500">
                        Product ID
                    </label>

                    <div class="mt-1 font-semibold">
                        {{ $product->id }}
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Product Name
                    </label>

                    <div class="mt-1 font-semibold">
                        {{ $product->product_name }}
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Category
                    </label>

                    <div class="mt-1">
                        {{ $product->category->category_name }}
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Department
                    </label>

                    <div class="mt-1">
                        {{ $product->department->department_name }}
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Location
                    </label>

                    <div class="mt-1">
                        {{ $product->location->location_name }}
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Stock
                    </label>

                    <div class="mt-1 font-semibold">
                        {{ $product->stock }}
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Condition
                    </label>

                    <div class="mt-1">

                        @if ($product->product_condition == 'Good')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                Good
                            </span>
                        @elseif($product->product_condition == 'Minor Damage')
                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                Minor Damage
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                Damaged
                            </span>
                        @endif

                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-500">
                        Status
                    </label>

                    <div class="mt-1">

                        @if ($product->product_status == 'Available')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                Available
                            </span>
                        @elseif($product->product_status == 'Borrowed')
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">
                                Borrowed
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-sm">
                                Maintenance
                            </span>
                        @endif

                    </div>
                </div>

            </div>

            <div class="mt-8">

                <label class="text-sm text-gray-500">
                    Description
                </label>

                <div class="mt-2 p-4 rounded-lg border bg-gray-50 min-h-[120px]">

                    {{ $product->product_description ?: '-' }}

                </div>

            </div>

            <div class="flex justify-center gap-4 mt-8">

                <a href="{{ route('product.index') }}"
                    class="px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

                    Back

                </a>

                <a href="{{ route('product.edit', $product) }}"
                    class="px-6 py-3 rounded-lg bg-[#FF0025] hover:bg-red-700 text-white">

                    Edit Product

                </a>

            </div>

        </div>

    </div>

</x-app-layout>
