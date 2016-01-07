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
      parent::__construct($this->idUser_Booker);
      $dao = new DAO();
      $this->init($dao->getBookerFromID(DAO::R_ARRAY,$this->idUser_Booker));
    }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    // Initialise chaque attribut de la classe avec sa valeur dans le array
    function init($array) {
      $this->idUser_Booker = $array['idUser_Booker'];
      $this->pourcentageCom = $array['pourcentageCom'];
      $this->tailleGrp = $array['tailleGrp'];
      $this->stylePref = $array['stylePref'];
    }

    function getGroupes() {
      return $dao->getGroupesFromBookerID(DAO::R_CLASS,$this->idUser_Booker);
    }
  }
 ?>
