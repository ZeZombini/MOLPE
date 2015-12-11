	<div id="content">
		<div id="content-connexion">
			<h2>Connexion</h2>

			<form action="<?= $config['project_path' ?>controler/check_login.ctrl.php" method="get" onSub>
				<p>Adresse e-mail :</p>
				<input type="text" name="email"/>
				<p>Mot de passe</p>
				<input type="password" name="mdp"/>
				<input type="hidden" name="mdp_encoded"/>
				<p><a href="#">Mot de passe oublié ?</a></p>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
</body>
</html>