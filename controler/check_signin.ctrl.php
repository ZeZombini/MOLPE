<?php
$config = parse_ini_file("../config.ini", FALSE);

require_once("../model/DAO.class.php");
require_once("../data/mail/mail.php");

//retourne � inscription avec le parametre fail
// fail = 0 pas d'erreur, afficher message valider l'e-mail

function random_string($length) {
    $string = "";
    $chaine = "abcdefghijklmnpqrstuvwxyz0123456789";
    srand((double)microtime()*1000000);
    for($i=0; $i<$length; $i++) {
        $string .= $chaine[rand()%strlen($chaine)];
    }
    return $string;
}
if(isset($_POST['email'])) {
    $dao = new DAO();
    if($dao->checkInscription($_POST['email'])) { // v�rifie dans la BD si l'email existe
        if (isset($_POST['libelle'])) {
            $_POST['prenom'] = $_POST['libelle'];
        }
        $dao->inscription($_POST['type'],
            $_POST['prenom'],
            $_POST['nom'],
            $_POST['tel_mobile'],
            $_POST['tel_fix'],
            $_POST['email'],
            $_POST['mdp_encoded'],
            $_POST['libel_voie'],
            $_POST['ville'],
            $_POST['code_postal'],
            $_POST['pays'])
        ;
        $mail = $_POST['email'];
        $key = random_string(32);
        $dao->creation_key_activation($mail,$key);


<<<<<<< HEAD
        if(sendMail($mail,
=======
        /*if(mail($mail,"Activation de votre compte MOLPE",
>>>>>>> 99badcfcd0b3d0e60a0868f2ced6f82ebca72441
            "Bonjour ". $_POST['prenom'] .
            "\r\nBienvenue sur MOLPE.
            \r\nPour activer votre compte, cliquez sur le lien suivant ou,
            \r\n si le lien marche pas, copiez le dans votre navigateur :
            \r\nhttp://149.91.81.185/check_email?email=$mail&key=$key
            \r\n" . $config['project_path']  . "check_email?email=$mail&key=$key
            \r\n
            \r\nMOLPE
            \r\nMoteur d'Organisation et Listing de Eartage d'Evenementiel"))
        {
      header("Location : " . $config['project_path'] . "connexion?fail=6");
    } else {
      echo "Erreur lors envoi mail";
    }*/
    header("Location: " . $config['project_path'] . "connexion?fail=6");
    } else {
      if (!isset($_POST['libelle'])) {
          $_POST['libelle'] = "";
      }
        $return_url =
            "type=".$_POST['type']."&
            libelle=".$_POST['libelle']."&
            prenom=".$_POST['prenom']."&
            nom=".$_POST['nom']."&
            tel_mobile=".$_POST['tel_mobile']."&
            tel_fix=".$_POST['tel_fix']."&
            email=".$_POST['email']."&
            conf_email=".$_POST['conf_email']."&
            mdp=&
            conf_mdp=&
            libel_voie=".$_POST['libel_voie']."&
            ville=".$_POST['ville']."&
            code_postal=".$_POST['code_postal']."&
            pays=".$_POST['pays']
        ;
        header("Location: " . $config['project_path'] . "inscription?$return_url");
    }
} else {
    header("Location: " . $config['project_path'] . "inscription?fail=1");
}

?>
