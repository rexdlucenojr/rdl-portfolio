<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0a0a0c">
    <title>@yield('title', 'Rex Decuan Luceño Jr. — Portfolio')</title>

    <script>
        (function () {
            var d = localStorage.getItem('theme');
            if (d !== 'light') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,300;0,400;0,600;1,400&family=Special+Elite&family=Creepster&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">

    <div class="horror-atmosphere" aria-hidden="true">
        <span class="fog fog--one"></span>
        <span class="fog fog--two"></span>
        <span class="fog fog--three"></span>
    </div>

    <div class="film-grain" aria-hidden="true"></div>

    <div class="corner-eyes corner-eyes--tl" aria-hidden="true">
        <span></span><span></span>
    </div>
    <div class="corner-eyes corner-eyes--br" aria-hidden="true">
        <span></span><span></span>
    </div>

    <canvas id="cursor-trail" aria-hidden="true"></canvas>

    <header id="site-header" class="fixed inset-x-0 top-0 z-50 transition-all duration-300">
        <nav class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between" aria-label="Main navigation">

            <a href="#home" class="font-display font-bold text-xl tracking-tight">
                <span class="text-zinc-900 dark:text-white">Rex</span><span class="text-accent">.Dev</span>
            </a>

            <ul class="hidden md:flex items-center gap-8 text-sm" role="list">
                <li><a href="#home" class="nav-link nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Home</a></li>
                <li><a href="#about" class="nav-link nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">About</a></li>
                <li><a href="#education" class="nav-link nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Education</a></li>
                <li><a href="#skills" class="nav-link nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Skills</a></li>
                <li><a href="#certifications" class="nav-link nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Certifications</a></li>
                <li><a href="#contact" class="nav-link nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Contact</a></li>
            </ul>

            <div class="flex items-center gap-3">
                <button id="theme-toggle" type="button"
                    class="w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors"
                    aria-label="Dark mode">
                    <svg id="theme-icon-sun" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
                    <svg id="theme-icon-moon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
                </button>
                <a href="#contact" class="hidden md:inline-flex items-center gap-2 shimmer bg-accent text-white text-sm font-medium px-5 py-2 rounded-full hover:bg-accent-light transition-colors">
                    Hire me <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <button id="nav-toggle" type="button"
                    class="md:hidden w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800"
                    aria-expanded="false" aria-label="Toggle menu">
                    <svg id="nav-icon-open" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="nav-icon-close" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </nav>

        <div id="mobile-nav" class="hidden md:hidden bg-white dark:bg-zinc-950 border-t border-zinc-100 dark:border-zinc-900">
            <ul class="flex flex-col px-6 py-5 gap-4 text-sm font-medium" role="list">
                <li><a href="#home" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Home</a></li>
                <li><a href="#about" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">About</a></li>
                <li><a href="#education" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Education</a></li>
                <li><a href="#skills" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Skills</a></li>
                <li><a href="#certifications" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Certifications</a></li>
                <li><a href="#contact" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Contact</a></li>
                <li class="pt-2 border-t border-zinc-100 dark:border-zinc-900">
                    <a href="#contact" class="inline-flex shimmer bg-accent text-white font-medium text-sm px-5 py-2.5 rounded-full">Hire me →</a>
                </li>
            </ul>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-zinc-100 dark:border-zinc-900">
        <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-zinc-400">&copy; <span id="yr"></span> Rex Decuan Luceño Jr. All rights reserved.</p>
            <p class="text-xs text-zinc-500">&quot;Innovate. Create. Elevate.&quot;</p>
        </div>
    </footer>

</body>
</html>