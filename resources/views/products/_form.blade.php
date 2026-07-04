<div class="space-y-6">

    {{-- Product Name --}}
    <div>
        <label class="block mb-2 font-medium text-gray-700">
            Product Name
        </label>

        <input type="text" name="product_name" value="{{ old('product_name', $product->product_name ?? '') }}"
            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500" required>

        @error('product_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>


    {{-- Category --}}
    <div>
        <label class="block mb-2 font-medium text-gray-700">
            Category
        </label>

        <select name="category_id" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500"
            required>

            <option value="">-- Select Category --</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>

                    {{ $category->category_name }}

                </option>
            @endforeach

        </select>

        @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

    </div>


    {{-- Department --}}
    <div>

        <label class="block mb-2 font-medium text-gray-700">
            Department
        </label>

        <select name="department_id" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500"
            required>

            <option value="">-- Select Department --</option>

            @foreach ($departments as $department)
                <option value="{{ $department->id }}" @selected(old('department_id', $product->department_id ?? '') == $department->id)>

                    {{ $department->department_name }}

                </option>
            @endforeach

        </select>

        @error('department_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

    </div>


    {{-- Location --}}
    <div>

        <label class="block mb-2 font-medium text-gray-700">
            Location
        </label>

        <select name="location_id" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500"
            required>

            <option value="">-- Select Location --</option>

            @foreach ($locations as $location)
                <option value="{{ $location->id }}" @selected(old('location_id', $product->location_id ?? '') == $location->id)>

                    {{ $location->location_name }}

                </option>
            @endforeach

        </select>

        @error('location_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

    </div>


    {{-- Stock --}}
    <div>

        <label class="block mb-2 font-medium text-gray-700">
            Stock
        </label>

        <input type="number" name="stock" min="0" value="{{ old('stock', $product->stock ?? '') }}"
            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500" required>

        @error('stock')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

    </div>


    {{-- Condition --}}
    <div>

        <label class="block mb-2 font-medium text-gray-700">
            Condition
        </label>

        <select name="product_condition"
            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500" required>

            <option value="">-- Select Condition --</option>

            @foreach (['Good', 'Minor Damage', 'Damaged'] as $condition)
                <option value="{{ $condition }}" @selected(old('product_condition', $product->product_condition ?? '') == $condition)>

                    {{ $condition }}

                </option>
            @endforeach

        </select>

    </div>


    {{-- Status --}}
    <div>

        <label class="block mb-2 font-medium text-gray-700">
            Status
        </label>

        <select name="product_status" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500"
            required>

            <option value="">-- Select Status --</option>

            @foreach (['Available', 'Borrowed', 'Maintenance'] as $status)
                <option value="{{ $status }}" @selected(old('product_status', $product->product_status ?? '') == $status)>

                    {{ $status }}

                </option>
            @endforeach

        </select>

    </div>


    {{-- Description --}}
    <div>

        <label class="block mb-2 font-medium text-gray-700">
            Description
        </label>

        <textarea rows="4" name="product_description"
            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">{{ old('product_description', $product->product_description ?? '') }}</textarea>

    </div>

</div>
