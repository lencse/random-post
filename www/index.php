<?php


namespace Lencse\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/../config-web.php';

$request = Request::createFromGlobals();
$dic = new DIContainer($config);
$app = new Application($dic->getRouter(), $dic->getResponseHandler(), $dic->getMessaging());
$result = $app->run($request);

foreach ($result->getHeaders() as $header) {
    header($header);
}

echo $result->getHtml();
