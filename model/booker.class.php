<?php
  require_once("utilisateur.class.php");
  require_once("DAO.class.php");

  class Booker extends Utilisateur {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $dao;

    var $idUser_Booker;
    var $pourcentageCom;
    var $tailleGrp;
    var $stylePref;

    // Association avec Groupe(*)

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct() {
      if ($idUser_Booker != null) {
        parent::__construct($this->idUser_Booker);
        $dao = new DAO();
      }
    }
// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    function getGroupes() {
      return $dao->getGroupesFromBookerID(DAO::R_CLASS,$this->idUser_Booker);
    }
  }
 ?>
