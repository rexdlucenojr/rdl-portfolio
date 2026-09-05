@extends('layouts.app')

@section('content')
    <section id="home" class="relative overflow-hidden bg-neutral-950">
        <div class="mx-auto grid min-h-[calc(100vh-73px)] max-w-6xl items-center gap-12 px-6 py-20 md:grid-cols-2">
            <div>
                <p class="mb-6 text-sm uppercase tracking-[0.35em] text-neutral-400">Hello! I'm</p>
                <h1 class="text-5xl font-bold leading-tight tracking-tight md:text-6xl lg:text-7xl">
                    Rex
                    <span class="block text-neutral-400">Decuan</span>
                    <span class="block">Luceño Jr.</span>
                </h1>
                <p class="mt-6 text-lg text-neutral-300">IT Student</p>
                <p class="mt-4 text-xl font-medium text-emerald-400">"Innovate. Create. Elevate."</p>
                <a href="#about"
                    class="mt-10 inline-flex items-center gap-2 rounded-sm border border-neutral-700 px-6 py-3 text-sm uppercase tracking-widest transition hover:border-white hover:bg-white hover:text-neutral-950">
                    Read bio <span aria-hidden="true">&gt;</span>
                </a>
            </div>
            <div class="relative mx-auto w-full max-w-md">
                <img src="{{ asset('images/profile.jpeg') }}" alt="Rex Decuan Luceño Jr."
                    class="aspect-[3/4] w-full rounded-sm object-cover shadow-2xl shadow-black/40 ring-1 ring-neutral-800">
            </div>
        </div>
    </section>

    <section id="about" class="bg-neutral-900">
        <div class="mx-auto grid max-w-6xl items-center gap-12 px-6 py-24 md:grid-cols-[2fr_3fr]">
            <div class="mx-auto w-full max-w-sm">
                <img src="{{ asset('images/profile.jpeg') }}" alt="About Rex Decuan Luceño Jr."
                    class="aspect-[3/4] w-full rounded-sm object-cover ring-1 ring-neutral-700">
            </div>
            <div>
                <p class="mb-4 text-sm uppercase tracking-[0.35em] text-neutral-400">About me</p>
                <h2 class="text-3xl font-bold tracking-tight md:text-4xl">
                    Rex Decuan <span class="text-neutral-400">Luceño Jr.</span>
                </h2>
                <p class="mt-6 text-lg leading-relaxed text-neutral-300">
                    4th year IT student aiming to build a successful career in tech and provide a good
                    life for my family. Passionate about coding, networking, and hardware.
                </p>
            </div>
        </div>
    </section>

    <section id="education" class="bg-neutral-950">
        <div class="mx-auto max-w-6xl px-6 py-24">
            <p class="mb-4 text-center text-sm uppercase tracking-[0.35em] text-neutral-400">Education</p>
            <h2 class="text-center text-3xl font-bold tracking-tight text-neutral-100 md:text-4xl">
                Where I've <span class="text-emerald-400">Studied</span>
            </h2>
            <div class="mt-16 grid gap-6 md:grid-cols-2">
                <div class="rounded-sm border border-neutral-800 bg-neutral-900 p-8 transition hover:border-emerald-400/50">
                    <p class="text-sm uppercase tracking-widest text-emerald-400">Bachelor of Science in Information Technology</p>
                    <h3 class="mt-3 text-xl font-bold text-neutral-100">Data Center College of the Philippines</h3>
                    <p class="mt-1 text-sm text-neutral-400">Bangued, Abra</p>
                </div>
                <div class="rounded-sm border border-neutral-800 bg-neutral-900 p-8 transition hover:border-emerald-400/50">
                    <p class="text-sm uppercase tracking-widest text-emerald-400">Secondary</p>
                    <h3 class="mt-3 text-xl font-bold text-neutral-100">Abra High School - Main Campus</h3>
                    <p class="mt-1 text-sm text-neutral-400">Class of 2017</p>
                </div>
            </div>
        </div>
    </section>

    <section id="skills" class="bg-neutral-900">
        <div class="mx-auto max-w-6xl px-6 py-24">
            <p class="mb-4 text-center text-sm uppercase tracking-[0.35em] text-neutral-400">Skills</p>
            <h2 class="text-center text-3xl font-bold tracking-tight text-neutral-100 md:text-4xl">
                What I'm <span class="text-emerald-400">Good At</span>
            </h2>
            <div class="mt-16 grid gap-6 md:grid-cols-3">
                @foreach (['Coding', 'Network Configuration', 'Hardware Deployment'] as $skill)
                    <div class="rounded-sm border border-neutral-800 bg-neutral-950 p-8 text-center transition hover:border-emerald-400/50">
                        <p class="text-lg font-semibold text-neutral-100">{{ $skill }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="certifications" class="bg-neutral-950">
        <div class="mx-auto max-w-6xl px-6 py-24">
            <p class="mb-4 text-center text-sm uppercase tracking-[0.35em] text-neutral-400">Certifications</p>
            <h2 class="text-center text-3xl font-bold tracking-tight text-neutral-100 md:text-4xl">
                Credentials I've <span class="text-emerald-400">Earned</span>
            </h2>
            <div class="mx-auto mt-16 max-w-2xl rounded-sm border border-neutral-800 bg-neutral-900 p-8 text-center transition hover:border-emerald-400/50">
                <p class="text-2xl font-bold text-emerald-400">TESDA CSS / NC2</p>
                <p class="mt-2 text-sm uppercase tracking-widest text-neutral-400">Computer Systems Servicing, National Certificate II</p>
                <p class="mt-4 text-neutral-300">September 2025</p>
            </div>
        </div>
    </section>

    <section id="counters" class="bg-neutral-900">
        <div class="mx-auto max-w-6xl px-6 py-16">
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                {{-- TODO: Update placeholder numbers below with real stats --}}
                <div class="text-center">
                    <span class="block text-5xl font-black text-emerald-400">3</span>
                    <p class="mt-2 text-sm uppercase tracking-widest text-neutral-300">Projects Completed</p>
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-black text-emerald-400">2</span>
                    <p class="mt-2 text-sm uppercase tracking-widest text-neutral-300">Years Coding</p>
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-black text-emerald-400">1</span>
                    <p class="mt-2 text-sm uppercase tracking-widest text-neutral-300">Certifications Earned</p>
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-black text-emerald-400">5</span>
                    <p class="mt-2 text-sm uppercase tracking-widest text-neutral-300">Technologies Used</p>
                </div>
            </div>
        </div>
    </section>
@endsection