<?php
// Cohérent avec la BD
require_once("organisateur.class.php");
require_once("scene.class.php");
require_once("lieu.class.php");
require_once("DAO.class.php");

class Salle extends Lieu {

  // Variables de salle
  var $idDuLieu;
  var $carte;
  var $description;

  include("getter/salle.getter.php");

  function __construct() {

  }
}
 ?>
