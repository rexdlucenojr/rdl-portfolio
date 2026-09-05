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
@endsection