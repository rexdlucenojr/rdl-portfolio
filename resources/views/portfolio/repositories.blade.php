@extends('layouts.app')

@section('title', 'GitHub/Repositories — Rex Decuan Luceño Jr.')

@section('content')
    <section class="relative pt-32 pb-24 md:pt-40 md:pb-32 overflow-hidden">
        <div class="absolute top-32 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-zinc-200/50 dark:bg-zinc-800/30 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6">
            <div class="max-w-3xl mb-12 md:mb-16">
                <a href="{{ route('home') }}#projects" class="reveal inline-flex items-center gap-2 text-sm text-zinc-500 dark:text-zinc-400 hover:text-accent transition-colors mb-8">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m0 0l6 6m-6-6l6-6"/></svg>
                    Back to projects
                </a>

                <p class="reveal text-sm font-medium text-accent tracking-widest uppercase mb-4">GitHub</p>
                <h1 class="reveal d1 font-display font-bold text-5xl md:text-6xl lg:text-7xl leading-[1.05] tracking-tight text-zinc-900 dark:text-white mb-6">
                    GitHub/<span class="text-accent">Repositories</span>
                </h1>
                <p class="reveal d2 text-lg md:text-xl text-zinc-500 dark:text-zinc-400 font-light leading-relaxed max-w-2xl mb-8">
                    A live look at the public repositories on my GitHub profile, including the code behind this portfolio.
                </p>

                <a href="{{ $profileUrl }}" target="_blank" rel="noopener noreferrer"
                    class="reveal d3 shimmer inline-flex items-center gap-2 bg-accent text-white font-medium px-5 py-2.5 rounded-full hover:bg-accent-light transition-colors text-sm">
                    Visit GitHub profile
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($repositories as $repository)
                    @php($isDark = $loop->even)
                    <article class="reveal d{{ min($loop->iteration, 4) }} card-h group flex flex-col rounded-2xl border hover:border-accent overflow-hidden p-8 {{ $isDark ? 'bg-zinc-900 dark:bg-zinc-800 border-zinc-800' : 'bg-white dark:bg-zinc-900 border-zinc-100 dark:border-zinc-800' }}">
                        <div class="flex items-start justify-between gap-4 mb-6">
                            <div class="w-12 h-12 flex items-center justify-center rounded-xl shrink-0 {{ $isDark ? 'bg-zinc-800 dark:bg-zinc-700 group-hover:bg-accent/20' : 'bg-orange-50 dark:bg-zinc-800 group-hover:bg-accent/10' }} transition-colors">
                                <svg class="w-6 h-6 text-accent" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            </div>

                            <div class="flex items-center gap-3 text-xs text-zinc-500 dark:text-zinc-400 pt-1">
                                @if ($repository['language'])
                                    <span class="inline-flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-accent" aria-hidden="true"></span>
                                        {{ $repository['language'] }}
                                    </span>
                                @endif
                                <span class="inline-flex items-center gap-1" title="{{ $repository['stars'] }} stars">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.48 3.5a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                                    {{ $repository['stars'] }}
                                </span>
                                <span class="inline-flex items-center gap-1" title="{{ $repository['forks'] }} forks">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 3v12m0 0a3 3 0 103 3H9a3 3 0 013-3V6a3 3 0 013-3h0a3 3 0 013 3v12m0 0a3 3 0 11-3 3h0a3 3 0 01-3-3V9"/></svg>
                                    {{ $repository['forks'] }}
                                </span>
                            </div>
                        </div>

                        <h2 class="font-display font-bold text-2xl mb-2 break-words {{ $isDark ? 'text-white' : 'text-zinc-900 dark:text-white' }}">{{ $repository['name'] }}</h2>
                        <p class="text-sm leading-relaxed {{ $isDark ? 'text-zinc-400' : 'text-zinc-500 dark:text-zinc-400' }}">{{ $repository['description'] }}</p>

                        @if ($repository['updated_at'])
                            <p class="mt-4 text-xs uppercase tracking-widest text-zinc-400">
                                Updated {{ \Illuminate\Support\Carbon::parse($repository['updated_at'])->diffForHumans() }}
                            </p>
                        @endif

                        <div class="mt-auto pt-6 flex flex-wrap gap-3">
                            <a href="{{ $repository['url'] }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 font-medium px-5 py-2.5 rounded-full transition-colors text-sm {{ $isDark ? 'bg-white text-zinc-900 hover:bg-zinc-200' : 'bg-zinc-900 text-white hover:bg-zinc-700 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200' }}">
                                View Repository
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>

                            @if ($repository['homepage'])
                                <a href="{{ $repository['homepage'] }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 border font-medium px-5 py-2.5 rounded-full transition-colors text-sm {{ $isDark ? 'border-zinc-600 text-zinc-300 hover:bg-zinc-700 hover:text-white' : 'border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-zinc-900' }}">
                                    Live Site
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
