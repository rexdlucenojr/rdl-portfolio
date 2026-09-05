const navToggle = document.getElementById('nav-toggle');
const mobileNav = document.getElementById('mobile-nav');
const iconOpen = document.getElementById('nav-icon-open');
const iconClose = document.getElementById('nav-icon-close');

if (navToggle && mobileNav) {
    navToggle.addEventListener('click', () => {
        const isOpen = mobileNav.classList.toggle('hidden') === false;

        navToggle.setAttribute('aria-expanded', String(isOpen));
        iconOpen?.classList.toggle('hidden', isOpen);
        iconClose?.classList.toggle('hidden', !isOpen);
    });

    mobileNav.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            mobileNav.classList.add('hidden');
            navToggle.setAttribute('aria-expanded', 'false');
            iconOpen?.classList.remove('hidden');
            iconClose?.classList.add('hidden');
        });
    });
}