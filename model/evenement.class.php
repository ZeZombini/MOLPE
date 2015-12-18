<?php
// Ok avec le MDC final
require_once("organisateur.class.php");
require_once("DAO.class.php");

class Evenement {

  // Variables de l'événement
  var $idEvenement;
  var $nom;
  var $dateDeb;
  var $dateFin;
  var $periodeProgDeb;
  var $periodeProgFin;
  var $hebergement;
  var $catering;
  var $remuneration;
  var $matosDispo;

  include("getter/evenement.getter.php");

  // Association avec organisateur
  var $idOrga; // id de la BD
  var $organisateur; // Cardinalité : 1

  // En débat
  /*// Association avec Scene
  var $scenes; // Cardinalité *
  */
  // Association avec Passage
  var $passages; // Cardinalité *

  function __construct() {
    $dao = new DAO();
    $this->organisateur = $dao->getOrganisateurFromID($this->idOrga);
    $this->scene        = $dao->getScenesFromEvenementID($this->idEvenement);
    $this->passages     = $dao->getPassagesFromEvenementID($this->idEvenement);
  }

}
 ?>
