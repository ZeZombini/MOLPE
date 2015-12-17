<?php
// Ok avec la V1
  require_once("DAO.class.php");
class Utilisateur {
  // Descriptifs primaires
  var $idUser;
  var $nom;
  var $prenom;
  // infos complémentaires
  var $description;
  var $siteWeb;
  var $tel;
  // utilisé pour connexion
  var $mail;
  var $motDePasse;
  // location
  var $adresse;
  var $codePostal;
  var $ville;
  var $pays;
  //image
  var $imageProfil;
  var bannière;

  // Association avec lui-même avec les contacts
  var $contacts;

  function __construct($idUser) {
    $dao = new DAO();
    $this->init($dao->getUserFromID($idUser));
    $this->contacts = $dao->getContactsFromUserID($this->idUser);
  }

  function init($array) {
    $this->idUser = $array[0]['idUser'];
    $this->nom = $array[0]['nom'];
    $this->prenom = $array[0]['prenom'];
    $this->description = $array[0]['description'];
    $this->siteWeb = $array[0]['siteWeb'];
    $this->tel = $array[0]['tel'];
    $this->mail = $array[0]['mail'];
    $this->mdp = $array[0]['mdp'];
    $this->zone = $array[0]['zone'];
    $this->image = $array[0]['image'];
  }


}
 ?>
