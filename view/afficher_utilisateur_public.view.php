<?php
	/* L'ensemble de donn�es � remplir */

	// Black Sabath

	// $data['nomActeur']				= "Black Sabath";
	// $data['zoneGeo']				= "Les enfers (+- 666km)";
	// $data['style']					= "Heavy Metal";
	// $data['acteur']					= "groupe";
	// $data['groupePref']				= null;
	// $data['pourcentageCommission']	= null;
	// $data['desc']					= "Groupe qui fait peur un peu, mais on a Ozzy Osbourne et �a �a claque.";
	// $data['matosDispo'] 			= "Colombe et chauve-souris";
	// $data['img1']					= null;
	// $data['img2']					= null;
	// $data['img3']					= null;
	// $data['video']					= "https://www.youtube.com/embed/hkXHsK4AQPs";

	


	// NOT BAD

	// $data['nomActeur']					= "Not Bad";
	// $data['zoneGeo']				= "Grenoble (+- 30km)";
	// $data['style']					= "Rock";
	// $data['acteur']					= "groupe";
	// $data['groupePref']				= null;
	// $data['pourcentageCommission']	= null;
	// $data['desc']					= "Groupe multiculturel ind�pendant fran�ais form� en 2013.<br>Ad�le Christin<br>Bla bla<br>Bla bla bla<br>Bla bla<br>";
	// $data['matosDispo'] 			= "Batterie";
	// $data['img1']					= null;
	// $data['img2']					= null;
	// $data['img3']					= null;
	// $data['video']					= null;


	// $data['nomActeur']						= "Jean-Edouard de Beaurepaire";
	// $data['zoneGeo']					= "Grenoble (+- 20km)";
	// $data['style']					= "Rock, Jazz, Blues";
	// $data['acteur']					= "booker";
	// $data['groupePref']				= "Moyen, amateur";
	// $data['pourcentageCommission']	= "9%";
	// $data['desc']					= "Booker dynamique en freelance depuis cinq ans sur Grenoble et son agglo, nombreux contacts notamment pour des petites sc�nes et animation de soir�e. Commission n�gociable.";
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
	$data['telephone']				= null;
	$data['site']					= "ww.eamusique-asso.org";
	$data['email'] 					= null;


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
			<?php if($data['connecte']){echo "<a href=\"afficher_utilisateur_pro.view.php\">Voir le profil pro =></a>";} ?>
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
					echo "<p>Groupe pr�f�r�s : ".$data['groupePref']."</p>\n";
				if ($data['pourcentageCommission'] != null)
					echo "<p>Pourcentage de commission : ".$data['pourcentageCommission']."</p>\n";
				if ($data['desc'] != null)
					echo "<p>Description : ".$data['desc']."</p>\n";
				if ($data['matosDispo'] != null){
					echo "<p>Mat�riel disponible pour d�placement :</p>\n<ul>\n";
					foreach ((array)$data['matosDispo'] as $matos) {
						echo "    <li>".$matos."</li>\n";
					}
					echo "</ul>";
				}

				if ($data['matosDispo'] != null)

				?>

				<?php if ($data['acteur'] == "groupe"){
				echo "<h3>Medias</h3>";
				echo "<hr>";
					if ($data['img1'] != null)
						echo "<img src=\"".$data['img1']."\">";
					if ($data['img2'] != null)
						echo "<img src=\"".$data['img2']."\">";
					if ($data['img3'] != null)
						echo "<img src=\"".$data['img3']."\">";
					if($data['video'] != null)
						echo "<iframe width=\"420\" height=\"315\" src=\"".$data['video']."\" frameborder=\"0\" allowfullscreen></iframe>";
				}
					?>
		</div>
	</div>

	<footer>


	</footer>
  </body>
</html>
