
<?php
// Ok avec V1
require_once("groupe.class.php");
require_once("evenement.class.php");
require_once("scene.class.php");
require_once("DAO.class.php");

class Passage {
    // Variables deorganisateur
  var $dateBalance;
  var $datePassage;
    // Association avec Groupe
  var $idGroupe;          // pour récupérer idGroupe groupe du fetchClass en private
  var $groupe;           // Cardinalité : 1
    // Association avec Evenement
  var $idEvenement;       // pour récupérer idGroupe groupe du fetchClass en private
  var $evenement;         // Cardinalité : 1
    // Association avec Evenement
  var $idScene;       // pour récupérer idGroupe groupe du fetchClass en private
  var $scene;         // Cardinalité : 1

  include("getter/passage.getter.php");

  function __construct() {
    $dao = new DAO();
    $this->groupe    = $dao->getGroupeFromID($this->idGroupe);
    $this->evenement = $dao->getEvenementFromID($this->idEvenement);
    $this->scene     = $dao->getSceneFromID($this->idScene);
  }
}
 ?>
