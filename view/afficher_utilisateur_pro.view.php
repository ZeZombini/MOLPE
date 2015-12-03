<?php
	/* L'ensemble de donn�es � remplir */
	// $data['nomActeur']					= "Not Bad";
	// $data['zoneGeo']				= "Grenoble (+- 30km)";
	// $data['style']					= "Rock";
	// $data['acteur']					= "groupe";
	// $data['groupePref']				= null;
	// $data['pourcentageCommission']	= null;
	// $data['desc']					= "Groupe multiculturel ind�pendant fran�ais form� en 2013.<br>Ad�le Christin<br>Alexandre Cleyet-Merle<br>Joris Stocker";
	// $data['matosDispo'] 			= "Batterie";
	// $data['telephone']				= "06.02.03.05.09";
	// $data['site']					= "http://www.youtube.com/channel/notbadrecords";
	// $data['email'] 					= "notbadrecords38@gmail.com";




	// $data['nomActeur']						= "Jean-Edouard de Beaurepaire";
	// $data['zoneGeo']					= "Grenoble (+- 20km)";
	// $data['style']					= "Rock, Jazz, Blues";
	// $data['acteur']					= "booker";
	// $data['groupePref']				= "Moyen, amateur";
	// $data['pourcentageCommission']	= "9%";
	// $data['desc']					= "Booker dynamique en freelance depuis cinq ans sur Grenoble et son agglo, nombreux contacts notamment pour des petites sc�nes et animation de soir�e. Commission n�gociable.";
	// $data['telephone']				= "0476010203";
	// $data['site']				= "www.jedlbooking.fr";
	// $data['email']				= "je.beaurepaire@gmail.com";



	// $data['matosDispo'] 				= null;
	$data['img1']					= null;
	$data['img2']					= null;
	$data['img3']					= null;
	$data['video']					= null;




	$data['nomActeur']					= "En avant la musique !";
	$data['zoneGeo']				= "Voiron (+- 10km)";
	$data['style']					= null;
	$data['acteur']					= "orga";
	$data['groupePref']				= null;
	$data['pourcentageCommission']	= null;
	$data['desc']					= "Association musicale proposant r�guli�rement des concerts sur Voiron, ouverts � tous groupes de tous niveaux et tous styles.";
	$data['matosDispo'] 			= null;
	$data['telephone']				= "0476011204";
	$data['site']					= "ww.eamusique-asso.org";
	$data['email'] 					= "eamusique-asso@gmail.com";








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
			<a href="afficher_utilisateur_public.view.php"><= Voir le profil public</a>
			<br><br>
			<img class="img-profil" src="../view/style/img/noimage.jpg"/>
			<h2><?php echo $data['nomActeur']; ?></h2>

			<h3>Informations</h3>
			<hr>
			<?php
				if ($data['zoneGeo'] != null)
					echo "<p>Zone g�ographique : ".$data['zoneGeo']."</p>\n";
				if ($data['style'] != null){
					if ($data['acteur'] == "booker"){
						echo "<p>Style musical pr�f�r� : ".$data['style']."</p>\n";
					} else {
						echo "<p>Style musical : ".$data['style']."</p>\n";
					}
				}
				if ($data['groupePref'] != null)
					echo "<p>Site web : ".$data['groupePref']."</p>\n";
				if ($data['pourcentageCommission'] != null)
					echo "<p>Site web : ".$data['pourcentageCommission']."</p>\n";
				if ($data['desc'] != null)
					echo "<p>Site web : ".$data['desc']."</p>\n";
				if ($data['matosDispo'] != null){
					echo "<p>Mat�riel disponible pour d�placement :</p>\n<ul>\n";
					foreach ((array)$data['matosDispo'] as $matos) {
						echo "    <li>".$matos."</li>\n";
					}
					echo "</ul>";
				}

				if ($data['matosDispo'] != null)

				?>

				<h3>Contact</h3>
				<hr>
				<?php
				if ($data['telephone'] != null)
					echo "<p>Telephone : ".$data['telephone']."</p>\n";
				if ($data['site'] != null)
					echo "<p>Site web : <a href=\"".$data['site']."\">".$data['site']."</a></p>\n";
				if ($data['email'] != null)
					echo "<p>E-mail : <a href=\"mailto:".$data['email']."\">".$data['email']."</a></p>\n";

				?>
		</div>
	</div>

	<footer>


	</footer>
  </body>
</html>
