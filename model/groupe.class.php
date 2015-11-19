<?php
// Ok avec la V1
require_once("utilisateur.class.php");
require_once("passage.class.php");
require_once("DAO.class.php");

class Groupe extends Utilisateur {

  // Variables de groupe
  var $idGroupe;
  var $style;
  var $taille;
  var $matDispo;

  // Association avec booker
  var $bookers; // Cardinalité : *

  // Association avec Evenement et scene via heure de passage
  var $passages; // Cardinalité : *

  include("getter/groupe.getter.php");

  function __construct() {
    $dao = new DAO();
    $bookers = $dao->getBookersfromGroupeID($this->idGroupe);
  }

}
 ?>
