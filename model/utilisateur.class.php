<?php
// Cohérent avec BD
class Utilisateur {

  var $idUser;
  var $libelle;
  var $description;
  var $siteWeb;
  var $tel;
  var $mail;

  var $zone;

  // Association avec lui-même avec les contacts
  var $contacts;
}
 ?>
