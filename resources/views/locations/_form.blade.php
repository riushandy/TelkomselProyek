<div class="space-y-6">

    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Location Name

            <span class="text-red-500">*</span>

        </label>

        <input type="text" name="location_name" value="{{ old('location_name', $location->location_name ?? '') }}"
            placeholder="Enter location name"
            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">

        @error('location_name')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror

    </div>

    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Description

        </label>

        <textarea name="location_description" rows="5" placeholder="Enter description"
            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">{{ old('location_description', $location->location_description ?? '') }}</textarea>

        @error('location_description')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror

    </div>

</div>
