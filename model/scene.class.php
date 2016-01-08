<?php
  require_once('DAO.class.php');

  class Scene {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $dao;

    var $idScene;
    var $nom;
    var $largeur;
    var $hauteur;
    var $longueur;
    var $avantScene;
    var $plan;
    var $capacitePublic;

    // Association avec Lieu(1) et Passage(*)

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct() {
      $dao = new DAO();
    }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    function getLieu() {
      return $dao->getLieuFromSceneID(DAO::R_CLASS,$this->idScene);
    }

    function getPassages() {
      return $dao->getPassagesFromSceneID(DAO::R_CLASS,$this->idScene);
    }
  }
?>
