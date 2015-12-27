<?php
include("../model/DAO.class.php");
if(isset($_GET['email']) && isset($_GET['key'])) {
    $dao = new DAO();
    $res = $dao->valider_compte($_GET['email'],$_GET['key']);
    if ($res) {
        header("Location : " . $config['project_path'] . "connexion?fail=5");
    } else {
        header("Location : " . $config['project_path'] . "connexion?fail=3");
    }
} else {
    header("Location : " . $config['project_path']);
}

?>
