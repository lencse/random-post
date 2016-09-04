<?php

define('APP_ROOT_DIR', realpath(__DIR__));

return [
    'viewPath' => APP_ROOT_DIR . '/views',
    'db' => [
        'mongo' => [
            'connectionString' => 'mongodb://localhost:27017/test',
            'collection' => 'test.posts',
        ]
    ],
    'session' => 'session',
];
