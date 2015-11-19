<?php

require_once("vendor/slim/slim/slim/slim.php");
require("vendor/autoload.php");

$app = new \Slim\Slim();

$app->get('/', function() {
    echo("<h1>Page index.php</h1>");
});

$app->run();

 ?>
