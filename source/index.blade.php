@extends('_layouts.master')

@section('content')
    <section class="hero">
        <div class="hero-art" aria-hidden="true" data-glyph-hero>
            <glyph-camera rot-x="72" rot-y="25" zoom="1.4">
                <glyph-scene mode="solid" glyph-palette="ascii" use-colors="false" cols="54" rows="44" cell-aspect="0.5">
                    <glyph-orbit-controls drag wheel animate-speed="0.25" animate-axis="y"></glyph-orbit-controls>
                    <glyph-mesh src="/assets/models/teapot.obj" auto-center></glyph-mesh>
                </glyph-scene>
            </glyph-camera>
        </div>
        <div class="hero-text">
            <p class="hero-lead">Hi, I'm Tam —</p>
            <h1 class="hero-title">frontend developer in Ho Chi Minh City.</h1>
            <p class="hero-sub">I write about web development, AI agents, and ideas worth keeping.</p>
            <p class="hero-cta">
                <a href="/posts">Read the latest &rarr;</a>
                <a href="https://github.com/MinhTamCK">GitHub</a>
            </p>
        </div>
    </section>

    <h2 class="recent-heading">Recent writing</h2>

    <ul class="post-list">
        @foreach ($posts->sortByDesc('date')->take(8) as $post)
            <li>
                <span class="date">{{ $post->prettyDate('M j, Y') }}</span>
                <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>

    <p style="margin-top: 24px; font-family: var(--font-sans); font-size: 0.875rem;">
        <a href="/posts">&rarr; All posts</a>
    </p>

    {{-- glyphcss ASCII 3D hero: load the renderer except on data-saver clients (mobile included) --}}
    <script>
        (function () {
            var art = document.querySelector('[data-glyph-hero]');
            if (!art) return;
            if (navigator.connection && navigator.connection.saveData) { art.remove(); return; }
            var SPIN = '0.25';
            var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (reduce) {
                var c0 = art.querySelector('glyph-orbit-controls');
                if (c0) c0.removeAttribute('animate-speed'); // stripped before upgrade → renders static
            }
            // Scale the rendered <pre> to fit its box regardless of the browser's
            // monospace metrics / minimum-font-size / zoom (the fixed character
            // grid would otherwise overflow the box and crop the model).
            function fit() {
                var pre = art.querySelector('pre');
                if (!pre) return;
                pre.style.transform = 'none';
                var pw = pre.scrollWidth, ph = pre.scrollHeight;
                if (!pw || !ph) return;
                var scale = Math.min(art.clientWidth / pw, art.clientHeight / ph) * 0.96;
                pre.style.transformOrigin = 'center center';
                pre.style.transform = 'scale(' + scale + ')';
            }
            window.addEventListener('resize', fit);
            var n = 0, iv = setInterval(function () { fit(); if (++n > 24) clearInterval(iv); }, 250);
            // Pause the auto-rotation while the hero is scrolled out of view (frees
            // CPU/battery). Toggling animate-speed does NOT stop the running loop —
            // the controls element has to be detached, so remove it offscreen and
            // recreate it when the hero returns to view.
            if (!reduce && 'IntersectionObserver' in window) {
                new IntersectionObserver(function (entries) {
                    var scene = art.querySelector('glyph-scene');
                    if (!scene) return;
                    var ctrl = scene.querySelector('glyph-orbit-controls');
                    if (entries[0].isIntersecting) {
                        if (!ctrl) {
                            ctrl = document.createElement('glyph-orbit-controls');
                            ctrl.setAttribute('drag', ''); ctrl.setAttribute('wheel', '');
                            ctrl.setAttribute('animate-speed', SPIN); ctrl.setAttribute('animate-axis', 'y');
                            scene.insertBefore(ctrl, scene.firstChild);
                        }
                    } else if (ctrl) {
                        ctrl.remove();
                    }
                }, { threshold: 0 }).observe(art);
            }
            var s = document.createElement('script');
            s.type = 'module';
            s.src = 'https://esm.sh/glyphcss@0.0.8/elements';
            document.head.appendChild(s);
        })();
    </script>
@endsection
