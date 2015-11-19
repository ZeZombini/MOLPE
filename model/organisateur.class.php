<?php
// Cohérent avec BD
require_once("utilisateur.class.php");
require_once("evenement.class.php");
require_once("scene.class.php");

class Organisateur extends Utilisateur {
  // Variables deorganisateur
  var $nom;
  var $prenom;

  // Association avec Scene
  var $scenes; // Cardinalité : *
  // Association avec Evenement
  var $evenements; // Cardinalité : *
}
 ?>
