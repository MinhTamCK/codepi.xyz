---
title: Notch
description: Notch is a free, open-source macOS app that lives in your notch — monitor Claude Code and Cursor sessions across all your machines, and approve permission requests without touching a terminal.
---
@extends('_layouts.landing')

@section('title', "Notch — Keep an eye on your coding agents")

@section('content')
<section class="ld-hero">

    <div class="ld-mac-wrap">
        <div class="ld-mac">
            <div class="ld-screen">
                <div class="ld-display">
                    <div class="ld-mbar" aria-hidden="true">
                        <strong>Notch</strong>
                        <span class="ld-mbar-menu">File</span>
                        <span class="ld-mbar-menu">Edit</span>
                        <span class="ld-mbar-menu">View</span>
                        <span class="ld-mbar-menu">Help</span>
                        <span class="ld-mbar-right">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><line x1="12" y1="20" x2="12.01" y2="20"/></svg>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="6" width="18" height="12" rx="2" ry="2"/><line x1="23" y1="13" x2="23" y2="11"/></svg>
                            <span class="ld-clock" data-clock></span>
                        </span>
                    </div>

                    <div class="ld-notch" data-notch role="button" tabindex="0" aria-expanded="false" aria-label="Toggle the Notch demo panel">
                        <span class="ld-nc ld-nc-left"><span class="eq"><i></i><i></i><i></i><i></i></span><strong>1</strong></span>
                        <span class="ld-notch-cam"></span>
                        <span class="ld-nc ld-nc-right"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><strong>1</strong></span>
                    </div>

                    <div class="ld-demo" aria-hidden="true">
                        <div class="ld-demo-clip">
                        <div class="ld-panel">
            <div class="ld-ph">
                <span class="eq"><i></i><i></i><i></i><i></i></span>
                <strong>1 working</strong>
                <span class="ld-sep">·</span>
                <span class="ld-mut">3 sessions</span>
                <span class="ld-ph-right">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    <i class="ld-conn"></i>
                </span>
            </div>

            <div class="ld-perm">
                <div class="ld-perm-head">
                    <img src="/assets/img/agent-cursor.png" alt="" width="20" height="20">
                    <strong>db-migrate</strong>
                    <span class="ld-mut">· vm-eu-1</span>
                    <span class="ld-perm-tool"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2 1 21h22L12 2z"/></svg>Bash</span>
                </div>
                <code class="ld-perm-detail">npm run db:migrate --force</code>
                <div class="ld-perm-actions">
                    <span class="ld-pill ld-pill-deny">Deny</span>
                    <span class="ld-pill ld-pill-allow">Allow Once</span>
                </div>
            </div>

            <p class="ld-machine">mbp-m3</p>
            <div class="ld-srow">
                <span class="ld-badge"><img class="px" src="/assets/img/agent-claude.png" alt="" width="20" height="20"></span>
                <span class="ld-srow-main">
                    <span class="ld-srow-title"><strong>api-server</strong> <span class="eq eq-sm"><i></i><i></i><i></i><i></i></span> <time>now</time></span>
                    <span class="ld-srow-sub">You: add rate limiting to /v1/events</span>
                </span>
            </div>

            <p class="ld-machine">vm-eu-1</p>
            <div class="ld-srow">
                <span class="ld-badge is-dim"><img src="/assets/img/agent-cursor.png" alt="" width="20" height="20"><i class="ld-st st-perm">!</i></span>
                <span class="ld-srow-main">
                    <span class="ld-srow-title"><strong>db-migrate</strong> <span class="ld-stlabel st-orange">needs permission</span> <time>30s</time></span>
                    <span class="ld-srow-sub">Bash</span>
                </span>
            </div>

            <p class="ld-machine">vm-us-2</p>
            <div class="ld-srow">
                <span class="ld-badge is-dim"><img class="px" src="/assets/img/agent-claude.png" alt="" width="20" height="20"><i class="ld-st st-ok">✓</i></span>
                <span class="ld-srow-main">
                    <span class="ld-srow-title"><strong>tests</strong> <span class="ld-stlabel st-green">done</span> <time>5 min</time></span>
                    <span class="ld-srow-sub">You: run the suite and fix failures</span>
                </span>
            </div>
        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ld-mac-base" aria-hidden="true"></div>
        </div>
    </div>

    <p class="ld-hint">the app's actual UI — click the notch to toggle it</p>

    <p class="ld-eyebrow">macos coding-agent monitor</p>
    <h1>Keep an eye on<br>your coding agents<span class="ld-dot">.</span></h1>
    <p class="ld-sub">Claude Code on your Mac. Cursor on a VM. Notch lives in your Mac's notch and shows every session's state — and when an agent asks to run something, you approve or deny it right there. No terminal-hopping.</p>
    <p class="ld-cta">
        <a class="ld-btn" href="https://github.com/MinhTamCK/notch/releases/latest">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Download for Mac
        </a>
        <a class="ld-ghost" href="https://github.com/MinhTamCK/notch">View on GitHub</a>
    </p>
    <p class="ld-note">macOS 14+ · ~2 MB · free &amp; open source</p>
    <p class="ld-works">
        <span class="ld-works-label">works with</span>
        <span class="ld-works-item"><img class="px" src="/assets/img/agent-claude.png" alt="" width="20" height="20"> Claude Code</span>
        <span class="ld-works-item"><img src="/assets/img/agent-cursor.png" alt="" width="20" height="20"> Cursor</span>
        <span class="ld-works-label">more agents coming</span>
    </p>
