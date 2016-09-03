<?php

require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$request = \Lencse\Framework\Request::createFromGlobals();
$dic = new \Lencse\Framework\DIContainer();

$app = new \Lencse\Application\Application($dic);
$app->run($request);
