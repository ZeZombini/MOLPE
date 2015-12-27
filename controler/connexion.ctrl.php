<?php

// peut arriver avec fail activ� depuis check_email (0) ou check_login (1 ou 2)
// fail = 0 : compte activ�, connexion possible
// fail = 1 : e-mail non renseign�
// fail = 2 : compte non valid�
// fail = 3 : compte n'a pas pu �tre valid�
// fail = 4 : e-mail ou mot de passe incorrecte
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
    $data["fail"] = "<span style=\"color:red;font-weight:bold;\">Votre compte n'est pas valid�. Cliquez sur le lien qui vous a �t� envoy� par e-mail !</span>";
    break;
   case 3 :
    $data["fail"] = "<span style=\"color:red;font-weight:bold;\">Une erreur s'est produite lors de la validation de votre compte. Essayez de recommencer.</span>";
    break;
   case 4 :
    $data["fail"] = "<span style=\"color:red;font-weight:bold;\">E-mail ou mot de passe incorrect.</span>";
    break;
   case 5 :
    $data["fail"] = "<span style=\"color:green;font-weight:bold;\">Compte valid� ! Vous pouvez vous connecter !</span>";
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
