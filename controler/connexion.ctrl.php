<?php

// peut arriver avec fail activé depuis check_email (0) ou check_login (1 ou 2)
// fail = 0 : compte activé, connexion possible
// fail = 1 : e-mail non renseigné
// fail = 2 : compte non validé
// fail = 3 : compte n'a pas pu être validé
// fail = 4 : e-mail ou mot de passe incorrecte
if (isset($_GET['email'])) {
 $data = array('email' => $_GET['email']);
} else {
 $data = array('email' => "");
}

if(isset($_GET['fail'])) {

  switch $_GET['fail'] :
   case 0 :
    array_push($data, 'fail' => "<span style=\"color:green;font-weight:bold;\">Compte validé ! Vous pouvez vous connecter !</span>");
    break;
   case 1 :
    array_push($data, 'fail' => "<span style=\"color:red;font-weight:bold;\">Veuillez renseigner votre adresse e-mail et votre mot de passe</span>");
    break;
   case 2 :
    array_push($data, 'fail' => "<span style=\"color:red;font-weight:bold;\">Votre compte n'est pas validé. Cliquez sur le lien qui vous a été envoyé par e-mail !</span>");
    break;
   case 3 :
    array_push($data, 'fail' => "<span style=\"color:red;font-weight:bold;\">Une erreur s'est produite lors de la validation de votre compte. Essayez de recommencer.</span>");
    break;
   case 4 :
    array_push($data, 'fail' => "<span style=\"color:red;font-weight:bold;\">E-mail ou mot de passe incorrect.</span>");
    break;
   default :
    array_push($data, 'fail' => "");
    break;
    endswitch;

} else {
  array_push($data, 'fail' => "");
}


include("view/connexion.view.php");
 ?>
