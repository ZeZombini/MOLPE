<div id="content">
<h2>Connexion</h2>
	<div id="content-connexion">
		// Fail = 1 pas demail
		// Fail = 2 email pas valide


		<form action="<?= $config['project_path'] ?>controler/check_login.ctrl.php" method="get" onSubmit="">
			<p>Adresse e-mail :</p>
			<input type="text" name="email" value="<?=$_GET['email'] ?>"/>
			<p>Mot de passe</p>
			<input type="password" name="mdp"/>
			<input type="hidden" name="mdp_encoded"/>
			<p><a href="#">Mot de passe oublié ?</a></p>
			<input type="submit" value="Submit">
		</form>
	</div>
</div>
