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
    const R_ARRAY = 1;
    const R_CLASS = 0;
// Constructeur ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function __construct() {
      try {
        $this->db = new PDO('mysql:host=localhost;dbname=molpe;charset=utf8', 'molpe', 'esirn');
      } catch (PDOException $e) {
        exit("Erreur ouverture BD : ".$e.getMessage());
      }
    }
// Methodes Utilitaires ////////////////////////////////////////////////////////////////////////////////////////////////////
    // Verifie si le mail correspond au mot de passe, et verifie si la validation du mail a eu lieu
    // Renvoie 0 si le mail ne correspond pas au mot de passe, -1 si l'utilisateur n'a pas valide son mail et son id si tout va bien
    function checkLogin($mail,$mdp) {
      $req="select idUser from Utilisateur where mail='$mail' and mdp='$mdp';";
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
    // Verifie si l'utilisateur qui veut s'inscrire a entre un mail deja utilise
    // Renvoie faux si le mail est deja utilise, et true sinon
    function checkInscription($mail) {
      $req = "select * from Utilisateur where mail='$mail';";
      $res = $this->db->query($req);
      if (getClass($req)==PDOStatement) return false;
      else return true;
    }

    // Ajoute un utilisateur dans la base de donnees
    // Renvoie false si une erreur a eu lieu, true sinon
    function inscription($type,$prenom,$nom,$tel_mobile,$tel_fixe,$mail,$mdp,$libelle_voie,$ville,$code_postal,$pays) {
      $req = "insert into Utilisateur(mail,motDePasse,imageProfil,banniere,prenom,nom,tel_mobile,tel_fixe,adresse,codePostal,ville,pays)
                  values ('$mail','$mdp','0_profil','0_banniere','$prenom','$nom','$tel_mobile','$tel_fixe','$libelle_voie','$codePostal','$ville','$pays');";
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
        $tab = $user->fetch(PDO::FETCH_CLASS,'Utilisateur');
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
        $tab = $booker->fetch(PDO::FETCH_CLASS,'Booker');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $booker->fetch();
        return $tab;
      } else return false;
    }
// Methodes -> Groupe //////////////////////////////////////////////////////////////////////////////////////////////////
    // Cardinalite : * //
    function getGroupesFromBookerID($r_type,$idBooker) {
      $req = "select * from Groupe where idUser_Groupe in (select idUser_Groupe from BookerGroupe where idUser_Booker=$idBooker);";
      $groupes = $this->db->query($req);
      if ($r_type==self::R_CLASS) {
        $tab = $groupes->fetchAll(PDO::FETCH_CLASS,'Groupe');
        return $tab;
      } elseif ($r_type==self::R_ARRAY) {
        $tab = $groupes->fetchAll();
        return $tab;
      } else return false;
    }

}
?>
