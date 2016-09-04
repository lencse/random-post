<?php

if (!defined('APP_ROOT_DIR')) {
    define('APP_ROOT_DIR', realpath(__DIR__));
}

return [
    'viewPath' => APP_ROOT_DIR . '/Lencse/Application/views',
    'mongoConnectionString' => 'mongodb://localhost:27017/test',
    'mongoCollection' => 'test.testposts',
];
