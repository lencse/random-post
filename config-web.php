<?php

define('APP_ROOT_DIR', realpath(__DIR__));

return [
    'viewPath' => APP_ROOT_DIR . '/views',
    'mongoConnectionString' => 'mongodb://localhost:27017/test',
    'mongoCollection' => 'test.posts',
];
