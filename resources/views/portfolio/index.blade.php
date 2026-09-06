@extends('layouts.app')

@section('content')
    @include('portfolio.partials.hero')

    @include('portfolio.partials.about')

    @include('portfolio.partials.education')

    <section id="skills" class="py-24 bg-zinc-50 dark:bg-zinc-900/40">
        <div class="max-w-6xl mx-auto px-6">
            <div class="mb-14 text-center">
                <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Skills</p>
                <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">What I'm <span class="text-accent">Good At</span></h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">

                <article class="reveal d1 card-h group bg-white dark:bg-zinc-900 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
                    <div class="w-12 h-12 flex items-center justify-center bg-orange-50 dark:bg-zinc-800 rounded-xl mb-6 group-hover:bg-accent/10 transition-colors">
                        <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-3">Coding</h3>
                </article>

                <article class="reveal d2 card-h group bg-zinc-900 dark:bg-zinc-800 rounded-2xl p-8 border border-zinc-800 hover:border-accent">
                    <div class="w-12 h-12 flex items-center justify-center bg-zinc-800 dark:bg-zinc-700 rounded-xl mb-6 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.75 17.25v-.228a4.5 4.5 0 00-.12-1.03l-2.268-9.64a3.375 3.375 0 00-3.285-2.602H7.923a3.375 3.375 0 00-3.285 2.602l-2.268 9.64a4.5 4.5 0 00-.12 1.03v.228m19.5 0a3 3 0 01-3 3H5.25a3 3 0 01-3-3m19.5 0a3 3 0 00-3-3H5.25a3 3 0 00-3 3m16.5 0h.008v.008h-.008v-.008zm-3 0h.008v.008h-.008v-.008z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-xl text-white mb-3">Network Configuration</h3>
                </article>

                <article class="reveal d3 card-h group bg-white dark:bg-zinc-900 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
                    <div class="w-12 h-12 flex items-center justify-center bg-orange-50 dark:bg-zinc-800 rounded-xl mb-6 group-hover:bg-accent/10 transition-colors">
                        <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25zm.75-12h9v9h-9v-9z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-3">Hardware Deployment</h3>
                </article>

            </div>
        </div>
    </section>

    <section id="certifications" class="py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="mb-14 text-center">
                <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Certifications</p>
                <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">Credentials I've <span class="text-accent">Earned</span></h2>
            </div>
            <div class="grid md:grid-cols-2 gap-6">

                <article class="reveal d1 card-h group bg-white dark:bg-zinc-900 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
                    <div class="w-12 h-12 flex items-center justify-center bg-orange-50 dark:bg-zinc-800 rounded-xl mb-6 group-hover:bg-accent/10 transition-colors">
                        <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-2xl text-zinc-900 dark:text-white mb-2">TESDA CSS / NC2</h3>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-5">Computer Systems Servicing, National Certificate II</p>
                    <p class="text-xs uppercase tracking-widest text-zinc-400">September 2025</p>
                </article>

                <article class="reveal d2 card-h group bg-zinc-900 dark:bg-zinc-800 rounded-2xl p-8 border border-zinc-800 hover:border-accent">
                    <div class="w-12 h-12 flex items-center justify-center bg-zinc-800 dark:bg-zinc-700 rounded-xl mb-6 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 100-18 9 9 0 000 18zm0 0a8.949 8.949 0 00-4.5-7.5m9 0A8.949 8.949 0 0112 21M12 3a8.949 8.949 0 00-4.5 7.5m9 0A8.949 8.949 0 0112 3"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-2xl text-white mb-2">DICT Netiquette</h3>
                    <p class="text-sm text-zinc-400 leading-relaxed mb-6">Online Safety Through Netiquette</p>
                    <a href="{{ asset('images/certificates/dict-netiquette.pdf') }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 border border-zinc-600 text-zinc-300 font-medium px-5 py-2.5 rounded-full hover:bg-zinc-700 hover:text-white transition-colors text-sm">
                        View Certificate
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </article>

            </div>
        </div>
    </section>

    <section id="counters" class="py-16 bg-zinc-50 dark:bg-zinc-900/40">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                {{-- TODO: Update placeholder numbers below with real stats --}}
                <div class="reveal d1 text-center">
                    <span class="block font-display font-bold text-5xl text-zinc-900 dark:text-white">3</span>
                    <p class="mt-2 text-xs uppercase tracking-widest text-zinc-500">Projects Completed</p>
                </div>
                <div class="reveal d2 text-center">
                    <span class="block font-display font-bold text-5xl text-zinc-900 dark:text-white">2</span>
                    <p class="mt-2 text-xs uppercase tracking-widest text-zinc-500">Years Coding</p>
                </div>
                <div class="reveal d3 text-center">
                    <span class="block font-display font-bold text-5xl text-zinc-900 dark:text-white">1</span>
                    <p class="mt-2 text-xs uppercase tracking-widest text-zinc-500">Certifications Earned</p>
                </div>
                <div class="reveal d4 text-center">
                    <span class="block font-display font-bold text-5xl text-zinc-900 dark:text-white">5</span>
                    <p class="mt-2 text-xs uppercase tracking-widest text-zinc-500">Technologies Used</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="scroll-mt-20 bg-neutral-950">
        <div class="mx-auto max-w-6xl px-6 py-24">
            <p class="mb-4 text-center text-sm uppercase tracking-[0.35em] text-neutral-400">Contact</p>
            <h2 class="text-center text-3xl font-bold tracking-tight text-neutral-100 md:text-4xl">
                Get In <span class="text-emerald-400">Touch</span>
            </h2>

            <div class="mt-16 grid gap-8 lg:grid-cols-2">
                <div class="space-y-6">
                    <div class="rounded-sm border border-neutral-800 bg-neutral-900 p-6">
                        <p class="text-sm uppercase tracking-widest text-neutral-400">Email</p>
                        <a href="mailto:lucenorexjr.913@gmail.com" class="mt-1 block text-lg font-semibold break-all text-neutral-100 transition hover:text-emerald-400">
                            lucenorexjr.913@gmail.com
                        </a>
                    </div>
                    <div class="rounded-sm border border-neutral-800 bg-neutral-900 p-6">
                        <p class="text-sm uppercase tracking-widest text-neutral-400">Phone</p>
                        <a href="tel:09387802526" class="mt-1 block text-lg font-semibold text-neutral-100 transition hover:text-emerald-400">
                            0938-780-2526
                        </a>
                    </div>
                    <div class="rounded-sm border border-neutral-800 bg-neutral-900 p-6">
                        <p class="text-sm uppercase tracking-widest text-neutral-400">GitHub</p>
                        <a href="https://github.com/rexdlucenojr" target="_blank" rel="noopener noreferrer"
                            class="mt-1 block text-lg font-semibold break-all text-neutral-100 transition hover:text-emerald-400">
                            github.com/rexdlucenojr
                        </a>
                    </div>
                </div>

                <div class="rounded-sm border border-neutral-800 bg-neutral-900 p-8">
                    @if (session('success'))
                        <div class="mb-6 rounded-sm border border-emerald-400/40 bg-emerald-400/10 p-4 text-emerald-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label for="name" class="mb-2 block text-sm uppercase tracking-widest text-neutral-400">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="w-full border border-neutral-700 bg-neutral-950 p-4 text-neutral-100 placeholder-neutral-500 transition focus:border-emerald-400 focus:outline-none"
                                placeholder="Your name">
                            @error('name')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="mb-2 block text-sm uppercase tracking-widest text-neutral-400">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full border border-neutral-700 bg-neutral-950 p-4 text-neutral-100 placeholder-neutral-500 transition focus:border-emerald-400 focus:outline-none"
                                placeholder="you@example.com">
                            @error('email')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="mb-2 block text-sm uppercase tracking-widest text-neutral-400">Message</label>
                            <textarea id="message" name="message" rows="5"
                                class="w-full resize-none border border-neutral-700 bg-neutral-950 p-4 text-neutral-100 placeholder-neutral-500 transition focus:border-emerald-400 focus:outline-none"
                                placeholder="Write your message...">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="rounded-sm bg-emerald-400 px-8 py-4 text-sm font-semibold uppercase tracking-widest text-neutral-950 transition hover:bg-emerald-300">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection