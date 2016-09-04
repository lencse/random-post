<?php

if (!defined('APP_ROOT_DIR')) {
    define('APP_ROOT_DIR', realpath(__DIR__));
}

return [
    'viewPath' => APP_ROOT_DIR . '/Lencse/Application/views',
    'db' => 'demo',
    'session' => 'in-memory',
    'mailer' => 'dummy',
    'notificationList' => [
    ],
];
