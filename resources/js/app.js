const htmlEl = document.documentElement;
const nav = document.querySelector('header');
const navToggle = document.getElementById('nav-toggle');
const mobileNav = document.getElementById('mobile-nav');
const iconOpen = document.getElementById('nav-icon-open');
const iconClose = document.getElementById('nav-icon-close');
const navLinks = document.querySelectorAll('.nav-link');
const yearEl = document.getElementById('yr');
const progressBar = document.getElementById('scroll-progress');
const typeEl = document.getElementById('hero-type');
const reduceMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
let reduceMotion = reduceMotionQuery.matches;

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
    if (!document.getElementById('home')) return;
    const ids = ['contact', 'projects', 'certifications', 'skills', 'education', 'about', 'home'];
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

function updateProgress() {
    if (!progressBar) return;
    const max = htmlEl.scrollHeight - window.innerHeight;
    const progress = max > 0 ? Math.min(1, Math.max(0, window.scrollY / max)) : 0;
    progressBar.style.transform = `scaleX(${progress})`;
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
        updateProgress();
    },
    { passive: true },
);

window.addEventListener('resize', updateProgress, { passive: true });

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

if (!reduceMotion) {
    const sections = document.querySelectorAll('main > section');

    if (sections.length && 'IntersectionObserver' in window) {
        document.body.classList.add('sections-ready');

        const sectionIO = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('section-in');
                        sectionIO.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.08, rootMargin: '0px 0px -60px 0px' },
        );

        sections.forEach((section) => sectionIO.observe(section));
    }
}

const roles = [
    'Web Developer',
    'Computer Systems Servicing NC II',
    'Networking Enthusiast',
    'Problem Solver',
];

let typeTimer = null;
let roleIndex = 0;
let charIndex = 0;
let deleting = false;

function stopTyping() {
    if (typeTimer) {
        clearTimeout(typeTimer);
        typeTimer = null;
    }
}

function typeLoop() {
    if (!typeEl) return;

    const role = roles[roleIndex];

    if (!deleting) {
        charIndex += 1;
        typeEl.textContent = role.slice(0, charIndex);

        if (charIndex >= role.length) {
            deleting = true;
            typeTimer = setTimeout(typeLoop, 1500);
            return;
        }

        typeTimer = setTimeout(typeLoop, 58 + Math.random() * 46);
        return;
    }

    charIndex -= 1;
    typeEl.textContent = role.slice(0, charIndex);

    if (charIndex <= 0) {
        deleting = false;
        roleIndex = (roleIndex + 1) % roles.length;
        typeTimer = setTimeout(typeLoop, 380);
        return;
    }

    typeTimer = setTimeout(typeLoop, 28);
}

function startTyping() {
    if (!typeEl) return;

    stopTyping();

    if (reduceMotion) {
        typeEl.textContent = roles[0];
        return;
    }

    typeEl.textContent = '';
    roleIndex = 0;
    charIndex = 0;
    deleting = false;
    typeTimer = setTimeout(typeLoop, 420);
}

startTyping();

const scrambleChars = '01<>/{}#$%';
const scrambleTimers = new WeakMap();
const scrambleHeadings = document.querySelectorAll('main > section:not(#home) h1, main > section:not(#home) h2');

function collectTextNodes(root) {
    const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT);
    const nodes = [];
    let node = walker.nextNode();

    while (node) {
        if (node.nodeValue && node.nodeValue.trim()) {
            nodes.push(node);
        }
        node = walker.nextNode();
    }

    return nodes;
}

function scrambleHeading(heading) {
    if (reduceMotion || scrambleTimers.has(heading)) return;

    const nodes = collectTextNodes(heading);
    if (!nodes.length) return;

    const originals = nodes.map((node) => node.nodeValue);
    const totalFrames = 20;
    let frame = 0;

    const timer = setInterval(() => {
        frame += 1;
        const progress = frame / totalFrames;

        nodes.forEach((node, index) => {
            const original = originals[index];
            let next = '';

            for (let i = 0; i < original.length; i += 1) {
                const char = original[i];

                if (char === ' ' || char === '\n' || char === '\t') {
                    next += char;
                    continue;
                }

                next += i < progress * original.length
                    ? char
                    : scrambleChars[Math.floor(Math.random() * scrambleChars.length)];
            }

            node.nodeValue = next;
        });

        if (frame >= totalFrames) {
            clearInterval(timer);
            nodes.forEach((node, index) => {
                node.nodeValue = originals[index];
            });
            scrambleTimers.delete(heading);
        }
    }, 28);

    scrambleTimers.set(heading, timer);
}

scrambleHeadings.forEach((heading) => {
    heading.addEventListener('mouseenter', () => scrambleHeading(heading));
});

