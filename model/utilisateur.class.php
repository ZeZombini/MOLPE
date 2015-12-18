<?php
// OK avec MCD final
  require_once("DAO.class.php");
class Utilisateur {
  // Descriptifs primaires
  var $idUser;
  var $nom;
  var $prenom;
  // infos complémentaires
  var $description;
  var $siteWeb;
  var $telFix;
  var $telMobile;
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
  var $bannière;

  // Association avec lui-même avec les contacts
  var $contacts;

  function __construct($idUser) {
    $dao = new DAO();
    $this->init($dao->getUserFromID($idUser));
    $this->contacts = $dao->getContactsFromUserID($this->idUser);
  }

  function init($array) {
    // Descriptifs primaires
    $this->idUser = $array['idUser'];
    $this->nom = $array['nom'];
    $this->prenom = $array['prenom'];
    // infos complémentaires
    $this->description = $array['description'];
    $this->siteWeb = $array['siteWeb'];
    $this->telFix = $array['telFix'];
    $this->telMobile = $array['telMobile'];
    // utilisé pour connexion
    $this->mail = $array['mail'];
    $this->motDePasse = $array['motDePasse'];
    // location
    $this->adresse = $array['adresse'];
    $this->ville = $array['ville'];
    $this->codePostal = $array['codePostal'];
    $this->pays = $array['pays'];
    //image
    $this->imageProfil = $array['imageProfil'];
    $this->bannière = $array['bannière'];
  }


}
 ?>
