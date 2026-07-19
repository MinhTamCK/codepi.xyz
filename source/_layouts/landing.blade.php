<!DOCTYPE html>
<html lang="{{ $page->lang() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @php
        $sectionTitle = trim($__env->yieldContent('title'));
        $fullTitle = $sectionTitle ?: $page->site->title . ' — ' . $page->site->description;
    @endphp
    <title>{{ $fullTitle }}</title>

    @include('_partials.head.favicon')
    @include('_partials.head.meta')

    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
</head>

<body class="ld">
    <header class="ld-bar">
        <a class="ld-brand" href="/notch">
            <img src="/assets/img/notch-icon.png" alt="" width="30" height="30">
            Notch
        </a>
        <div class="ld-notch" data-notch role="button" tabindex="0" aria-expanded="false" aria-label="Toggle the Notch demo panel">
            <span class="ld-nc ld-nc-left"><span class="eq"><i></i><i></i><i></i><i></i></span><strong>1</strong></span>
            <span class="ld-notch-cam"></span>
            <span class="ld-nc ld-nc-right"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><strong>1</strong></span>
        </div>
        <nav class="ld-bar-nav">
            <a href="/">Blog</a>
            <a href="https://github.com/MinhTamCK/notch">GitHub</a>
            <span class="ld-clock" data-clock aria-hidden="true"></span>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="ld-footer">
        <p>Free &amp; open source · Crafted by <a href="/about">{{ $page->owner->name }}</a> · © <span data-year></span> · <a href="/">Blog</a> · <a href="https://github.com/MinhTamCK/notch">GitHub</a></p>
    </footer>

    <script>
        document.querySelectorAll('[data-year]').forEach(function (el) {
            el.textContent = new Date().getFullYear();
        });
        (function () {
            var el = document.querySelector('[data-clock]');
            if (!el) return;
            function tick() {
                el.textContent = new Date().toLocaleTimeString([], { weekday: 'short', hour: 'numeric', minute: '2-digit' });
            }
            tick();
            setInterval(tick, 30000);
        })();
        (function () {
            var notch = document.querySelector('[data-notch]');
            var demo = document.querySelector('.ld-demo');
            if (!notch || !demo) return;
            function set(open) {
                document.body.classList.toggle('ld-open', open);
                notch.setAttribute('aria-expanded', open);
            }
            notch.addEventListener('click', function () {
                set(!document.body.classList.contains('ld-open'));
            });
            notch.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); notch.click(); }
            });
            demo.addEventListener('click', function () { set(false); });
            // First-visit choreography: working notch → permission bell pops in → panel expands.
            var reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (reduce) {
                document.body.classList.add('ld-alert');
                set(true);
            } else {
                setTimeout(function () { document.body.classList.add('ld-alert'); }, 900);
                setTimeout(function () { set(true); }, 1800);
            }
        })();
    </script>
    @includeWhen($page->production && $page->services->analytics, '_partials.analytics')
</body>

</html>
