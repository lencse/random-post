<?php

if (!defined('APP_ROOT_DIR')) {
    define('APP_ROOT_DIR', realpath(__DIR__));
}

return [
    'viewPath' => APP_ROOT_DIR . '../views',
    'postDb' => 'demo',
    'mailDb' => 'demo',
    'session' => 'in-memory',
    'mailer' => 'dummy',
    'notificationList' => [
    ],
    'postRepository' => 'working',
];
