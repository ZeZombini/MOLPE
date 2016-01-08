<?php
  require_once("utilisateur.class.php");
  require_once("passage.class.php");
  require_once("DAO.class.php");

  class Groupe extends Utilisateur {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $dao;

    var $idUser_Groupe;
    var $style;
    var $taille;
    var $matDispo;
    var $ficheTech;

    // Association avec Booker(*) et Passage(*)

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct() {
      if ($idUser_Groupe != null) {
        parent::__construct($this->idUser_Groupe);
        $dao = new DAO();
      }
    }
// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    function getBookers() {
      return $dao->getBookersFromGroupeID(DAO::R_CLASS,$this->idUser_Groupe);
    }

    function getPassages() {
      return $dao->getPassagesFromGroupeID(DAO::R_CLASS,$this->idUser_Groupe);
    }
  }
 ?>
