<?php
  require_once("organisateur.class.php");
  require_once("DAO.class.php");

  class Evenement {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $dao;

    var $idEvenement;
    var $nom;
    var $dateDeb;
    var $dateFin;
    var $periodeProgDeb;
    var $periodeProgFin;
    var $hebergement;
    var $catering;
    var $remunerer;
    var $matosDispo;

    // Association avec Organisateur(*) et Lieux(*) et Passage(*)

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct() {
      $dao = new DAO();
    }
// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    function getOrganisateurs() {
      return $dao->getOrganisateursFromEvenementID(DAO::R_CLASS,$this->idEvenement);
    }

    function getLieux() {
      return $dao->getLieuxFromEvenementID(DAO::R_CLASS,$this->idEvenement);
    }

    function getPassages() {
      return $dao->getPassagesFromEvenementID(DAO::R_CLASS,$this->idEvenement);
    }
  }
 ?>
