@extends('layouts.base')

@section('title', 'Rex Decuan Luceño Jr. — Editorial')
@section('body-class', 'ed-body')

@push('head')
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400;1,9..144,600&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endpush

@push('styles')
<style>
    :root {
        --ed-bg: #f3ede3;
        --ed-paper: #faf7f1;
        --ed-ink: #191614;
        --ed-muted: #6f675d;
        --ed-line: rgba(25, 22, 20, .14);
        --ed-accent: #e8552e;
        --ed-accent-deep: #c73f1b;
    }

    html { scroll-behavior: smooth; }

    body.ed-body {
        margin: 0;
        background: var(--ed-bg);
        color: var(--ed-ink);
        font-family: 'Manrope', system-ui, sans-serif;
        overflow-x: hidden;
        -webkit-font-smoothing: antialiased;
    }
    body.ed-body::before { content: none; }

    .ed-serif { font-family: 'Fraunces', Georgia, serif; }

    .ed-progress { position: fixed; top: 0; left: 0; height: 3px; width: 0; background: var(--ed-accent); z-index: 100; transition: width .1s linear; }

    .ed-wrap { max-width: 1180px; margin: 0 auto; padding: 0 28px; }

    /* Header */
    .ed-header { position: fixed; top: 0; left: 0; right: 0; z-index: 60; background: rgba(243,237,227,.82); backdrop-filter: blur(14px); border-bottom: 1px solid transparent; transition: border-color .3s, background .3s; }
    .ed-header.scrolled { border-color: var(--ed-line); }
    .ed-header-inner { display: flex; align-items: center; justify-content: space-between; height: 70px; gap: 20px; }
    .ed-brand { display: inline-flex; align-items: baseline; gap: 8px; text-decoration: none; color: var(--ed-ink); font-family: 'Fraunces', serif; font-weight: 600; font-size: 1.25rem; letter-spacing: -.02em; }
    .ed-brand .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--ed-accent); display: inline-block; align-self: center; }

    .ed-nav { display: flex; align-items: center; gap: 26px; }
    .ed-nav a { position: relative; text-decoration: none; color: var(--ed-ink); font-size: .8rem; letter-spacing: .02em; padding-bottom: 2px; }
    .ed-nav a::after { content: ''; position: absolute; left: 0; bottom: -1px; width: 0; height: 1px; background: var(--ed-ink); transition: width .3s cubic-bezier(.16,1,.3,1); }
    .ed-nav a:hover::after, .ed-nav a.on::after { width: 100%; }

    .ed-header-right { display: flex; align-items: center; gap: 16px; }
    .ed-status { display: inline-flex; align-items: center; gap: 7px; font-size: .7rem; color: var(--ed-muted); letter-spacing: .04em; }
    .ed-status i { width: 7px; height: 7px; border-radius: 50%; background: #22a06b; box-shadow: 0 0 0 3px rgba(34,160,107,.14); animation: edPulse 2.2s ease-in-out infinite; }
    @keyframes edPulse { 0%,100%{opacity:1} 50%{opacity:.4} }

    .ed-hire { display: inline-flex; align-items: center; gap: 8px; background: var(--ed-ink); color: var(--ed-bg); text-decoration: none; font-size: .76rem; font-weight: 600; letter-spacing: .02em; padding: 10px 18px; border-radius: 999px; transition: background .25s, transform .25s; }
    .ed-hire:hover { background: var(--ed-accent); transform: translateY(-2px); }

    .ed-burger { display: none; width: 40px; height: 40px; border-radius: 50%; border: 1px solid var(--ed-line); background: transparent; color: var(--ed-ink); cursor: pointer; }

    .ed-mobile { display: none; background: var(--ed-paper); border-bottom: 1px solid var(--ed-line); }
    .ed-mobile.open { display: block; animation: edDrop .3s ease; }
    @keyframes edDrop { from{opacity:0;transform:translateY(-8px)} to{opacity:1;transform:none} }
    .ed-mobile a { display: block; padding: 14px 28px; text-decoration: none; color: var(--ed-ink); font-size: .92rem; border-bottom: 1px solid var(--ed-line); }

    /* Reveal + load */
    .ed-reveal { opacity: 0; transform: translateY(34px); transition: opacity .9s cubic-bezier(.16,1,.3,1), transform .9s cubic-bezier(.16,1,.3,1); }
    .ed-reveal.in { opacity: 1; transform: none; }
    .ed-d1 { transition-delay: .09s; } .ed-d2 { transition-delay: .18s; } .ed-d3 { transition-delay: .27s; }

    .ed-mask { overflow: hidden; display: block; }
    .ed-mask > span { display: block; transform: translateY(105%); animation: edRise 1s cubic-bezier(.16,1,.3,1) forwards; }
    @keyframes edRise { to { transform: none; } }

    section.ed-section { position: relative; padding: 100px 0; }
    .ed-eyebrow { display: inline-flex; align-items: center; gap: 10px; font-size: .7rem; letter-spacing: .2em; text-transform: uppercase; color: var(--ed-muted); }
    .ed-eyebrow::before { content: ''; width: 26px; height: 1px; background: var(--ed-accent); }
    .ed-h2 { font-family: 'Fraunces', serif; font-weight: 400; font-size: clamp(2.4rem, 6vw, 4.4rem); line-height: 1; letter-spacing: -.03em; margin: 16px 0 0; }
    .ed-h2 em { font-style: italic; color: var(--ed-accent); }

    /* Hero */
    .ed-hero { padding-top: 130px; padding-bottom: 60px; position: relative; overflow: hidden; }
    .ed-hero-top { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; padding-bottom: 24px; border-bottom: 1px solid var(--ed-line); }
    .ed-hero-top p { margin: 0; font-size: .74rem; letter-spacing: .02em; color: var(--ed-muted); }
    .ed-hero-top p b { color: var(--ed-ink); font-weight: 600; }

    .ed-hero-title { font-family: 'Fraunces', serif; font-weight: 400; letter-spacing: -.05em; line-height: .86; margin: 46px 0 0; font-size: clamp(3.6rem, 12.5vw, 10rem); }
    .ed-hero-title .line { display: block; }
    .ed-hero-title .it { font-style: italic; color: var(--ed-accent); }
    .ed-hero-title .outline { color: transparent; -webkit-text-stroke: 1.5px var(--ed-ink); }

    .ed-hero-bottom { display: grid; grid-template-columns: 1.1fr .9fr; gap: 50px; align-items: end; margin-top: 40px; }
    .ed-hero-lede { font-size: clamp(1.05rem, 2vw, 1.3rem); line-height: 1.6; color: var(--ed-ink); max-width: 520px; font-weight: 300; }
    .ed-hero-lede strong { font-weight: 600; }
    .ed-hero-meta { display: flex; flex-wrap: wrap; gap: 28px; margin-top: 28px; }
    .ed-hero-meta div { border-top: 1px solid var(--ed-line); padding-top: 10px; min-width: 110px; }
    .ed-hero-meta .n { font-family: 'Fraunces', serif; font-size: 1.6rem; line-height: 1; }
    .ed-hero-meta .l { font-size: .68rem; letter-spacing: .12em; text-transform: uppercase; color: var(--ed-muted); margin-top: 6px; }

    .ed-hero-portrait { position: relative; justify-self: end; width: 100%; max-width: 380px; }
    .ed-portrait-frame { position: relative; overflow: hidden; border-radius: 200px 200px 18px 18px; background: #e0d7c8; }
    .ed-portrait-frame img { width: 100%; aspect-ratio: 3/3.9; object-fit: cover; display: block; transition: transform .8s cubic-bezier(.16,1,.3,1); }
    .ed-portrait-frame:hover img { transform: scale(1.05); }
    .ed-portrait-tag { position: absolute; top: 16px; left: 16px; background: var(--ed-paper); color: var(--ed-ink); font-size: .66rem; letter-spacing: .12em; text-transform: uppercase; padding: 7px 12px; border-radius: 999px; }

    .ed-rotator { position: absolute; width: 118px; height: 118px; right: -26px; bottom: -22px; animation: edSpin 16s linear infinite; }
    .ed-rotator svg { width: 100%; height: 100%; }
    .ed-rotator text { font-size: 8.7px; letter-spacing: 1.4px; fill: var(--ed-ink); font-family: 'Manrope', sans-serif; }
    .ed-rotator circle { fill: var(--ed-paper); stroke: var(--ed-line); }
    @keyframes edSpin { to { transform: rotate(360deg); } }

    .ed-scroll-hint { display: inline-flex; align-items: center; gap: 10px; margin-top: 44px; font-size: .72rem; letter-spacing: .16em; text-transform: uppercase; color: var(--ed-muted); }
    .ed-scroll-hint span { display: inline-block; width: 24px; height: 38px; border: 1px solid var(--ed-line); border-radius: 999px; position: relative; }
    .ed-scroll-hint span::after { content: ''; position: absolute; top: 7px; left: 50%; width: 4px; height: 4px; margin-left: -2px; border-radius: 50%; background: var(--ed-accent); animation: edScrollDot 1.8s ease-in-out infinite; }
    @keyframes edScrollDot { 0%{transform:translateY(0);opacity:1} 70%{transform:translateY(15px);opacity:0} 100%{opacity:0} }

    /* Marquee */
    .ed-marquee { border-block: 1px solid var(--ed-line); padding: 22px 0; overflow: hidden; background: var(--ed-paper); }
    .ed-marquee-track { display: flex; width: max-content; animation: edMarquee 30s linear infinite; }
    .ed-marquee-track span { font-family: 'Fraunces', serif; font-size: clamp(2rem, 4vw, 3.2rem); letter-spacing: -.02em; padding: 0 34px; display: inline-flex; align-items: center; gap: 34px; white-space: nowrap; }
    .ed-marquee-track span::after { content: '✳'; color: var(--ed-accent); font-size: .5em; }
    .ed-marquee-track .hollow { color: transparent; -webkit-text-stroke: 1px var(--ed-ink); }
    @keyframes edMarquee { to { transform: translateX(-50%); } }

    /* About */
    .ed-about-grid { display: grid; grid-template-columns: .85fr 1.15fr; gap: 64px; align-items: center; margin-top: 46px; }
    .ed-about-visual { position: relative; }
    .ed-about-img { overflow: hidden; border-radius: 16px; background: #e0d7c8; }
    .ed-about-img img { width: 100%; aspect-ratio: 4/5; object-fit: cover; display: block; will-change: transform; }
    .ed-about-caption { display: flex; justify-content: space-between; gap: 10px; margin-top: 12px; font-size: .68rem; letter-spacing: .1em; text-transform: uppercase; color: var(--ed-muted); }
    .ed-about-caption b { color: var(--ed-ink); font-weight: 600; }
    .ed-about-text p { font-size: 1.02rem; line-height: 1.75; color: #3d3831; margin: 0 0 18px; }
    .ed-about-text .big { font-family: 'Fraunces', serif; font-size: clamp(1.5rem, 3vw, 2.1rem); line-height: 1.25; color: var(--ed-ink); margin-bottom: 24px; }
    .ed-about-text .big em { font-style: italic; color: var(--ed-accent); }
    .ed-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 24px; }
    .ed-tags span { font-size: .76rem; padding: 7px 14px; border: 1px solid var(--ed-line); border-radius: 999px; transition: .2s; }
    .ed-tags span:hover { background: var(--ed-ink); color: var(--ed-bg); border-color: var(--ed-ink); }

    /* Skills list */
    .ed-skills { border-top: 1px solid var(--ed-line); margin-top: 40px; }
    .ed-skill {
        display: grid; grid-template-columns: 60px 1fr auto; gap: 20px; align-items: center;
        padding: 30px 8px; border-bottom: 1px solid var(--ed-line); position: relative; overflow: hidden;
        transition: padding .35s cubic-bezier(.16,1,.3,1);
    }
    .ed-skill::before { content: ''; position: absolute; inset: 0; background: var(--ed-ink); transform: scaleY(0); transform-origin: bottom; transition: transform .4s cubic-bezier(.16,1,.3,1); z-index: 0; }
    .ed-skill > * { position: relative; z-index: 1; transition: color .3s; }
    .ed-skill:hover { padding-left: 24px; padding-right: 24px; }
    .ed-skill:hover::before { transform: scaleY(1); }
    .ed-skill:hover .ed-skill-num, .ed-skill:hover h3, .ed-skill:hover .ed-skill-desc { color: var(--ed-bg); }
    .ed-skill:hover .ed-skill-arrow { transform: translate(4px, -4px); color: var(--ed-accent); }
    .ed-skill-num { font-size: .74rem; color: var(--ed-muted); letter-spacing: .1em; }
    .ed-skill h3 { font-family: 'Fraunces', serif; font-size: clamp(1.4rem, 3vw, 2rem); font-weight: 400; margin: 0 0 4px; letter-spacing: -.02em; }
    .ed-skill-desc { font-size: .82rem; color: var(--ed-muted); margin: 0; max-width: 520px; }
    .ed-skill-arrow { font-size: 1.4rem; transition: transform .3s, color .3s; }

    /* Education */
    .ed-edu { border-top: 1px solid var(--ed-line); margin-top: 40px; }
    .ed-edu-row { display: grid; grid-template-columns: 130px 1fr 200px; gap: 24px; align-items: baseline; padding: 30px 4px; border-bottom: 1px solid var(--ed-line); transition: .3s; }
    .ed-edu-row:hover { background: var(--ed-paper); padding-left: 18px; padding-right: 18px; }
    .ed-edu-year { font-family: 'Fraunces', serif; font-size: clamp(1.2rem, 2.5vw, 1.7rem); color: var(--ed-accent); }
    .ed-edu-row h3 { font-family: 'Fraunces', serif; font-weight: 400; font-size: clamp(1.3rem, 2.8vw, 1.9rem); margin: 0 0 4px; letter-spacing: -.02em; }
    .ed-edu-row p { margin: 0; font-size: .8rem; color: var(--ed-muted); }
    .ed-edu-level { text-align: right; font-size: .68rem; letter-spacing: .14em; text-transform: uppercase; color: var(--ed-muted); }

    /* Certifications */
    .ed-certs { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; margin-top: 44px; }
    .ed-cert { position: relative; background: var(--ed-paper); border: 1px solid var(--ed-line); border-radius: 14px; padding: 28px; display: flex; flex-direction: column; min-height: 260px; transition: transform .35s cubic-bezier(.16,1,.3,1), box-shadow .35s, border-color .3s; }
    .ed-cert:hover { transform: translateY(-6px); box-shadow: 0 30px 50px -34px rgba(25,22,20,.5); border-color: transparent; }
    .ed-cert::after { content: ''; position: absolute; left: 28px; right: 28px; bottom: 0; height: 3px; background: var(--ed-accent); transform: scaleX(0); transform-origin: left; transition: transform .4s cubic-bezier(.16,1,.3,1); }
    .ed-cert:hover::after { transform: scaleX(1); }
    .ed-cert .idx { font-family: 'Fraunces', serif; font-size: .9rem; color: var(--ed-muted); }
    .ed-cert .date { font-size: .64rem; letter-spacing: .14em; text-transform: uppercase; color: var(--ed-accent); margin-top: 22px; }
    .ed-cert h3 { font-family: 'Fraunces', serif; font-weight: 400; font-size: 1.4rem; line-height: 1.15; margin: 8px 0 12px; letter-spacing: -.02em; }
    .ed-cert p { font-size: .8rem; line-height: 1.65; color: var(--ed-muted); margin: 0 0 18px; }
    .ed-cert .link { margin-top: auto; display: inline-flex; align-items: center; gap: 8px; text-decoration: none; color: var(--ed-ink); font-size: .78rem; font-weight: 600; border-bottom: 1px solid var(--ed-ink); padding-bottom: 2px; align-self: flex-start; transition: gap .2s, color .2s, border-color .2s; }
    .ed-cert .link:hover { gap: 13px; color: var(--ed-accent); border-color: var(--ed-accent); }

    /* Contact */
    .ed-contact { border-top: 1px solid var(--ed-line); }
    .ed-contact-headline { font-family: 'Fraunces', serif; font-weight: 400; font-size: clamp(3rem, 10vw, 8rem); line-height: .92; letter-spacing: -.05em; margin: 24px 0 0; }
    .ed-contact-headline a { color: var(--ed-ink); text-decoration: none; position: relative; display: inline-block; }
    .ed-contact-headline a::after { content: ''; position: absolute; left: 0; bottom: 6px; width: 100%; height: 4px; background: var(--ed-accent); transform: scaleX(0); transform-origin: left; transition: transform .5s cubic-bezier(.16,1,.3,1); }
    .ed-contact-headline a:hover::after { transform: scaleX(1); }
    .ed-contact-headline em { font-style: italic; color: var(--ed-accent); }

    .ed-contact-grid { display: grid; grid-template-columns: .9fr 1.1fr; gap: 60px; margin-top: 50px; align-items: start; }
    .ed-contact-info p { font-size: .95rem; line-height: 1.7; color: var(--ed-muted); max-width: 360px; }
    .ed-info-list { margin-top: 28px; display: flex; flex-direction: column; }
    .ed-info-list a { display: flex; align-items: center; justify-content: space-between; gap: 14px; text-decoration: none; color: var(--ed-ink); padding: 16px 0; border-bottom: 1px solid var(--ed-line); font-size: .86rem; transition: padding .3s; }
    .ed-info-list a:hover { padding-left: 8px; }
    .ed-info-list .lab { font-size: .64rem; letter-spacing: .14em; text-transform: uppercase; color: var(--ed-muted); display: block; margin-bottom: 3px; }
    .ed-info-list .arw { transition: transform .3s; }
    .ed-info-list a:hover .arw { transform: translate(4px, -4px); color: var(--ed-accent); }

    .ed-form { background: var(--ed-paper); border: 1px solid var(--ed-line); border-radius: 16px; padding: clamp(22px, 4vw, 38px); }
    .ed-form .row { margin-bottom: 18px; }
    .ed-form label { display: block; font-size: .64rem; letter-spacing: .14em; text-transform: uppercase; color: var(--ed-muted); margin-bottom: 8px; }
    .ed-form input, .ed-form textarea { width: 100%; border: none; border-bottom: 1px solid var(--ed-line); background: transparent; color: var(--ed-ink); font-family: inherit; font-size: .92rem; padding: 10px 0; outline: none; transition: border-color .2s; resize: none; }
    .ed-form input:focus, .ed-form textarea:focus { border-color: var(--ed-accent); }
    .ed-form input::placeholder, .ed-form textarea::placeholder { color: rgba(111,103,93,.5); }
    .ed-submit { width: 100%; border: 1px solid var(--ed-ink); background: var(--ed-ink); color: var(--ed-bg); font-family: inherit; font-weight: 600; font-size: .82rem; letter-spacing: .04em; padding: 15px; border-radius: 999px; cursor: pointer; transition: background .25s, transform .25s; }
    .ed-submit:hover { background: var(--ed-accent); border-color: var(--ed-accent); transform: translateY(-2px); }
    .ed-success { margin-bottom: 18px; padding: 14px 16px; border: 1px solid #22a06b; border-radius: 10px; background: rgba(34,160,107,.08); color: #146c47; font-size: .84rem; }
    .ed-error { color: var(--ed-accent-deep); font-size: .72rem; margin-top: 6px; }

    /* Footer */
    .ed-footer { border-top: 1px solid var(--ed-line); padding: 34px 0; }
    .ed-footer-inner { display: flex; flex-wrap: wrap; gap: 14px; align-items: center; justify-content: space-between; }
    .ed-footer p { margin: 0; font-size: .76rem; color: var(--ed-muted); }
    .ed-footer .motto { font-family: 'Fraunces', serif; font-style: italic; font-size: 1rem; color: var(--ed-ink); }

    .ed-switcher { position: fixed; z-index: 70; bottom: 16px; left: 50%; transform: translateX(-50%); display: flex; gap: 3px; padding: 4px; border-radius: 999px; background: rgba(250,247,241,.92); border: 1px solid var(--ed-line); backdrop-filter: blur(12px); font-size: .7rem; }
    .ed-switcher a { text-decoration: none; color: var(--ed-muted); padding: 6px 13px; border-radius: 999px; }
    .ed-switcher a:hover { color: var(--ed-ink); }
    .ed-switcher a.on { background: var(--ed-ink); color: var(--ed-bg); font-weight: 600; }

    @media (max-width: 900px) {
        .ed-nav, .ed-status, .ed-hire { display: none; }
        .ed-burger { display: block; }
        .ed-hero-bottom, .ed-about-grid, .ed-contact-grid { grid-template-columns: 1fr; gap: 38px; }
        .ed-hero-portrait { justify-self: start; }
        .ed-certs { grid-template-columns: 1fr; }
        .ed-edu-row { grid-template-columns: 90px 1fr; }
        .ed-edu-level { display: none; }
        .ed-about-visual { max-width: 340px; }
        .ed-rotator { width: 96px; height: 96px; right: -10px; bottom: -14px; }
        section.ed-section { padding: 72px 0; }
        .ed-switcher { display: none; }
        .ed-hero-title .line { font-size: clamp(2.7rem, 15vw, 6rem); }
    }
</style>
@endpush

@section('content')
<div class="ed-progress" id="ed-progress" aria-hidden="true"></div>

<header class="ed-header" id="ed-header">
    <div class="ed-wrap ed-header-inner">
        <a href="#home" class="ed-brand"><span class="dot"></span>Rex Luceño</a>

        <nav class="ed-nav" aria-label="Main navigation">
            <a href="#home" class="ed-link on">Home</a>
            <a href="#about" class="ed-link">About</a>
            <a href="#education" class="ed-link">Education</a>
            <a href="#skills" class="ed-link">Skills</a>
            <a href="#certifications" class="ed-link">Certifications</a>
            <a href="#contact" class="ed-link">Contact</a>
        </nav>

        <div class="ed-header-right">
            <span class="ed-status"><i></i> Available for work</span>
            <a href="#contact" class="ed-hire">Let's talk <span aria-hidden="true">↗</span></a>
            <button class="ed-burger" id="ed-burger" aria-label="Toggle menu" aria-expanded="false" type="button">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
        </div>
    </div>
    <div class="ed-mobile" id="ed-mobile">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#education">Education</a>
        <a href="#skills">Skills</a>
        <a href="#certifications">Certifications</a>
        <a href="#contact">Contact</a>
    </div>
</header>

<main>
    <section class="ed-hero" id="home">
        <div class="ed-wrap">
            <div class="ed-hero-top">
                <p>Portfolio — <b>2026</b></p>
                <p>Based in <b>Bangued, Abra</b> · Philippines</p>
                <p>IT Student · <b>Aspiring IT Professional</b></p>
            </div>

            <h1 class="ed-hero-title">
                <span class="ed-mask"><span>Rex Decuan</span></span>
                <span class="ed-mask"><span style="animation-delay:.12s"><span class="it">Luceño</span> <span class="outline">Jr.</span></span></span>
            </h1>

            <div class="ed-hero-bottom">
                <div>
                    <p class="ed-hero-lede ed-reveal in ed-d2">
                        Passionate about <strong>coding</strong>, <strong>networking</strong>, and <strong>hardware</strong> — building a career in tech through innovation, creation, and elevation.
                    </p>
                    <div class="ed-hero-meta ed-reveal in ed-d3">
                        <div><div class="n">4th</div><div class="l">Year IT</div></div>
                        <div><div class="n">03</div><div class="l">Core Skills</div></div>
                        <div><div class="n">03</div><div class="l">Certifications</div></div>
                    </div>
                    <div class="ed-scroll-hint ed-reveal in ed-d3"><span aria-hidden="true"></span> Scroll to explore</div>
                </div>

                <div class="ed-hero-portrait ed-reveal in ed-d2">
                    <div class="ed-portrait-frame">
                        <img src="{{ asset('images/profile.jpeg') }}" alt="Rex Decuan Luceño Jr." loading="eager">
                        <span class="ed-portrait-tag">Innovate · Create · Elevate</span>
                    </div>
                    <div class="ed-rotator" aria-hidden="true">
                        <svg viewBox="0 0 120 120">
                            <defs><path id="edCirclePath" d="M60,60 m-44,0 a44,44 0 1,1 88,0 a44,44 0 1,1 -88,0"/></defs>
                            <circle cx="60" cy="60" r="58"/>
                            <text><textPath href="#edCirclePath" startOffset="0">OPEN TO WORK · LET'S TALK · OPEN TO WORK · </textPath></text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="ed-marquee" aria-hidden="true">
        <div class="ed-marquee-track">
            <span>Innovate</span><span class="hollow">Create</span><span>Elevate</span><span class="hollow">Coding</span><span>Networking</span><span class="hollow">Hardware</span>
            <span>Innovate</span><span class="hollow">Create</span><span>Elevate</span><span class="hollow">Coding</span><span>Networking</span><span class="hollow">Hardware</span>
        </div>
    </div>

    <section class="ed-section" id="about">
        <div class="ed-wrap">
            <span class="ed-eyebrow ed-reveal">About me</span>
            <h2 class="ed-h2 ed-reveal ed-d1">A bit about <em>who I am</em></h2>

            <div class="ed-about-grid">
                <div class="ed-about-visual ed-reveal ed-d2">
                    <div class="ed-about-img">
                        <img id="ed-parallax" src="{{ asset('images/profile.jpeg') }}" alt="Rex Decuan Luceño Jr." loading="lazy">
                    </div>
                    <div class="ed-about-caption"><span><b>Rex Decuan Luceño Jr.</b></span><span>Est. 2026</span></div>
                </div>

                <div class="ed-about-text">
                    <p class="big ed-reveal ed-d2">A 4th year IT student aiming to build a successful career in tech and provide a good life for my family.</p>
                    <p class="ed-reveal ed-d3">Passionate about coding, networking, and hardware — always learning, always building, and always looking for the next challenge.</p>
                    <p class="ed-reveal ed-d3">Guided by a simple motto — <em class="ed-serif" style="color:var(--ed-accent)">Innovate. Create. Elevate.</em></p>
                    <div class="ed-tags ed-reveal ed-d3">
                        <span>Coding</span>
                        <span>Network Configuration</span>
                        <span>Hardware Deployment</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ed-section" id="education" style="background:var(--ed-paper);border-block:1px solid var(--ed-line)">
        <div class="ed-wrap">
            <span class="ed-eyebrow ed-reveal">Education</span>
            <h2 class="ed-h2 ed-reveal ed-d1">Where I've <em>studied</em></h2>

            <div class="ed-edu">
                <div class="ed-edu-row ed-reveal">
                    <div class="ed-edu-year">2023 —</div>
                    <div>
                        <h3>Data Center College of the Philippines</h3>
                        <p>Bachelor of Science in Information Technology · Bangued, Abra</p>
                    </div>
                    <div class="ed-edu-level">College</div>
                </div>
                <div class="ed-edu-row ed-reveal ed-d1">
                    <div class="ed-edu-year">2017 — 23</div>
                    <div>
                        <h3>Abra High School — Main Campus</h3>
                        <p>Secondary Education · Class of 2023</p>
                    </div>
                    <div class="ed-edu-level">Secondary</div>
                </div>
                <div class="ed-edu-row ed-reveal ed-d2">
                    <div class="ed-edu-year">2011 — 17</div>
                    <div>
                        <h3>Bangued East Central School</h3>
                        <p>Elementary Education · Class of 2017</p>
                    </div>
                    <div class="ed-edu-level">Elementary</div>
                </div>
            </div>
        </div>
    </section>

    <section class="ed-section" id="skills">
        <div class="ed-wrap">
            <span class="ed-eyebrow ed-reveal">Skills</span>
            <h2 class="ed-h2 ed-reveal ed-d1">What I'm <em>good at</em></h2>

            <div class="ed-skills">
                <div class="ed-skill ed-reveal">
                    <span class="ed-skill-num">01</span>
                    <div>
                        <h3>Coding</h3>
                        <p class="ed-skill-desc">Building clean, functional software and web experiences with a problem-solving mindset.</p>
                    </div>
                    <span class="ed-skill-arrow" aria-hidden="true">↗</span>
                </div>
                <div class="ed-skill ed-reveal ed-d1">
                    <span class="ed-skill-num">02</span>
                    <div>
                        <h3>Network Configuration</h3>
                        <p class="ed-skill-desc">Setting up, securing, and troubleshooting networks for reliable connectivity.</p>
                    </div>
                    <span class="ed-skill-arrow" aria-hidden="true">↗</span>
                </div>
                <div class="ed-skill ed-reveal ed-d2">
                    <span class="ed-skill-num">03</span>
                    <div>
                        <h3>Hardware Deployment</h3>
                        <p class="ed-skill-desc">Assembling, deploying, and maintaining computer systems and peripheral devices.</p>
                    </div>
                    <span class="ed-skill-arrow" aria-hidden="true">↗</span>
                </div>
            </div>
        </div>
    </section>

    <section class="ed-section" id="certifications">
        <div class="ed-wrap">
            <span class="ed-eyebrow ed-reveal">Certifications</span>
            <h2 class="ed-h2 ed-reveal ed-d1">Credentials I've <em>earned</em></h2>

            <div class="ed-certs">
                <article class="ed-cert ed-reveal">
                    <span class="idx">(01)</span>
                    <span class="date">September 2025</span>
                    <h3>TESDA CSS / NC2</h3>
                    <p>Computer Systems Servicing, National Certificate II</p>
                    <a href="{{ asset('images/certificates/nc2.png') }}" target="_blank" rel="noopener noreferrer" class="link">View certificate <span aria-hidden="true">↗</span></a>
                </article>

                <article class="ed-cert ed-reveal ed-d1">
                    <span class="idx">(02)</span>
                    <span class="date">DICT</span>
                    <h3>DICT Netiquette</h3>
                    <p>Online Safety Through Netiquette</p>
                    <a href="{{ asset('images/certificates/dict-netiquette.pdf') }}" target="_blank" rel="noopener noreferrer" class="link">View certificate <span aria-hidden="true">↗</span></a>
                </article>

                <article class="ed-cert ed-reveal ed-d2">
                    <span class="idx">(03)</span>
                    <span class="date">July 23, 2026</span>
                    <h3>CHED SEEDLING Project</h3>
                    <p>Special Episode of the 2026 SEEDLING Project — "Stay Alert, Stay Secure: Promoting Cyber Awareness and Online Scam Prevention."</p>
                    <a href="{{ asset('images/certificates/ched-certificate.pdf') }}" target="_blank" rel="noopener noreferrer" class="link">View certificate <span aria-hidden="true">↗</span></a>
                </article>
            </div>
        </div>
    </section>

    <section class="ed-section ed-contact" id="contact">
        <div class="ed-wrap">
            <span class="ed-eyebrow ed-reveal">Get in touch</span>
            <h2 class="ed-contact-headline ed-reveal ed-d1">
                Let's <em>talk</em><br>
                <a href="mailto:lucenorexjr.913@gmail.com">together ↗</a>
            </h2>

            <div class="ed-contact-grid">
                <div class="ed-contact-info ed-reveal ed-d2">
                    <p>"Innovate. Create. Elevate." — I'm open to opportunities in coding, networking, and hardware.</p>
                    <div class="ed-info-list">
                        <a href="mailto:lucenorexjr.913@gmail.com">
                            <span><span class="lab">Email</span>lucenorexjr.913@gmail.com</span>
                            <span class="arw" aria-hidden="true">↗</span>
                        </a>
                        <a href="tel:09387802526">
                            <span><span class="lab">Phone</span>0938-780-2526</span>
                            <span class="arw" aria-hidden="true">↗</span>
                        </a>
                        <a href="https://github.com/rexdlucenojr" target="_blank" rel="noopener noreferrer">
                            <span><span class="lab">GitHub</span>github.com/rexdlucenojr</span>
                            <span class="arw" aria-hidden="true">↗</span>
                        </a>
                    </div>
                </div>

                <div class="ed-reveal ed-d3">
                    @if (session('success'))
                        <div class="ed-success">{{ session('success') }}</div>
                    @endif
                    <form method="POST" action="{{ route('contact.submit') }}" class="ed-form">
                        @csrf
                        <div class="row">
                            <label for="ed-name">Your name</label>
                            <input id="ed-name" type="text" name="name" value="{{ old('name') }}" placeholder="Rex's next collaborator" autocomplete="name">
                            @error('name')<p class="ed-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="row">
                            <label for="ed-email">Email address</label>
                            <input id="ed-email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email">
                            @error('email')<p class="ed-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="row">
                            <label for="ed-message">Message</label>
                            <textarea id="ed-message" name="message" rows="4" placeholder="Write your message...">{{ old('message') }}</textarea>
                            @error('message')<p class="ed-error">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="ed-submit">Send message →</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="ed-footer">
    <div class="ed-wrap ed-footer-inner">
        <p>© <span id="ed-year"></span> Rex Decuan Luceño Jr. All rights reserved.</p>
        <p class="motto">Innovate. Create. Elevate.</p>
    </div>
</footer>

<div class="ed-switcher" aria-label="Design switcher">
    <a href="{{ route('design.aurora') }}">Aurora</a>
    <a href="{{ route('design.terminal') }}">Terminal</a>
    <a href="{{ route('design.editorial') }}" class="on">Editorial</a>
</div>

@push('scripts')
<script>
(function () {
    const doc = document;
    const header = doc.getElementById('ed-header');
    const progress = doc.getElementById('ed-progress');
    const burger = doc.getElementById('ed-burger');
    const mobile = doc.getElementById('ed-mobile');

    burger.addEventListener('click', () => {
        const open = mobile.classList.toggle('open');
        burger.setAttribute('aria-expanded', String(open));
    });
    mobile.querySelectorAll('a').forEach(a => a.addEventListener('click', () => mobile.classList.remove('open')));

    const links = doc.querySelectorAll('.ed-link');
    const ids = ['home', 'about', 'education', 'skills', 'certifications', 'contact'];

    function onScroll() {
        const y = window.scrollY;
        header.classList.toggle('scrolled', y > 10);

        const max = doc.documentElement.scrollHeight - window.innerHeight;
        progress.style.width = (max > 0 ? (y / max) * 100 : 0) + '%';

        let current = 'home';
        for (const id of ids) {
            const el = doc.getElementById(id);
            if (el && y >= el.offsetTop - 140) current = id;
        }
        links.forEach(l => l.classList.toggle('on', l.getAttribute('href') === '#' + current));

        // Parallax portrait
        const p = doc.getElementById('ed-parallax');
        if (p) {
            const r = p.parentElement.getBoundingClientRect();
            const offset = (r.top + r.height / 2 - window.innerHeight / 2) / window.innerHeight;
            p.style.transform = 'scale(1.14) translateY(' + (offset * 26) + 'px)';
        }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -50px 0px' });
    doc.querySelectorAll('.ed-reveal').forEach(el => io.observe(el));

    // Magnetic buttons
    if (window.matchMedia('(pointer: fine)').matches) {
        doc.querySelectorAll('.ed-hire, .ed-submit').forEach(btn => {
            btn.addEventListener('mousemove', e => {
                const r = btn.getBoundingClientRect();
                const x = e.clientX - r.left - r.width / 2;
                const y = e.clientY - r.top - r.height / 2;
                btn.style.transform = 'translate(' + (x * 0.16) + 'px,' + (y * 0.28) + 'px)';
            });
            btn.addEventListener('mouseleave', () => { btn.style.transform = ''; });
        });
    }

    const yr = doc.getElementById('ed-year');
    if (yr) yr.textContent = new Date().getFullYear();
})();
</script>
@endpush
@endsection
