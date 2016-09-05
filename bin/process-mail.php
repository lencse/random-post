#!/usr/bin/env php
<?php

namespace Lencse\Application;


require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/../config-web.php';

$dic = new DIContainer($config);
$processer = $dic->getMailProcesser();
$processer->processMails();
