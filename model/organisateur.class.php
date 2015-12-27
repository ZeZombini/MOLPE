<?php
  require_once("utilisateur.class.php");
  require_once("evenement.class.php");
  require_once("scene.class.php");
  require_once("lieu.class.php");
  require_once("DAO.class.php");

  class Organisateur extends Utilisateur {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $idUser_Organisateur;

    // Association avec Evenement
    var $evenements; // Cardinalite : * //

    // Association avec Lieu
    var $lieux; // Cardinalite : * //

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct($idUser) {
      parent::__construct($idUser);
      $dao = new DAO();
      $this->init($dao->getOrganisateurFromID(DAO::R_ARRAY,$idUser));
      $evenements = $dao->getEvenementsFromOrganisateurID(DAO::R_CLASS,$this->idUser_Organisateur);
      $lieux = $dao->getLieuxFromOrganisateurID(DAO::R_CLASS,$this->idUser_Organisateur);
    }
    
// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    // Initialise chaque attribut de la classe avec sa valeur dans le array
    function init($array) {
      $this->idUser_Organisateur = $array['idUser_Organisateur'];
    }
  }
 ?>