</section>

<section class="ld-section">
    <h2>Everything you need to stay in flow</h2>
    <div class="ld-features">
        <div class="ld-card">
            <span class="ld-tag tg-cyan">● working</span>
            <h3>Live monitoring</h3>
            <p>Every session, every machine — one glance at the notch.</p>
        </div>
        <div class="ld-card">
            <span class="ld-tag tg-amber">● waiting</span>
            <h3>Remote approve</h3>
            <p>Permission requests land in the notch. One click decides.</p>
        </div>
        <div class="ld-card">
            <span class="ld-tag">&gt;_ agents</span>
            <h3>Multi-agent</h3>
            <p>Claude Code and Cursor today — more on the way.</p>
        </div>
        <div class="ld-card">
            <span class="ld-tag">~2 MB</span>
            <h3>Lightweight</h3>
            <p>Native Swift. Near-zero CPU, no Electron.</p>
        </div>
        <div class="ld-card">
            <span class="ld-tag">0 prompts</span>
            <h3>Permissionless</h3>
            <p>Never asks for a single macOS permission.</p>
        </div>
        <div class="ld-card">
            <span class="ld-tag">self-hosted</span>
            <h3>Private by design</h3>
            <p>Your machines talk straight to your Mac. No cloud.</p>
        </div>
    </div>
</section>

<section class="ld-section">
    <h2>Up and running in a minute</h2>
    <div class="ld-steps">
        <div class="ld-step">
            <span class="ld-step-num">1</span>
            <h3>Open Notch.app</h3>
            <p>It hosts its own server — zero config.</p>
        </div>
        <div class="ld-step">
            <span class="ld-step-num">2</span>
            <h3>Connect your machines</h3>
            <p>One line on each VM or computer.</p>
            <code class="ld-code">curl your-mac:4519/install?token=… | bash</code>
        </div>
        <div class="ld-step">
            <span class="ld-step-num">3</span>
            <h3>Approve from the notch</h3>
            <p>A chime when a session needs you — one click decides.</p>
        </div>
    </div>
</section>

<section class="ld-section">
    <h2>See it in action</h2>
    <div class="ld-frame">
        <video src="/assets/media/notch-demo.mp4" poster="/assets/media/notch-poster.jpg" controls playsinline preload="metadata"></video>
    </div>
</section>

<section class="ld-section ld-end">
    <h2>Bring your agents to the notch<span class="ld-dot">.</span></h2>
    <p class="ld-section-sub">Free and open source. If your Mac is ever unreachable, sessions fall back to their own terminal prompts — nothing gets stuck waiting on Notch.</p>
    <p class="ld-cta">
        <a class="ld-btn" href="https://github.com/MinhTamCK/notch/releases/latest">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Download for Mac
        </a>
    </p>
    <p class="ld-note">First launch: right-click the app and choose Open — it isn't notarized yet.</p>
</section>
@endsection
