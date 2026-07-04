<div class="space-y-6">

    {{-- Category Name --}}
    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Category Name
            <span class="text-red-500">*</span>

        </label>

        <input type="text" name="category_name" value="{{ old('category_name', $category->category_name ?? '') }}"
            placeholder="Enter category name"
            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">

        @error('category_name')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Description --}}
    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Description

        </label>

        <textarea name="category_description" rows="5" placeholder="Enter category description"
            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">{{ old('category_description', $category->category_description ?? '') }}</textarea>

        @error('category_description')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

</div>
