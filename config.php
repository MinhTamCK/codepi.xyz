<?php

return [
    'production' => false,
    'baseUrl' => 'https://codepi.xyz',
    'site' => [
        'title' => 'Tam Blog',
        'description' => 'Personal blog of Tam Nguyen.',
        'image' => 'default-share.png',
    ],
    'owner' => [
        'name' => 'Tam Nguyen',
    ],
    'links' => [
        'twitter' => 'https://twitter.com/MinhTam70910140',
        'github' => 'https://github.com/MinhTamCK',
    ],
    'services' => [
        'cmsVersion' => '~2.10',
        'analytics' => 'UA-96090593-2',
        'disqus' => 'codepi',
        'formcarry' => 'XXXXXXXXXXXX',
        'cloudinary' => [
            'cloudName' => 'codepi',
            'apiKey' => '575468481576612',
        ],
    ],
    'collections' => [
        'posts' => [
            'path' => 'posts/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
            'hasTag' => function ($page, $tag) {
                return collect($page->tags)->contains($tag);
            },
            'prettyDate' => function ($page, $format = 'M j, Y') {
                return date($format, $page->date);
            },
        ],
        'tags' => [
            'path' => 'tags/{filename}',
            'extends' => '_layouts.tag',
            'section' => '',
            'name' => function ($page) {
                return $page->getFilename();
            },
        ],
    ],
];