let pointerX = 0.5;
let pointerY = 0.32;
let pointerFrame = 0;

function applyPointer() {
    pointerFrame = 0;
    htmlEl.style.setProperty('--mx', `${(pointerX * 100).toFixed(2)}%`);
    htmlEl.style.setProperty('--my', `${(pointerY * 100).toFixed(2)}%`);
    htmlEl.style.setProperty('--bg-px', `${((pointerX - 0.5) * 12).toFixed(2)}px`);
    htmlEl.style.setProperty('--bg-py', `${((pointerY - 0.5) * 10).toFixed(2)}px`);
}

window.addEventListener(
    'pointermove',
    (event) => {
        if (reduceMotion) return;

        pointerX = event.clientX / window.innerWidth;
        pointerY = event.clientY / window.innerHeight;

        if (!pointerFrame) {
            pointerFrame = requestAnimationFrame(applyPointer);
        }
    },
    { passive: true },
);

const cursorDot = document.getElementById('cursor-dot');
const cursorRing = document.getElementById('cursor-ring');
const cursorTrail = document.getElementById('cursor-trail');
const finePointerQuery = window.matchMedia('(hover: hover) and (pointer: fine)');
const cursorTargets = 'a, button, [role="button"], .card-h, .stag, .project-shot, input, textarea, select, label';
const particleColors = ['34, 211, 238', '232, 121, 249'];
let cursorActive = false;
let cursorFrame = 0;
let cursorX = 0;
let cursorY = 0;
let dotX = 0;
let dotY = 0;
let ringX = 0;
let ringY = 0;
let lastPointerX = 0;
let lastPointerY = 0;
let lastTrailAt = 0;
let trailContext = null;
let trailScale = 1;
let particles = [];
let particleFrame = 0;
let lastParticleAt = 0;
let maxParticles = finePointerQuery.matches ? 180 : 80;

function setCursorTransform(el, x, y) {
    if (!el) return;
    el.style.transform = `translate3d(${x.toFixed(2)}px, ${y.toFixed(2)}px, 0) translate(-50%, -50%)`;
}

function sizeTrail() {
    if (!trailContext || !cursorTrail) return;

    const maxScale = Math.sqrt(4000000 / Math.max(1, window.innerWidth * window.innerHeight));
    trailScale = Math.max(0.35, Math.min(Math.min(window.devicePixelRatio || 1, 2), maxScale));
    cursorTrail.width = Math.floor(window.innerWidth * trailScale);
    cursorTrail.height = Math.floor(window.innerHeight * trailScale);
    trailContext.setTransform(trailScale, 0, 0, trailScale, 0, 0);
    trailContext.clearRect(0, 0, window.innerWidth, window.innerHeight);
}

function initializeTrail() {
    if (!cursorTrail || !cursorDot || !cursorRing) return;

    trailContext = cursorTrail.getContext('2d', { alpha: true });
    if (!trailContext) return;

    sizeTrail();
    window.addEventListener('resize', sizeTrail, { passive: true });
}

function startCursorFrame() {
    if (cursorFrame || !cursorActive) return;
    cursorFrame = requestAnimationFrame(runCursorFrame);
}

function runCursorFrame() {
    cursorFrame = 0;
    if (!cursorActive) return;

    dotX += (cursorX - dotX) * 0.55;
    dotY += (cursorY - dotY) * 0.55;
    ringX += (cursorX - ringX) * 0.16;
    ringY += (cursorY - ringY) * 0.16;

    const dotSettled = Math.abs(cursorX - dotX) < 0.08 && Math.abs(cursorY - dotY) < 0.08;
    const ringSettled = Math.abs(cursorX - ringX) < 0.08 && Math.abs(cursorY - ringY) < 0.08;

    if (dotSettled) {
        dotX = cursorX;
        dotY = cursorY;
    }

    if (ringSettled) {
        ringX = cursorX;
        ringY = cursorY;
    }

    setCursorTransform(cursorDot, dotX, dotY);
    setCursorTransform(cursorRing, ringX, ringY);

    if (!dotSettled || !ringSettled) {
        cursorFrame = requestAnimationFrame(runCursorFrame);
    }
}

function activateCursor(x, y, pointerType) {
    if (cursorActive || reduceMotion || pointerType !== 'mouse') return;
    if (!cursorDot || !cursorRing || !cursorTrail) return;

    cursorActive = true;
    maxParticles = finePointerQuery.matches ? 180 : 80;
    cursorX = x;
    cursorY = y;
    dotX = x;
    dotY = y;
    ringX = x;
    ringY = y;
    lastPointerX = x;
    lastPointerY = y;

    setCursorTransform(cursorDot, x, y);
    setCursorTransform(cursorRing, x, y);
    cursorDot.classList.add('is-visible');
    cursorRing.classList.add('is-visible');

    requestAnimationFrame(() => {
        if (cursorActive) {
            htmlEl.classList.add('has-custom-cursor');
        }
    });

    startCursorFrame();
}

