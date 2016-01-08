<?php

// peut arriver avec fail active depuis check_email (0) ou check_login (1 ou 2)
// fail = 1 : e-mail non renseigne
// fail = 2 : compte non valide
// fail = 3 : compte n'a pas pu etre valide
// fail = 4 : e-mail ou mot de passe incorrecte
// fail = 5 : compte active, connexion possible
// fail = 6 : pas erreur mais demande validation compte par utilisateur
if (isset($_GET['email'])) {
 $data = array('email' => $_GET['email']);
} else {
 $data = array('email' => "");
}

if(isset($_GET['fail'])) {

  switch ($_GET['fail']) :
   case 1 :
    $data["fail"] = "<span style=\"color:red;font-weight:bold;\">Veuillez renseigner votre adresse e-mail et votre mot de passe</span>";
    break;
   case 2 :
    $data["fail"] = "<span style=\"color:red;font-weight:bold;\">Votre compte n'est pas valide. Cliquez sur le lien qui vous a ete envoye par e-mail !</span>";
    break;
   case 3 :
    $data["fail"] = "<span style=\"color:red;font-weight:bold;\">Une erreur s'est produite lors de la validation de votre compte. Essayez de recommencer.</span>";
    break;
   case 4 :
    $data["fail"] = "<span style=\"color:red;font-weight:bold;\">E-mail ou mot de passe incorrect.</span>";
    break;
   case 5 :
    $data["fail"] = "<span style=\"color:green;font-weight:bold;\">Compte valide ! Vous pouvez vous connecter !</span>";
    break;
   case 6 :
    $data["fail"] = "<span style=\"color:green;font-weight:bold;\">Un email de confirmation vous a ete envoye a l'adresse renseignee. Cliquez sur le lien dans le mail pour actier votre compte.</span>";
    break;
   default :
    $data["fail"] = "";
    break;
    endswitch;

} else {
  $data["fail"] = "";
}


include("view/connexion.view.php");
 ?>
