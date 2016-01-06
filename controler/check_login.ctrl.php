<?php
$config = parse_ini_file($config['project_path']."/config.ini", FALSE);
require_once("../model/DAO.class.php");

// renvoi vers connexion avec code fail :
// fail = 1 : e-mail non renseigné
// fail = 2 : compte non validé
// fail = 3 : compte n'a pas pu être validé
// fail = 4 : e-mail ou mot de passe incorrect
// fail = 5 : compte activé, connexion possible
// fail = 6 : pas erreur mais demande validation compte par utilisateur
// aucun : l'utilisateur est connecté


if(!isset($_POST['email'])) { // email non renseigné
  header("Location : " .$config['project_path'] . "/connexion?fail=1");
} else if (!isset($_POST['mdp_encoded'])) { // mot de passe non renseigné mais e-mail ok
  header("Location: ". $config['project_path'] . "/connexion?fail=1&email=" .$_POST['email']); // retourne page avec message d'erreur et e-mail pré rentrée.
} else { // On  les 2 et on regarde si on le connecte ou pas
  $dao = new DAO();

//     /\              /\
//   //!\\ IMPORTANT //!\\
//  /=====\         /=====\
// On regarde dans la base de donnée si le membre est enregistré
// Retourne   id utilisateur de la BD ou
//            0 si n'existe pas,
//            -1 si compte non activé

  $validation = $dao->checkLogin($_POST['email'],$_POST['mdp_encoded']);
  

  switch ($validation) :
    case 0 :
      echo("fdjhdfkjhkdfshkjf");
      header("Location: ". $config['project_path'] . "/connexion?fail=4&email=" . $_POST['email']); // Pas dans la BD
      break;
    case -1 :
      echo("non");
      header("Location: ". $config['project_path'] . "/connexion?fail=2&email=" . $_POST['email']); // Compte non validé
      break;
    default : // Si membre validé, on détruit la session en cours et on en commence une toute neuve
    echo("coucou");
      session_destroy();
      session_start();

      $_SESSION['login'] = $_POST['email']; // et on initialise les variables de session !
      $_SESSION['password'] = $_POST['mdp_encoded'];
      $_SESSION['id'] = $validation;

      header("Location : " . $config['project_path']); // Et on réorience vers une autre page
      break;
    endswitch;
  }

 ?>
