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

//TODO: Mettre a jour toutes les methodes pour adapter aux classes PHP

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
      $req = "select * from Groupe where idUser_Groupe=$idGroupe;";
      $groupe = $this->db->query($req);
      $tab = $groupe->fetchAll(PDO::FETCH_CLASS,'Groupe');
      return $tab[0];
    }

    // Cardinalité : * //
    function getGroupesFromBookerID($idBooker) {
      $req = "select Groupe.idUser_Groupe,Groupe.style,Groupe.taille,Groupe.matDispo
                  from BookerGroupe,Groupe where Groupe.idUser_Groupe=BookerGroupe.idGroupe and idBooker=$idBooker;";
      $groupes = $this->db->query($req);
      $tab = $groupes->fetchAll(PDO::FETCH_CLASS,'Groupe');
      return $tab;
    }


// Methodes -> Organisateur ////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité : 1 //
    function getOrganisateurFromID($idOrga) {
      $req = "select * from Organisateur where idUser_Organisateur=$idOrga;";
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
      $req = "select distinct Scene.idScene,Scene.nom,Scene.largeur,Scene.hauteur,Scene.longueur,Scene.avantScene,Scene.plan,Scene.capacitePublic
                  from Scene,Passage where Scene.idScene=Passage.idScene and Passage.idEvenement=$idEvenement;";
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
      $req = "select * from Scene where idOrganisateur=$idOrga;";
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
      $req = "select * from Lieu where idProprioDuLieu=$idOrga;";
      $lieux = $this->db->query($req);
      $tab = $lieux->fetchAll(PDO::FETCH_CLASS,'Lieu');
      return $tab;
    }
// Methodes -> Booker //////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalité: 1 //
    function getBookerFromID($idBooker) {
      $req="select * from Booker where idBooker=$idBooker;";
      $booker = $this->db->query($req);
      $tab = $booker->fetchAll(PDO::FETCH_CLASS,'Booker');
      return $tab[0];
    }

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
    // Cardinalité: 1 //
    function getUserFromID($idUser) {
      $req="select * from Utilisateur where idUser=$idUser;";
      $user=$this->db->query($req);
      $tab = $user->fetchAll();
      return $tab[0];
    }

    // Cardinalité : * //
    function getContactsFromUserID($idUser) {
      $req="select idUser2 from Contact where idUser1=$idUser;";
      $contactsID= $this->db->query($req);
      $ids=$contactsID->fetch();
      $i=0;
      foreach ($ids as $contact) {
        $tab[$i]=getClassUserFromID($contact);
        $i++;
      }
      return $tab;
    }

    function getClassUserFromID($idUser) {
      $req="select * from Booker where idBooker=$idUser;";
      $user=$this->db->query($req);
      if (getClass($user)!=PDOStatement) {
        $req="select * from Groupe where idGroupe=$idUser;";
        $user=$this->db->query($req);
        if (getClass($user)!=PDOStatement) {
          $req="select * from Organisateur where idOrga=$idUser;";
          $user=$this->db->query($req);
          if (getClass($user)!=PDOStatement) {
            $tab= $user->fetchAll(PDO::FETCH_CLASS,'Organisateur');
            return $tab[0];
          } else return false;
        } else {
          $tab= $user->fetchAll(PDO::FETCH_CLASS,'Groupe');
          return $tab[0];
        }
      } else {
        $tab= $user->fetchAll(PDO::FETCH_CLASS,'Booker');
        return $tab[0];
      }
    }
// Methodes Utilitaires //////////////////////////////////////////////////////////////////////////////////////////////
  // Verifie si le mail correspond au mot de passe, et verifie si la validation du mail a eu lieu
  // Renvoie 0 si le mail ne correspond pas au mot de passe, -1 si l'utilisateur n'a pas valide son mail et son id si tout va bien
  function checkLogin($mail,$mdp) {
    $req="select idUser from Utilisateur where mail=$mail and mdp='$mdp';";
    $res = $this->db->query($req);
    if (getClass($res)!=PDOStatement) return 0;
    else {
      $req="select * from VerifMail where mail='$mail';";
      $res2 = $this->db->query($req);
      if (getClass($res2)!=PDOStatement) return -1;
      else {
        $id = $res->fetch();
        return $id;
      }
    }
  }
}
  // Verifie si l'utilisateur qui veut s'inscrire a entre un mail deja utilise
  // Renvoie faux si le mail est deja utilise, et true sinon
  function checkInscription($mail) {
    $req = "select * from Utilisateur where mail='$mail';"
    $res = $this->db->query($req);
    if (getClass($req)==PDOStatement) return false;
    else return true;
  }

  // Ajoute un utilisateur dans la base de donnees
  // Renvoie false si une erreur a eu lieu, true sinon
  function inscription($type,$prenom,$nom,$tel_mobile,$tel_fixe,$mail,$mdp,$libelle_voie,$ville,$code_postal,$pays) {
    $req = "insert into Utilisateur(mail,motDePasse,imageProfil,banniere,prenom,nom,tel_mobile,tel_fixe,adresse,codePostal,ville,pays)
                values ('$mail','$mdp','0_profil','0_banniere','$prenom','$nom','$tel_mobile','$tel_fixe','$libelle_voie','$codePostal','$ville','$pays');"
    $res=$this->db->exec($req);
    if ($res==0) return false;
    else {
      $req = "select idUser from Utilisateur where mail=$mail;"
      $res = $this->db->query($req);
      $id = $user->fetch();
      $req = "insert into $type(idUser_$type) values ($id);"
      $res=$this->db->exec($req);
      if ($res==0) return false;
      else return true;
    }
  }
?>
