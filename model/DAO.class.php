<?php
  require_once("booker.class.php");
  require_once("evenement.class.php");
  require_once("groupe.class.php");
  require_once("lieu.class.php");
  require_once("organisateur.class.php");
  require_once("passage.class.php");
  require_once("scene.class.php");
  require_once("utilisateur.class.php");

  class DAO {
    private $db;
    const R_ARRAY = 1;
    const R_CLASS = 0;
// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function __construct() {
      try {
        $this->db = new PDO('mysql:host=localhost;dbname=Molpe;charset=utf8', 'molpe', 'esirn');
        //$this->db = new PDO("sqlite:../data/molpe.db");
      } catch (PDOException $e) {
        exit("Erreur ouverture BD : ".$e->getMessage());
      }
    }
// Methodes Utilitaires ////////////////////////////////////////////////////////////////////////////////////////////////////
    // Verifie si le mail correspond au mot de passe, et verifie si la validation du mail a eu lieu
    // Renvoie 0 si le mail ne correspond pas au mot de passe, -1 si l'utilisateur n'a pas valide son mail et son id si tout va bien
    function checkLogin($mail,$mdp) {
      $req="select idUser from Utilisateur where mail='$mail' and mdp='$mdp';";
      $res = $this->db->query($req);
      $id = $res->fetch();
      if ($id == false) return 0;
      else {
        $req="select * from VerifMail where mail='$mail';";
        $res2 = $this->db->query($req);
        $tab = $res2->fetch();
        if ($tab != false) return -1;
        else return $id;
      }
    }
    // Verifie si l'utilisateur qui veut s'inscrire a entre un mail deja utilise
    // Renvoie faux si le mail est deja utilise, et true sinon
    function checkInscription($mail) {
      $req = "select * from Utilisateur where mail='$mail';";
      $res = $this->db->query($req);
      $resf = $res->fetch();
      if ($resf != false) {
        var_dump($resf);
        return false;
      } else {
        return true;
      }
    }

    // Insere un utilisateur qui vient de s'inscrire dans la table pour la verification des mails
    // Renvoie false si une erreur a eu lieu, true sinon
    function creation_key_activation($mail,$key) {
      $req = "insert into VerifMail values($mail,$key);";
      $res = $this->db->exec($req);
      if ($res==0) return false;
      else return true;
    }




    // Ajoute un utilisateur dans la base de donnees
    // Renvoie false si une erreur a eu lieu, true sinon
    function inscription($type,$prenom,$nom,$tel_mobile,$tel_fixe,$mail,$mdp,$libelle_voie,$ville,$code_postal,$pays) {
      $req = "insert into Utilisateur(mail,motDePasse,imageProfil,banniere,prenom,nom,tel_mobile,tel_fixe,adresse,codePostal,ville,pays)
                  values ('$mail','$mdp','0_profil','0_banniere','$prenom','$nom','$tel_mobile','$tel_fixe','$libelle_voie','$code_postal','$ville','$pays');";
      $res=$this->db->exec($req);
      if ($res==0) return false;
      else {
        $req = "select idUser from Utilisateur where mail='$mail';";
        $res = $this->db->query($req);
        $id = $user->fetch();
        $req = "insert into $type(idUser_$type) values ($id);";
        $res=$this->db->exec($req);
        if ($res==0) return false;
        else return true;
      }
    }

    // Valide le mail d'un utilisateur si sa cle correspond
    // Renvoie true si tout va bien, false si la cle ne correspond pas ou si la suppression de la BD a echoue
    function valider_compte($mail,$code) {
      $req="select code from VerifMail where mail='$mail';";
      $res = $this->db->query($req);
      $key = $res->fetch();
      if ($code!=$key) return false;
      else {
        $req="delete from VerifMail where mail='$mail';";
        $check = $this->db->exec($req);
        if ($check==1) return true;
        else return false;
      }
    }
// Methodes -> Utilisateur ///////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalite : 1 //
    function getUserFromID($r_type,$idUser) {
      $req="select * from Utilisateur where idUser='$idUser';";
      $user=$this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $user->setFetchMode(PDO::FETCH_CLASS,'Utilisateur');
        $tab = $user->fetch();
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $user->fetch();
        return $tab;
      } else return false;
    }

    // Cardinalite : * //
    function getContactsFromUserID($r_type,$idUser) {
      $req="select * from Utilisateur where idUser in (select idUser2 from Contact where idUser1=$idUser);";
      $users=$this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $users->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $users->fetchAll();
        return $tab;
      } else return false;
    }
