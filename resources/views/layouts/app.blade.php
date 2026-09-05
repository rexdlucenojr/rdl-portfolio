<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Rex Decuan Luceño Jr. — Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-950 text-neutral-100 font-sans antialiased">
    <header class="sticky top-0 z-50 border-b border-neutral-800 bg-neutral-950/90 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="#home" class="text-xl font-bold tracking-tight focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400">
                Rex<span class="text-neutral-500">.</span>Dev
            </a>
            <nav id="primary-nav" class="hidden items-center gap-8 text-sm tracking-wide text-neutral-300 md:flex">
                <a href="#home" class="transition hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400">Home</a>
                <a href="#about" class="transition hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400">About</a>
                <a href="#education" class="transition hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400">Education</a>
                <a href="#skills" class="transition hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400">Skills</a>
                <a href="#certifications" class="transition hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400">Certifications</a>
                <a href="#contact" class="transition hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400">Contact</a>
            </nav>
            <button id="nav-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mobile-nav"
                class="inline-flex h-10 w-10 items-center justify-center text-neutral-200 transition hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400 md:hidden">
                <svg id="nav-icon-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg id="nav-icon-close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav id="mobile-nav" class="hidden border-t border-neutral-800 px-6 pb-4 pt-2 md:hidden">
            <div class="flex flex-col gap-1 text-sm tracking-wide text-neutral-300">
                <a href="#home" class="rounded-sm px-2 py-2 transition hover:bg-neutral-900 hover:text-white">Home</a>
                <a href="#about" class="rounded-sm px-2 py-2 transition hover:bg-neutral-900 hover:text-white">About</a>
                <a href="#education" class="rounded-sm px-2 py-2 transition hover:bg-neutral-900 hover:text-white">Education</a>
                <a href="#skills" class="rounded-sm px-2 py-2 transition hover:bg-neutral-900 hover:text-white">Skills</a>
                <a href="#certifications" class="rounded-sm px-2 py-2 transition hover:bg-neutral-900 hover:text-white">Certifications</a>
                <a href="#contact" class="rounded-sm px-2 py-2 transition hover:bg-neutral-900 hover:text-white">Contact</a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-neutral-800 bg-neutral-950 py-8">
        <div class="mx-auto flex max-w-6xl flex-col items-center gap-2 px-6 text-center text-sm text-neutral-500 md:flex-row md:justify-between">
            <p>&copy; {{ date('Y') }} Rex Decuan Luceño Jr.</p>
            <p class="text-neutral-400">&quot;Innovate. Create. Elevate.&quot;</p>
        </div>
    </footer>
</body>
</html>