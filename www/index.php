<?php

require_once __DIR__ . '/../vendor/autoload.php';

$request = \Lencse\Request\Request::createFromGlobals();
$dic = new \Lencse\DependencyInjection\DIContainer();

$app = new \Lencse\Application\Application($dic);
$app->run($request);
