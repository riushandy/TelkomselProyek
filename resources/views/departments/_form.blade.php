<div class="space-y-6">

    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Department Name
            <span class="text-red-500">*</span>

        </label>

        <input type="text" name="department_name"
            value="{{ old('department_name', $department->department_name ?? '') }}" placeholder="Enter department name"
            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">

        @error('department_name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Description

        </label>

        <textarea name="department_description" rows="5" placeholder="Enter department description"
            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">{{ old('department_description', $department->department_description ?? '') }}</textarea>

        @error('department_description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

</div>
