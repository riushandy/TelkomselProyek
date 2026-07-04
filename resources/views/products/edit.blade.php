<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">
                Edit Product
            </h2>

            <p class="text-gray-500 mt-1">
                Update product information.
            </p>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-xl shadow border p-8">

            <form action="{{ route('product.update', $product) }}" method="POST">

                @csrf
                @method('PUT')

                @include('products._form')

                <div class="flex justify-center gap-4 mt-8">

                    <a href="{{ route('product.index') }}"
                        class="px-6 py-3 rounded-lg bg-gray-400 hover:bg-gray-500 text-white transition">

                        Cancel

                    </a>

                    <button type="submit"
                        class="px-6 py-3 rounded-lg bg-[#FF0025] hover:bg-red-700 text-white transition">

                        Update Product

                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
