<?php
  require_once("utilisateur.class.php");
  require_once("DAO.class.php");

  class Booker extends Utilisateur {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $idUser_Booker;
    var $pourcentageCom;
    var $tailleGrp;
    var $stylePref;

    // Association avec groupe
    var $groupes; // Cardinalite : * //

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct($idUser) {
      parent::__construct($idUser);
      $dao = new DAO();
      $this->init($dao->getBookerFromID(DAO::R_ARRAY,$idUser));
      $groupes = $dao->getGroupesFromBookerID(DAO::R_CLASS,$this->idBooker);
    }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    // Initialise chaque attribut de la classe avec sa valeur dans le array
    function init($array) {
      $this->idUser_Booker = $array['idUser_Booker'];
      $this->pourcentageCom = $array['pourcentageCom'];
      $this->tailleGrp = $array['tailleGrp'];
      $this->stylePref = $array['stylePref'];
    }
  }
 ?>
