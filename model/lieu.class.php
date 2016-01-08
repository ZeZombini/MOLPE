<?php
  require_once("organisateur.class.php");
  require_once("scene.class.php");
  require_once("DAO.class.php");

  class Lieu {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $dao;

    var $idLieu;
    var $bar;
    var $adresse;
    var $salle;
    var $description;

    // Association avec Organisateur(1) et Scene(*) et Evenement(*)

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct() {
      $dao = new DAO();
      }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    function getScenes() {
      return $dao->getScenesFromLieuID(DAO::R_CLASS,$this->idLieu);
    }

    function getProprietaire() {
      return $dao->getOrganisateurFromLieuID(DAO::R_CLASS,$this->idLieu);
    }

    function getEvenements() {
      return $dao->getEvenementsFromLieuID(DAO::R_CLASS,$this->idLieu);
    }
  }
 ?>
