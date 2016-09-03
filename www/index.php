<?php

require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$request = \Lencse\Application\Request::createFromGlobals();
$dic = new \Lencse\Application\DIContainer();

$app = new \Lencse\Application\Application($dic);
$app->run($request);
