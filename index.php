<?php

require_once("vendor/slim/slim/slim/slim.php");
require("vendor/autoload.php");

$app = new \Slim\Slim();

$app->notFound(function () use ($app) {
    $app->redirect('./');
});

$app->get('/', function() {
    echo("<h1>Page index.php</h1>");
});

$app->get("/connexion/", function() use ($app) {
    //echo("<h1>Page connexion.php</h1>");
    include ("controler/connexion.ctrl.php");
});



  include("controler/head.ctrl.php");
  include("controler/header.ctrl.php");
$app->run();

 ?>
