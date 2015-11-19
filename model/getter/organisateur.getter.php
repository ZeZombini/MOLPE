<?php
// include dans organisateur.class.php

function getIdOrga() {
  return $this->idOrga;
}

function getNom() {
  return $this->nom;
}

function getPrenom() {
  return $this->prenom;
}


//////// Scenes dont il est proprietaire ////////
function getScenes() {
  return $this->scenes;
}


///////// Evenements qu'il organise /////////
function getEvenements() {
  return $this->evenements;
}
 ?>
