<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-3xl font-bold text-gray-800">
                Edit Location
            </h2>

            <p class="text-gray-500 mt-1">
                Update location information.
            </p>

        </div>

    </x-slot>

    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-xl shadow border p-8">

            <form action="{{ route('location.update',$location) }}" method="POST">

                @csrf
                @method('PUT')

                @include('locations._form')

                <div class="flex justify-center gap-4 mt-8">

                    <a href="{{ route('location.index') }}" class="px-6 py-2 border rounded-lg hover:bg-gray-100">

                        Cancel

                    </a>

                    <button type="submit" class="px-6 py-2 rounded-lg bg-[#FF0025] text-white hover:bg-red-700">

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
