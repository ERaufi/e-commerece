<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ in_array(app()->getLocale(), ['ar', 'fa', 'ps']) ? 'rtl' : 'ltr' }}" class="dark">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


    </head>

    <body class="antialiased bg-mesh text-slate-100 min-h-screen overflow-x-hidden" x-data="{ sidebarOpen: true, mobileOpen: false }">
        <div class="flex h-screen">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Mobile Overlay -->
            <div x-show="mobileOpen" @click="mobileOpen = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-30 lg:hidden"
                x-transition:enter="transition opacity-0 duration-300" x-transition:enter-end="opacity-100"
                x-transition:leave="transition opacity-100 duration-300" x-transition:leave-end="opacity-0"></div>

            <!-- Main Wrapper -->
            <div class="flex flex-col flex-1 min-w-0">
                <!-- Navbar -->
                @include('layouts.navbar')

                <!-- Content Area -->
                <main class="flex-1 overflow-y-auto px-4 py-8 lg:px-10">
                    <div class="max-w-[1600px] mx-auto">
                        @yield('content')
                    </div>

                    <!-- Footer -->
                    <footer class="mt-20 py-8 border-t border-white/5 text-center text-slate-500 text-sm">
                        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    </footer>
                </main>
            </div>
        </div>
    </body>

</html>
