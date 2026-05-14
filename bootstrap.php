<?php

use TightenCo\Jigsaw\Jigsaw;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */

$events->afterBuild(function ($jigsaw) {
    $jigsaw->getFilesystem()->copyDirectory(__DIR__ . '/source/_assets/favicons', $jigsaw->getDestinationPath());
});
