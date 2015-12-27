<?php

// Check si les variables de session sont présentes, sinon, réoriente vers la page de login avec le code erreur 2
$session_running = (session_status() == 2) ? TRUE : FALSE; // On identifie si la session est active : 2 est le code pour session active
if ($session_running) {
  if (!(isset($_SESSION['login']) && isset($_SESSION['password']) && isset($_SESSION['id']))) { // la session est active mais les identifiants ne sont pas définits
    header("Location: ". $config['project_path'] ."connexion?fail=2");
  }  else {
    $session_secure = TRUE; // On voit que la session est lancée et que l'utilisateur est authentifié.
  }
} else {
  session_start(); // On démarre une nouvelle session vierge
  $session_secure = FALSE;
}


 ?>
