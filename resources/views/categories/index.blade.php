<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-3xl font-bold text-gray-800">

                Category Management

            </h2>

            <p class="text-gray-500 mt-1">

                Manage all available categories.

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
        {{-- Button Add --}}

        <div class="flex justify-center">

            <a href="{{ route('category.create') }}"
                class="px-6 py-3 rounded-lg bg-[#FF0025] text-white hover:bg-red-700 transition">

                + Add Category

            </a>

        </div>

        {{-- Table --}}

        <div class="relative overflow-x-auto bg-white shadow rounded-xl border">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-100 border-b">

                    <tr>

                        <th class="px-6 py-3 w-16">

                            No

                        </th>

                        <th class="px-6 py-3">

                            Category Name

                        </th>

                        <th class="px-6 py-3">

                            Description

                        </th>

                        <th class="px-6 py-3">

                            Created At

                        </th>

                        <th class="px-6 py-3 text-center">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)
                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-6 py-4">

                                {{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}

                            </td>

                            <td class="px-6 py-4 font-semibold">

                                {{ $category->category_name }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $category->category_description }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $category->created_at->format('d M Y') }}

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('category.edit', $category) }}"
                                        class="px-4 py-2 rounded-lg bg-amber-400 text-white hover:bg-amber-500 transition">

                                        Edit

                                    </a>

                                    <form action="{{ route('category.destroy', $category) }}" method="POST"
                                        onsubmit="return confirm('Delete this category?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-10 text-gray-400">

                                No Category Found

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}

        <div>

            {{ $categories->links() }}

        </div>




    </div>

</x-app-layout>
