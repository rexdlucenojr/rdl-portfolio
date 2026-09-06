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

                <article class="reveal d3 card-h group bg-white dark:bg-zinc-900 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-800 hover:border-accent md:col-span-2">
                    <div class="w-12 h-12 flex items-center justify-center bg-orange-50 dark:bg-zinc-800 rounded-xl mb-6 group-hover:bg-accent/10 transition-colors">
                        <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-2xl text-zinc-900 dark:text-white mb-3">CHED SEEDLING Project</h3>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-6">
                        For actively participating in the Special Episode of the 2026 Series of the Skills Enhancement, Engagement, and Development: A Learning Intervention to Nurture Grantee (SEEDLING) Project entitled &quot;STAY ALERT, STAY SECURE: PROMOTING CYBER AWARENESS AND ONLINE SCAM PREVENTION,&quot; held on July 23, 2026, from 1:30 PM - 5:00 PM.
                    </p>
                    <a href="{{ asset('images/certificates/ched-certificate.pdf') }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 font-medium px-5 py-2.5 rounded-full hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors text-sm">
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

    <section id="contact" class="py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-zinc-900 dark:bg-zinc-800 rounded-3xl p-10 md:p-16 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-accent/20 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-accent/10 rounded-full blur-2xl pointer-events-none" aria-hidden="true"></div>

                <div class="relative z-10 grid md:grid-cols-2 gap-12 items-start">

                    <div>
                        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Get in touch</p>
                        <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-white leading-tight mb-5">Let's work<br>together</h2>
                        <p class="reveal d2 text-zinc-400 leading-relaxed mb-8">&quot;Innovate. Create. Elevate.&quot; — I'm open to opportunities in coding, networking, and hardware.</p>

                        <div class="reveal d3 flex flex-col gap-4">
                            <a href="mailto:lucenorexjr.913@gmail.com" class="group flex items-center gap-3 text-zinc-400 hover:text-white transition-colors">
                                <span class="w-9 h-9 flex items-center justify-center bg-zinc-800 rounded-lg group-hover:bg-accent/20 transition-colors shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                                </span>
                                <span class="text-sm">lucenorexjr.913@gmail.com</span>
                            </a>
                            <a href="tel:09387802526" class="group flex items-center gap-3 text-zinc-400 hover:text-white transition-colors">
                                <span class="w-9 h-9 flex items-center justify-center bg-zinc-800 rounded-lg group-hover:bg-accent/20 transition-colors shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                                </span>
                                <span class="text-sm">0938-780-2526</span>
                            </a>
                            <a href="https://github.com/rexdlucenojr" target="_blank" rel="noopener noreferrer" class="group flex items-center gap-3 text-zinc-400 hover:text-white transition-colors">
                                <span class="w-9 h-9 flex items-center justify-center bg-zinc-800 rounded-lg group-hover:bg-accent/20 transition-colors shrink-0">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                </span>
                                <span class="text-sm">github.com/rexdlucenojr</span>
                            </a>
                        </div>
                    </div>

                    <div class="reveal d2">
                        @if (session('success'))
                            <div class="mb-6 rounded-xl border border-accent/40 bg-accent/10 p-4 text-accent-light">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.submit') }}" class="flex flex-col gap-4">
                            @csrf

                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-xs font-medium text-zinc-400 mb-1.5">Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" autocomplete="name"
                                        class="w-full bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors"
                                        placeholder="Your name">
                                    @error('name')
                                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-xs font-medium text-zinc-400 mb-1.5">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email"
                                        class="w-full bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors"
                                        placeholder="you@example.com">
                                    @error('email')
                                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="message" class="block text-xs font-medium text-zinc-400 mb-1.5">Message</label>
                                <textarea id="message" name="message" rows="5"
                                    class="w-full resize-none bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors"
                                    placeholder="Write your message...">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="shimmer w-full bg-accent text-white font-display font-bold text-sm py-3.5 rounded-xl hover:bg-accent-light transition-colors">
                                Send Message
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection