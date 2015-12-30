<?php
  require_once("groupe.class.php");
  require_once("evenement.class.php");
  require_once("scene.class.php");
  require_once("DAO.class.php");

  class Passage {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
    var $datePassage;
    var $dateBalances;

    // Association avec Groupe
    var $groupe;           // Cardinalite : 1 //

    // Association avec Evenement
    var $evenement;         // Cardinalite : 1 //

    // Association avec Scene
    var $scene;         // Cardinalite : 1 //

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
    function __construct($idGrp,$idEvent,$idScene) {
      $dao = new DAO();
      $this->init($dao->getPassageFromIDs($idGrp,$idEvent,$idScene));
      $this->groupe = $dao->getGroupeFromID($idGrp);
      $this->evenement = $dao->getEvenementFromID($idEvent);
      $this->scene = $dao->getSceneFromID($idScene);
    }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
    function init($array) {
      $this->datePassage = $array['datePassage'];
      $this->dateBalances = $array['dateBalances'];
    }
  }
?>
