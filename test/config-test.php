<?php

return [
    'viewPath' => __DIR__ . '/../views',
    'postDb' => [
        'mongo' => [
            'connectionString' => 'mongodb://localhost:27017/test',
            'collection' => 'test.testposts',
        ]
    ],
    'mailDb' => [
        'mongo' => [
            'connectionString' => 'mongodb://localhost:27017/test',
            'collection' => 'test.testmails',
        ]
    ],
    'session' => 'in-memory',
    'mailer' => 'dummy',
    'notificationList' => [
        'test@test.hu',
    ],
    'postRepository' => 'working',
];
