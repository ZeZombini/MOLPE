<?php
include("session.ctrl.php");
// On concidère que la session est active et c'est
// $session_secure qui nous dit si la personne est
// authentifié ou si la session est vierge
if ($session_secure) {
  $dao = new DAO();

  // On récupère l'utilisateur via son ID
  $user = $dao->getUtilisateurFromID($_SESSION['id']);

  // On construit le data en fonction de l'utilisateur retourné
  $data = array('connecte' => $session_secure,
                'nom' => $user[0]->getNom(),
                'prenom' => $user[0]->getPrenom()
              );
}
?>
