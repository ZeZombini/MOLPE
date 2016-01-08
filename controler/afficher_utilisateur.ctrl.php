<?php
require_once("model/DAO.class.php");
$dao = new DAO();

$config = parse_ini_file("config.ini", FALSE);


$id = isset($_GET['id']) ? $_GET['id'] : 0;

$data['userValid'] = false;

$user = $dao->getBookerFromID(DAO::R_CLASS, $id);
if ($dao->getBookerFromID(DAO::R_CLASS, $id) != null){
	$data['userValid'] = true;
	$data['type'] = Booker;
	$user = $getBookerFromID(DAO::R_CLASS, $id);
} else if ($dao->getGroupeFromID(DAO::R_CLASS, $id) != null){
	$data['userValid'] = true;
	$data['type'] = Groupe;
	$user = $getGroupeFromID(DAO::R_CLASS, $id);

	$data['style'] = $userSpe->style;
} else if ($dao->getOrganisateurFromID(DAO::R_CLASS, $id) != null){
	$data['userValid'] = true;
	$data['type'] = Organisateur;
	$user = $getOrganisateurFromID(DAO::R_CLASS, $id);

	$ev = getEvenementsFromOrganisateurID(DAO::R_CLASS,$id);
	if ($ev != null){
		$ev = $ev[0];
		$evenement['nom']     = $ev->nom;
		$evenement['ville']   = $ev->ville;
		$evenement['date']    = $ev->date;
		$evenement['adresse'] = $ev->adresse;
		$ev = $evenement;
	}
	$data['evenement'] = $ev;

	$lieu = getSallesFromOrganisateurID(DAO::R_CLASS,$id);
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

if ($user != null) {
	$data['ville'] = $user->ville;
	$data['site']  = $user->siteWeb;
	$data['tel']   = $user->tel;
	$data['mail']  = $user->mail;
	$data['desc']  = $user->description;
} 	









include("view/afficher_utilisateur.view.php");

?>