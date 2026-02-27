<!DOCTYPE html>
<html class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERaufi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @yield('styles')
</head>

<body class="antialiased bg-mesh text-slate-100 min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar (Desktop) -->
        @include('layouts.sidebar')

        <!-- Main Wrapper -->
        <div class="flex flex-col flex-1 min-w-0 h-full relative overflow-hidden">
            <!-- Navbar -->
            @include('layouts.navbar')


            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto px-4 py-8 lg:px-10">
                <div class="max-w-[1600px] mx-auto min-h-full flex flex-col">
                    <div class="flex-1">
                        @yield('contect')
                    </div>

                    <!-- Footer -->
                    <footer class="mt-20 py-8 border-t border-white/5 text-center text-slate-500 text-sm">
                        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    </footer>
                </div>
            </main>
        </div>
    </div>
</body>

@yield('scripts')

</html>
