@extends('layouts.base')

@section('title', 'Rex Decuan Luceño Jr. — Terminal')
@section('body-class', 'tm-body')

@push('head')
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
@endpush

@push('styles')
<style>
    :root {
        --tm-bg: #04070a;
        --tm-panel: #0a1014;
        --tm-green: #00ff9c;
        --tm-green-dim: #0f7a52;
        --tm-amber: #ffb347;
        --tm-cyan: #5eead4;
        --tm-text: #d7e5df;
        --tm-muted: #6d8b80;
        --tm-line: rgba(0, 255, 156, .14);
    }

    html { scroll-behavior: smooth; }

    body.tm-body {
        margin: 0;
        background: var(--tm-bg);
        color: var(--tm-text);
        font-family: 'JetBrains Mono', ui-monospace, monospace;
        overflow-x: hidden;
        -webkit-font-smoothing: antialiased;
    }
    body.tm-body::before { content: none; }

    .tm-scan {
        position: fixed; inset: 0; z-index: 3; pointer-events: none; opacity: .35;
        background: repeating-linear-gradient(0deg, rgba(0,0,0,.25) 0px, rgba(0,0,0,.25) 1px, transparent 1px, transparent 3px);
        mix-blend-mode: multiply;
    }
    .tm-scan::after {
        content: ''; position: absolute; left: 0; right: 0; height: 120px;
        background: linear-gradient(180deg, transparent, rgba(0,255,156,.05), transparent);
        animation: tmScanMove 9s linear infinite;
    }
    @keyframes tmScanMove { 0%{top:-120px} 100%{top:100%} }

    #tm-matrix { position: fixed; inset: 0; z-index: 0; opacity: .18; pointer-events: none; }

    .tm-wrap { position: relative; z-index: 2; max-width: 1080px; margin: 0 auto; padding: 0 22px; }

    .tm-nav {
        position: sticky; top: 0; z-index: 50;
        background: rgba(4, 7, 10, .82); backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--tm-line);
    }
    .tm-nav-inner { display: flex; align-items: center; justify-content: space-between; height: 60px; gap: 18px; }
    .tm-brand { display: inline-flex; align-items: center; gap: 9px; color: var(--tm-green); text-decoration: none; font-weight: 700; font-size: .95rem; letter-spacing: -.01em; white-space: nowrap; }
    .tm-brand .dots { display: inline-flex; gap: 4px; margin-right: 4px; }
    .tm-brand .dots i { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }
    .tm-brand .dots i:nth-child(1) { background: #ff5f57; }
    .tm-brand .dots i:nth-child(2) { background: #febc2e; }
    .tm-brand .dots i:nth-child(3) { background: #28c840; }

    .tm-nav-links { display: flex; align-items: center; gap: 4px; }
    .tm-nav-links a {
        color: var(--tm-muted); text-decoration: none; font-size: .78rem; padding: 7px 11px;
        border-radius: 6px; border: 1px solid transparent; transition: .18s;
    }
    .tm-nav-links a::before { content: ''; }
    .tm-nav-links a:hover, .tm-nav-links a.on { color: var(--tm-green); border-color: var(--tm-line); background: rgba(0,255,156,.05); }

    .tm-hire { color: var(--tm-bg); background: var(--tm-green); text-decoration: none; font-size: .78rem; font-weight: 700; padding: 8px 15px; border-radius: 6px; white-space: nowrap; transition: .2s; box-shadow: 0 0 18px rgba(0,255,156,.3); }
    .tm-hire:hover { background: #7dffc4; box-shadow: 0 0 28px rgba(0,255,156,.55); }
    .tm-burger { display: none; width: 38px; height: 34px; background: transparent; color: var(--tm-green); border: 1px solid var(--tm-line); border-radius: 6px; cursor: pointer; }

    .tm-mobile { display: none; border-bottom: 1px solid var(--tm-line); background: rgba(4,7,10,.97); }
    .tm-mobile.open { display: block; }
    .tm-mobile a { display: block; padding: 13px 22px; color: var(--tm-text); text-decoration: none; font-size: .85rem; border-bottom: 1px solid rgba(0,255,156,.06); }
    .tm-mobile a::before { content: '$ '; color: var(--tm-green); }

    .tm-reveal { opacity: 0; transform: translateY(24px); transition: opacity .7s cubic-bezier(.16,1,.3,1), transform .7s cubic-bezier(.16,1,.3,1); }
    .tm-reveal.in { opacity: 1; transform: none; }
    .tm-d1 { transition-delay: .09s; } .tm-d2 { transition-delay: .18s; } .tm-d3 { transition-delay: .27s; }

    section.tm-section { position: relative; padding: 96px 0; }
    .tm-sep { height: 1px; background: linear-gradient(90deg, transparent, var(--tm-line), transparent); }

    .tm-kicker { font-size: .72rem; color: var(--tm-green); letter-spacing: .05em; margin: 0 0 14px; }
    .tm-kicker::before { content: '// '; color: var(--tm-muted); }
    .tm-h2 { font-family: 'JetBrains Mono', monospace; font-weight: 700; font-size: clamp(1.7rem, 4.2vw, 2.8rem); line-height: 1.1; letter-spacing: -.03em; color: #fff; margin: 0; }
    .tm-h2 .g { color: var(--tm-green); text-shadow: 0 0 22px rgba(0,255,156,.35); }

    /* Hero */
    .tm-hero { padding: 76px 0 90px; }
    .tm-hero-grid { display: grid; grid-template-columns: 1.25fr .75fr; gap: 46px; align-items: center; }
    .tm-prompt-line { font-size: .9rem; color: var(--tm-muted); margin-bottom: 12px; }
    .tm-prompt-line .u { color: var(--tm-green); }
    .tm-prompt-line .p { color: var(--tm-cyan); }

    .tm-name { font-weight: 700; font-size: clamp(2.2rem, 6vw, 4.4rem); line-height: 1; letter-spacing: -.045em; color: #fff; margin: 0 0 18px; }
    .tm-name .hl { color: var(--tm-green); }

    .tm-glitch { position: relative; display: inline-block; }
    .tm-glitch::before, .tm-glitch::after { content: attr(data-text); position: absolute; left: 0; top: 0; width: 100%; overflow: hidden; }
    .tm-glitch::before { color: var(--tm-cyan); clip-path: inset(0 0 55% 0); animation: tmGlitchA 3.4s infinite linear alternate-reverse; opacity: .85; }
    .tm-glitch::after { color: #ff5f7e; clip-path: inset(45% 0 0 0); animation: tmGlitchB 2.6s infinite linear alternate-reverse; opacity: .8; }
    @keyframes tmGlitchA { 0%,92%,100%{transform:translate(0,0)} 93%{transform:translate(-2px,-1px)} 95%{transform:translate(2px,1px)} 97%{transform:translate(-1px,1px)} }
    @keyframes tmGlitchB { 0%,90%,100%{transform:translate(0,0)} 91%{transform:translate(2px,1px)} 94%{transform:translate(-2px,-1px)} 96%{transform:translate(1px,-1px)} }

    .tm-sub { color: var(--tm-muted); font-size: .95rem; line-height: 1.8; max-width: 520px; margin: 0 0 28px; }
    .tm-sub .k { color: var(--tm-amber); }
    .tm-sub .k2 { color: var(--tm-cyan); }

    .tm-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 34px; }
    .tm-btn { display: inline-flex; align-items: center; gap: 9px; text-decoration: none; font-size: .82rem; font-weight: 600; padding: 12px 20px; border-radius: 7px; transition: .2s; }
    .tm-btn-solid { background: var(--tm-green); color: var(--tm-bg); box-shadow: 0 0 20px rgba(0,255,156,.28); }
    .tm-btn-solid:hover { background: #7dffc4; box-shadow: 0 0 30px rgba(0,255,156,.5); transform: translateY(-2px); }
    .tm-btn-outline { border: 1px solid var(--tm-line); color: var(--tm-green); }
    .tm-btn-outline:hover { background: rgba(0,255,156,.07); border-color: var(--tm-green); transform: translateY(-2px); }

    .tm-stats { display: flex; flex-wrap: wrap; gap: 26px; padding-top: 24px; border-top: 1px solid var(--tm-line); }
    .tm-stat .v { font-size: 1.4rem; font-weight: 700; color: var(--tm-green); }
    .tm-stat .l { font-size: .68rem; color: var(--tm-muted); letter-spacing: .08em; text-transform: uppercase; margin-top: 2px; }

    .tm-terminal {
        background: var(--tm-panel); border: 1px solid var(--tm-line); border-radius: 12px; overflow: hidden;
        box-shadow: 0 30px 80px -30px rgba(0,0,0,.9), 0 0 0 1px rgba(0,255,156,.04);
    }
    .tm-term-bar { display: flex; align-items: center; gap: 8px; padding: 11px 14px; background: #0d151a; border-bottom: 1px solid var(--tm-line); }
    .tm-term-bar i { width: 10px; height: 10px; border-radius: 50%; display: inline-block; }
    .tm-term-bar i:nth-child(1){background:#ff5f57}.tm-term-bar i:nth-child(2){background:#febc2e}.tm-term-bar i:nth-child(3){background:#28c840}
    .tm-term-bar span { margin-left: auto; font-size: .68rem; color: var(--tm-muted); }
    .tm-term-body { padding: 18px; font-size: .78rem; line-height: 1.85; min-height: 300px; }
    .tm-term-body .cmd { color: var(--tm-cyan); }
    .tm-term-body .out { color: var(--tm-text); }
    .tm-term-body .dim { color: var(--tm-muted); }
    .tm-term-body .ok { color: var(--tm-green); }
    .tm-caret { display: inline-block; width: 8px; height: 15px; background: var(--tm-green); vertical-align: middle; margin-left: 2px; animation: tmBlink 1s steps(2) infinite; }
    @keyframes tmBlink { 0%,49%{opacity:1} 50%,100%{opacity:0} }

    .tm-avatar { margin-top: 16px; border: 1px solid var(--tm-line); border-radius: 10px; overflow: hidden; position: relative; }
    .tm-avatar img { width: 100%; aspect-ratio: 1; object-fit: cover; display: block; filter: grayscale(.2) contrast(1.05); }
    .tm-avatar::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 60%, rgba(0,255,156,.14)); pointer-events: none; }

    /* Skills */
    .tm-skill-row { display: grid; grid-template-columns: 1fr; gap: 8px; padding: 22px 0; border-bottom: 1px solid rgba(0,255,156,.08); }
    .tm-skill-top { display: flex; align-items: baseline; justify-content: space-between; gap: 12px; }
    .tm-skill-top h3 { font-size: 1.02rem; color: #fff; margin: 0; font-weight: 600; }
    .tm-skill-top h3::before { content: '> '; color: var(--tm-green); }
    .tm-skill-top .pct { font-size: .78rem; color: var(--tm-green); }
    .tm-bar { height: 6px; border-radius: 99px; background: rgba(0,255,156,.08); overflow: hidden; }
    .tm-bar span { display: block; height: 100%; width: 0; border-radius: 99px; background: linear-gradient(90deg, var(--tm-green-dim), var(--tm-green)); box-shadow: 0 0 12px rgba(0,255,156,.5); transition: width 1.4s cubic-bezier(.16,1,.3,1); }
    .tm-skill-desc { font-size: .78rem; color: var(--tm-muted); margin: 0; }

    /* Education log */
    .tm-log { background: var(--tm-panel); border: 1px solid var(--tm-line); border-radius: 10px; padding: 24px; font-size: .82rem; line-height: 1.9; }
    .tm-log .ln { display: flex; gap: 12px; padding: 7px 0; border-bottom: 1px dashed rgba(0,255,156,.07); }
    .tm-log .ln:last-child { border-bottom: 0; }
    .tm-log .ts { color: var(--tm-green-dim); flex: none; width: 78px; }
    .tm-log .lv { color: var(--tm-amber); flex: none; width: 74px; }
    .tm-log .msg { color: var(--tm-text); }
    .tm-log .msg b { color: #fff; font-weight: 600; }
    .tm-log .msg small { color: var(--tm-muted); display: block; font-size: .72rem; }

    /* Certifications */
    .tm-cert-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-top: 36px; }
    .tm-cert-grid .wide { grid-column: 1 / -1; }
    .tm-card { position: relative; background: var(--tm-panel); border: 1px solid var(--tm-line); border-radius: 10px; padding: 26px; transition: .25s; }
    .tm-card::before, .tm-card::after { content: ''; position: absolute; width: 14px; height: 14px; border-color: var(--tm-green); border-style: solid; opacity: .6; transition: .25s; }
    .tm-card::before { top: 10px; left: 10px; border-width: 1px 0 0 1px; }
    .tm-card::after { bottom: 10px; right: 10px; border-width: 0 1px 1px 0; }
    .tm-card:hover { border-color: rgba(0,255,156,.4); background: #0c1419; transform: translateY(-3px); }
    .tm-card:hover::before, .tm-card:hover::after { width: 22px; height: 22px; opacity: 1; }
    .tm-card .tag { display: inline-block; font-size: .62rem; letter-spacing: .12em; text-transform: uppercase; color: var(--tm-green); border: 1px solid var(--tm-line); border-radius: 4px; padding: 3px 8px; margin-bottom: 14px; }
    .tm-card h3 { font-size: 1.05rem; color: #fff; margin: 0 0 8px; font-weight: 600; }
    .tm-card p { font-size: .78rem; color: var(--tm-muted); line-height: 1.7; margin: 0 0 16px; }
    .tm-card .link { display: inline-flex; align-items: center; gap: 7px; font-size: .76rem; color: var(--tm-green); text-decoration: none; }
    .tm-card .link:hover { text-shadow: 0 0 12px rgba(0,255,156,.6); }

    /* Contact */
    .tm-contact { display: grid; grid-template-columns: .9fr 1.1fr; gap: 46px; }
    .tm-contact-list { display: flex; flex-direction: column; gap: 6px; margin-top: 26px; font-size: .82rem; }
    .tm-contact-list a { display: flex; align-items: center; gap: 10px; color: var(--tm-muted); text-decoration: none; padding: 9px 0; border-bottom: 1px dashed rgba(0,255,156,.08); transition: color .2s; }
    .tm-contact-list a:hover { color: var(--tm-green); }
    .tm-contact-list .ic { color: var(--tm-green); flex: none; display: inline-flex; }
    .tm-contact-list svg { width: 15px; height: 15px; }

    .tm-form { background: var(--tm-panel); border: 1px solid var(--tm-line); border-radius: 10px; padding: 26px; }
    .tm-form .row { margin-bottom: 16px; }
    .tm-form label { display: block; font-size: .72rem; color: var(--tm-green); margin-bottom: 7px; }
    .tm-form label::before { content: '. '; color: var(--tm-muted); }
    .tm-form input, .tm-form textarea {
        width: 100%; background: var(--tm-bg); border: 1px solid var(--tm-line); border-radius: 6px;
        color: var(--tm-text); font-family: inherit; font-size: .8rem; padding: 11px 13px; outline: none;
        transition: border-color .2s, box-shadow .2s; resize: none;
    }
    .tm-form input:focus, .tm-form textarea:focus { border-color: var(--tm-green); box-shadow: 0 0 0 3px rgba(0,255,156,.1); }
    .tm-form input::placeholder, .tm-form textarea::placeholder { color: rgba(109,139,128,.6); }
    .tm-submit { width: 100%; border: none; cursor: pointer; font-family: inherit; font-weight: 700; font-size: .82rem; letter-spacing: .02em; color: var(--tm-bg); background: var(--tm-green); padding: 13px; border-radius: 6px; transition: .2s; box-shadow: 0 0 18px rgba(0,255,156,.25); }
    .tm-submit:hover { background: #7dffc4; box-shadow: 0 0 30px rgba(0,255,156,.5); }
    .tm-success { margin-bottom: 16px; padding: 12px 14px; border: 1px solid var(--tm-green); border-radius: 6px; background: rgba(0,255,156,.07); color: var(--tm-green); font-size: .78rem; }
    .tm-success::before { content: '[OK] '; }
    .tm-error { color: #ff8095; font-size: .7rem; margin-top: 5px; }

    .tm-footer { border-top: 1px solid var(--tm-line); padding: 28px 0; }
    .tm-footer-inner { display: flex; flex-wrap: wrap; gap: 12px; align-items: center; justify-content: space-between; font-size: .74rem; color: var(--tm-muted); }
    .tm-footer code { color: var(--tm-green); }

    .tm-switcher { position: fixed; z-index: 70; bottom: 16px; left: 50%; transform: translateX(-50%); display: flex; gap: 3px; padding: 4px; border-radius: 7px; background: rgba(6,12,15,.92); border: 1px solid var(--tm-line); font-size: .7rem; }
    .tm-switcher a { text-decoration: none; color: var(--tm-muted); padding: 6px 12px; border-radius: 4px; }
    .tm-switcher a:hover { color: var(--tm-green); }
    .tm-switcher a.on { background: var(--tm-green); color: var(--tm-bg); font-weight: 700; }

    @media (max-width: 900px) {
        .tm-hero-grid, .tm-contact { grid-template-columns: 1fr; gap: 38px; }
        .tm-nav-links { display: none; }
        .tm-hire { display: none; }
        .tm-burger { display: block; }
        .tm-cert-grid { grid-template-columns: 1fr; }
        section.tm-section { padding: 70px 0; }
        .tm-switcher { display: none; }
        .tm-avatar { max-width: 300px; }
        .tm-log { font-size: .74rem; }
        .tm-log .ts { width: 66px; }
    }
</style>
@endpush

@section('content')
<div class="tm-scan" aria-hidden="true"></div>
<canvas id="tm-matrix" aria-hidden="true"></canvas>

<header class="tm-nav">
    <div class="tm-wrap tm-nav-inner">
        <a href="#home" class="tm-brand">
            <span class="dots" aria-hidden="true"><i></i><i></i><i></i></span>
            rex@portfolio:~$
        </a>

        <nav class="tm-nav-links" aria-label="Main navigation">
            <a href="#home" class="tm-link on">home</a>
            <a href="#about" class="tm-link">about</a>
            <a href="#education" class="tm-link">education</a>
            <a href="#skills" class="tm-link">skills</a>
            <a href="#certifications" class="tm-link">certs</a>
            <a href="#contact" class="tm-link">contact</a>
        </nav>

        <div style="display:flex;gap:10px;align-items:center">
            <a href="#contact" class="tm-hire">./hire_me</a>
            <button class="tm-burger" id="tm-burger" aria-label="Toggle menu" aria-expanded="false" type="button">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
        </div>
    </div>
    <div class="tm-mobile" id="tm-mobile">
        <a href="#home">cd ~/home</a>
        <a href="#about">cat about.md</a>
        <a href="#education">cat education.log</a>
        <a href="#skills">ls -la skills/</a>
        <a href="#certifications">cat certs.json</a>
        <a href="#contact">ssh contact</a>
    </div>
</header>

<main>
    <section class="tm-hero" id="home">
        <div class="tm-wrap">
            <div class="tm-hero-grid">
                <div>
                    <p class="tm-prompt-line tm-reveal in"><span class="u">rex</span>@<span class="p">portfolio</span>:~$ <span style="color:#fff">whoami</span></p>
                    <h1 class="tm-name tm-reveal in tm-d1">
                        <span class="tm-glitch" data-text="Rex Decuan">Rex Decuan</span><br>
                        <span class="hl">Luceño Jr.</span>
                    </h1>
                    <p class="tm-prompt-line tm-reveal in tm-d2" style="margin-bottom:18px">
                        <span class="dim">role</span> = <span class="k">"IT Student / Aspiring IT Professional"</span>;
                    </p>
                    <p class="tm-sub tm-reveal in tm-d2">
                        Passionate about <span class="k2">coding</span>, <span class="k2">networking</span>, and <span class="k2">hardware</span> — building a career in tech through innovation, creation, and elevation.
                    </p>
                    <div class="tm-actions tm-reveal in tm-d3">
                        <a href="#about" class="tm-btn tm-btn-solid">./meet_me <span aria-hidden="true">↓</span></a>
                        <a href="#contact" class="tm-btn tm-btn-outline">./contact</a>
                    </div>
                    <div class="tm-stats tm-reveal in tm-d3">
                        <div class="tm-stat"><div class="v">4th</div><div class="l">Year IT</div></div>
                        <div class="tm-stat"><div class="v">3</div><div class="l">Core Skills</div></div>
                        <div class="tm-stat"><div class="v">3</div><div class="l">Certifications</div></div>
                    </div>
                </div>

                <div class="tm-reveal in tm-d2">
                    <div class="tm-terminal">
                        <div class="tm-term-bar">
                            <i></i><i></i><i></i>
                            <span>bash — 80x24</span>
                        </div>
                        <div class="tm-term-body">
                            <div><span class="cmd">$</span> <span class="out">cat profile.txt</span></div>
                            <div class="dim">----------------------</div>
                            <div><span class="ok">name</span> : Rex Decuan Luceño Jr.</div>
                            <div><span class="ok">role</span> : IT Student</div>
                            <div><span class="ok">year</span> : 4th Year (BSIT)</div>
                            <div><span class="ok">motto</span>: Innovate. Create.</div>
                            <div><span class="ok">       </span>  Elevate.</div>
                            <div class="dim">&nbsp;</div>
                            <div><span class="cmd">$</span> <span class="out">ls skills/</span></div>
                            <div class="out">coding/ networking/ hardware/</div>
                            <div class="dim">&nbsp;</div>
                            <div><span class="cmd">$</span> <span class="out">status --now</span><span class="tm-caret"></span></div>
                        </div>
                    </div>
                    <div class="tm-avatar">
                        <img src="{{ asset('images/profile.jpeg') }}" alt="Rex Decuan Luceño Jr." loading="eager">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="tm-sep"></div>

    <section class="tm-section" id="about">
        <div class="tm-wrap">
            <p class="tm-kicker tm-reveal">about.md</p>
            <h2 class="tm-h2 tm-reveal tm-d1">$ cat <span class="g">about.md</span></h2>
            <div style="display:grid;grid-template-columns:1.2fr .8fr;gap:44px;margin-top:34px" class="tm-about-grid">
                <div class="tm-reveal tm-d2">
                    <p class="tm-sub" style="max-width:none">
                        A 4th year IT student aiming to build a successful career in tech and provide a good life for my family. Passionate about coding, networking, and hardware.
                    </p>
                    <p class="tm-sub" style="max-width:none">
                        Guided by a simple motto — <span class="k">"Innovate. Create. Elevate."</span>
                    </p>
                    <div style="display:flex;flex-wrap:wrap;gap:8px;margin-top:8px">
                        <span style="font-size:.74rem;color:#fff;border:1px solid var(--tm-line);padding:6px 12px;border-radius:5px">coding</span>
                        <span style="font-size:.74rem;color:#fff;border:1px solid var(--tm-line);padding:6px 12px;border-radius:5px">network_configuration</span>
                        <span style="font-size:.74rem;color:#fff;border:1px solid var(--tm-line);padding:6px 12px;border-radius:5px">hardware_deployment</span>
                    </div>
                </div>
                <div class="tm-log tm-reveal tm-d3" style="align-self:start">
                    <div class="ln"><span class="ts">[info]</span><span class="lv">status</span><span class="msg">available_for_work<small>open to opportunities</small></span></div>
                    <div class="ln"><span class="ts">[info]</span><span class="lv">focus</span><span class="msg">coding · networking · hardware</span></div>
                    <div class="ln"><span class="ts">[info]</span><span class="lv">motto</span><span class="msg">innovate_create_elevate</span></div>
                </div>
            </div>
        </div>
    </section>

    <div class="tm-sep"></div>

    <section class="tm-section" id="education">
        <div class="tm-wrap">
            <p class="tm-kicker tm-reveal">education.log</p>
            <h2 class="tm-h2 tm-reveal tm-d1">$ cat <span class="g">education.log</span></h2>
            <div class="tm-log tm-reveal tm-d2" style="margin-top:30px;font-size:.82rem">
                <div class="ln">
                    <span class="ts">[2023-]</span><span class="lv">BSIT</span>
                    <span class="msg"><b>Data Center College of the Philippines</b><small>Bachelor of Science in Information Technology — Bangued, Abra</small></span>
                </div>
                <div class="ln">
                    <span class="ts">[2017-23]</span><span class="lv">SHS</span>
                    <span class="msg"><b>Abra High School — Main Campus</b><small>Secondary Education · Class of 2023</small></span>
                </div>
                <div class="ln">
                    <span class="ts">[2011-17]</span><span class="lv">ELEM</span>
                    <span class="msg"><b>Bangued East Central School</b><small>Elementary Education · Class of 2017</small></span>
                </div>
                <div class="ln"><span class="ts" style="color:var(--tm-green)">&gt;_</span><span class="lv" style="color:var(--tm-green)">&nbsp;</span><span class="msg" style="color:var(--tm-muted)">3 records found.</span></div>
            </div>
        </div>
    </section>

    <div class="tm-sep"></div>

    <section class="tm-section" id="skills">
        <div class="tm-wrap">
            <p class="tm-kicker tm-reveal">skills/</p>
            <h2 class="tm-h2 tm-reveal tm-d1">$ ls -la <span class="g">skills/</span></h2>

            <div style="margin-top:30px">
                <div class="tm-skill-row tm-reveal">
                    <div class="tm-skill-top"><h3>coding</h3><span class="pct">85%</span></div>
                    <p class="tm-skill-desc">Building clean, functional software and web experiences.</p>
                    <div class="tm-bar"><span data-w="85"></span></div>
                </div>
                <div class="tm-skill-row tm-reveal tm-d1">
                    <div class="tm-skill-top"><h3>network_configuration</h3><span class="pct">80%</span></div>
                    <p class="tm-skill-desc">Setting up, securing, and troubleshooting networks.</p>
                    <div class="tm-bar"><span data-w="80"></span></div>
                </div>
                <div class="tm-skill-row tm-reveal tm-d2">
                    <div class="tm-skill-top"><h3>hardware_deployment</h3><span class="pct">82%</span></div>
                    <p class="tm-skill-desc">Assembling, deploying, and maintaining computer systems.</p>
                    <div class="tm-bar"><span data-w="82"></span></div>
                </div>
            </div>
        </div>
    </section>

    <div class="tm-sep"></div>

    <section class="tm-section" id="certifications">
        <div class="tm-wrap">
            <p class="tm-kicker tm-reveal">certs.json</p>
            <h2 class="tm-h2 tm-reveal tm-d1">$ cat <span class="g">certs.json</span></h2>

            <div class="tm-cert-grid">
                <article class="tm-card tm-reveal">
                    <span class="tag">September 2025</span>
                    <h3>TESDA CSS / NC2</h3>
                    <p>Computer Systems Servicing, National Certificate II</p>
                    <a href="{{ asset('images/certificates/nc2.png') }}" target="_blank" rel="noopener noreferrer" class="link">$ view --img →</a>
                </article>

                <article class="tm-card tm-reveal tm-d1">
                    <span class="tag">DICT</span>
                    <h3>DICT Netiquette</h3>
                    <p>Online Safety Through Netiquette</p>
                    <a href="{{ asset('images/certificates/dict-netiquette.pdf') }}" target="_blank" rel="noopener noreferrer" class="link">$ view --pdf →</a>
                </article>

                <article class="tm-card wide tm-reveal tm-d2">
                    <span class="tag">July 23, 2026</span>
                    <h3>CHED SEEDLING Project</h3>
                    <p>For participating in the Special Episode of the 2026 SEEDLING Project — "Stay Alert, Stay Secure: Promoting Cyber Awareness and Online Scam Prevention."</p>
                    <a href="{{ asset('images/certificates/ched-certificate.pdf') }}" target="_blank" rel="noopener noreferrer" class="link">$ view --pdf →</a>
                </article>
            </div>
        </div>
    </section>

    <div class="tm-sep"></div>

    <section class="tm-section" id="contact">
        <div class="tm-wrap">
            <p class="tm-kicker tm-reveal">contact</p>
            <h2 class="tm-h2 tm-reveal tm-d1">$ ssh <span class="g">rex@contact</span></h2>

            <div class="tm-contact" style="margin-top:34px">
                <div class="tm-reveal tm-d2">
                    <p class="tm-sub" style="max-width:none">"Innovate. Create. Elevate." — I'm open to opportunities in coding, networking, and hardware.</p>
                    <div class="tm-contact-list">
                        <a href="mailto:lucenorexjr.913@gmail.com">
                            <span class="ic"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg></span>
                            lucenorexjr.913@gmail.com
                        </a>
                        <a href="tel:09387802526">
                            <span class="ic"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg></span>
                            0938-780-2526
                        </a>
                        <a href="https://github.com/rexdlucenojr" target="_blank" rel="noopener noreferrer">
                            <span class="ic"><svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg></span>
                            github.com/rexdlucenojr
                        </a>
                    </div>
                </div>

                <div class="tm-reveal tm-d3">
                    @if (session('success'))
                        <div class="tm-success">{{ session('success') }}</div>
                    @endif
                    <form method="POST" action="{{ route('contact.submit') }}" class="tm-form">
                        @csrf
                        <div class="row">
                            <label for="tm-name">name</label>
                            <input id="tm-name" type="text" name="name" value="{{ old('name') }}" placeholder="your name" autocomplete="name">
                            @error('name')<p class="tm-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="row">
                            <label for="tm-email">email</label>
                            <input id="tm-email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email">
                            @error('email')<p class="tm-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="row">
                            <label for="tm-message">message</label>
                            <textarea id="tm-message" name="message" rows="4" placeholder="write your message...">{{ old('message') }}</textarea>
                            @error('message')<p class="tm-error">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="tm-submit">$ send_message --now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="tm-footer">
    <div class="tm-wrap tm-footer-inner">
        <p>© <span id="tm-year"></span> Rex Decuan Luceño Jr. — all rights reserved.</p>
        <p><code>Innovate. Create. Elevate.</code></p>
    </div>
</footer>

<div class="tm-switcher" aria-label="Design switcher">
    <a href="{{ route('design.aurora') }}">Aurora</a>
    <a href="{{ route('design.terminal') }}" class="on">Terminal</a>
    <a href="{{ route('design.editorial') }}">Editorial</a>
</div>

@push('scripts')
<script>
(function () {
    const doc = document;
    const burger = doc.getElementById('tm-burger');
    const mobile = doc.getElementById('tm-mobile');

    burger.addEventListener('click', () => {
        const open = mobile.classList.toggle('open');
        burger.setAttribute('aria-expanded', String(open));
    });
    mobile.querySelectorAll('a').forEach(a => a.addEventListener('click', () => mobile.classList.remove('open')));

    const links = doc.querySelectorAll('.tm-link');
    const ids = ['home', 'about', 'education', 'skills', 'certifications', 'contact'];
    function updateActive() {
        let current = 'home';
        for (const id of ids) {
            const el = doc.getElementById(id);
            if (el && window.scrollY >= el.offsetTop - 140) current = id;
        }
        links.forEach(l => l.classList.toggle('on', l.getAttribute('href') === '#' + current));
    }
    window.addEventListener('scroll', updateActive, { passive: true });
    updateActive();

    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('in');
                const bar = e.target.querySelector ? e.target.querySelector('.tm-bar span') : null;
                if (bar) {
                    const w = bar.dataset.w || '0';
                    requestAnimationFrame(() => { bar.style.width = w + '%'; });
                }
                io.unobserve(e.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    doc.querySelectorAll('.tm-reveal').forEach(el => io.observe(el));
    doc.querySelectorAll('.tm-skill-row').forEach(row => {
        const bar = row.querySelector('.tm-bar span');
        if (bar) { bar.style.width = '0'; }
    });

    const yr = doc.getElementById('tm-year');
    if (yr) yr.textContent = new Date().getFullYear();

    // Matrix rain (subtle)
    const canvas = doc.getElementById('tm-matrix');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        const chars = 'アイウエオカキクケコ01アbcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789{}[]<>/$#';
        let cols = 0, drops = [], size = 14;
        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            cols = Math.floor(canvas.width / size);
            drops = Array.from({ length: cols }, () => Math.floor(Math.random() * -50));
        }
        resize();
        window.addEventListener('resize', resize);
        let last = 0;
        function draw(t) {
            if (t - last > 60) {
                last = t;
                ctx.fillStyle = 'rgba(4,7,10,0.13)';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.font = size + 'px JetBrains Mono, monospace';
                for (let i = 0; i < drops.length; i++) {
                    const ch = chars[Math.floor(Math.random() * chars.length)];
                    ctx.fillStyle = Math.random() > 0.985 ? '#00ff9c' : 'rgba(0,255,156,0.5)';
                    ctx.fillText(ch, i * size, drops[i] * size);
                    if (drops[i] * size > canvas.height && Math.random() > 0.975) drops[i] = 0;
                    drops[i]++;
                }
            }
            requestAnimationFrame(draw);
        }
        requestAnimationFrame(draw);
    }
})();
</script>
@endpush
@endsection
