<?php
require_once("model/DAO.class.php");
$dao = new DAO();

$config = parse_ini_file("config.ini", FALSE);

var_dump($_GET['test']);


$id = isset($_GET['id']) ? $_GET['id'] : 0;
$user = $dao->getUserFromID(self::R_CLASS, $id);

$userSpe = $dao->getBookerFromID(self::R_CLASS, $id);
if ($getBookerFromID(self::R_CLASS, $id) != null){
	$data['type'] = Booker;
	$userSpe = $getBookerFromID(self::R_CLASS, $id);
} else if ($getGroupeFromID(self::R_CLASS, $id) != null){
	$data['type'] = Groupe;
	$userSpe = $getGroupeFromID(self::R_CLASS, $id);

	$data['style'] = $userSpe->style;
} else if ($getOrganisateurFromID(self::R_CLASS, $id) != null){
	$data['type'] = Organisateur;
	$userSpe = $getOrganisateurFromID(self::R_CLASS, $id);

	$ev = getEvenementsFromOrganisateurID(self::R_CLASS,$id);
	if ($ev != null){
		$ev = $ev[0];
		$evenement['nom']     = $ev->nom;
		$evenement['ville']   = $ev->ville;
		$evenement['date']    = $ev->date;
		$evenement['adresse'] = $ev->adresse;
		$ev = $evenement;
	}
	$data['evenement'] = $ev;

	$lieu = getSallesFromOrganisateurID(self::R_CLASS,$id)
	if ($ev != null){
		$lieu = $lieu[0];
		$salle['nom']     = $lieu->nom;
		$salle['ville']   = $lieu->ville;
		$salle['date']    = $lieu->date;
		$salle['desc']    = $lieu->desc;
		$lieu = $salle;
	}
	$data['salle'] = $lieu;
}


$data['ville'] = $user->ville;
$data['site']  = $user->siteWeb;





include("view/afficher_utilisateur.view.php");

?>