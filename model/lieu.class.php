<?php
// Ok avec la V1
require_once("organisateur.class.php");
require_once("scene.class.php");
require_once("DAO.class.php");

class Lieu {

  // Variables de lieu
  var $idLieu;
  var $adresse;
  var $description;
  var $bar;
  // Association avec scene
  var $scenes; // Cardialité : *
  // Association avec organisateur
  var $idProprio; // id de la BD
  var $proprietaire; // Cardialité : 1

  var $lieu; // bool


  include("getter/lieu.getter.php");

  function __construct() {
    $dao = new DAO();
    $this->scenes = $dao->getScenesFromLieuID($this->idLieu);
    $this->scenes = $dao->getScenesFromLieuID($this->$idLieu);
    $this->proprietaire = $dao->getOrganisateurFromID($this->idProprio);
    }

}
 ?>
