<?php
	$data['connecte'] = false;
	$data['nom']	  = "NotBad Records";


?>





<header>
		<div id="header-top">
			<div id="header-left">
				<img id="logo" src="../view/style/img/molpe_small.png" />
			</div><!--

			--><div id="header-right">
					<?php
					if ($data['connecte'] == true){
						echo "<div id=\"account\">";
						echo "<span id=\"username\">".$data['nom']."</span>\n";
						echo "<a href=\"#\">D�connexion</a>\n";
						echo "</div>\n";
						echo "<img class=\"img-profil\" src=\"../view/style/img/noimage.jpg\"/>\n";
					} else {
						echo "<div id=\"account\">";
						echo "<span><a href=\"../connection/\">Connexion</a> | <a href=\"#\">Inscription</a></span>\n";
						echo "</div>\n";
					}?>

			</div>
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


	</header>
