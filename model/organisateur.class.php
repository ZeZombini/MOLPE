<?php
// Ok avec la V1
require_once("utilisateur.class.php");
require_once("evenement.class.php");
require_once("scene.class.php");
require_once("lieu.class.php");
require_once("DAO.class.php");

class Organisateur extends Utilisateur {
  // Variables d'organisateur
  var $idUser_Organisateur;
  // Association avec Evenement
  var $evenements; // Cardinalité : * //
  // Association avec Lieu
  var $lieux; // Cardinalité : * //

  function __construct($idOrga) {
    $this->idUser_Organisateur = $idOrga;
    parent::__construct($this->idUser_Organisateur);
    $dao = new DAO();
    $this->evenements = $dao->getEvenementsFromOrganisateurID($this->idUser_Organisateur);
    $this->lieux      = $dao->getLieuxFromOrganisateurID($this->idUser_Organisateur);
  }

}
 ?>
