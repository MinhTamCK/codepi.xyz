<!DOCTYPE html>
<html lang="{{ $page->lang() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @php
        $sectionTitle = trim($__env->yieldContent('title'));
        $fullTitle = $sectionTitle
            ? $sectionTitle . ' · ' . $page->site->title
            : $page->site->title . ' — ' . $page->site->description;
    @endphp
    <title>{{ $fullTitle }}</title>

    @include('_partials.head.favicon')
    @include('_partials.head.meta')
    @include('_partials.cms.identity_widget')

    <script>
        (function () {
            try {
                var t = localStorage.getItem('theme');
                if (t) document.documentElement.setAttribute('data-theme', t);
            } catch (e) {}
        })();
    </script>

    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
</head>

<body>
    <div class="wrap">
        <header class="site-header">
            <a class="brand" href="/">{{ $page->site->title }}</a>
            <nav>
                <ul>
                    <li><a href="/posts">Posts</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/feed.atom">RSS</a></li>
                    <li><button class="theme-toggle" type="button" aria-label="Toggle theme" data-theme-toggle>☾</button></li>
                </ul>
            </nav>
        </header>

        <main>
            <article>
                @yield('content')
            </article>
        </main>

        <footer class="site-footer">
            <small>© <span data-year></span> {{ $page->owner->name }}</small>
            <small>
                <a href="/feed.atom">RSS</a> ·
                <a href="https://github.com/MinhTamCK">GitHub</a>
            </small>
        </footer>
    </div>

    <script>
        document.querySelectorAll('[data-year]').forEach(function (el) {
            el.textContent = new Date().getFullYear();
        });
        (function () {
            var btn = document.querySelector('[data-theme-toggle]');
            if (!btn) return;
            function sync() {
                var current = document.documentElement.getAttribute('data-theme');
                var resolved = current || (matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
                btn.textContent = resolved === 'dark' ? '☀' : '☾';
            }
            btn.addEventListener('click', function () {
                var current = document.documentElement.getAttribute('data-theme');
                var resolved = current || (matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
                var next = resolved === 'dark' ? 'light' : 'dark';
                document.documentElement.setAttribute('data-theme', next);
                try { localStorage.setItem('theme', next); } catch (e) {}
                sync();
            });
            sync();
        })();
    </script>

    <script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>
    @includeWhen($page->production && $page->services->analytics, '_partials.analytics')
    @include('_partials.cms.identity_redirect')
</body>

</html>
