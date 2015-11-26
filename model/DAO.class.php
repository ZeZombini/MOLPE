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
      $req = "select * from Passage where idEvenement=$idEvenement;";
      $passages = $this->db->query($req);
      $tab = $passages->fetchAll(PDO::FETCH_CLASS,'Passage');
      return $tab;
    }

    // Cardinalité : * //
    function getPassagesFromGroupeID($idGroupe) {
      $req = "select * from Passage where idGroupe=$idGroupe;";
      $passages = $this->db->query($req);
      $tab = $passages->fetchAll(PDO::FETCH_CLASS,'Passage');
      return $tab;
    }
// Methodes -> Lieu //////////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getLieuFromID($idLieu) {
      $req = "select * from Lieu where idLieu=$idLieu;";
      $lieu = $this->db->query($req);
      $tab = $lieu->fetchAll(PDO::FETCH_CLASS,'Lieu');
      return $tab[0];
    }

    // Cardinalité : * //
    function getLieuxFromOrganisateurID($idOrga) {
      $req = ""; //Pas d'organisateur dans lieu mais dans salle oui //
      $lieux = $this->db->query($req);
      $tab = $lieux->fetchAll(PDO::FETCH_CLASS,'Lieu');
      return $tab;
    }
// Methodes -> Booker //////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : * //
    function getBookersFromGroupeID($idGroupe) {
      $req = "select Booker.idBooker,Booker.pourceCom,Booker.tailleGrp,Booker.stylePref
                  from BooGroupe,Booker where Booker.idBooker=BooGroupe.idBooker and BooGroupe.idGroupe=$idGroupe;";
      $bookers = $this->db->query($req);
      $tab = $bookers->fetchAll(PDO::FETCH_CLASS,'Booker');
      return $tab;
    }
// Methodes -> Evenement //////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getEvenementFromID($idEvenement) {
      $req = "select * from Evenement where idEvenement=$idEvenement;";
      $event = $this->db->query($req);
      $tab = $event->fetchAll(PDO::FETCH_CLASS,'Evenement');
      return $tab[0];
    }

    // Cardinalité : * //
    function getEvenementFromSceneID($idScene) {
      $req = "select Evenement.idEvenement,Evenement.idOrga,Evenement.dateDeb,Evenement.dateFin,Evenement.periodeProg,Evenement.hebergement,
                                  Evenement.catering,Evenement.remunerer,Evenement.matosDispo
                  from Evenement,SceneUtilise where Evenement.idEvenement=SceneUtilise.idEvenement and SceneUtilise.idScene=$idScene;";
      $events = $this->db->query($req);
      $tab = $events->fetchAll(PDO::FETCH_CLASS,'Evenement');
      return $tab;
    }

    // Cardinalité : * //
    function getEvenementsFromOrganisateurID($idOrga) {
      $req = "select * from Evenement where idOrga=$idOrga;";
      $events = $this->db->query($req);
      $tab = $events->fetchAll(PDO::FETCH_CLASS,'Evenement');
      return $tab;
    }
// Methodes -> Utilisateur ///////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : * //
    function getContactsFromUserID($idUser) {
      $req = "select Utilisateur.idUser,Utilisateur.libelle,Utilisateur.description,Utilisateur.siteWeb,Utilisateur.tel,Utilisateur.mail
                  from Contact,Utilisateur where Contact.idUser2=Utilisateur=idUser and Contact.idUser1=$idUser;";
      $contacts = $this->db->query($req);
      $tab = $contacts->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
      return $tab;
    }














?>
