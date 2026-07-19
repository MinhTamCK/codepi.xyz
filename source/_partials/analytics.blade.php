<!-- analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $page->services->analytics }}"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '{{ $page->services->analytics }}');

document.addEventListener('click', function (e) {
    var el = e.target.closest && e.target.closest('a, button');
    if (!el) return;
    var params = {
        element: el.tagName.toLowerCase(),
        text: (el.innerText || el.getAttribute('aria-label') || '').trim().slice(0, 100)
    };
    if (el.href) {
        params.link_url = el.href;
        params.outbound = el.hostname !== location.hostname;
    }
    gtag('event', 'ui_click', params);
});
</script>
<!-- end analytics -->
