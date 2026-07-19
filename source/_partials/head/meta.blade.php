@php
    $defaultImage = media($page->site->image);
    $shareImage = safe_image($page->image, $defaultImage);
    $hasOwnImage = $page->image && strpos($page->image, 'data:') !== 0;
    $description = meta_description($page->description ?: $page->excerpt() ?: $page->site->description);
    $pageTitle = $page->title ?: $page->site->title;
    $twitterHandle = '@' . basename($page->links->twitter);
@endphp
<link rel="canonical" href="{{ $page->getUrl() }}">
<meta name="referrer" content="strict-origin-when-cross-origin">
<meta name="author" content="{{ $page->owner->name }}">
<meta name="description" content="{{ $description }}">
<meta name="theme-color" content="#fafaf7" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#14110f" media="(prefers-color-scheme: dark)">

<link rel="alternate" type="application/atom+xml" title="{{ $page->site->title }}" href="/feed.atom">
<link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $shareImage }}">
<meta property="og:type" content="{{ $page->isPost ? 'article' : 'website' }}">
<meta property="og:site_name" content="{{ $page->site->title }}">
<meta property="og:url" content="{{ $page->getUrl() }}">
<meta property="og:locale" content="{{ $page->lang() === 'vi' ? 'vi_VN' : 'en_US' }}">

@if ($page->isPost)
    <meta property="article:published_time" content="{{ date('c', $page->date) }}">
    <meta property="article:modified_time" content="{{ date('c', $page->date) }}">
    <meta property="article:author" content="{{ $page->owner->name }}">
    @foreach ($page->tags as $tag)
        <meta property="article:tag" content="{{ $tag }}">
    @endforeach
@endif

<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $shareImage }}">
<meta name="twitter:creator" content="{{ $twitterHandle }}">
<meta name="twitter:site" content="{{ $twitterHandle }}">
<meta name="twitter:card" content="{{ $hasOwnImage ? 'summary_large_image' : 'summary' }}">

@include('_partials.head.schema')