// Methodes -> Booker //////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalite : 1 //
    function getBookerFromID($r_type,$idBooker) {
      $req = "select * from Booker where idUser_Booker=$idBooker;";
      $booker = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $booker->setFetchMode(PDO::FETCH_CLASS,'Booker');
        $tab = $booker->fetch();
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $booker->fetch();
        return $tab;
      } else return false;
    }

    // Cardinalite : * //
    function getBookersFromGroupeID($r_type,$idGroupe) {
      $req = "select * from Booker where idUser_Booker in (select idBooker from BookerGroupe where idGroupe=$idGroupe);";
      $bookers = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $bookers->fetchAll(PDO::FETCH_CLASS,'Booker');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $bookers->fetchAll();
        return $tab;
      } else return false;
    }
// Methodes -> Groupe //////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalite : 1 //
    function getGroupeFromID($r_type,$idGroupe) {
      $req = "select * from Groupe where idUser_Groupe=$idGroupe;";
      $groupe = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $groupe->setFetchMode(PDO::FETCH_CLASS,'Groupe');
        $tab = $groupe->fetch();
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $groupe->fetch();
        return $tab;
      } else return false;
    }

    // Cardinalite : * //
    function getGroupesFromBookerID($r_type,$idBooker) {
      $req = "select * from Groupe where idUser_Groupe in (select idUGroupe from BookerGroupe where idBooker=$idBooker);";
      $groupes = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $groupes->fetchAll(PDO::FETCH_CLASS,'Groupe');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $groupes->fetchAll();
        return $tab;
      } else return false;
    }
// Methodes -> Organisateur ///////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalite : 1 //
    function getOrganisateurFromID($r_type,$idOrga) {
      $req = "select * from Organisateur where idUser_Organisateur=$idOrga;";
      $orga = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $orga->setFetchMode(PDO::FETCH_CLASS,'Organisateur');
        $tab = $orga->fetch();
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $orga->fetch();
        return $tab;
      } else return false;
    }

    // Cardinalite : 1 //
    function getOrganisateurFromLieuID($r_type,$idLieu) {
      $req = "select * from Organisateur where idUser_Organisateur in (select idOrganisateur from Possede where idLieu=$idLieu);";
      $orga = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $orga->setFetchMode(PDO::FETCH_CLASS,'Organisateur');
        $tab = $orga->fetch();
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $orga->fetch();
        return $tab;
      } else return false;
    }

    // Cardinalite : * //
    function getOrganisateursFromEvenementID($r_type,$idEvent) {
      $req = "select * from Organisateur where idUser_Organisateur in (select idOrganisateur from Organise where idEvenement=$idEvent);";
      $orgas = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $orgas->fetchAll(PDO::FETCH_CLASS,'Organisateur');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $orgas->fetchAll();
        return $tab;
      } else return false;
    }
// Methodes -> Evenement ////////////////////////////////////////////////////////////////////////////////////////////
      // Cardinalite : 1 //
    function getEvenementFromID($r_type,$idEvent) {
      $req = "select * from Evenement where idEvenement=$idEvent;";
      $event = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $event->setFetchMode(PDO::FETCH_CLASS,'Evenement');
        $tab = $event->fetch();
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $event->fetch();
        return $tab;
      } else return false;
    }

    // Cardinalite : * //
    function getEvenementsFromOrganisateurID($r_type,$idOrga) {
      $req = "select * from Evenement where idEvenement in (select idEvenement from Organise where idOrganisateur=$idOrga);";
      $events = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $events->fetchAll(PDO::FETCH_CLASS,'Evenement');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $events->fetchAll();
        return $tab;
      } else return false;
    }

      // Cardinalite : * //
    function getEvenementsFromLieuID($r_type,$idLieu) {
      $req = "select * from Evenement where idEvenement in (select idEvenement from SePasseraA where idLieu=$idLieu);";
      $events = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $events->fetchAll(PDO::FETCH_CLASS,'Evenement');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $events->fetchAll();
        return $tab;
      } else return false;
    }
