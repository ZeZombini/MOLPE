<?php
  require_once("utilisateur.class.php");
  require_once("evenement.class.php");
  require_once("scene.class.php");
  require_once("lieu.class.php");
  require_once("DAO.class.php");

  class Organisateur extends Utilisateur {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $dao;

    var $idUser_Organisateur;

    // Association avec Evenement(*) et Lieu(*)

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct($idUser) {
      parent::__construct($idUser);
      $dao = new DAO();
      $this->init($dao->getOrganisateurFromID(DAO::R_ARRAY,$idUser));
    }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    // Initialise chaque attribut de la classe avec sa valeur dans le array
    function init($array) {
      $this->idUser_Organisateur = $array['idUser_Organisateur'];
    }

    function getEvenements() {
      return $dao->getEvenementsFromOrganisateurID(DAO::R_CLASS,$this->idUser_Organisateur);
    }

    function getLieux() {
      return $dao->getLieuxFromOrganisateurID(DAO::R_CLASS,$this->idUser_Organisateur);
    }
  }
 ?>
