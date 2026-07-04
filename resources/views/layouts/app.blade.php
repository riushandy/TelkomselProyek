<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

<div
    x-data="{ sidebarOpen:false }"
    class="min-h-screen flex">

    {{-- Mobile Overlay --}}
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        class="fixed inset-0 bg-black/40 z-30 lg:hidden"
        @click="sidebarOpen=false">
    </div>

    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Content --}}
    <div class="flex-1 lg:ml-64">

        {{-- Mobile Button --}}
        <div class="lg:hidden p-4">

            <button
                @click="sidebarOpen=true"
                class="px-3 py-2 rounded-lg bg-white border shadow">

                ☰

            </button>

        </div>

        @isset($header)

            <header class="px-6 pt-6">

                {{ $header }}

            </header>

        @endisset

        <main class="p-6">

            {{ $slot }}

        </main>

    </div>

</div>

</body>
</html>
