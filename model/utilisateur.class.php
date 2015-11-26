<?php
// Ok avec la V1
  require_once("DAO.class.php");
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
  var $image;

  // Association avec lui-même avec les contacts
  var $contacts;

  function __construct() {
    $dao = new DAO();
    $this->contacts = $dao->getContactsFromUserID($this->idUser);
  }
}
 ?>
