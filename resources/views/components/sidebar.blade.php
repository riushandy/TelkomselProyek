<aside
    id="logo-sidebar"
    x-cloak
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed top-0 left-0 z-40 w-64 h-screen bg-white border-r border-gray-200 transition-transform duration-300 lg:translate-x-0">

    <div class="flex flex-col h-full">

        {{-- Logo --}}
        <div class="px-6 py-6 border-b">
            <h1 class="text-lg font-bold text-gray-900">
                Inventory System
            </h1>

            <p class="text-xs text-gray-500">
                Telkomsel Project
            </p>
        </div>

        {{-- Menu --}}
        <div class="flex-1 overflow-y-auto">

            <ul class="px-3 py-4 space-y-1">

                {{-- Dashboard --}}
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="block rounded-lg px-4 py-2 transition
                        {{ request()->routeIs('dashboard')
                            ? 'bg-red-50 text-[#FF0025] font-semibold'
                            : 'text-gray-700 hover:bg-gray-100 hover:text-[#FF0025]' }}">
                        Dashboard
                    </a>
                </li>

                {{-- MASTER DATA (ADMIN ONLY) --}}
                @if(auth()->user()->isAdmin())

                    <li class="pt-5">
                        <p class="px-4 text-xs uppercase text-gray-400">
                            Master Data
                        </p>
                    </li>

                    <li>
                        <a href="{{ route('category.index') }}"
                            class="block rounded-lg px-4 py-2 transition
                            {{ request()->routeIs('category.*')
                                ? 'bg-red-50 text-[#FF0025] font-semibold'
                                : 'text-gray-700 hover:bg-gray-100 hover:text-[#FF0025]' }}">
                            Categories
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('product.index') }}"
                            class="block rounded-lg px-4 py-2 transition
                            {{ request()->routeIs('product.*')
                                ? 'bg-red-50 text-[#FF0025] font-semibold'
                                : 'text-gray-700 hover:bg-gray-100 hover:text-[#FF0025]' }}">
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('department.index') }}"
                            class="block rounded-lg px-4 py-2 transition
                            {{ request()->routeIs('department.*')
                                ? 'bg-red-50 text-[#FF0025] font-semibold'
                                : 'text-gray-700 hover:bg-gray-100 hover:text-[#FF0025]' }}">
                            Departments
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('location.index') }}"
                            class="block rounded-lg px-4 py-2 transition
                            {{ request()->routeIs('location.*')
                                ? 'bg-red-50 text-[#FF0025] font-semibold'
                                : 'text-gray-700 hover:bg-gray-100 hover:text-[#FF0025]' }}">
                            Locations
                        </a>
                    </li>

                @endif

                {{-- PRODUCTS (STAFF ONLY) --}}
                @if(auth()->user()->isStaff())

                    <li class="pt-5">
                        <p class="px-4 text-xs uppercase text-gray-400">
                            Inventory
                        </p>
                    </li>

                    <li>
                        <a href="{{ route('product.index') }}"
                            class="block rounded-lg px-4 py-2 transition
                            {{ request()->routeIs('product.*')
                                ? 'bg-red-50 text-[#FF0025] font-semibold'
                                : 'text-gray-700 hover:bg-gray-100 hover:text-[#FF0025]' }}">
                            Products
                        </a>
                    </li>

                @endif

                {{-- TRANSACTION (ADMIN & STAFF) --}}
                @if(auth()->user()->isAdmin() || auth()->user()->isStaff())

                    <li class="pt-5">
                        <p class="px-4 text-xs uppercase text-gray-400">
                            Transaction
                        </p>
                    </li>

                    <li>
                        <a href="{{ route('borrowing.index') }}"
                            class="block rounded-lg px-4 py-2 transition
                            {{ request()->routeIs('borrowing.*')
                                ? 'bg-red-50 text-[#FF0025] font-semibold'
                                : 'text-gray-700 hover:bg-gray-100 hover:text-[#FF0025]' }}">
                            Borrowings
                        </a>
                    </li>

                @endif

            </ul>

        </div>

        {{-- Footer --}}
        <div class="border-t p-4">

            <div class="mb-4">
                <p class="font-semibold text-gray-900">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-sm text-gray-500">
                    {{ auth()->user()->role->role_name }}
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 text-left text-gray-700 transition hover:bg-red-50 hover:text-[#FF0025] hover:border-[#FF0025]">
                    Logout
                </button>
            </form>

        </div>

    </div>

</aside>
