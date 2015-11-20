<?php
  require_once("booker.class.php");
  require_once("evenement.class.php");
  require_once("groupe.class.php");
  require_once("lieu.class.php");
  require_once("organisateur.class.php");
  require_once("passage.class.php");
  require_once("salle.class.php");
  require_once("scene.class.php");
  require_once("utilisateur.class.php");

  class DAO {
    private $db;
// Constructeur ////////////////////////////////////////////////////////////////
    function __construct() {
      $dsn = 'sqlite:../data/molpe.db';
      try {
        $this->db = new PDO($dsn);
      } catch (PDOException $e) {
        exit("Erreur ouverture BD : ".$e.getMessage());
      }
    }
// Methodes -> Groupe //////////////////////////////////////////////////////////
    // Cardinalité : * //
    function getGroupesFromBookerID($idBooker) {

    }

    // Cardinalité : 1 //
    function getGroupeFromID($idGroupe) {

    }
// Methodes -> Organisateur ////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getOrganisateurFromID($idOrga) {

    }
// Methodes -> Scene ///////////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getSceneFromID($idScene) {

    }

    // Cardinalité : * //
    function getScenesFromEvenementID($idEvenement) {

    }

    // Cardinalité : * //
    function getScenesFromLieuID($idLieu) {

    }

    // Cardinalité : * //
    function getScenesFromOrganisateurID($idOrga) {

    }
// Methodes -> Passage /////////////////////////////////////////////////////////
    // Cardinalité : * //
    function getPassagesFromEvenementID($idEvenement) {

    }

    // Cardinalité : * //
    function getPassagesFromGroupeID($idGroupe) {

    }
// Methodes -> Lieu ////////////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getLieuFromID($idLieu) {

    }

    // Cardinalité : * //
    function getLieuxFromOrganisateurID($idOrga) {

    }
// Methodes -> Booker //////////////////////////////////////////////////////////
    // Cardinalité : * //
    function getBookersFromGroupeID($idGroupe) {

    }
// Methodes -> Evenement ///////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getEvenementFromID($idEvenement) {

    }

    // Cardinalité : * //
    function getEvenementFromSceneID($idScene) {

    }

    // Cardinalité : * //
    function getEvenementsFromOrganisateurID($idOrga) {

    }
// Methodes -> Utilisateur /////////////////////////////////////////////////////
    // Cardinalité : * //
    function getContactsFromUserID($idUser) {
      
    }














?>
