<?php

// Vérifie si il y a une session déjà en cours

if ( session_status() === PHP_SESSION_ACTIVE) {
  echo ("<h1>SESSION DEJA EN COURS</h1>");
} else {

  if (!empty($_GET['login']) && !empty($_GET['password'])) {
    session_start();
    echo ("<h1>NOUVELLE SESSION</h1>");
  } else {
    echo ("<h1>IMPOSSIBLE DE CREER SESSION</h1>");
  }

}
$res = session_status() === PHP_SESSION_ACTIVE;
var_dump($res);

//include("../view/header.view.php");

 ?>
