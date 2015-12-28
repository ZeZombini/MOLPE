<?php
  require_once('DAO.class.php');

  class Scene {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $idScene;
    var $nom;
    var $largeur;
    var $hauteur;
    var $longueur;
    var $avantScene;
    var $plan;
    var $capacitePublic;

    // Association avec Lieu
    var $lieu; // Cardinalite : 1 //

    // Association avec Passage
    var $passages; // Cardinalite : * //

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct($idS) {
      $dao = new DAO();
      $this->init($dao->getSceneFromID(DAO::R_ARRAY,$idS));
      $this->lieu = $dao->getLieuFromSceneID(DAO::R_CLASS,$this->idScene);
      $this->passages = $dao->getPassagesFromSceneID(DAO::R_CLASS,$this->idScene);
    }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    function init($array) {
      $this->idScene = $array['idScene'];
      $this->nom = $array['nom'];
      $this->largeur = $array['largeur'];
      $this->hauteur = $array['hauteur'];
      $this->longueur = $array['longueur'];
      $this->avantScene = $array['avantScene'];
      $this->plan = $array['plan'];
      $this->capacitePublic = $array['capacitePublic'];
    }
  }
?>
