const htmlEl = document.documentElement;
const nav = document.querySelector('header');
const navToggle = document.getElementById('nav-toggle');
const mobileNav = document.getElementById('mobile-nav');
const iconOpen = document.getElementById('nav-icon-open');
const iconClose = document.getElementById('nav-icon-close');
const navLinks = document.querySelectorAll('.nav-link');
const yearEl = document.getElementById('yr');

function applyTheme(dark) {
    htmlEl.classList.toggle('dark', dark);
    localStorage.setItem('theme', dark ? 'dark' : 'light');
    const btn = document.getElementById('theme-toggle');
    if (btn) {
        btn.setAttribute('aria-label', dark ? 'Light mode' : 'Dark mode');
        const sun = document.getElementById('theme-icon-sun');
        const moon = document.getElementById('theme-icon-moon');
        if (sun) sun.classList.toggle('hidden', dark);
        if (moon) moon.classList.toggle('hidden', !dark);
    }
}

function updateSection() {
    const ids = ['contact', 'certifications', 'skills', 'education', 'about', 'home'];
    const atBottom = window.innerHeight + window.scrollY >= document.body.scrollHeight - 60;
    if (atBottom) {
        setActive('contact');
        return;
    }
    for (const id of ids) {
        const el = document.getElementById(id);
        if (el && window.scrollY >= el.offsetTop - 130) {
            setActive(id);
            return;
        }
    }
}

function setActive(id) {
    navLinks.forEach((link) => {
        const on = link.getAttribute('href') === `#${id}`;
        link.classList.toggle('on', on);
        if (on) {
            link.classList.add('!text-zinc-900', 'dark:!text-white');
        } else {
            link.classList.remove('!text-zinc-900', 'dark:!text-white');
        }
    });
}

if (navToggle && mobileNav) {
    navToggle.addEventListener('click', () => {
        const isOpen = mobileNav.classList.toggle('hidden') === false;
        navToggle.setAttribute('aria-expanded', String(isOpen));
        iconOpen?.classList.toggle('hidden', isOpen);
        iconClose?.classList.toggle('hidden', !isOpen);
        document.body.classList.toggle('overflow-hidden', isOpen);
    });

    mobileNav.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            mobileNav.classList.add('hidden');
            navToggle.setAttribute('aria-expanded', 'false');
            iconOpen?.classList.remove('hidden');
            iconClose?.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
    });
}

const themeToggle = document.getElementById('theme-toggle');
if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        applyTheme(!htmlEl.classList.contains('dark'));
    });
}

window.addEventListener(
    'scroll',
    () => {
        if (nav) {
            nav.classList.toggle('is-scrolled', window.scrollY > 20);
        }
        updateSection();
    },
    { passive: true },
);

const io = new IntersectionObserver(
    (entries) => {
        entries.forEach((e) => {
            if (e.isIntersecting) {
                e.target.classList.add('in');
                io.unobserve(e.target);
            }
        });
    },
    { threshold: 0.1, rootMargin: '0px 0px -40px 0px' },
);

document.querySelectorAll('.reveal').forEach((el) => io.observe(el));

if (yearEl) {
    yearEl.textContent = new Date().getFullYear();
}

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!reduceMotion) {
    const sections = document.querySelectorAll('main > section');

    if (sections.length && 'IntersectionObserver' in window) {
        document.body.classList.add('sections-ready');

        const sectionIO = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('creep-in');
                        sectionIO.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.08, rootMargin: '0px 0px -60px 0px' },
        );

        sections.forEach((section) => sectionIO.observe(section));
    }

    const flicker = () => {
        htmlEl.classList.add('lights-flicker');
        const duration = 600 + Math.random() * 700;

        window.setTimeout(() => htmlEl.classList.remove('lights-flicker'), duration);
        window.setTimeout(flicker, duration + 5000 + Math.random() * 9000);
    };

    window.setTimeout(flicker, 3000);
}

const trailCanvas = document.getElementById('cursor-trail');
const finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

if (trailCanvas && !reduceMotion && finePointer) {
    const ctx = trailCanvas.getContext('2d');

    if (ctx) {
        let points = [];
        let rafId = null;
        let dpr = 1;
        let lastPointAt = 0;

        const resizeTrail = () => {
            dpr = Math.max(
                0.5,
                Math.min(
                    window.devicePixelRatio || 1,
                    2,
                    1440 / window.innerWidth,
                    900 / window.innerHeight,
                ),
            );
            trailCanvas.width = Math.floor(window.innerWidth * dpr);
            trailCanvas.height = Math.floor(window.innerHeight * dpr);
            trailCanvas.style.width = `${window.innerWidth}px`;
            trailCanvas.style.height = `${window.innerHeight}px`;
            ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        };

        const drawTrail = () => {
            ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);

            for (let i = points.length - 1; i >= 0; i--) {
                const point = points[i];
                point.life *= 0.88;

                if (point.life < 0.025) {
                    points.splice(i, 1);
                    continue;
                }

                ctx.beginPath();
                ctx.fillStyle = `rgba(179, 0, 0, ${point.life * 0.22})`;
                ctx.arc(point.x, point.y, 2 + (1 - point.life) * 9, 0, Math.PI * 2);
                ctx.fill();
            }

            if (points.length) {
                rafId = requestAnimationFrame(drawTrail);
            } else {
                rafId = null;
                ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);
            }
        };

        const addTrailPoint = (event) => {
            if (event.pointerType && event.pointerType !== 'mouse') {
                return;
            }

            const now = performance.now();
            if (now - lastPointAt < 16) {
                return;
            }
            lastPointAt = now;

            points.push({ x: event.clientX, y: event.clientY, life: 1 });
            if (points.length > 22) {
                points.shift();
            }

            if (rafId === null) {
                rafId = requestAnimationFrame(drawTrail);
            }
        };

        resizeTrail();
        window.addEventListener('resize', resizeTrail, { passive: true });
        window.addEventListener('pointermove', addTrailPoint, { passive: true });
        window.addEventListener('blur', () => {
            points = [];
        });
    }
}

updateSection();