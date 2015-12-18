<?php
require_once("../model/DAO.class.php");

//retourne à inscription avec le parametre fail
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

    if($dao->checkInscription($mail)) { // vérifie dans la BD si l'email existe
        if ($_POST['libelle'] != "") {
            $_POST['prenom'] = $_POST['libelle'];
        }
        $dao->inscription($_POST['type'],
            $_POST['prenom'],
            $_POST['nom'],
            $_POST['tel_mobile'],
            $_POST['tel_fix'],
            $_POST['mail'],
            $_POST['mdp'],
            $_POST['libelle_voie'],
            $_POST['ville'],
            $_POST['code_postal'],
            $_POST['pays'])
        ;

        $key = random_string(32);
        $dao->creation_key_activation($mail,$key);


        mail($mail,"Activation de votre compte MOLPE",
            "Bonjour ". $_POST['prenom'] .
            "Bienvenue sur MOLPE.
            Pour activer votre compte, cliquez sur le lien suivant ou si le lien marche pas, copiez le dans votre navigateur :
            http://149.91.81.185/check_email?email=$mail&key=$key

            MOLPE
            Moteur d'Organisation et Listing de Eartage d'Evenementiel");


    } else {
        $return_url =
            "type=$_POST['type']&
            libelle=$_POST['libelle']&
            prenom=$_POST['prenom']&
            nom=$_POST['nom']&
            tel_mobile=$_POST['tel_mobile']&
            tel_fix=$_POST['tel_fix']&
            email=$_POST['mail']&
            conf_email=$_POST['conf_email']&
            mdp=&
            conf_mdp=&
            libel_voie=$_POST['libelle_voie']&
            ville=$_POST['ville']&
            code_postal=$_POST['code_postal']&
            pays=$_POST['pays']"
        ;
        header("location : " . $config['project_path'] . "inscription?$return_url");
    }
} else {
    header("location : " . $config['project_path'] . "inscription?fail=1");
}

?>