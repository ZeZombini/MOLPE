<?php
	/* L'ensemble de donn�es � remplir */
	$data['nom']					= "Not Bad";
	$data['zoneGeo']				= "Grenoble (+- 30km)";
	$data['style']					= "Rock";
	$data['acteur']					= "groupe";
	$data['groupePref']				= null;
	$data['pourcentageCommission']	= null;
	$data['desc']					= "Groupe multiculturel ind�pendant fran�ais form� en 2013.<br>Ad�le Christin<br>Bla bla<br>Bla bla bla<br>Bla bla<br>";
	$data['matosDispo'] 			= "Batterie";
	$data['telephone']				= "06.02.03.05.09";
	$data['site']					= "http://www.youtube.com/channel/notbadrecords";
	$data['email'] 					= "notbadrecords38@gmail.com";


?>








<!DOCTYPE html>

<html>
  <head>
    <title>MOLPE - Moteur d'Organisation, Listing et Partage d'Ev�nementiels </title>
	 <link rel="stylesheet" href="style/style.css">
  </head>

  <body>
   <?php include("header.view.php") ; ?>

	<div id="content">
		<div id="fiche-contact">
			<img class="banniere_profil" src="$config['project_path']/view/style/img/">;
			<div id="fiche-contact-top">
				<img class="img-profil" src="../view/style/img/noimage.jpg"/>
				<h3>Lorem Ipsum</h3>
				<p>Groupe</p>
				<p>Vous êtes booker de ce groupe</p>
			</div>
			<div id="fiche-contact-info">
				<h4>Informations</h4>
				<hr>
				<p>Zone géographique : Grenoble (+- 10km)</p>
				<p>Style musical préféré : Jazz</p>
				<p>Site web : <a href="#"></a></p>
			</div>
			<div>

			</div>



			<div id="fiche-contact-contact">
				<h4>Contact</h4>
				<hr>
				<p>Telephone 1:</p>
				<p>Telephone 2:</p>
				<p>Email : </p>
			</div>


		</div>
	</div>

	<footer>


	</footer>
  </body>
</html>
