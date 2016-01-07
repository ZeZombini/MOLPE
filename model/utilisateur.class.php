<?php
require_once("DAO.class.php");

class Utilisateur {
// Attributs /////////////////////////////////////////////////////////////////////////////////////////////////
  var $dao;

  var $idUser;
  var $mail;
  var $motDePasse;
  var $imageProfil;
  var $banniere;
  var $prenom;
  var $nom;
  var $description;
  var $siteWeb;
  var $tel_mobile;
  var $tel_fixe;
  var $adresse;
  var $codePostal;
  var $ville;
  var $pays;

  // Association avec Contact(*)

// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////
  function __construct($idUser) {
    $dao = new DAO();
    $this->initUser($dao->getUserFromID(DAO::R_ARRAY,$idUser));
  }

// Methodes ////////////////////////////////////////////////////////////////////////////////////////////////
  // Initialise chaque attribut de la classe avec sa valeur dans le array
  function initUser($array) {
    $this->idUser = $array['idUser'];
    $this->nom = $array['nom'];
    $this->prenom = $array['prenom'];
    $this->description = $array['description'];
    $this->siteWeb = $array['siteWeb'];
    $this->tel_fixe = $array['tel_fixe'];
    $this->tel_mobile = $array['tel_mobile'];
    $this->mail = $array['mail'];
    $this->motDePasse = $array['motDePasse'];
    $this->adresse = $array['adresse'];
    $this->ville = $array['ville'];
    $this->codePostal = $array['codePostal'];
    $this->pays = $array['pays'];
    $this->imageProfil = $array['imageProfil'];
    $this->banniere = $array['banniere'];
  }

  function getContacts() {
    return $dao->getContactsFromUserID(DAO::R_CLASS,$this->idUser);
  }
}
 ?>
