<?php
$config = parse_ini_file("../config.ini", FALSE);
require_once("../model/DAO.class.php");
// renvoie vers connexion avec code fail
// fail = 0 : compte activ�, connexion possible
// fail = 1 : e-mail non renseign�
// fail = 2 : compte non valid�
// fail = 3 : compte n'a pas pu �tre valid�
// fail = 4 : e-mail ou mot de passe incorrecte
// aucun : l'utilisateur est connecté


if(!isset($_POST['email'])) { // email non renseigné
  header("Location : " .$config['project_path'] . "connexion?fail=1");
} else if (!isset($_POST['mdp_encoded'])) { // mot de passe non renseigné mais e-mail ok
  header("Location: ". $config['project_path'] . "connexion?fail=1&email=" .$_POST['email']); // retourne page avec message d'erreur et e-mail pré rentrée.
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
      header("Location: ". $config['project_path'] . "connexion?fail=4&email=" . $_POST['email']); // Pas dans la BD
      break;
    case -1 :
      header("Location: ". $config['project_path'] . "connexion?fail=2&email=" . $_POST['email']); // Compte non validé
      break;
    default : // Si membre validé, on détruit la session en cours et on en commence une toute neuve
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
