<?php

namespace Lencse\Application;


require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/../config-web.php';

$request = Request::createFromGlobals();
$dic = new DIContainer($config);
$app = new Application($dic->getRouter(), $dic->getMessaging());
$response = $app->run($request);

foreach ($response->getHeaders() as $header) {
    header($header);
}

if ($response->hasOutput()) {
    echo $response->getOutput();
}
