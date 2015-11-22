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
// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function __construct() {
      $dsn = 'sqlite:../data/molpe.db';
      try {
        $this->db = new PDO($dsn);
      } catch (PDOException $e) {
        exit("Erreur ouverture BD : ".$e.getMessage());
      }
    }
// Methodes -> Groupe //////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getGroupeFromID($idGroupe) {
      $req = "select * from groupe where idGroupe=$idGroupe;";
      $groupe = $this->db->query($req);
      $tab = $groupe->fetchAll(PDO::FETCH_CLASS,'Groupe');
      return $tab[0];
    }

    // Cardinalité : * //
    function getGroupesFromBookerID($idBooker) {
      $req = "select Groupe.idGroupe,Groupe.style,Groupe.taille,Groupe.matDispo
                  from BooGroupe,Groupe where Groupe.idGroupe=BooGroupe.idGroupe and idBooker=$idBooker;";
      $groupes = $this->db->query($req);
      $tab = $groupes->fetchAll(PDO::FETCH_CLASS,'Groupe');
      return $tab;
    }


// Methodes -> Organisateur ////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getOrganisateurFromID($idOrga) {
      $req = "select * from Organisateur where idOrga=$idOrga;";
      $orga = $this->db->query($req);
      $tab = $orga->fetchAll(PDO::FETCH_CLASS,'Organisateur');
      return $tab[0];
    }
// Methodes -> Scene ////////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getSceneFromID($idScene) {
      $req = "select * from Scene where idScene=$idScene;";
      $scene = $this->db->query($req);
      $tab = $scene->fetchAll(PDO::FETCH_CLASS,'Scene');
      return $tab[0];
    }

    // Cardinalité : * //
    function getScenesFromEvenementID($idEvenement) {
      $req = "select Scene.idScene,Scene.idProprio,Scene.idLieu,Scene.nomScene,Scene.largeur,Scene.hauteur,Scene.longueur,Scene.avantScene,Scene.plan,Scene.capaPub
                  from SceneUtilise,Scene where Scene.idScene=SceneUtilise.idScene and SceneUtilise.idEvenement=$idEvenement;";
      $scenes = $this->db->query($req);
      $tab = $scenes->fetchAll(PDO::FETCH_CLASS,'Scene');
      return $tab;
    }

    // Cardinalité : * //
    function getScenesFromLieuID($idLieu) {
      $req = "select * from Scene where idLieu=$idLieu;";
      $scenes = $this->db->query($req);
      $tab = $scenes->fetchAll(PDO::FETCH_CLASS,'Scene');
      return $tab;
    }

    // Cardinalité : * //
    function getScenesFromOrganisateurID($idOrga) {
      $req = "select * from Scene where idProprio=$idOrga;";
      $scenes = $this->db->query($req);
      $tab = $scenes->fetchAll(PDO::FETCH_CLASS,'Scene');
      return $tab;
    }
// Methodes -> Passage /////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : * //
    function getPassagesFromEvenementID($idEvenement) {

    }

    // Cardinalité : * //
    function getPassagesFromGroupeID($idGroupe) {

    }
// Methodes -> Lieu //////////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getLieuFromID($idLieu) {

    }

    // Cardinalité : * //
    function getLieuxFromOrganisateurID($idOrga) {

    }
// Methodes -> Booker //////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : * //
    function getBookersFromGroupeID($idGroupe) {

    }
// Methodes -> Evenement //////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getEvenementFromID($idEvenement) {

    }

    // Cardinalité : * //
    function getEvenementFromSceneID($idScene) {

    }

    // Cardinalité : * //
    function getEvenementsFromOrganisateurID($idOrga) {

    }
// Methodes -> Utilisateur ///////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : * //
    function getContactsFromUserID($idUser) {

    }














?>
