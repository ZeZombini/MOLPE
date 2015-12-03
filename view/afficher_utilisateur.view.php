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
	/*$data['zoneGeo']
	$data['zoneGeo']*/

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
			<img class="img-profil" src="../view/style/img/noimage.jpg"/>
			<h2><?php echo $data['nom']; ?></h2>

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
					echo "<p>E-mail : <a href=\"mailto:".$data['email']."\">".$data['email']."</p>\n";

				?>
		</div>
	</div>

	<footer>


	</footer>
  </body>
</html>
