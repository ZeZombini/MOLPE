<?php
	$data['connecte'] = true;

?>


<header>
	<div id="header-content">
		<img id="logo" src="<?= $config['project_path']?>view/style/img/logo.png" />
		<div id="header-top">
			<div id="news">
				<p>Ouverture de la programmation pour "Musilac"</p>
				<p>La musique donne une âme à nos coeurs et des ailes à la pensée. - Platon"</p>
<<<<<<< HEAD
			</div>
			<div id="header-right">
				<?php
				if ($data['connecte'] == true){
					echo "<div id=\"account\">";
					echo "<span id=\"username\">".$data['nom']."</span>\n";
					echo "<a href=\"#\">D�connexion</a>\n";
					echo "</div>\n";
					echo "<img class=\"img-profil\" src=\"../view/style/img/noimage.jpg\"/>\n";
				} else {
					echo "<div id=\"account\">";
					echo "<span><a href=\"" . $config['project_path'] . "connexion/\">Connexion</a> | <a href=\"" . $config['project_path'] . "inscription/\">Inscription</a></span>\n";
					echo "</div>\n";
				}?>
=======
>>>>>>> origin/master
			</div>
			<?php 
				if ($data['connecte'] == true){
					echo "<div id=\"account\">";
					echo "    <div id=\"account-left\">";
					echo "    <p>Jean-Edouard</p>";
					echo "	  <p>de Beaurepaire</p>";
					echo "	  <a href=\"#\">Déconnexion</a>";
					echo "    </div>";
					echo "    <img src=\"style/img/noimage.jpg\">";
					echo "</div>";
				} else {
					
				}			
			?>
		</div>			
		<div id="header-bottom">		
			<nav>
				<ul>
					<li><a href="#">Accueil</a></li><!--
					--><li><a href="#">Rechercher</a></li><!--
					--><li><a href="#">Mes contacts</a></li><!--
					--><li><a href="#">Mon compte</a></li>
				</ul>
			</nav>
		</div>
		<div id="header-bottom">
			<nav>
				<ul>
					<li><a href="#">Accueil</a></li><!--
					--><li><a href="#">Rechercher</a></li><!--
				--><li><a href="#">Mes contacts</a></li><!--
			--><li><a href="#">Mon compte</a></li>
				</ul>
			</nav>
		</div>
	</div>
</header>
