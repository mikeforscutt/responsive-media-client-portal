<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-b from-[#F4FBFD] to-white flex flex-col justify-center items-center px-4">
            <!-- Logo -->
            <div class="flex justify-center">
                <a href="/">
                    <x-application-logo class="w-32 h-auto" />
                </a>
            </div>

            <!-- Auth card -->
            <div class="w-full max-w-md mt-8">
                <div class="bg-white/90 backdrop-blur shadow-lg rounded-2xl px-8 py-8 sm:px-10 sm:py-10 border border-slate-100">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
