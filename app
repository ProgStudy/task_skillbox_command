<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Symfony\Component\Console\Application as App;

$app = new App("Task Skillbox Command");

$app->add(new \App\SayHelloCommand);
$app->add(new \App\ShowByTimesCommand());
$app->add(new \App\GetInfoUserCommand());

$app->run();
