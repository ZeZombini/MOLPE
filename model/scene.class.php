<?php
//Ok
class Scene {

  var $id;
  var $largeur;
  var $hauteur;
  var $longeur;
  var $plan;
  var $capacitePublic;
  var $avantScene;
  // Association avec Organisateur
  var $organisateurs; // Cardinalité : 1..*
  // Association avec Evenement
  var $evenement; // Cardinalité : *
}


 ?>
