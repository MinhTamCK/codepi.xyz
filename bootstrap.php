<?php

use TightenCo\Jigsaw\Jigsaw;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */

$events->afterBuild(function ($jigsaw) {
    $jigsaw->getFilesystem()->copyDirectory(__DIR__ . '/source/_assets/favicons', $jigsaw->getDestinationPath());
});

function media($path)
{
    $cloudName = $GLOBALS['container']->config['services']['cloudinary']['cloudName'];
    return "https://res.cloudinary.com/{$cloudName}/{$path}";
}

function content_sanitize($value)
{
    return str_replace(["\r", "\n", "\r\n", '  '], ' ', strip_tags($value));
}

function str_limit_soft($value, $limit = 100, $end = '...')
{
    if (mb_strlen($value, 'UTF-8') <= $limit) {
        return $value;
    }

    return rtrim(strtok(wordwrap($value, $limit, "\n"), "\n"), ' .') . $end;
}
