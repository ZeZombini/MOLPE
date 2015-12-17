<?php
	$data['connecte'] = true;
	$data['prenom'] = "Jean-Edouard";
	$data['nom'] = "De baurepaire";
	$data['img'] = "noimage.jpg";

?>


<header>
	<div id="header-content">
		<div id="logo"></div>
		<div id="header-top">
			<div id="news">
				<p>Ouverture de la programmation pour "Musilac"</p>
				<p>La musique donne une âme à nos coeurs et des ailes à la pensée. - Platon"</p>
			</div>
			<?php
				if ($data['connecte'] == true){
					echo "<div id=\"account\">";
					echo "    <div id=\"account-left\">";
					echo "    <p>" . $data['nom'] . "</p>";
					echo "	  <p>" . $data['prenom'] . "</p>";
					echo "	  <a href=\"#\">Déconnexion</a>";
					echo "    </div>";
					echo "    <img src=\"" . $config['project_path'] . "data/style/img/" . $data['img'] . "\">";
					echo "</div>";
				}
			?>
		</div>
		<nav>
			<ul>
				<?php
					if ($data['connecte'] == true){
echo <<<EOT
					<li><a href="{$config['project_path']}">Accueil</a></li><!--
					--><li><a href="#">Recherche</a></li><!--
					--><li><a href="#">Contacts</a></li><!--
					--><li><a href="#">Compte</a></li>
EOT;

					} else {
echo <<<EOT
					<li><a href="{$config['project_path']}">Accueil</a></li><!--
					--><li><a href="#">Recherche</a></li><!--
					--><li><a href="{$config['project_path']}/inscription">Inscription</a></li><!--
					--><li><a href="{$config['project_path']}/connexion">Connexion</a></li>
EOT;
					
					}?>


			</ul>
		</nav>
	</div>
</header>
