<?php

return [
    'excerpt' => function ($page, $limit = 200, $end = '…') {
        if (!$page->isPost) {
            return null;
        }
        return str_limit_soft(content_sanitize($page->getContent()), $limit, $end);
    },
    'readingTime' => function ($page) {
        if (!$page->isPost) {
            return null;
        }
        $words = str_word_count(strip_tags($page->getContent()));
        return max(1, (int) ceil($words / 220));
    },
    'lang' => function ($page) {
        if (isset($page->lang)) {
            return $page->lang;
        }
        $text = $page->title . ' ' . ($page->isPost ? mb_substr(strip_tags($page->getContent()), 0, 200) : '');
        return preg_match('/[ăâđêôơưĂÂĐÊÔƠƯáàảãạấầẩẫậắằẳẵặéèẻẽẹếềểễệíìỉĩịóòỏõọốồổỗộớờởỡợúùủũụứừửữựýỳỷỹỵ]/u', $text)
            ? 'vi'
            : 'en';
    },
];

function media($path)
{
    $cloudName = $GLOBALS['container']->config['services']['cloudinary']['cloudName'];
    return "https://res.cloudinary.com/{$cloudName}/{$path}";
}

function content_sanitize($value)
{
    $text = strip_tags($value);
    $text = preg_replace('/^#{1,6}\s+/m', '', $text);
    $text = preg_replace('/^[\*\-\+]\s+/m', '', $text);
    $text = preg_replace('/^\d+\.\s+/m', '', $text);
    $text = preg_replace('/[\*_`~]+/', '', $text);
    $text = preg_replace('/!?\[([^\]]*)\]\([^)]*\)/', '$1', $text);
    $text = preg_replace('/[\r\n]+/', ' ', $text);
    $text = preg_replace('/\s{2,}/', ' ', $text);
    return trim($text);
}

function str_limit_soft($value, $limit = 100, $end = '…')
{
    if (mb_strlen($value, 'UTF-8') <= $limit) {
        return $value;
    }
    $sub = mb_substr($value, 0, $limit, 'UTF-8');
    $sub = rtrim($sub, ' .,;:!?');
    $lastSpace = mb_strrpos($sub, ' ', 0, 'UTF-8');
    if ($lastSpace !== false && $lastSpace > $limit * 0.5) {
        $sub = mb_substr($sub, 0, $lastSpace, 'UTF-8');
    }
    return rtrim($sub, ' .,;:!?') . $end;
}

function safe_image($url, $fallback)
{
    if (!$url) return $fallback;
    if (strpos($url, 'data:') === 0) return $fallback;
    return $url;
}

function meta_description($value)
{
    return trim(preg_replace('/\s+/', ' ', strip_tags($value)));
}
