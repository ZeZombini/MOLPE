<?php
// Cohérent avec la BD
require_once("organisateur.class.php");
require_once("scene.class.php");
require_once("lieu.class.php");
require_once("DAO.class.php");

class Salle extends Lieu {

  // Variables de salle
  var $idDuLieu;
  var $carte;
  var $description;
  var $bar;
  // Association avec organisateur
  var $idProprio; // id de la BD
  var $proprietaire; // Cardialité : 1


  function __construct() {
    $dao = new DAO();
    $this->proprietaire = $dao->getOrganisateurFromID($this->idProprio);
  }
}
 ?>
