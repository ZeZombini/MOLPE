<?php
require_once("../model/DAO.class.php");

if(!isset($_POST['email'])) { // email non renseigné
  header("Location : connexion.ctrl.php?fail=1");
} else if (!isset($_POST['password'])) { // mot de passe non renseigné mais e-mail ok
  header("Location: connexion.ctrl.php?fail=1&email=$_POST['email']"); // retourne page avec message d'erreur et e-mail pré rentrée.
} else { // On  les 2 et on regarde si on le connecte ou pas
  $dao = new DAO();

//    //\\            //\\
//   //!\\ IMPORTANT //!\\
//  /=====\         /=====\
// On regarde dans la base de donnée si le membre est enregistré
// Retourne l'id utilisateur de la BD ou 0 si n'existe pas
  $validation = $dao->checkLogin($_POST['email'],$_POST['password']);



  if ($validation != 0) { // Si membre validé, on détruit la session en cours et on en commence une toute neuve

    session_destroy();
    session_start();

    $_SESSION['login'] = $_POST['email']; // et on initialise les variables de session !
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['id'] = $validation;

    setcookie('email',$_POST['email']); // On met l'adresse email (le login) en cookie pour ne pas à avoir à la retaper à chaque fois

    header("Location : ../index.php"); // Et on réorience vers une autre page
  }
}
 ?>
