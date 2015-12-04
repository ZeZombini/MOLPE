<?php
	$data['connecte'] = true;
	$data['prenom'] = "Jean-Edouard";
	$data['nom'] = "De baurepaire";
	$data['img'] = "noimage.jpg";

?>


<header>
	<div id="header-content">
		<img id="logo" src="<?= $config['project_path']?>view/style/img/logo.png" />
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
					echo "    <img src=\"" . $config['project_path'] . "/view/style/img/" . $data['img'] . "\">";
					echo "</div>";
				}
			?>
		</div>
		</div>
		<div id="header-bottom">
			<nav>
				<ul>
					<li><a href="<?=$config['project_path']?>">Accueil</a></li><!--
					--><li><a href="#">Rechercher</a></li><!--
				--><li><a href="#">Mes contacts</a></li><!--
			--><li><a href="#">Mon compte</a></li>
				</ul>
			</nav>
		</div>
	</div>
</header>
