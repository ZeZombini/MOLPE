<?php
  require_once("organisateur.class.php");
  require_once("DAO.class.php");

  class Evenement {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $dao;

    var $idEvenement;
    var $nom;
    var $dateDeb;
    var $dateFin;
    var $periodeProgDeb;
    var $periodeProgFin;
    var $hebergement;
    var $catering;
    var $remunerer;
    var $matosDispo;

    // Association avec Organisateur(*) et Lieux(*) et Passage(*)

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct($idEvent) {
      $dao = new DAO();
      $this->init($dao->getEvenementFromID(DAO::R_ARRAY,$idEvent));
    }


// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    // Initialise chaque attribut de la classe avec sa valeur dans le array
    function init($array) {
      $this->idEvenement = $array['idEvenement'];
      $this->nom = $array['nom'];
      $this->dateDeb = $array['dateDeb'];
      $this->dateFin = $array['dateFin'];
      $this->periodeProgDeb = $array['periodeProgDeb'];
      $this->periodeProgFin = $array['periodeProgFin'];
      $this->hebergement = $array['hebergement'];
      $this->catering = $array['catering'];
      $this->remunerer = $array['remunerer'];
      $this->matosDispo = $array['matosDispo'];
    }

    function getOrganisateurs() {
      return $dao->getOrganisateursFromEvenementID(DAO::R_CLASS,$this->idEvenement);
    }

    function getLieux() {
      return $dao->getLieuxFromEvenementID(DAO::R_CLASS,$this->idEvenement);
    }

    function getPassages() {
      return $dao->getPassagesFromEvenementID(DAO::R_CLASS,$this->idEvenement);
    }
  }
 ?>
