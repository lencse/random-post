<?php


namespace Lencse\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();
$app = new Application(new DIContainer());
$result = $app->run($request);

foreach ($result->getHeaders() as $header) {
    header($header);
}

echo $result->getHtml();
