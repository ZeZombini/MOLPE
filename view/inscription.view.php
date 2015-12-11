	<div id="content">
	<h2>Inscription</h2>
	<div id="inscription">
		<form>
			<h3>Informations personnelles</h3>
			<hr>

			<table><!-- INFO PERSO -->
			<tr class="ligne_radio">
				<td>Vous êtes un &nbsp</td>
				<td></td>
				<td>
					<input type="radio" name="type" value="booker" id="radio_booker" checked/><label for="radio_booker">Booker</label>
					<input type="radio" name="type" value="groupe" id="radio_groupe"/><label for="radio_groupe">Groupe</label>
					<input type="radio" name="type" value="orga" id="radio_orga"/><label for="radio_orga">Organisateur</label>
				</td>
			</tr>

			<tr class="ligne_simple">
				<td>Pseudonyme *</td>
				<td></td>
				<td><input id="switch1" type="text" name="libelle" disabled/></td>
			</tr>

			<tr class="ligne_double">
				<td><input type="button" id="img_opposite" onclick="switchbutton()">Prénom *</td>
				<td></td>
				<td><input id="switch2" type="text" name="prenom"><span>Nom* </span><input id="switch3" type="text" name="prenom"></td>
			</tr>

			<tr class="ligne_petite">
				<td>Telephone mobile &nbsp</td>
				<td></td>
				<td><input type="tel" name="mobile"/></td>
			</tr>
			<tr class="ligne_petite">
				<td>Telephone fixe &nbsp</td>
				<td></td>
				<td><input type="tel" name="fix"/></td>
			</tr>
			</table>

			<h3>Informations de connexion</h3>
			<hr>
			<table> <!-- INFO CONNEXION -->
			<tr class="ligne_simple">
				<td>Adresse e-mail *</td>
				<td></td>
				<td><input id="email" type="email" name="email" required/></td>
			</tr>
			<tr class="ligne_simple">
				<td>Confirmer *</td>
				<td></td>
				<td><input type="email" name="conf_email" required/></td>
			</tr>
			<tr>
				<td>&nbsp</td>
				<td></td>
				<td></td>
			</tr>
			<tr class="ligne_simple">
				<td>Mot de passe *</td>
				<td></td>
				<td><input type="password" name="mdp" required/></td>
			</tr>
			<tr class="ligne_simple">
				<td>Confirmer *</td>
				<td></td>
				<td><input type="password" name="conf_mdp" required/></td>
			</tr>
			</table>
			

			<h3>Adresse</h3>
			<hr>
			<table> <!-- ADRESSE -->
			<tr class="ligne_simple">
				<td>Libellé de la voie</td>
				<td></td>
				<td><input type="text" name="libelle_voie"/></td>
			</tr>
			<tr class="ligne_petite">
				<td>Ville</td>
				<td></td>
				<td><input type="text" name="libelle"></td>
			</tr>
			<tr class="ligne_petite">
				<td>Code postal</td>
				<td></td>
				<td><input type="text" name="code postal"></td>
			</tr>
			<tr class="ligne_petite">
				<td>Pays</td>
				<td></td>
				<td><input type="text" name="libelle"></td>
			</tr>
			</table>

			<input type="submit" value="Valider l'inscription" onclick="checkEmail();">

		</form>
	</div>
	</div>

	<footer>


	</footer>

	<script>
		function switchbutton() {
			if(document.getElementById('switch1').disabled == false) {
				document.getElementById('switch1').disabled = true;
				document.getElementById('switch2').disabled = false;
				document.getElementById('switch3').disabled = false;
			} else {
				document.getElementById('switch1').disabled = false;
				document.getElementById('switch2').disabled = true;
				document.getElementById('switch3').disabled = true;
			}
		}

		function checkEmail() {
		    var status = false;     
			var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
		     if (document.form1.email.value.search(emailRegEx) == -1) {
		          alert("Email faux.");
		     }
		     else if (document.form1.email.value != document.form1.conf_email.value) {
		          alert("Email addresses do not match.  Please retype them to make sure they are the same.");
		     }
		     else {
		          alert("Woohoo!  The email address is in the correct format and they are the same.");
		          status = true;
		     }
		     return status;
		}
	</script>
  </body>
</html>
