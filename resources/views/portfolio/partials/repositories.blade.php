@php
    $repositories = [
        [
            'name' => 'rdl-portfolio',
            'description' => 'Personal portfolio built with Laravel, Tailwind CSS, and Vite, deployed on Vercel.',
            'url' => 'https://github.com/rexdlucenojr/rdl-portfolio',
            'homepage' => 'https://rdl-portfolio.vercel.app',
            'language' => 'Blade',
            'stars' => 0,
        ],
        [
            'name' => 'rexdlucenojr.github.io',
            'description' => 'Personal GitHub Pages website.',
            'url' => 'https://github.com/rexdlucenojr/rexdlucenojr.github.io',
            'homepage' => null,
            'language' => 'HTML',
            'stars' => 0,
        ],
        [
            'name' => 'rexdlucenojr',
            'description' => 'GitHub profile repository.',
            'url' => 'https://github.com/rexdlucenojr/rexdlucenojr',
            'homepage' => null,
            'language' => null,
            'stars' => 0,
        ],
    ];
@endphp

<div class="relative z-10 mt-12 pt-10 border-t border-zinc-800 dark:border-zinc-700">
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-6">
        <div>
            <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-2">GitHub</p>
            <h3 class="reveal d1 font-display font-bold text-2xl md:text-3xl text-white">GitHub/<span class="text-accent">Repositories</span></h3>
        </div>
        <a href="https://github.com/rexdlucenojr?tab=repositories" target="_blank" rel="noopener noreferrer"
            class="reveal d2 inline-flex items-center gap-2 text-sm text-zinc-400 hover:text-white transition-colors">
            View all repositories
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($repositories as $repository)
            <article class="reveal d{{ min($loop->iteration, 4) }} group flex flex-col rounded-xl border border-zinc-800 dark:border-zinc-700 bg-zinc-800/60 dark:bg-zinc-900/40 p-5 hover:border-accent transition-colors">
                <div class="flex items-start justify-between gap-3 mb-3">
                    <h4 class="font-display font-bold text-base text-white break-words">{{ $repository['name'] }}</h4>
                    <a href="{{ $repository['url'] }}" target="_blank" rel="noopener noreferrer" class="text-zinc-500 hover:text-accent transition-colors shrink-0" aria-label="View {{ $repository['name'] }} on GitHub">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                </div>

                <p class="text-xs text-zinc-400 leading-relaxed">{{ $repository['description'] }}</p>

                <div class="mt-auto pt-4 flex items-center justify-between gap-3 text-[11px] text-zinc-500">
                    <div class="flex items-center gap-3">
                        @if ($repository['language'])
                            <span class="inline-flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-accent" aria-hidden="true"></span>
                                {{ $repository['language'] }}
                            </span>
                        @endif
                        <span>{{ $repository['stars'] }} stars</span>
                    </div>

                    @if ($repository['homepage'])
                        <a href="{{ $repository['homepage'] }}" target="_blank" rel="noopener noreferrer" class="text-accent hover:text-accent-light transition-colors">Live</a>
                    @endif
                </div>
            </article>
        @endforeach
    </div>
</div>
