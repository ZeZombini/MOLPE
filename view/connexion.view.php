<?php $data['email'] = "blbl";
$data['fail']="Erreur : Blblpbjskenknekjfjqfsjeb jqbdsejegoshfbqkf jsmojs rgl idrg djhg srd";?>
<div id="content">
<h2>Connexion</h2>
	<div id="content-connexion">
		<p class="error"><?=$data['fail']?></p>

		<form action="<?= $config['project_path'] ?>controler/check_login.ctrl.php" method="get" onSubmit="">
			<p>Adresse e-mail :</p>
			<input type="text" name="email" value="<?=$data['email']; ?>"/>
			<p>Mot de passe</p>
			<input type="password" name="mdp"/>
			<input type="hidden" name="mdp_encoded"/>
			<p><a href="#">Mot de passe oublié ?</a></p>
			<input type="submit" value="Connexion">
		</form>
	</div>
</div>
