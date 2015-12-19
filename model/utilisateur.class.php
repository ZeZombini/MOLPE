<?php

require_once("DAO.class.php");

class Utilisateur {
  // Descriptifs primaires
  var $idUser;
  var $nom;
  var $prenom;
  // infos complementaires
  var $description;
  var $siteWeb;
  var $tel_fixe;
  var $te_mobile;
  // utilise pour connexion
  var $mail;
  var $motDePasse;
  // location
  var $adresse;
  var $codePostal;
  var $ville;
  var $pays;
  //image
  var $imageProfil;
  var $banniere;

  // Association avec lui-meme avec les contacts
  var $contacts; // Cardinalité : * //

  function __construct($idUser) {
    $dao = new DAO();
    $this = $dao->getUserFromID($idUser); // A TESTER !
    //$this->init($dao->getUserFromID($idUser));
    $this->contacts = $dao->getContactsFromUserID($this->idUser);
  }

  function init($array) {
    // Descriptifs primaires
    $this->idUser = $array['idUser'];
    $this->nom = $array['nom'];
    $this->prenom = $array['prenom'];
    // infos complementaires
    $this->description = $array['description'];
    $this->siteWeb = $array['siteWeb'];
    $this->tel_fixe = $array['tel_fixe'];
    $this->tel_mobile = $array['tel_mobile'];
    // utilise pour connexion
    $this->mail = $array['mail'];
    $this->motDePasse = $array['motDePasse'];
    // location
    $this->adresse = $array['adresse'];
    $this->ville = $array['ville'];
    $this->codePostal = $array['codePostal'];
    $this->pays = $array['pays'];
    //image
    $this->imageProfil = $array['imageProfil'];
    $this->banniere = $array['banniere'];
  }


}
 ?>