function deactivateCursor() {
    cursorActive = false;
    htmlEl.classList.remove('has-custom-cursor');
    cursorDot?.classList.remove('is-visible', 'is-hover', 'is-down');
    cursorRing?.classList.remove('is-visible', 'is-hover', 'is-down');

    if (cursorFrame) {
        cancelAnimationFrame(cursorFrame);
        cursorFrame = 0;
    }
}

function addParticle(particle) {
    if (particles.length >= maxParticles) {
        particles.shift();
    }

    particles.push(particle);
}

function startParticles() {
    if (particleFrame || reduceMotion || !trailContext || !particles.length) return;

    lastParticleAt = performance.now();
    particleFrame = requestAnimationFrame(runParticles);
}

function runParticles() {
    particleFrame = 0;
    if (!trailContext) return;

    const width = window.innerWidth;
    const height = window.innerHeight;

    if (reduceMotion || !particles.length) {
        trailContext.clearRect(0, 0, width, height);
        return;
    }

    const now = performance.now();
    const dt = Math.min(34, now - lastParticleAt || 16.7);
    const step = dt / 16.7;
    lastParticleAt = now;

    trailContext.clearRect(0, 0, width, height);
    trailContext.globalCompositeOperation = 'lighter';

    for (let i = particles.length - 1; i >= 0; i -= 1) {
        const particle = particles[i];
        particle.life -= dt;

        if (particle.life <= 0) {
            particles.splice(i, 1);
            continue;
        }

        particle.x += particle.vx * step;
        particle.y += particle.vy * step;
        particle.vx *= 0.992;
        particle.vy = particle.vy * 0.992 + 0.006 * step;

        const alpha = Math.max(0, particle.life / particle.maxLife);
        const radius = Math.max(0.3, particle.size * (0.35 + alpha * 0.65));

        trailContext.beginPath();
        trailContext.arc(particle.x, particle.y, radius, 0, Math.PI * 2);
        trailContext.fillStyle = `rgba(${particle.color},${(alpha * 0.8).toFixed(3)})`;
        trailContext.fill();
    }

    trailContext.globalCompositeOperation = 'source-over';

    if (particles.length) {
        particleFrame = requestAnimationFrame(runParticles);
    } else {
        trailContext.clearRect(0, 0, width, height);
    }
}

function spawnTrail(x, y, dx, dy) {
    if (!trailContext || reduceMotion) return;

    const now = performance.now();
    const distance = Math.hypot(dx, dy);

    if (now - lastTrailAt < 20 || distance < 4) return;

    lastTrailAt = now;

    const count = distance > 28 ? 2 : 1;
    const speed = Math.min(2.4, 0.35 + distance * 0.035);

    for (let i = 0; i < count; i += 1) {
        const life = 340 + Math.random() * 360;
        const angle = Math.atan2(-dy, -dx) + (Math.random() - 0.5) * 1.1;

        addParticle({
            x: x + (Math.random() - 0.5) * 4,
            y: y + (Math.random() - 0.5) * 4,
            vx: Math.cos(angle) * speed * (0.4 + Math.random() * 0.7) + (Math.random() - 0.5) * 0.5,
            vy: Math.sin(angle) * speed * (0.4 + Math.random() * 0.7) + (Math.random() - 0.5) * 0.5,
            size: 1 + Math.random() * 2.2,
            life,
            maxLife: life,
            color: particleColors[Math.random() > 0.45 ? 0 : 1],
        });
    }

    startParticles();
}

function spawnBurst(x, y, count) {
    if (!trailContext || reduceMotion) return;

    for (let i = 0; i < count; i += 1) {
        const angle = Math.random() * Math.PI * 2;
        const speed = 1.2 + Math.random() * 4;
        const life = 380 + Math.random() * 460;

        addParticle({
            x,
            y,
            vx: Math.cos(angle) * speed,
            vy: Math.sin(angle) * speed,
            size: 1.2 + Math.random() * 2.4,
            life,
            maxLife: life,
            color: particleColors[Math.random() > 0.5 ? 0 : 1],
        });
    }

    startParticles();
}

function clearParticles() {
    particles = [];

    if (particleFrame) {
        cancelAnimationFrame(particleFrame);
        particleFrame = 0;
    }

    if (trailContext) {
        trailContext.clearRect(0, 0, window.innerWidth, window.innerHeight);
    }
}

