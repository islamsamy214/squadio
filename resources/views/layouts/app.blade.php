<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            animation: alert 5s ease-in-out;
        }
    </style>
</head>

<body class="font-sans antialiased">

    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6 text-center alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-6 text-center alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <script>
        const alert = document.querySelector('.alert');
        if (alert) {
            setTimeout(() => {
                alert.remove();
            }, 2000);
        }
    </script>
</body>

</html>
