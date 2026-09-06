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
    const ids = ['contact', 'counters', 'certifications', 'skills', 'education', 'about', 'home'];
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

updateSection();