function resetCard(card) {
    card.style.transform = '';
    card.style.removeProperty('--card-mx');
    card.style.removeProperty('--card-my');
    card.classList.remove('is-tilting');
}

function resetInteractiveTransforms() {
    document.querySelectorAll('.card-h').forEach(resetCard);
    document.querySelectorAll('.shimmer').forEach((el) => {
        el.style.transform = '';
    });
}

function initializeCardEffects() {
    document.querySelectorAll('.card-h').forEach((card) => {
        if (card.querySelector('object, iframe, video')) return;

        card.addEventListener(
            'pointermove',
            (event) => {
                if (reduceMotion || event.pointerType === 'touch') return;

                const rect = card.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;
                const px = x / rect.width - 0.5;
                const py = y / rect.height - 0.5;

                card.classList.add('is-tilting');
                card.style.setProperty('--card-mx', `${x.toFixed(1)}px`);
                card.style.setProperty('--card-my', `${y.toFixed(1)}px`);
                card.style.transform = `perspective(900px) rotateX(${(-py * 3).toFixed(2)}deg) rotateY(${(px * 3.6).toFixed(2)}deg) translateY(-4px)`;
            },
            { passive: true },
        );

        card.addEventListener('pointerleave', () => resetCard(card), { passive: true });
        card.addEventListener('pointercancel', () => resetCard(card), { passive: true });
    });

    document.querySelectorAll('.shimmer').forEach((el) => {
        el.addEventListener(
            'pointermove',
            (event) => {
                if (reduceMotion || event.pointerType === 'touch') return;

                const rect = el.getBoundingClientRect();
                const max = 5;
                const tx = Math.max(-max, Math.min(max, (event.clientX - rect.left - rect.width / 2) * 0.18));
                const ty = Math.max(-max, Math.min(max, (event.clientY - rect.top - rect.height / 2) * 0.18));

                el.style.transform = `translate3d(${tx.toFixed(2)}px, ${ty.toFixed(2)}px, 0)`;
            },
            { passive: true },
        );

        el.addEventListener('pointerleave', () => {
            el.style.transform = '';
        }, { passive: true });
        el.addEventListener('pointercancel', () => {
            el.style.transform = '';
        }, { passive: true });
    });
}

initializeTrail();
initializeCardEffects();

window.addEventListener(
    'pointermove',
    (event) => {
        if (reduceMotion || event.pointerType === 'touch') return;

        if (document.querySelector('dialog[open]')) {
            if (cursorActive) deactivateCursor();
            return;
        }

        if (!cursorActive) {
            activateCursor(event.clientX, event.clientY, event.pointerType);
        }

        if (!cursorActive) return;

        cursorX = event.clientX;
        cursorY = event.clientY;

        const target = event.target instanceof Element ? event.target.closest(cursorTargets) : null;
        cursorDot?.classList.toggle('is-hover', Boolean(target));
        cursorRing?.classList.toggle('is-hover', Boolean(target));

        spawnTrail(event.clientX, event.clientY, event.clientX - lastPointerX, event.clientY - lastPointerY);

        lastPointerX = event.clientX;
        lastPointerY = event.clientY;
        startCursorFrame();
    },
    { passive: true },
);

window.addEventListener(
    'pointerdown',
    (event) => {
        if (reduceMotion || document.querySelector('dialog[open]')) return;

        if (event.pointerType === 'touch') {
            deactivateCursor();
            spawnBurst(event.clientX, event.clientY, 12);
            return;
        }

        if (!cursorActive) return;

        cursorRing?.classList.add('is-down');
        spawnBurst(event.clientX, event.clientY, 18);
    },
    { passive: true },
);

window.addEventListener(
    'pointerup',
    () => {
        cursorRing?.classList.remove('is-down');
    },
    { passive: true },
);

window.addEventListener(
    'pointercancel',
    () => {
        cursorRing?.classList.remove('is-down');
    },
    { passive: true },
);

document.querySelectorAll('dialog').forEach((dialog) => {
    new MutationObserver(() => {
        if (dialog.open) {
            deactivateCursor();
            resetInteractiveTransforms();
        }
    }).observe(dialog, { attributes: true, attributeFilter: ['open'] });
});

reduceMotionQuery.addEventListener?.('change', (event) => {
    reduceMotion = event.matches;

    if (reduceMotion) {
        stopTyping();
        if (typeEl) typeEl.textContent = roles[0];
        htmlEl.style.removeProperty('--bg-px');
        htmlEl.style.removeProperty('--bg-py');
        deactivateCursor();
        clearParticles();
        resetInteractiveTransforms();
    } else {
        startTyping();
    }
});

updateSection();
updateProgress();
