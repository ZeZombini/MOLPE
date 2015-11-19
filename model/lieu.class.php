<?php
// Cohérent avec la BD
require_once("organisateur.class.php");
require_once("scene.class.php");
require_once("DAO.class.php");

class Lieu {

  // Variables de lieu
  var $idLieu;
  var $adresse;
  // Association avec scene
  var $scenes; // Cardialité : *


  include("getter/lieu.getter.php");

  function __construct() {
    $dao = new DAO();
    $this->proprietaire = $dao->getOrganisateurFromID()
  }

}
 ?>
