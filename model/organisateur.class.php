<?php
// Ok avec la V1
require_once("utilisateur.class.php");
require_once("evenement.class.php");
require_once("scene.class.php");
require_once("lieu.class.php");
require_once("DAO.class.php");

class Organisateur extends Utilisateur {
  // Variables deorganisateur
  var $idOrga;

  // Association avec Scene
  var $scenes; // Cardinalité : *
  // Association avec Evenement
  var $evenements; // Cardinalité : *
  // Association avec Lieu
  var $lieux; // Cardinalité : *

  function __construct() {
    parent::__construct($this->idOrga);
    $dao = new DAO();
    $this->scenes     = $dao->getScenesFromOrganisateurID($this->idOrga);
    $this->evenements = $dao->getEvenementsFromOrganisateurID($this->idOrga);
    $this->lieux      = $dao->getLieuxFromOrganisateurID($this->idOrga);
  }

}
 ?>