// Methodes -> Scene ////////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalite : 1 //
    function getSceneFromID($r_type,$idScene) {
      $req = "select * from Scene where idScene=$idScene;";
      $scene = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $scene ->setFetchMode(PDO::FETCH_CLASS,'Scene');
        $tab = $scene->fetch();
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $scene->fetch();
        return $tab;
      } else return false;
    }

    // Cardinalite : * //
    function getScenesFromLieuID($r_type,$idLieu) {
      $req = "select * from Scene where idScene in (select idScene from EstComposeDe where idLieu=$idLieu);";
      $scenes = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $scenes->fetchAll(PDO::FETCH_CLASS,'Scene');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $scenes->fetchAll();
        return $tab;
      } else return false;
    }

// Methodes -> Lieu //////////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalite : 1 //
    function getLieuFromID($r_type,$idLieu) {
      $req = "select * from Lieu where idLieu=$idLieu;";
      $lieu = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $lieu->setFetchMode(PDO::FETCH_CLASS,'Lieu');
        $tab = $lieu->fetch();
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $lieu->fetch();
        return $tab;
      } else return false;
    }

    // Cardinalite : 1 //
    function getLieuFromSceneID($r_type,$idScene) {
      $req = "select * from Lieu where idLieu in (select idLieu from EstComposeDe where idScene=$idScene);";
      $lieu = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $lieu->setFetchMode(PDO::FETCH_CLASS,'Lieu');
        $tab = $lieu->fetch();
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $lieu->fetch();
        return $tab;
      } else return false;
    }


    // Cardinalite : * //
    function getLieuxFromEvenementID($r_type,$idEvent) {
        $req = "select * from Lieu where idLieu in (select idLieu from SePasseraA where idEvenement=$idEvent);";
        $lieux = $this->db->query($req);
        if ($r_type==self::R_CLASS) {
          $tab = $lieux->fetchAll(PDO::FETCH_CLASS,'Lieu');
          return $tab;
        } elseif ($r_type==self::R_ARRAY) {
          $tab = $lieux->fetchAll();
          return $tab;
        } else return false;
    }

    // Cardinalite : * //
    function getLieuxFromOrganisateurID($r_type,$idOrga) {
      $req = "select * from Lieu where idLieu in (select idLieu from Possede where idOrganisateur=$idOrga);";
      $lieux = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $lieux->fetchAll(PDO::FETCH_CLASS,'Lieu');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $lieux->fetchAll();
        return $tab;
      } else return false;
    }

    function getSallesFromOrganisateurID($r_type,$idOrga) {
      $req = "select * from Lieu where idLieu in (select idLieu from Possede where idOrganisateur=$idOrga) and salle=true;";
      $lieux = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $lieux->fetchAll(PDO::FETCH_CLASS,'Lieu');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $lieux->fetchAll();
        return $tab;
      } else return false;
    }
// Methodes -> Passage ////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalite : 1 //
    function getPassageFromIDs($idGrp,$idEvent,$idScene) {
      $req = "select * from Passage where idGroupe=$idGrp and idEvenement=$idEvent and idScene=$idScene;";
      $passage = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $passage->setFetchMode(PDO::FETCH_CLASS,'Passage');
        $tab = $passage->fetch();
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $passage->fetch();
        return $tab;
      } else return false;
    }

    // Cardinalite : * //
    function getPassagesFromSceneID($r_type,$idScene) {
      $req = "select * from Passage where idScene=$idScene;";
      $passages = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $passages->fetchAll(PDO::FETCH_CLASS,'Passage');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $passages->fetchAll();
        return $tab;
      } else return false;
    }

    // Cardinalite : * //
    function getPassagesFromGroupeID($r_type,$idGroupe) {
      $req = "select * from Passage where idGroupe=$idGroupe;";
      $passages = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $passages->fetchAll(PDO::FETCH_CLASS,'Passage');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $passages->fetchAll();
        return $tab;
      } else return false;
    }

    // Cardinalite : * //
    function getPassagesFromEvenementID($r_type,$idEvent) {
      $req = "select * from Passage where idEvenement=$idEvent;";
      $passages = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $passages->fetchAll(PDO::FETCH_CLASS,'Passage');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $passages->fetchAll();
        return $tab;
      } else return false;
    }


}
?>
