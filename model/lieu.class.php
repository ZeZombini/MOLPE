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
    function __construct($idL) {
      $dao = new DAO();
      $this->init($dao->getLieuFromID(DAO::R_ARRAY,$idL));
      }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    function init($array) {
      $this->idLieu = $array['idLieu'];
      $this->bar = $array['bar'];
      $this->adresse = $array['adresse'];
      $this->salle = $array['salle'];
      $this->description = $array['description'];
    }

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
