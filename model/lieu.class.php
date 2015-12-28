<?php
  require_once("organisateur.class.php");
  require_once("scene.class.php");
  require_once("DAO.class.php");

  class Lieu {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $idLieu;
    var $bar;
    var $adresse;
    var $salle;
    var $description;

    // Association avec scene
    var $scenes; // Cardinalite : * //

    // Association avec Organisateur
    var $proprietaire; // Cardinalite : 1 //

    // Association avec Evenement
    var $evenements; // Cardinalite : * //

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct($idL) {
      $dao = new DAO();
      $this->init($dao->getLieuFromID(DAO::R_ARRAY,$idL));
      $this->scenes = $dao->getScenesFromLieuID(DAO::R_CLASS,$this->idLieu);
      $this->proprietaire = $dao->getOrganisateurFromLieuID(DAO::R_CLASS,$this->idLieu);
      $this->evenements = $dao->getEvenementsFromLieuID(DAO::R_CLASS,$this->idLieu);
      }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    function init($array) {
      $this->idLieu = $array['idLieu'];
      $this->bar = $array['bar'];
      $this->adresse = $array['adresse'];
      $this->salle = $array['salle'];
      $this->description = $array['description'];
    }
  }
 ?>
