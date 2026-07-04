<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">
                New Borrowing
            </h2>

            <p class="text-gray-500 mt-1">
                Create a new borrowing transaction.
            </p>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto">

        <form action="{{ route('borrowing.store') }}" method="POST">

            @csrf

            <div class="bg-white rounded-xl shadow border p-8 space-y-6">

                {{-- Borrower --}}
                <div>

                    <label class="block font-medium mb-2">
                        Borrower Name
                    </label>

                    <input type="text" name="borrower_name" value="{{ old('borrower_name') }}"
                        class="w-full rounded-lg border-gray-300" required>

                </div>
                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block font-medium mb-2">
                            Borrower Phone
                        </label>

                        <input type="text" name="borrower_phone" value="{{ old('borrower_phone') }}"
                            class="w-full rounded-lg border-gray-300">

                    </div>

                    <div>

                        <label class="block font-medium mb-2">
                            Borrower Email
                        </label>

                        <input type="email" name="borrower_email" value="{{ old('borrower_email') }}"
                            class="w-full rounded-lg border-gray-300">

                    </div>

                </div>

                {{-- Date --}}
                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block font-medium mb-2">
                            Borrow Date
                        </label>

                        <input type="date" name="borrow_date" value="{{ old('borrow_date', date('Y-m-d')) }}"
                            class="w-full rounded-lg border-gray-300" required>

                    </div>

                    <div>

                        <label class="block font-medium mb-2">
                            Return Date
                        </label>

                        <input type="date" name="return_date" value="{{ old('return_date') }}"
                            class="w-full rounded-lg border-gray-300" required>

                    </div>

                </div>

                {{-- Products --}}

                <div>

                    <div class="flex justify-between items-center mb-4">

                        <h3 class="text-lg font-semibold">

                            Borrowed Products

                        </h3>

                        <button type="button" id="addRow"
                            class="px-4 py-2 bg-[#FF0025] text-white rounded-lg hover:bg-red-700">

                            + Add Product

                        </button>

                    </div>

                    <table class="w-full border rounded-lg" id="productTable">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="p-3">
                                    Product
                                </th>

                                <th class="p-3 w-40">
                                    Qty
                                </th>

                                <th class="p-3 w-24">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td class="p-3">

                                    <select name="products[0][product_id]" class="w-full rounded-lg border-gray-300"
                                        required>

                                        <option value="">

                                            Select Product

                                        </option>

                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">

                                                {{ $product->product_name }}

                                                (Stock: {{ $product->stock }})
                                            </option>
                                        @endforeach

                                    </select>

                                </td>

                                <td class="p-3">

                                    <input type="number" min="1" name="products[0][quantity]" value="1"
                                        class="w-full rounded-lg border-gray-300" required>

                                </td>

                                <td class="p-3 text-center">

                                    <button type="button" class="removeRow text-red-600">

                                        Remove

                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

                {{-- Notes --}}

                <div>

                    <label class="block font-medium mb-2">

                        Notes

                    </label>

                    <textarea name="notes" rows="4" class="w-full rounded-lg border-gray-300">{{ old('notes') }}</textarea>

                </div>

                {{-- Button --}}

                <div class="flex justify-center gap-4">

                    <a href="{{ route('borrowing.index') }}"
                        class="px-6 py-3 rounded-lg bg-gray-500 text-white hover:bg-gray-600">

                        Cancel

                    </a>

                    <button type="submit" class="px-6 py-3 rounded-lg bg-[#FF0025] text-white hover:bg-red-700">

                        Save Borrowing

                    </button>

                </div>

            </div>

        </form>

    </div>

    <script>
        let index = 1;

        document.getElementById('addRow').onclick = function() {

            let options = `

        @foreach ($products as $product)

            <option value="{{ $product->id }}">

                {{ $product->product_name }}

                (Stock: {{ $product->stock }})

            </option>

        @endforeach

    `;

            let row = `

    <tr>

        <td class="p-3">

            <select
                name="products[${index}][product_id]"
                class="w-full rounded-lg border-gray-300"
                required>

                <option value="">Select Product</option>

                ${options}

            </select>

        </td>

        <td class="p-3">

            <input
                type="number"
                min="1"
                value="1"
                name="products[${index}][quantity]"
                class="w-full rounded-lg border-gray-300"
                required>

        </td>

        <td class="p-3 text-center">

            <button
                type="button"
                class="removeRow text-red-600">

                Remove

            </button>

        </td>

    </tr>

    `;

            document.querySelector('#productTable tbody')
                .insertAdjacentHTML('beforeend', row);

            index++;

        }

        document.addEventListener('click', function(e) {

            if (e.target.classList.contains('removeRow')) {

                if (document.querySelectorAll('#productTable tbody tr').length > 1) {

                    e.target.closest('tr').remove();

                }

            }

        })
    </script>

</x-app-layout>
