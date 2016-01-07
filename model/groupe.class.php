<?php
  require_once("utilisateur.class.php");
  require_once("passage.class.php");
  require_once("DAO.class.php");

  class Groupe extends Utilisateur {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $idUser_Groupe;
    var $style;
    var $taille;
    var $matDispo;
    var $ficheTech;

    // Association avec booker
    var $bookers; // Cardinalite : * //

    // Association avec Evenement et scene via passage
    var $passages; // Cardinalite : * //

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct() {
      parent::__construct($this->idUser_Groupe);
      $dao = new DAO();
      $this->init($dao->getGroupeFromID(DAO::R_ARRAY,$this->idUser_Groupe));
      $bookers = $dao->getBookersFromGroupeID(DAO::R_CLASS,$this->idUser_Groupe);
      $passages = $dao->getPassagesFromGroupeID(DAO::R_CLASS,$this->idUser_Groupe);
    }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    // Initialise chaque attribut de la classe avec sa valeur dans le array
    function init($array) {
      $this->idUser_Groupe = $array['idUser_Groupe'];
      $this->style = $array['style'];
      $this->taille = $array['taille'];
      $this->matDispo = $array['matDispo'];
      $this->ficheTech = $array['ficheTech'];
    }    
  }
 ?>
