<?php /*$data['email'] = "blbl";
$data['fail']="Erreur : ";*/?>
<div id="content">
<h2>Connexion</h2>
	<div id="content-connexion">
		<?php if ($data['fail'] != "") :?>
		<p class="error"><?=$data['fail']?></p>
		<?php endif?>

		<form action="<?= $config['project_path'] ?>/controler/check_login.ctrl.php" method="post" onSubmit="encrypt(this.mdp,this.mdp_encoded)">
			<p>Adresse e-mail :</p>
			<input type="text" name="email" value="<?=$data['email']; ?>" id="email"/>
			<p>Mot de passe</p>
			<input type="password" name="mdp" id="mdp"/>
			<input type="hidden" name="mdp_encoded" id="mdp_encoded"/>
			<p><a href="#">Mot de passe oublié ?</a></p>
			<input type="submit" value="Connexion">
		</form>
	</div>
</div>

<script type='text/javascript'>
function SubmitForm(email,widgetclear, widgetcrypted) {
  var email = document.getElementById('email').value;
	var mdp = document.getElementById('mdp').value;
	var mdp_encoded = document.getElementById('mdp_encoded').value;

	encrypt(widgetclear,widgetcrypted);

  window.location.href='<= $config['project_path'] ?>/controler/check_login?email=' + email + '&mdp_encoded=' + mdp_encoded;
  return false;
}
</script>
