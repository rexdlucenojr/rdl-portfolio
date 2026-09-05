<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Rex Decuan Luceño Jr. — Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-950 text-neutral-100 font-sans antialiased">
    <header class="sticky top-0 z-50 border-b border-neutral-800 bg-neutral-950/90 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="#home" class="text-xl font-bold tracking-tight">
                Rex<span class="text-neutral-500">.</span>Dev
            </a>
            <nav class="flex items-center gap-8 text-sm tracking-wide text-neutral-300">
                <a href="#home" class="transition hover:text-white">Home</a>
                <a href="#about" class="transition hover:text-white">About</a>
                <a href="#education" class="transition hover:text-white">Education</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-neutral-800 bg-neutral-950 py-8">
        <div class="mx-auto max-w-6xl px-6 text-center text-sm text-neutral-500">
            &copy; {{ date('Y') }} Rex Decuan Luceño Jr. — All rights reserved.
        </div>
    </footer>
</body>
</html>