@extends('layouts.base')

@section('title', 'Choose a design — Rex Luceño')
@section('body-class', 'ch-body')

@push('head')
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
@endpush

@push('styles')
<style>
    body.ch-body { margin: 0; background: #08080d; color: #e9e7f2; font-family: 'Inter', system-ui, sans-serif; -webkit-font-smoothing: antialiased; }
    body.ch-body::before { content: none; }
    .ch-wrap { max-width: 1120px; margin: 0 auto; padding: 72px 24px; }
    .ch-kicker { font-size: .7rem; letter-spacing: .22em; text-transform: uppercase; color: #8b5cf6; }
    .ch-h1 { font-family: 'Space Grotesk', sans-serif; font-size: clamp(2.4rem, 6vw, 4rem); line-height: 1; letter-spacing: -.04em; margin: 16px 0 14px; color: #fff; }
    .ch-sub { color: #9a96b2; max-width: 560px; line-height: 1.7; margin: 0 0 48px; }
    .ch-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
    .ch-card { position: relative; display: flex; flex-direction: column; text-decoration: none; color: inherit; border: 1px solid rgba(255,255,255,.1); border-radius: 20px; overflow: hidden; background: #0e0d18; transition: transform .35s cubic-bezier(.16,1,.3,1), border-color .3s; }
    .ch-card:hover { transform: translateY(-6px); border-color: rgba(139,92,246,.6); }
    .ch-preview { position: relative; height: 190px; overflow: hidden; }
    .ch-v1 { background: radial-gradient(circle at 25% 20%, #6d28d9, transparent 55%), radial-gradient(circle at 80% 70%, #0e7490, transparent 55%), #06060c; }
    .ch-v2 { background: #04070a; }
    .ch-v3 { background: #f3ede3; }
    .ch-v1::after { content: ''; position: absolute; inset: 22px; border: 1px solid rgba(255,255,255,.18); border-radius: 12px; background: rgba(255,255,255,.05); backdrop-filter: blur(6px); }
    .ch-v1::before { content: ''; position: absolute; width: 70px; height: 70px; border-radius: 50%; border: 2px solid rgba(196,181,253,.6); top: 50%; right: 40px; transform: translateY(-50%); }
    .ch-v2 .ch-bars { position: absolute; inset: 22px; border: 1px solid rgba(0,255,156,.2); border-radius: 8px; background: #0a1014; }
    .ch-v2 .ch-bars::before { content: ''; position: absolute; top: 10px; left: 12px; width: 34px; height: 4px; background: #ff5f57; box-shadow: 0 0 0 8px transparent, 14px 0 #febc2e, 28px 0 #28c840; border-radius: 99px; }
    .ch-v2 .ch-bars::after { content: '> _'; position: absolute; bottom: 14px; left: 14px; color: #00ff9c; font-family: monospace; font-size: 20px; }
    .ch-v3 .ch-lines { position: absolute; inset: 22px; border: 1px solid rgba(25,22,20,.18); border-radius: 12px; }
    .ch-v3 .ch-lines::before { content: 'Rex'; position: absolute; left: 16px; top: 14px; font-family: Georgia, serif; font-size: 44px; color: #191614; letter-spacing: -.04em; }
    .ch-v3 .ch-lines::after { content: 'Luceño'; position: absolute; left: 16px; top: 58px; font-family: Georgia, serif; font-style: italic; font-size: 44px; color: #e8552e; letter-spacing: -.04em; }
    .ch-body-card { padding: 22px; display: flex; flex-direction: column; flex: 1; }
    .ch-num { font-family: 'Space Grotesk', sans-serif; font-size: .72rem; color: #8b5cf6; letter-spacing: .1em; }
    .ch-name { font-family: 'Space Grotesk', sans-serif; font-size: 1.25rem; font-weight: 600; color: #fff; margin: 6px 0 8px; }
    .ch-desc { font-size: .82rem; line-height: 1.6; color: #9a96b2; margin: 0 0 18px; flex: 1; }
    .ch-go { display: inline-flex; align-items: center; gap: 8px; font-size: .8rem; font-weight: 600; color: #c4b5fd; }
    .ch-card:hover .ch-go { gap: 13px; }
    .ch-note { margin-top: 40px; font-size: .78rem; color: #6f6b85; }
    @media (max-width: 900px) { .ch-grid { grid-template-columns: 1fr; } .ch-wrap { padding: 48px 20px; } }
</style>
@endpush

@section('content')
<div class="ch-wrap">
    <span class="ch-kicker">Three animated directions</span>
    <h1 class="ch-h1">Pick a new look for your portfolio</h1>
    <p class="ch-sub">Each option is fully built with all your content — hero, about, education, skills, certifications, and a working contact form. Open them, scroll around, then tell me which one to make the main site.</p>

    <div class="ch-grid">
        <a href="{{ route('design.aurora') }}" class="ch-card">
            <div class="ch-preview ch-v1" aria-hidden="true"></div>
            <div class="ch-body-card">
                <span class="ch-num">01</span>
                <span class="ch-name">Aurora Glass</span>
                <p class="ch-desc">Neon glassmorphism with floating aurora gradients, a particle field, cursor glow, 3D-tilt cards, and animated timeline.</p>
                <span class="ch-go">Open design →</span>
            </div>
        </a>

        <a href="{{ route('design.terminal') }}" class="ch-card">
            <div class="ch-preview ch-v2" aria-hidden="true"><div class="ch-bars"></div></div>
            <div class="ch-body-card">
                <span class="ch-num">02</span>
                <span class="ch-name">Terminal</span>
                <p class="ch-desc">Developer-console aesthetic with a live terminal window, matrix rain, glitch text, and animated skill bars.</p>
                <span class="ch-go">Open design →</span>
            </div>
        </a>

        <a href="{{ route('design.editorial') }}" class="ch-card">
            <div class="ch-preview ch-v3" aria-hidden="true"><div class="ch-lines"></div></div>
            <div class="ch-body-card">
                <span class="ch-num">03</span>
                <span class="ch-name">Editorial Kinetic</span>
                <p class="ch-desc">Bright magazine style with kinetic serif type, mask reveals, scrolling marquee, parallax portrait, and magnetic buttons.</p>
                <span class="ch-go">Open design →</span>
            </div>
        </a>
    </div>

    <p class="ch-note">Tip: each design has a small switcher at the bottom so you can jump between all three.</p>
</div>
@endsection
