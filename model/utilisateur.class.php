<?php
  require_once("DAO.class.php");
// Cohérent avec BD
class Utilisateur {

  var $idUser;
  var $nom;
  var $prenom;
  var $description;
  var $siteWeb;
  var $tel;
  var $mail;
  var $mdp;
  var $zone;

  // Association avec lui-même avec les contacts
  var $contacts;

  function __construct() {
    $dao = new DAO();
    $this->contacts = $dao->getContactsFromUserID($this->idUser);
  }
}
 ?>
