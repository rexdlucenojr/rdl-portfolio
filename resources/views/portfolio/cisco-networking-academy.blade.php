@extends('layouts.app')

@section('title', 'Cisco Networking Academy — Rex Decuan Luceño Jr.')

@section('content')
    @php($certificate = 'files/Introduction_to_Modern_AI_certificate_lucenorexjr-913-gmail-com_7aa4436e-9072-411f-8698-ecf1c211164d.pdf')

    <section class="relative pt-32 pb-24 md:pt-40 md:pb-32 overflow-hidden">
        <div class="absolute top-32 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-zinc-200/50 dark:bg-zinc-800/30 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6">
            <div class="max-w-3xl mb-12 md:mb-16">
                <a href="{{ route('home') }}#certifications" class="reveal inline-flex items-center gap-2 text-sm text-zinc-500 dark:text-zinc-400 hover:text-accent transition-colors mb-8">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m0 0l6 6m-6-6l6-6"/></svg>
                    Back to credentials
                </a>

                <p class="reveal text-sm font-medium text-accent tracking-widest uppercase mb-4">Credential</p>
                <h1 class="reveal d1 font-display font-bold text-5xl md:text-6xl lg:text-7xl leading-[1.05] tracking-tight text-zinc-900 dark:text-white mb-6">
                    Cisco Networking <span class="text-accent">Academy</span>
                </h1>
                <p class="reveal d2 text-lg md:text-xl text-zinc-500 dark:text-zinc-400 font-light leading-relaxed max-w-2xl">
                    I completed the Introduction to Modern AI course through the Cisco Networking Academy. Replace this short introduction with your own notes about the course, what you learned, and how you plan to apply it.
                </p>
            </div>

            <article class="reveal d3 card-h bg-white dark:bg-zinc-900 rounded-2xl border border-zinc-100 dark:border-zinc-800 p-6 md:p-8">
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-8">
                    <div>
                        <div class="w-12 h-12 flex items-center justify-center bg-orange-50 dark:bg-zinc-800 rounded-xl mb-5">
                            <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zM6 15a2.25 2.25 0 100 4.5A2.25 2.25 0 006 15zm12 0a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zm-6-6.75v4.5m0 0l-4.5 3.75M12 12.75l4.5 3.75"/></svg>
                        </div>
                        <p class="text-xs uppercase tracking-widest text-zinc-400 mb-2">Course credential</p>
                        <h2 class="font-display font-bold text-3xl md:text-4xl text-zinc-900 dark:text-white mb-2">Introduction to Modern AI</h2>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">Cisco Networking Academy</p>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ $certificate }}" target="_blank" rel="noopener noreferrer"
                            class="shimmer inline-flex items-center gap-2 bg-accent text-white font-medium px-5 py-2.5 rounded-full hover:bg-accent-light transition-colors text-sm">
                            View Certificate
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ $certificate }}" download="Introduction_to_Modern_AI_certificate_lucenorexjr-913-gmail-com_7aa4436e-9072-411f-8698-ecf1c211164d.pdf"
                            class="inline-flex items-center gap-2 border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 font-medium px-5 py-2.5 rounded-full hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors text-sm">
                            Download
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        </a>
                    </div>
                </div>

                <div class="cert-preview" role="region" aria-label="Embedded Introduction to Modern AI certificate preview">
                    <object data="{{ $certificate }}" type="application/pdf" title="Introduction to Modern AI certificate PDF preview">
                        <p class="cert-preview__fallback">
                            This browser cannot display the embedded PDF.
                            <a href="{{ $certificate }}" target="_blank" rel="noopener noreferrer">Open the certificate PDF in a new tab</a>.
                        </p>
                    </object>
                </div>

                <p class="mt-4 text-xs text-zinc-500 dark:text-zinc-400">
                    If the preview does not load,
                    <a href="{{ $certificate }}" target="_blank" rel="noopener noreferrer" class="text-accent hover:text-accent-light underline underline-offset-2">view the certificate PDF directly</a>.
                </p>
            </article>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .cert-preview {
            position: relative;
            width: 100%;
            height: min(70vh, 680px);
            min-height: 380px;
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #070b1a;
        }

        .cert-preview object {
            display: block;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .cert-preview__fallback {
            margin: 0;
            padding: 24px;
            color: var(--text);
            font-family: var(--font-sans);
            line-height: 1.6;
        }

        .cert-preview__fallback a {
            color: var(--accent-cyan);
            text-decoration: underline;
            text-underline-offset: 2px;
        }

        @media (max-width: 640px) {
            .cert-preview {
                height: 68vh;
                min-height: 420px;
            }
        }
    </style>
@endpush
