<?php
// Ok avec la V1
require_once("utilisateur.class.php");
require_once("DAO.class.php");
class Booker extends Utilisateur {

  // Variables de booker
  var $idBooker;
  var $stylePref;
  var $pourceCom;
  var $tailleGrp;
  // Association avec groupe
  var $groupes; // Cardinalité : *

  include("getter/booker.getter.php");

  function __construct() {
    parent::__construct($this->idBooker);
    $dao = new DAO();
    $groupes = $dao->getGroupesFromBookerID($this->idBooker);
  }
}
 ?>
