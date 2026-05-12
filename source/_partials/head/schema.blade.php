@php
    $baseUrl = $page->baseUrl;
    $defaultImage = media($page->site->image);
    $shareImage = safe_image($page->image, $defaultImage);
    $description = meta_description($page->excerpt() ?: $page->site->description);

    $person = [
        '@type' => 'Person',
        '@id' => $baseUrl . '/#person',
        'name' => $page->owner->name,
        'url' => $baseUrl . '/about',
        'sameAs' => [
            $page->links->twitter,
            $page->links->github,
        ],
    ];

    $website = [
        '@type' => 'WebSite',
        '@id' => $baseUrl . '/#website',
        'url' => $baseUrl,
        'name' => $page->site->title,
        'description' => $page->site->description,
        'inLanguage' => $page->lang() === 'vi' ? 'vi-VN' : 'en-US',
        'publisher' => ['@id' => $baseUrl . '/#person'],
    ];

    $graph = [$website, $person];

    if ($page->isPost) {
        $graph[] = [
            '@type' => 'BlogPosting',
            '@id' => $page->getUrl() . '#article',
            'mainEntityOfPage' => ['@id' => $page->getUrl()],
            'headline' => $page->title,
            'description' => $description,
            'image' => $shareImage,
            'datePublished' => date('c', $page->date),
            'dateModified' => date('c', $page->date),
            'author' => ['@id' => $baseUrl . '/#person'],
            'publisher' => ['@id' => $baseUrl . '/#person'],
            'inLanguage' => $page->lang() === 'vi' ? 'vi-VN' : 'en-US',
            'keywords' => implode(', ', $page->tags ?: []),
            'url' => $page->getUrl(),
        ];

        $graph[] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $baseUrl],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Posts', 'item' => $baseUrl . '/posts'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $page->title, 'item' => $page->getUrl()],
            ],
        ];
    }

    $jsonLd = json_encode(
        ['@context' => 'https://schema.org', '@graph' => $graph],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );
@endphp
<script type="application/ld+json">
{!! $jsonLd !!}
</script>
