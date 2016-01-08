	<div id="content">
	<h2>Inscription</h2>
	<div id="inscription">
		<form action="controler/check_signin.ctrl.php" method="post" onsubmit="encrypt(this.mdp,this.mdp_encoded)">
			<h3>Informations personnelles</h3>
			<hr>

			<table><!-- INFO PERSO -->
			<tr class="ligne_radio">
				<td>Vous êtes un &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Choisissez le type de compte à créer selon votre identité pour accéder aux fonctions qui vous sont destinées.</span></td>
				<td>
					<input type="radio" name="type" value="Booker" id="radio_booker" checked/><label for="radio_booker">Booker</label>
					<input type="radio" name="type" value="Groupe" id="radio_groupe"/><label for="radio_groupe">Groupe</label>
					<input type="radio" name="type" value="Organisateur" id="radio_orga"/><label for="radio_orga">Organisateur</label>
				</td>
			</tr>

			<tr class="ligne_simple pseudo disable">
				<td>Pseudonyme *</td>
				<td><img src="../../data/img/question58-1.png"/><span>Un pseudonyme peut être choisi à la place d'un ensemble nom-prénom. Cela peut être utilisé pour un nom de groupe ou le nom d'une association, par exemple.</span></td>
				<td><input id="switch1" type="text" name="libelle" disabled/></td>
			</tr>

			<tr class="ligne_double prenomnom">
				<td><input type="button" id="img_opposite" onclick="switchbutton()">Prénom *</td>
				<td><img src="../../data/img/question58-1.png"/><span>Entrez votre prénom, puis votre nom. Ils seront affichés et visibles par les membres inscrits.</span></td>
				<td><input id="switch2" type="text" name="nom" required><span>Nom* </span><input id="switch3" type="text" name="prenom" required></td>
			</tr>

			<tr class="ligne_petite">
				<td>Telephone mobile &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Numéro de téléphone portable. Il pourra être affiché à vos contacts.</span></td>
				<td><input type="tel" name="tel_mobile"/></td>
			</tr>
			<tr class="ligne_petite">
				<td>Telephone fixe &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Numéro de téléphone fixe professionnel. Il pourra être affiché à vos contacts.</span></td>
				<td><input type="tel" name="tel_fix"/></td>
			</tr>
			</table>

			<h3>Informations de connexion</h3>
			<hr>
			<table> <!-- INFO CONNEXION -->
			<tr class="ligne_simple">
				<td>Adresse e-mail *</td>
				<td><img src="../../data/img/question58-1.png"/><span>Veuillez entrer une adresse e-mail valide pour créer votre compte. Cette adresse pourra être affichée à vos contacts.</span></td>
				<td><input id="email" type="email" name="email" required/></td>
			</tr>
			<tr class="ligne_simple">
				<td>Confirmer *</td>
				<td><img src="../../data/img/question58-1.png"/><span>Entrez à nouveau l'e-mail pour confirmation.</span></td>
				<td><input type="email" name="conf_email" required/></td>
			</tr>
			<tr>
				<td>&nbsp</td>
				<td></td>
				<td></td>
			</tr>
			<tr class="ligne_simple">
				<td>Mot de passe *</td>
				<td><img src="../../data/img/question58-1.png"/><span>Choisissez le mot de passe de votre compte. Nous vous conseillons de choisir un mot de passe fort, mêlant lettres, chiffres, symboles, minuscules et majuscules.</span></td>
				<td><input type="password" name="mdp" required/></td>
			</tr>
			<tr class="ligne_simple">
				<td>Confirmer *</td>
				<td><img src="../../data/img/question58-1.png"/><span>Entrez à nouveau le mot de passe choisi pour confirmation.</span></td>
				<td><input type="password" name="conf_mdp" required/></td>
			</tr>
			</table>


			<h3>Adresse</h3>
			<hr>
			<table> <!-- ADRESSE -->
			<tr class="ligne_simple">
				<td>Libellé de la voie</td>
				<td><img src="../../data/img/question58-1.png"/><span>Première ligne de votre adresse professionnelle. Pourra être affiché à vos contacts.</span></td>
				<td><input type="text" name="libel_voie"/></td>
			</tr>
			<tr class="ligne_petite">
				<td>Ville</td>
				<td><img src="../../data/img/question58-1.png"/><span>Ville liée à l'adresse ci-dessus. Sera visible par tous les membres inscrits et utilisée pour déterminer la distance vous séparant des autres acteurs.</span></td>
				<td><input type="text" name="ville"></td>
			</tr>
			<tr class="ligne_petite">
				<td>Code postal</td>
				<td><img src="../../data/img/question58-1.png"/><span>Code postal de la ville ci-dessus.</span></td>
				<td><input type="text" name="code_postal"></td>
			</tr>
			<tr class="ligne_petite">
				<td>Pays</td>
				<td><img src="../../data/img/question58-1.png"/><span>Pays lié à l'adresse ci-dessus.</span></td>
				<td><input type="text" name="pays"></td>
			</tr>
			</table>

			<input type="submit" value="Valider l'inscription">

			<input type="hidden" name="mdp_encoded"/>

		</form>
	</div>
</div>

<script>
	function switchbutton() {
		if(document.getElementById('switch1').disabled == false) {
			document.getElementById('switch1').disabled = true;
			document.getElementById('switch2').disabled = false;
			document.getElementById('switch3').disabled = false;
			document.getElementById('switch1').required = true;
			document.getElementById('switch2').required = false;
			document.getElementById('switch3').required = false;
			document.getElementById('switch1').value = '';
			$('pseudo').addClass('disable');
			$('prenomnom').removeClass('disable');
		} else {
			document.getElementById('switch1').disabled = false;
			document.getElementById('switch2').disabled = true;
			document.getElementById('switch3').disabled = true;
			document.getElementById('switch1').required = false;
			document.getElementById('switch2').required = true;
			document.getElementById('switch3').required = true;
			document.getElementById('switch2').value = '';
			document.getElementById('switch3').value = '';
			$('prenomnom').addClass('disable');
			$('pseudo').removeClass('disable');
		}
	}
</script>
