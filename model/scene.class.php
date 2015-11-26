<?php
//Ok avec la V1
class Scene {

  var $idScene;
  var $nomScene;

  var $largeur;
  var $hauteur;
  var $longeur;

  var $plan;
  var $avantScene;
  var $capaPub;

  // Association avec Organisateur (proprietaire)
  var $idProprio;
  var $proprietaire; // Cardinalité : 1
  // Association avec Evenement
  var $evenements; // Cardinalité : *
  // Association avec Lieu
  var $idLieu;
  var $lieu; // Cardinalité : 1

  include("getter/scene.getter.php");

  function __construct() {
    $dao = new DAO();
    $this->evenements   = $dao->getEvenementFromSceneID($this->idScene);
    $this->proprietaire = $dao->getOrganisateurFromID($idProprio);
    $this->lieu         = $dao->getLieuFromID($this->idLieu);
  }
}


 ?>
