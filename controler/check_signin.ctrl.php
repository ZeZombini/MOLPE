<?php
require_once("../model/DAO.class.php");

if(isset($_POST['email'])) {

    $dao = new DAO();

    if($dao->checkInscription($mail)) {
        $dao->inscription($_POST['type'],
            $_POST['libelle'],
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
        header("location : " . $config['project_path'] . "/inscription?$return_url");
    }
} else {
    header("location : " . $config['project_path']);
}

?>