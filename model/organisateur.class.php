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
      if ($idUser_Organisateur != null) {
        parent::__construct($idUser);
        $dao = new DAO();
      }
    }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    function getEvenements() {
      return $dao->getEvenementsFromOrganisateurID(DAO::R_CLASS,$this->idUser_Organisateur);
    }

    function getLieux() {
      return $dao->getLieuxFromOrganisateurID(DAO::R_CLASS,$this->idUser_Organisateur);
    }
  }
 ?>
