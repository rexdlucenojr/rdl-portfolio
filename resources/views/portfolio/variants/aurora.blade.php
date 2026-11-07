@extends('layouts.base')

@section('title', 'Rex Decuan Luceño Jr. — Aurora')
@section('body-class', 'au-body')

@push('head')
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
@endpush

@push('styles')
<style>
    :root {
        --au-bg: #06060c;
        --au-violet: #8b5cf6;
        --au-cyan: #22d3ee;
        --au-pink: #f472b6;
        --au-text: #eceaf6;
        --au-muted: #9b97b5;
    }

    html { scroll-behavior: smooth; }

    body.au-body {
        margin: 0;
        background: var(--au-bg);
        color: var(--au-text);
        font-family: 'Inter', system-ui, sans-serif;
        overflow-x: hidden;
        -webkit-font-smoothing: antialiased;
    }

    body.au-body::before { content: none; }

    .au-display { font-family: 'Space Grotesk', system-ui, sans-serif; }

    .au-grain {
        position: fixed; inset: 0; z-index: 1; pointer-events: none; opacity: .35;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.05'/%3E%3C/svg%3E");
    }

    .au-cursor {
        position: fixed; top: 0; left: 0; width: 520px; height: 520px; border-radius: 50%;
        pointer-events: none; z-index: 0; transform: translate(-50%, -50%);
        background: radial-gradient(circle, rgba(139, 92, 246, .16), transparent 62%);
        transition: opacity .4s; opacity: 0;
    }

    .au-blob {
        position: fixed; border-radius: 50%; filter: blur(90px); z-index: 0; pointer-events: none;
        opacity: .55; will-change: transform;
    }
    .au-blob-1 { width: 46vw; height: 46vw; top: -8vw; left: -6vw; background: #4c1d95; animation: auFloat1 22s ease-in-out infinite; }
    .au-blob-2 { width: 40vw; height: 40vw; top: 20vh; right: -10vw; background: #0e7490; animation: auFloat2 26s ease-in-out infinite; }
    .au-blob-3 { width: 34vw; height: 34vw; bottom: -8vw; left: 30vw; background: #831843; animation: auFloat3 30s ease-in-out infinite; }

    @keyframes auFloat1 { 0%,100%{transform:translate(0,0) scale(1)} 50%{transform:translate(6vw,8vh) scale(1.12)} }
    @keyframes auFloat2 { 0%,100%{transform:translate(0,0) scale(1)} 50%{transform:translate(-7vw,10vh) scale(.92)} }
    @keyframes auFloat3 { 0%,100%{transform:translate(0,0) scale(1)} 50%{transform:translate(4vw,-9vh) scale(1.08)} }

    #au-particles { position: fixed; inset: 0; z-index: 0; pointer-events: none; }

    .au-wrap { position: relative; z-index: 2; max-width: 1120px; margin: 0 auto; padding: 0 24px; }

    .au-nav {
        position: fixed; top: 18px; left: 50%; transform: translateX(-50%); z-index: 60;
        width: calc(100% - 32px); max-width: 1060px;
        display: flex; align-items: center; justify-content: space-between;
        padding: 10px 14px 10px 22px; border-radius: 999px;
        background: rgba(14, 13, 26, .55); border: 1px solid rgba(255, 255, 255, .09);
        backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px);
        transition: background .3s, border-color .3s, box-shadow .3s;
    }
    .au-nav.scrolled { background: rgba(10, 9, 20, .82); border-color: rgba(139, 92, 246, .35); box-shadow: 0 18px 50px -18px rgba(0,0,0,.9); }

    .au-logo { display: inline-flex; align-items: center; gap: 9px; font-size: 1.05rem; font-weight: 700; letter-spacing: -.02em; color: #fff; text-decoration: none; }
    .au-logo-dot { width: 9px; height: 9px; border-radius: 50%; background: linear-gradient(135deg, var(--au-violet), var(--au-cyan)); box-shadow: 0 0 14px var(--au-violet); animation: auPulse 2.4s ease-in-out infinite; }
    @keyframes auPulse { 0%,100%{transform:scale(1);opacity:1} 50%{transform:scale(1.5);opacity:.6} }

    .au-links { display: flex; align-items: center; gap: 6px; }
    .au-links a {
        position: relative; text-decoration: none; color: var(--au-muted); font-size: .82rem;
        padding: 8px 12px; border-radius: 999px; transition: color .2s, background .2s;
    }
    .au-links a:hover, .au-links a.on { color: #fff; background: rgba(255,255,255,.07); }

    .au-cta {
        display: inline-flex; align-items: center; gap: 8px; text-decoration: none;
        font-size: .82rem; font-weight: 600; color: #0b0714; padding: 10px 18px; border-radius: 999px;
        background: linear-gradient(120deg, #c4b5fd, #67e8f9);
        box-shadow: 0 0 0 1px rgba(255,255,255,.15), 0 8px 30px -8px rgba(139,92,246,.8);
        transition: transform .25s, box-shadow .25s;
    }
    .au-cta:hover { transform: translateY(-2px); box-shadow: 0 0 0 1px rgba(255,255,255,.25), 0 14px 40px -8px rgba(34,211,238,.7); }

    .au-burger { display: none; width: 40px; height: 40px; border-radius: 50%; border: 1px solid rgba(255,255,255,.14); background: transparent; color: #fff; cursor: pointer; }

    .au-mobile { display: none; position: fixed; z-index: 55; top: 76px; left: 16px; right: 16px; border-radius: 22px; padding: 14px; background: rgba(12,11,22,.96); border: 1px solid rgba(255,255,255,.1); backdrop-filter: blur(20px); }
    .au-mobile.open { display: block; animation: auDrop .3s ease; }
    @keyframes auDrop { from{opacity:0;transform:translateY(-10px)} to{opacity:1;transform:none} }
    .au-mobile a { display: block; padding: 12px 14px; color: var(--au-text); text-decoration: none; border-radius: 12px; font-size: .95rem; }
    .au-mobile a:hover { background: rgba(255,255,255,.06); }

    .au-reveal { opacity: 0; transform: translateY(30px); transition: opacity .8s cubic-bezier(.16,1,.3,1), transform .8s cubic-bezier(.16,1,.3,1); }
    .au-reveal.in { opacity: 1; transform: none; }
    .au-d1 { transition-delay: .08s; } .au-d2 { transition-delay: .16s; } .au-d3 { transition-delay: .24s; } .au-d4 { transition-delay: .32s; }

    section.au-section { position: relative; padding: 110px 0; }

    .au-tag {
        display: inline-flex; align-items: center; gap: 8px; font-size: .7rem; font-weight: 600;
        letter-spacing: .18em; text-transform: uppercase; color: #c4b5fd;
        padding: 6px 12px; border-radius: 999px; border: 1px solid rgba(139,92,246,.35);
        background: rgba(139,92,246,.1);
    }
    .au-tag::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: var(--au-cyan); box-shadow: 0 0 10px var(--au-cyan); }

    .au-h2 { font-family: 'Space Grotesk', sans-serif; font-weight: 700; font-size: clamp(2.1rem, 5vw, 3.4rem); line-height: 1.04; letter-spacing: -.03em; margin: 18px 0 0; color: #fff; }
    .au-grad { background: linear-gradient(110deg, #c4b5fd 10%, #22d3ee 55%, #f9a8d4 95%); -webkit-background-clip: text; background-clip: text; color: transparent; background-size: 220% 220%; animation: auShift 8s ease infinite; }
    @keyframes auShift { 0%,100%{background-position:0% 50%} 50%{background-position:100% 50%} }

    .au-hero { min-height: 100vh; display: flex; align-items: center; padding-top: 120px; }
    .au-hero-grid { display: grid; grid-template-columns: 1.15fr .85fr; gap: 60px; align-items: center; }
    .au-hero h1 { font-family: 'Space Grotesk', sans-serif; font-size: clamp(3rem, 7.5vw, 5.6rem); line-height: .96; letter-spacing: -.045em; font-weight: 700; margin: 22px 0; color: #fff; }
    .au-role { display: inline-flex; align-items: center; gap: 2px; font-size: clamp(1.05rem, 2.4vw, 1.4rem); color: var(--au-muted); font-weight: 400; margin-bottom: 26px; min-height: 1.6em; }
    .au-role .prompt { color: var(--au-cyan); font-family: 'Space Grotesk', monospace; margin-right: 8px; }
    .au-caret { display: inline-block; width: 2px; height: 1.15em; background: var(--au-cyan); margin-left: 3px; animation: auBlink 1s steps(2) infinite; }
    @keyframes auBlink { 0%,49%{opacity:1} 50%,100%{opacity:0} }

    .au-lead { color: var(--au-muted); font-size: 1.02rem; line-height: 1.75; max-width: 480px; margin: 0 0 34px; }
    .au-lead strong { color: #ddd6fe; font-weight: 500; }

    .au-actions { display: flex; flex-wrap: wrap; gap: 14px; }
    .au-btn-ghost {
        display: inline-flex; align-items: center; gap: 9px; text-decoration: none;
        font-size: .88rem; font-weight: 500; color: var(--au-text); padding: 13px 24px; border-radius: 999px;
        border: 1px solid rgba(255,255,255,.16); background: rgba(255,255,255,.03);
        transition: border-color .25s, background .25s, transform .25s;
    }
    .au-btn-ghost:hover { border-color: rgba(34,211,238,.6); background: rgba(34,211,238,.08); transform: translateY(-2px); }

    .au-avatar-wrap { position: relative; display: flex; justify-content: center; }
    .au-avatar-ring { position: absolute; inset: -22px; border-radius: 42px; border: 1px solid rgba(139,92,246,.35); }
    .au-avatar-ring::before { content: ''; position: absolute; inset: -1px; border-radius: 42px; padding: 1px; background: linear-gradient(130deg, var(--au-violet), transparent 40%, var(--au-cyan)); -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0); -webkit-mask-composite: xor; mask-composite: exclude; animation: auSpinGrad 8s linear infinite; }
    @keyframes auSpinGrad { to { filter: hue-rotate(360deg); } }
    .au-avatar { position: relative; width: min(340px, 78vw); aspect-ratio: 4/4.4; border-radius: 34px; overflow: hidden; border: 1px solid rgba(255,255,255,.14); box-shadow: 0 40px 90px -30px rgba(0,0,0,.9); }
    .au-avatar img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .au-avatar::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 55%, rgba(6,6,12,.85)); }
    .au-avatar-badge { position: absolute; left: -14px; bottom: 26px; z-index: 3; padding: 12px 18px; border-radius: 16px; background: rgba(14,13,26,.85); border: 1px solid rgba(255,255,255,.14); backdrop-filter: blur(14px); }
    .au-avatar-badge span { display: block; font-size: .62rem; letter-spacing: .16em; text-transform: uppercase; color: var(--au-cyan); }
    .au-avatar-badge strong { font-family: 'Space Grotesk', sans-serif; font-size: .9rem; color: #fff; }

    .au-marquee { position: relative; z-index: 2; border-block: 1px solid rgba(255,255,255,.08); padding: 22px 0; overflow: hidden; background: rgba(255,255,255,.015); }
    .au-marquee-track { display: flex; width: max-content; gap: 40px; animation: auMarquee 24s linear infinite; }
    .au-marquee-track span { font-family: 'Space Grotesk', sans-serif; font-size: 1.15rem; font-weight: 600; letter-spacing: .02em; color: rgba(236,234,246,.55); display: inline-flex; align-items: center; gap: 40px; }
    .au-marquee-track span::after { content: '✦'; color: var(--au-violet); font-size: .8rem; }
    @keyframes auMarquee { to { transform: translateX(-50%); } }

    .au-about-grid { display: grid; grid-template-columns: .9fr 1.1fr; gap: 60px; align-items: center; }
    .au-about-visual { position: relative; }
    .au-about-frame { position: relative; border-radius: 28px; overflow: hidden; border: 1px solid rgba(255,255,255,.12); }
    .au-about-frame img { width: 100%; aspect-ratio: 1; object-fit: cover; display: block; }
    .au-about-frame::after { content: ''; position: absolute; inset: 0; background: linear-gradient(160deg, rgba(139,92,246,.28), transparent 55%); mix-blend-mode: screen; }
    .au-chip-grid { position: absolute; right: -18px; bottom: -18px; display: grid; gap: 10px; }
    .au-chip { background: rgba(14,13,26,.9); border: 1px solid rgba(255,255,255,.12); backdrop-filter: blur(12px); border-radius: 14px; padding: 12px 16px; font-size: .78rem; color: var(--au-text); display: flex; align-items: center; gap: 9px; }
    .au-chip i { width: 7px; height: 7px; border-radius: 50%; background: var(--au-cyan); box-shadow: 0 0 10px var(--au-cyan); }
    .au-chip:nth-child(2) i { background: var(--au-violet); box-shadow: 0 0 10px var(--au-violet); }
    .au-chip:nth-child(3) i { background: var(--au-pink); box-shadow: 0 0 10px var(--au-pink); }

    .au-p { color: var(--au-muted); line-height: 1.8; margin: 0 0 16px; }
    .au-p em { color: #ddd6fe; font-style: normal; font-weight: 500; }

    .au-pills { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 26px; }
    .au-pill { font-size: .78rem; color: #d8d4ec; padding: 8px 15px; border-radius: 999px; border: 1px solid rgba(255,255,255,.13); background: rgba(255,255,255,.03); transition: .25s; }
    .au-pill:hover { border-color: rgba(34,211,238,.55); color: #fff; background: rgba(34,211,238,.08); transform: translateY(-2px); }

    .au-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 52px; }
    .au-glass {
        position: relative; padding: 30px; border-radius: 22px; overflow: hidden;
        background: rgba(255,255,255,.035); border: 1px solid rgba(255,255,255,.09);
        backdrop-filter: blur(10px); transition: transform .3s, border-color .3s, background .3s;
        transform-style: preserve-3d;
    }
    .au-glass::after { content: ''; position: absolute; inset: 0; background: radial-gradient(400px circle at var(--mx,50%) var(--my,50%), rgba(139,92,246,.18), transparent 60%); opacity: 0; transition: opacity .3s; pointer-events: none; }
    .au-glass:hover { border-color: rgba(139,92,246,.45); background: rgba(255,255,255,.055); }
    .au-glass:hover::after { opacity: 1; }
    .au-ico { width: 48px; height: 48px; border-radius: 14px; display: grid; place-items: center; background: linear-gradient(135deg, rgba(139,92,246,.22), rgba(34,211,238,.16)); border: 1px solid rgba(255,255,255,.1); margin-bottom: 20px; color: #c4b5fd; }
    .au-ico svg { width: 23px; height: 23px; }
    .au-glass h3 { font-family: 'Space Grotesk', sans-serif; font-size: 1.15rem; font-weight: 600; color: #fff; margin: 0 0 8px; }
    .au-glass p { font-size: .85rem; color: var(--au-muted); line-height: 1.65; margin: 0; }
    .au-glass .au-num { position: absolute; top: 22px; right: 24px; font-family: 'Space Grotesk', sans-serif; font-size: .75rem; color: rgba(255,255,255,.28); }

    .au-timeline { position: relative; margin-top: 54px; padding-left: 34px; }
    .au-timeline::before { content: ''; position: absolute; left: 8px; top: 6px; bottom: 6px; width: 2px; background: linear-gradient(180deg, var(--au-violet), var(--au-cyan), transparent); }
    .au-tl-item { position: relative; padding: 0 0 38px 14px; }
    .au-tl-item:last-child { padding-bottom: 0; }
    .au-tl-item::before { content: ''; position: absolute; left: -33px; top: 4px; width: 16px; height: 16px; border-radius: 50%; background: var(--au-bg); border: 2px solid var(--au-violet); box-shadow: 0 0 0 4px rgba(139,92,246,.12), 0 0 16px rgba(139,92,246,.6); }
    .au-tl-item:nth-child(2)::before { border-color: var(--au-cyan); box-shadow: 0 0 0 4px rgba(34,211,238,.12), 0 0 16px rgba(34,211,238,.6); }
    .au-tl-item:nth-child(3)::before { border-color: var(--au-pink); box-shadow: 0 0 0 4px rgba(244,114,182,.12), 0 0 16px rgba(244,114,182,.6); }
    .au-tl-head { display: flex; flex-wrap: wrap; align-items: baseline; gap: 12px; margin-bottom: 6px; }
    .au-tl-head h3 { font-family: 'Space Grotesk', sans-serif; font-size: 1.2rem; color: #fff; margin: 0; }
    .au-tl-year { font-size: .72rem; color: var(--au-cyan); border: 1px solid rgba(34,211,238,.35); padding: 3px 10px; border-radius: 999px; }
    .au-tl-item p { margin: 0; font-size: .85rem; color: var(--au-muted); }

    .au-cert-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-top: 52px; }
    .au-cert-grid .au-wide { grid-column: 1 / -1; }
    .au-cert h3 { font-family: 'Space Grotesk', sans-serif; font-size: 1.25rem; color: #fff; margin: 0 0 8px; }
    .au-cert .au-meta { font-size: .7rem; letter-spacing: .14em; text-transform: uppercase; color: var(--au-cyan); margin-bottom: 14px; }
    .au-cert p { color: var(--au-muted); font-size: .88rem; line-height: 1.7; margin: 0 0 18px; }
    .au-link { display: inline-flex; align-items: center; gap: 8px; font-size: .82rem; font-weight: 500; color: #fff; text-decoration: none; padding: 10px 18px; border-radius: 999px; border: 1px solid rgba(255,255,255,.16); transition: .25s; }
    .au-link:hover { border-color: rgba(34,211,238,.6); background: rgba(34,211,238,.08); gap: 12px; }

    .au-contact-card { position: relative; overflow: hidden; border-radius: 30px; padding: clamp(28px, 5vw, 64px); background: linear-gradient(150deg, rgba(139,92,246,.14), rgba(34,211,238,.06)); border: 1px solid rgba(255,255,255,.12); }
    .au-contact-card::before { content: ''; position: absolute; width: 380px; height: 380px; border-radius: 50%; background: var(--au-violet); filter: blur(120px); opacity: .3; top: -140px; right: -100px; pointer-events: none; }
    .au-contact-grid { position: relative; display: grid; grid-template-columns: 1fr 1fr; gap: 48px; }
    .au-h2-sm { font-family: 'Space Grotesk', sans-serif; font-size: clamp(2rem, 4.5vw, 3rem); line-height: 1.05; letter-spacing: -.03em; color: #fff; margin: 16px 0 18px; }
    .au-contact-links { display: flex; flex-direction: column; gap: 14px; margin-top: 28px; }
    .au-contact-links a { display: flex; align-items: center; gap: 14px; text-decoration: none; color: var(--au-muted); font-size: .9rem; transition: color .2s; }
    .au-contact-links a:hover { color: #fff; }
    .au-contact-links .ico { width: 40px; height: 40px; border-radius: 12px; display: grid; place-items: center; background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.1); color: #c4b5fd; transition: .25s; flex: none; }
    .au-contact-links a:hover .ico { background: rgba(139,92,246,.18); border-color: rgba(139,92,246,.5); }
    .au-contact-links svg { width: 17px; height: 17px; }

    .au-form { display: flex; flex-direction: column; gap: 14px; }
    .au-field label { display: block; font-size: .68rem; letter-spacing: .14em; text-transform: uppercase; color: var(--au-muted); margin-bottom: 7px; }
    .au-input, .au-form input, .au-form textarea {
        width: 100%; background: rgba(6,6,12,.5); border: 1px solid rgba(255,255,255,.12);
        color: #fff; font-family: inherit; font-size: .9rem; border-radius: 13px; padding: 13px 16px;
        outline: none; transition: border-color .2s, box-shadow .2s; resize: none;
    }
    .au-form input:focus, .au-form textarea:focus { border-color: rgba(34,211,238,.6); box-shadow: 0 0 0 3px rgba(34,211,238,.12); }
    .au-form input::placeholder, .au-form textarea::placeholder { color: rgba(155,151,181,.5); }
    .au-submit { margin-top: 4px; border: none; cursor: pointer; font-family: 'Space Grotesk', sans-serif; font-weight: 600; font-size: .9rem; color: #0b0714; padding: 14px; border-radius: 13px; background: linear-gradient(120deg, #c4b5fd, #67e8f9); transition: transform .2s, box-shadow .2s; }
    .au-submit:hover { transform: translateY(-2px); box-shadow: 0 14px 34px -12px rgba(34,211,238,.8); }
    .au-success { margin-bottom: 16px; padding: 14px 16px; border-radius: 13px; border: 1px solid rgba(34,211,238,.4); background: rgba(34,211,238,.1); color: #a5f3fc; font-size: .85rem; }
    .au-error { color: #fda4af; font-size: .72rem; margin-top: 5px; }

    .au-footer { position: relative; z-index: 2; border-top: 1px solid rgba(255,255,255,.08); padding: 34px 0; }
    .au-footer-inner { display: flex; flex-wrap: wrap; gap: 14px; align-items: center; justify-content: space-between; }
    .au-footer p { margin: 0; font-size: .8rem; color: var(--au-muted); }

    .au-switcher { position: fixed; z-index: 70; bottom: 18px; left: 50%; transform: translateX(-50%); display: flex; gap: 4px; padding: 5px; border-radius: 999px; background: rgba(14,13,26,.8); border: 1px solid rgba(255,255,255,.12); backdrop-filter: blur(16px); font-size: .72rem; }
    .au-switcher a { text-decoration: none; color: var(--au-muted); padding: 7px 13px; border-radius: 999px; transition: .2s; }
    .au-switcher a:hover { color: #fff; background: rgba(255,255,255,.08); }
    .au-switcher a.on { color: #0b0714; background: linear-gradient(120deg, #c4b5fd, #67e8f9); font-weight: 600; }

    @media (max-width: 900px) {
        .au-hero-grid, .au-about-grid, .au-contact-grid { grid-template-columns: 1fr; gap: 44px; }
        .au-hero-grid { padding-top: 10px; }
        .au-avatar-wrap { order: -1; }
        .au-about-visual { order: 2; }
        .au-grid-3 { grid-template-columns: 1fr; }
        .au-cert-grid { grid-template-columns: 1fr; }
        .au-links { display: none; }
        .au-cta { display: none; }
        .au-burger { display: grid; place-items: center; }
        section.au-section { padding: 80px 0; }
        .au-chip-grid { right: 8px; bottom: 8px; }
        .au-switcher { display: none; }
    }
</style>
@endpush

@section('content')
<div class="au-cursor" id="au-cursor" aria-hidden="true"></div>
<div class="au-grain" aria-hidden="true"></div>
<div class="au-blob au-blob-1" aria-hidden="true"></div>
<div class="au-blob au-blob-2" aria-hidden="true"></div>
<div class="au-blob au-blob-3" aria-hidden="true"></div>
<canvas id="au-particles" aria-hidden="true"></canvas>

<nav class="au-nav" id="au-nav" aria-label="Main navigation">
    <a href="#home" class="au-logo au-display"><span class="au-logo-dot"></span>Rex<span class="au-grad">.Dev</span></a>

    <div class="au-links">
        <a href="#home" class="au-link-item on">Home</a>
        <a href="#about" class="au-link-item">About</a>
        <a href="#education" class="au-link-item">Education</a>
        <a href="#skills" class="au-link-item">Skills</a>
        <a href="#certifications" class="au-link-item">Certifications</a>
        <a href="#contact" class="au-link-item">Contact</a>
    </div>

    <div style="display:flex;align-items:center;gap:10px">
        <a href="#contact" class="au-cta">Hire me <span aria-hidden="true">↗</span></a>
        <button class="au-burger" id="au-burger" aria-label="Toggle menu" aria-expanded="false" type="button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
        </button>
    </div>
</nav>

<div class="au-mobile" id="au-mobile">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#education">Education</a>
    <a href="#skills">Skills</a>
    <a href="#certifications">Certifications</a>
    <a href="#contact">Contact</a>
</div>

<main>
    <section class="au-hero" id="home">
        <div class="au-wrap">
            <div class="au-hero-grid">
                <div>
                    <span class="au-tag au-reveal in">IT Student · Portfolio 2026</span>
                    <h1 class="au-reveal in au-d1">Hi, I'm <span class="au-grad">Rex Decuan Luceño Jr.</span></h1>
                    <div class="au-role au-reveal in au-d2">
                        <span class="prompt">&gt;</span>
                        <span id="au-type" data-words='["IT Student | Aspiring IT Professional","Coding · Networking · Hardware","Innovate. Create. Elevate."]'></span>
                        <span class="au-caret" aria-hidden="true"></span>
                    </div>
                    <p class="au-lead au-reveal in au-d3">
                        Passionate about <strong>coding</strong>, <strong>networking</strong>, and <strong>hardware</strong> — building a career in tech through innovation, creation, and elevation.
                    </p>
                    <div class="au-actions au-reveal in au-d4">
                        <a href="#about" class="au-cta" style="padding:13px 26px;font-size:.9rem">Meet me <span aria-hidden="true">↓</span></a>
                        <a href="#contact" class="au-btn-ghost">Get in touch <span aria-hidden="true">↗</span></a>
                    </div>
                </div>

                <div class="au-avatar-wrap au-reveal in au-d2">
                    <div class="au-avatar-ring" aria-hidden="true"></div>
                    <div class="au-avatar">
                        <img src="{{ asset('images/profile.jpeg') }}" alt="Rex Decuan Luceño Jr." loading="eager">
                    </div>
                    <div class="au-avatar-badge">
                        <span>Currently</span>
                        <strong>4th Year IT Student</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="au-marquee" aria-hidden="true">
        <div class="au-marquee-track">
            <span>Innovate</span><span>Create</span><span>Elevate</span><span>Coding</span><span>Networking</span><span>Hardware</span>
            <span>Innovate</span><span>Create</span><span>Elevate</span><span>Coding</span><span>Networking</span><span>Hardware</span>
        </div>
    </div>

    <section class="au-section" id="about">
        <div class="au-wrap">
            <div class="au-about-grid">
                <div class="au-about-visual au-reveal">
                    <div class="au-about-frame">
                        <img src="{{ asset('images/profile.jpeg') }}" alt="Rex Decuan Luceño Jr." loading="lazy">
                    </div>
                    <div class="au-chip-grid">
                        <span class="au-chip"><i></i> Coding</span>
                        <span class="au-chip"><i></i> Networking</span>
                        <span class="au-chip"><i></i> Hardware</span>
                    </div>
                </div>

                <div>
                    <span class="au-tag au-reveal">About me</span>
                    <h2 class="au-h2 au-reveal au-d1">A bit about<br><span class="au-grad">who I am</span></h2>
                    <p class="au-p au-reveal au-d2" style="margin-top:22px">
                        A 4th year IT student aiming to build a successful career in tech and provide a good life for my family. Passionate about coding, networking, and hardware.
                    </p>
                    <p class="au-p au-reveal au-d3">
                        Guided by a simple motto — <em>Innovate. Create. Elevate.</em>
                    </p>
                    <div class="au-pills au-reveal au-d4">
                        <span class="au-pill">Coding</span>
                        <span class="au-pill">Network Configuration</span>
                        <span class="au-pill">Hardware Deployment</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="au-section" id="education">
        <div class="au-wrap">
            <div style="max-width:620px">
                <span class="au-tag au-reveal">Education</span>
                <h2 class="au-h2 au-reveal au-d1">Where I've<br><span class="au-grad">studied</span></h2>
            </div>

            <div class="au-timeline">
                <div class="au-tl-item au-reveal">
                    <div class="au-tl-head">
                        <h3>Data Center College of the Philippines</h3>
                        <span class="au-tl-year">Present</span>
                    </div>
                    <p>Bachelor of Science in Information Technology — Bangued, Abra</p>
                </div>
                <div class="au-tl-item au-reveal au-d1">
                    <div class="au-tl-head">
                        <h3>Abra High School — Main Campus</h3>
                        <span class="au-tl-year">Class of 2023</span>
                    </div>
                    <p>Secondary Education</p>
                </div>
                <div class="au-tl-item au-reveal au-d2">
                    <div class="au-tl-head">
                        <h3>Bangued East Central School</h3>
                        <span class="au-tl-year">Class of 2017</span>
                    </div>
                    <p>Elementary Education</p>
                </div>
            </div>
        </div>
    </section>

    <section class="au-section" id="skills">
        <div class="au-wrap">
            <div style="max-width:620px">
                <span class="au-tag au-reveal">Skills</span>
                <h2 class="au-h2 au-reveal au-d1">What I'm<br><span class="au-grad">good at</span></h2>
            </div>

            <div class="au-grid-3">
                <article class="au-glass au-tilt au-reveal">
                    <span class="au-num">01</span>
                    <div class="au-ico">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                    </div>
                    <h3>Coding</h3>
                    <p>Building clean, functional software and web experiences with a problem-solving mindset.</p>
                </article>

                <article class="au-glass au-tilt au-reveal au-d1">
                    <span class="au-num">02</span>
                    <div class="au-ico">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21.75 17.25v-.228a4.5 4.5 0 00-.12-1.03l-2.268-9.64a3.375 3.375 0 00-3.285-2.602H7.923a3.375 3.375 0 00-3.285 2.602l-2.268 9.64a4.5 4.5 0 00-.12 1.03v.228m19.5 0a3 3 0 01-3 3H5.25a3 3 0 01-3-3m19.5 0a3 3 0 00-3-3H5.25a3 3 0 00-3 3m16.5 0h.008v.008h-.008v-.008zm-3 0h.008v.008h-.008v-.008z"/></svg>
                    </div>
                    <h3>Network Configuration</h3>
                    <p>Setting up, securing, and troubleshooting networks for reliable connectivity.</p>
                </article>

                <article class="au-glass au-tilt au-reveal au-d2">
                    <span class="au-num">03</span>
                    <div class="au-ico">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/></svg>
                    </div>
                    <h3>Hardware Deployment</h3>
                    <p>Assembling, deploying, and maintaining computer systems and peripheral devices.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="au-section" id="certifications">
        <div class="au-wrap">
            <div style="max-width:620px">
                <span class="au-tag au-reveal">Certifications</span>
                <h2 class="au-h2 au-reveal au-d1">Credentials I've<br><span class="au-grad">earned</span></h2>
            </div>

            <div class="au-cert-grid">
                <article class="au-glass au-cert au-reveal">
                    <div class="au-ico">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                    </div>
                    <div class="au-meta">September 2025</div>
                    <h3>TESDA CSS / NC2</h3>
                    <p>Computer Systems Servicing, National Certificate II</p>
                    <a href="{{ asset('images/certificates/nc2.png') }}" target="_blank" rel="noopener noreferrer" class="au-link">View certificate <span aria-hidden="true">↗</span></a>
                </article>

                <article class="au-glass au-cert au-reveal au-d1">
                    <div class="au-ico">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21a9 9 0 100-18 9 9 0 000 18zm0 0a8.949 8.949 0 00-4.5-7.5m9 0A8.949 8.949 0 0112 21M12 3a8.949 8.949 0 00-4.5 7.5m9 0A8.949 8.949 0 0112 3"/></svg>
                    </div>
                    <div class="au-meta">DICT</div>
                    <h3>DICT Netiquette</h3>
                    <p>Online Safety Through Netiquette</p>
                    <a href="{{ asset('images/certificates/dict-netiquette.pdf') }}" target="_blank" rel="noopener noreferrer" class="au-link">View certificate <span aria-hidden="true">↗</span></a>
                </article>

                <article class="au-glass au-cert au-wide au-reveal au-d2">
                    <div class="au-ico">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                    </div>
                    <div class="au-meta">July 23, 2026</div>
                    <h3>CHED SEEDLING Project</h3>
                    <p>For participating in the Special Episode of the 2026 SEEDLING Project — "Stay Alert, Stay Secure: Promoting Cyber Awareness and Online Scam Prevention."</p>
                    <a href="{{ asset('images/certificates/ched-certificate.pdf') }}" target="_blank" rel="noopener noreferrer" class="au-link">View certificate <span aria-hidden="true">↗</span></a>
                </article>
            </div>
        </div>
    </section>

    <section class="au-section" id="contact">
        <div class="au-wrap">
            <div class="au-contact-card au-reveal">
                <div class="au-contact-grid">
                    <div>
                        <span class="au-tag">Get in touch</span>
                        <h2 class="au-h2-sm">Let's build<br>something <span class="au-grad">great</span></h2>
                        <p class="au-p" style="max-width:380px">"Innovate. Create. Elevate." — I'm open to opportunities in coding, networking, and hardware.</p>

                        <div class="au-contact-links">
                            <a href="mailto:lucenorexjr.913@gmail.com">
                                <span class="ico"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg></span>
                                lucenorexjr.913@gmail.com
                            </a>
                            <a href="tel:09387802526">
                                <span class="ico"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg></span>
                                0938-780-2526
                            </a>
                            <a href="https://github.com/rexdlucenojr" target="_blank" rel="noopener noreferrer">
                                <span class="ico"><svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg></span>
                                github.com/rexdlucenojr
                            </a>
                        </div>
                    </div>

                    <div>
                        @if (session('success'))
                            <div class="au-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('contact.submit') }}" class="au-form">
                            @csrf
                            <div class="au-field">
                                <label for="au-name">Name</label>
                                <input id="au-name" type="text" name="name" value="{{ old('name') }}" placeholder="Your name" autocomplete="name">
                                @error('name')<p class="au-error">{{ $message }}</p>@enderror
                            </div>
                            <div class="au-field">
                                <label for="au-email">Email</label>
                                <input id="au-email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email">
                                @error('email')<p class="au-error">{{ $message }}</p>@enderror
                            </div>
                            <div class="au-field">
                                <label for="au-message">Message</label>
                                <textarea id="au-message" name="message" rows="4" placeholder="Write your message...">{{ old('message') }}</textarea>
                                @error('message')<p class="au-error">{{ $message }}</p>@enderror
                            </div>
                            <button type="submit" class="au-submit">Send message →</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="au-footer">
    <div class="au-wrap au-footer-inner">
        <p>&copy; <span id="au-year"></span> Rex Decuan Luceño Jr. All rights reserved.</p>
        <p class="au-display" style="color:#c4b5fd">Innovate. Create. Elevate.</p>
    </div>
</footer>

<div class="au-switcher" aria-label="Design switcher">
    <a href="{{ route('design.aurora') }}" class="on">Aurora</a>
    <a href="{{ route('design.terminal') }}">Terminal</a>
    <a href="{{ route('design.editorial') }}">Editorial</a>
</div>

@push('scripts')
<script>
(function () {
    const doc = document;
    const nav = doc.getElementById('au-nav');
    const burger = doc.getElementById('au-burger');
    const mobile = doc.getElementById('au-mobile');
    const cursor = doc.getElementById('au-cursor');

    // Nav scroll state
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 24);
        updateActive();
    }, { passive: true });

    // Mobile menu
    burger.addEventListener('click', () => {
        const open = mobile.classList.toggle('open');
        burger.setAttribute('aria-expanded', String(open));
    });
    mobile.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
        mobile.classList.remove('open');
        burger.setAttribute('aria-expanded', 'false');
    }));

    // Active nav link
    const ids = ['home', 'about', 'education', 'skills', 'certifications', 'contact'];
    const linkItems = doc.querySelectorAll('.au-link-item');
    function updateActive() {
        let current = 'home';
        for (const id of ids) {
            const el = doc.getElementById(id);
            if (el && window.scrollY >= el.offsetTop - 160) current = id;
        }
        linkItems.forEach(l => l.classList.toggle('on', l.getAttribute('href') === '#' + current));
    }
    updateActive();

    // Scroll reveal
    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -50px 0px' });
    doc.querySelectorAll('.au-reveal').forEach(el => io.observe(el));

    // Typewriter
    const typeEl = doc.getElementById('au-type');
    if (typeEl) {
        let words = [];
        try { words = JSON.parse(typeEl.dataset.words); } catch (e) { words = [typeEl.textContent]; }
        let w = 0, c = 0, deleting = false;
        function tick() {
            const word = words[w];
            typeEl.textContent = word.slice(0, c);
            if (!deleting && c < word.length) { c++; setTimeout(tick, 55); }
            else if (!deleting && c === word.length) { deleting = true; setTimeout(tick, 1800); }
            else if (deleting && c > 0) { c--; setTimeout(tick, 28); }
            else { deleting = false; w = (w + 1) % words.length; setTimeout(tick, 350); }
        }
        tick();
    }

    // Cursor glow
    if (window.matchMedia('(pointer: fine)').matches) {
        let tx = window.innerWidth / 2, ty = window.innerHeight / 2, cx = tx, cy = ty;
        window.addEventListener('mousemove', e => { tx = e.clientX; ty = e.clientY; cursor.style.opacity = '1'; });
        (function follow() {
            cx += (tx - cx) * 0.12; cy += (ty - cy) * 0.12;
            cursor.style.transform = 'translate(' + cx + 'px,' + cy + 'px) translate(-50%,-50%)';
            requestAnimationFrame(follow);
        })();
    }

    // 3D tilt + spotlight
    doc.querySelectorAll('.au-tilt').forEach(card => {
        card.addEventListener('mousemove', e => {
            const r = card.getBoundingClientRect();
            const px = (e.clientX - r.left) / r.width;
            const py = (e.clientY - r.top) / r.height;
            card.style.setProperty('--mx', (px * 100) + '%');
            card.style.setProperty('--my', (py * 100) + '%');
            card.style.transform = 'perspective(900px) rotateX(' + ((0.5 - py) * 8) + 'deg) rotateY(' + ((px - 0.5) * 8) + 'deg) translateY(-4px)';
        });
        card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });

    // Particle field
    const canvas = doc.getElementById('au-particles');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let parts = [], w = 0, h = 0;
        const colors = ['139,92,246', '34,211,238', '244,114,182'];
        function resize() {
            w = canvas.width = window.innerWidth;
            h = canvas.height = window.innerHeight;
            parts = Array.from({ length: 60 }, () => ({
                x: Math.random() * w, y: Math.random() * h,
                vx: (Math.random() - 0.5) * 0.25, vy: (Math.random() - 0.5) * 0.25,
                r: Math.random() * 1.8 + 0.6, a: Math.random() * 0.5 + 0.15,
                c: colors[Math.floor(Math.random() * colors.length)]
            }));
        }
        function draw() {
            ctx.clearRect(0, 0, w, h);
            for (const p of parts) {
                p.x += p.vx; p.y += p.vy;
                if (p.x < 0 || p.x > w) p.vx *= -1;
                if (p.y < 0 || p.y > h) p.vy *= -1;
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(' + p.c + ',' + p.a + ')';
                ctx.fill();
            }
            requestAnimationFrame(draw);
        }
        window.addEventListener('resize', resize);
        resize(); draw();
    }

    // Year
    const yr = doc.getElementById('au-year');
    if (yr) yr.textContent = new Date().getFullYear();
})();
</script>
@endpush
@endsection
