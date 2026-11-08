@php
    $projects = [
        [
            'title' => 'DCCP Attendance System',
            'image' => 'img/dccp%20attendance%20system.jpg',
            'alt' => 'DCCP Attendance System interface preview',
            'description' => 'A digital attendance platform built for DCCP. Replace this with a short overview of the project.',
        ],
        [
            'title' => 'DCCP QR Code System',
            'image' => 'img/dccp%20qr%20code%20system.jpg',
            'alt' => 'DCCP QR Code System interface preview',
            'description' => 'A QR-based check-in and verification system for DCCP. Replace this with a short overview of the project.',
        ],
        [
            'title' => 'HGS System',
            'image' => 'img/hgs%20system.jpeg',
            'alt' => 'HGS System interface preview',
            'description' => 'A management system built for HGS. Replace this with a short overview of the system and your role.',
        ],
        [
            'title' => 'Vapeshop in Tayum',
            'image' => 'img/vapeshop%20in%20tayum.png',
            'alt' => 'Vapeshop in Tayum website preview',
            'description' => 'A website for Vapeshop in Tayum. Replace this with a short overview of the project.',
        ],
    ];
@endphp

<section id="projects" class="py-24 bg-zinc-50 dark:bg-zinc-900/40">
    <div class="max-w-6xl mx-auto px-6">
        <div class="mb-14 text-center">
            <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Selected work</p>
            <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">My <span class="text-accent">Projects</span></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($projects as $project)
                @php($isDark = $loop->even)
                <article class="reveal d{{ $loop->iteration }} card-h group flex flex-col rounded-2xl border hover:border-accent overflow-hidden {{ $isDark ? 'bg-zinc-900 dark:bg-zinc-800 border-zinc-800' : 'bg-white dark:bg-zinc-900 border-zinc-100 dark:border-zinc-800' }}">
                    <button type="button"
                        class="project-shot relative block w-full aspect-[4/3] overflow-hidden bg-zinc-100 dark:bg-zinc-950 text-left"
                        data-lightbox-src="{{ $project['image'] }}"
                        data-lightbox-alt="{{ $project['alt'] }}"
                        data-lightbox-title="{{ $project['title'] }}"
                        aria-label="Open larger image of {{ $project['title'] }}">
                        <img src="{{ $project['image'] }}"
                            alt="{{ $project['alt'] }}"
                            loading="lazy"
                            decoding="async"
                            class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                        <span class="project-shot__hint" aria-hidden="true">Click to enlarge</span>
                    </button>

                    <div class="flex flex-col flex-1 p-8">
                        <h3 class="font-display font-bold text-2xl mb-2 {{ $isDark ? 'text-white' : 'text-zinc-900 dark:text-white' }}">{{ $project['title'] }}</h3>
                        <p class="text-sm leading-relaxed {{ $isDark ? 'text-zinc-400' : 'text-zinc-500 dark:text-zinc-400' }}">{{ $project['description'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<dialog id="project-lightbox" class="project-lightbox" aria-label="Project image preview">
    <button type="button" class="project-lightbox__close" data-lightbox-close aria-label="Close image preview">&times;</button>
    <img id="project-lightbox-image" src="" alt="Project image preview">
    <p id="project-lightbox-caption" class="project-lightbox__caption"></p>
</dialog>

@push('styles')
    <style>
        .project-shot {
            cursor: zoom-in;
        }

        .project-shot:focus-visible {
            outline: 2px solid var(--accent-cyan);
            outline-offset: -2px;
        }

        .project-shot__hint {
            position: absolute;
            right: 10px;
            bottom: 10px;
            padding: 5px 9px;
            border: 1px solid var(--line-strong);
            border-radius: 6px;
            background: rgba(7, 11, 26, 0.88);
            color: var(--text);
            font-family: var(--font-mono);
            font-size: 0.62rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            opacity: 0;
            transform: translateY(6px);
            transition: opacity 0.25s ease, transform 0.25s ease;
            pointer-events: none;
        }

        .project-shot:hover .project-shot__hint,
        .project-shot:focus-visible .project-shot__hint {
            opacity: 1;
            transform: none;
        }

        .project-lightbox {
            width: min(94vw, 1200px);
            max-width: 1200px;
            max-height: 92vh;
            margin: auto;
            padding: 0;
            border: 1px solid var(--line-strong);
            border-radius: 10px;
            background: #070b1a;
            color: var(--text);
            box-shadow:
                0 0 0 1px rgba(34, 211, 238, 0.12),
                0 30px 90px rgba(0, 0, 0, 0.85),
                0 0 70px -20px var(--glow-cyan);
            overflow: hidden;
        }

        .project-lightbox[open] {
            display: flex;
            flex-direction: column;
        }

        .project-lightbox::backdrop {
            background: rgba(3, 6, 16, 0.88);
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
        }

        .project-lightbox img {
            display: block;
            width: 100%;
            height: auto;
            max-height: calc(92vh - 62px);
            min-height: 0;
            object-fit: contain;
            background: #050813;
        }

        .project-lightbox__caption {
            flex-shrink: 0;
            margin: 0;
            padding: 15px 56px 16px 18px;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-family: var(--font-mono);
            font-size: 0.72rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .project-lightbox__close {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 2;
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border: 1px solid var(--line-strong);
            border-radius: 50%;
            background: rgba(7, 11, 26, 0.88);
            color: var(--text);
            font-family: var(--font-mono);
            font-size: 1.35rem;
            line-height: 1;
            cursor: pointer;
            transition: background-color 0.2s ease, color 0.2s ease, box-shadow 0.2s ease;
        }

        .project-lightbox__close:hover {
            background: var(--accent-cyan);
            color: #04101a;
            box-shadow: 0 0 24px var(--glow-cyan);
        }

        .project-lightbox__close:focus-visible {
            outline: 2px solid var(--accent-cyan);
            outline-offset: 3px;
        }

        @media (max-width: 767px) {
            .project-lightbox {
                width: 96vw;
                max-height: 94vh;
            }

            .project-lightbox img {
                max-height: calc(94vh - 56px);
            }

            .project-lightbox__caption {
                padding: 12px 48px 13px 14px;
                font-size: 0.66rem;
            }

            .project-lightbox__close {
                top: 8px;
                right: 8px;
                width: 34px;
                height: 34px;
                font-size: 1.2rem;
            }

            .project-shot__hint {
                display: none;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .project-shot img,
            .project-shot__hint,
            .project-lightbox__close {
                transition: none;
            }

            .project-shot:hover img {
                transform: none;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        (() => {
            const dialog = document.getElementById('project-lightbox');
            const image = document.getElementById('project-lightbox-image');
            const caption = document.getElementById('project-lightbox-caption');
            const closeButton = dialog ? dialog.querySelector('[data-lightbox-close]') : null;

            if (!dialog || !image || !caption || !closeButton) {
                return;
            }

            let lastTrigger = null;

            const reset = () => {
                document.body.style.overflow = '';

                if (lastTrigger) {
                    lastTrigger.focus();
                    lastTrigger = null;
                }
            };

            const close = () => {
                if (dialog.open) {
                    dialog.close();
                    return;
                }

                dialog.removeAttribute('open');
                reset();
            };

            document.querySelectorAll('[data-lightbox-src]').forEach((trigger) => {
                trigger.addEventListener('click', () => {
                    lastTrigger = trigger;
                    image.src = trigger.dataset.lightboxSrc || '';
                    image.alt = trigger.dataset.lightboxAlt || '';
                    caption.textContent = trigger.dataset.lightboxTitle || '';
                    document.body.style.overflow = 'hidden';

                    if (typeof dialog.showModal === 'function') {
                        dialog.showModal();
                    } else {
                        dialog.setAttribute('open', '');
                    }
                });
            });

            closeButton.addEventListener('click', close);

            dialog.addEventListener('click', (event) => {
                if (event.target === dialog) {
                    close();
                }
            });

            dialog.addEventListener('cancel', (event) => {
                event.preventDefault();
                close();
            });

            dialog.addEventListener('close', reset);
        })();
    </script>
@endpush
