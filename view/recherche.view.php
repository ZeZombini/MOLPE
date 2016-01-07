<!-- Fonction pour mettre à jour la valeur du champ "commission" -->
<script>
    function updateSlider(slideAmount) {
        var sliderDiv = document.getElementById("sliderAmount");
        sliderDiv.innerHTML = slideAmount + "%";
    }

</script>

<div id="content">
	<h2>Recherche</h2>
	<div id="recherche">
		<form action="controler/search.ctrl.php" method="post">
			<h3>Recherche</h3>
			<hr>

			<table><!-- RECHERCHE -->


			<tr class="ligne_simple">
				<td>Recherche *</td>
				<td></td>
				<td><input id="recherche" type="text" name="recherche" value="Entrez un mot-clé"/></td>
			</tr>

			<tr class="ligne_simple">
				<td>Lieu &nbsp</td>
				<td></td>
				<td><input id="lieu" type="text" name="lieu" required></td>
			</tr>

			<tr class="ligne_radio">
				<td>Vous recherchez un(e) &nbsp</td>
				<td></td>
				<td>
					<input type="radio" name="type" value="Booker" id="radio_booker"/><label for="radio_booker">Booker</label>
					<input type="radio" name="type" value="Groupe" id="radio_groupe"/><label for="radio_groupe">Groupe</label>
					<input type="radio" name="type" value="Organisateur" id="radio_orga"/><label for="radio_orga">Organisateur</label>
					<input type="radio" name="type" value="Evenement" id="radio_evt"/><label for="radio_evt">Évènement</label>
					<input type="radio" name="type" value="Salle" id="radio_salle"/><label for="radio_salle">Salle</label>
					<input type="radio" name="type" value="Tous" id="radio_tous" checked/><label for="radio_tous">Tous</label>
				</td>
			</tr>
			<tr></tr>
			</table>

			<h3>Options avancées</h3>
			<hr>
			<table id="radio_booker"> <!-- RECHERCHE AVANCEE BOOKER -->
			
			<tr class="ligne_simple">
				<td>Nombre de groupes &nbsp</td>
				<td></td>
				<td>  <select name="nbgrp">
						<option value="peuimporteNb" selected>- Peu importe -</option>
    					<option value="aucun">Aucun</option>
    					<option value="untrois">Entre 1 et 3</option>
    					<option value="quatresix">Entre 4 et 6</option>
    					<option value="sixneuf">Entre 6 et 9</option>
    					<option value="plusdix">10 ou plus</option>
  					</select></td>
  			</tr>
  			<tr class="ligne_simple">
  				<td>Note des groupes &nbsp</td>
				<td></td>
				<td>  <select name="nbetoiles">
						<option value="peuimporteEt" selected>- Peu importe -</option>
    					<option value="uneetoile">1 étoile</option>
    					<option value="deuxetoiles">2 étoiles</option>
    					<option value="troisetoiles">3 étoiles</option>
    					<option value="quatreetoiles">4 étoiles</option>
    					<option value="cinqetoiles">5 étoiles</option>
  					</select></td>
  			</tr>
  			<tr class="ligne_simple">
  				<td>Distance &nbsp</td>
				<td></td>
				<td>  <select name="distance">
						<option value="peuimporteDist" selected>- Peu importe -</option>
    					<option value="dixkm">Moins de 10km</option>
    					<option value="trentekm">Moins de 30km</option>
    					<option value="cinquantekm">Moins de 50km</option>
    					<option value="centkm">Moins de 100km</option>
    					<option value="pluscentkm">100km ou plus</option>
  					</select></td>
			</tr>

			<tr class="ligne_slide">
				<td>Commission maximale &nbsp</td>
				<td></td>
				<td><input type="range" name="commission" min="0" max="100" step="2" value="8" onchange="updateSlider(this.value)"> <span id="sliderAmount">8%</span></td>
			</tr>

			<tr class="ligne_chckbx">
  				<td>Niveau des groupes &nbsp</td>
				<td></td>
				<td>
    				<input type="checkbox" name="nivgrp" value="amateur"><div>Amateur</div>
    				<input type="checkbox" name="nivgrp" value="semipro"><div>Semi-Pro</div>
    				<input type="checkbox" name="nivgrp" value="pro"><div>Pro</div>
  				</td>
			</tr>

			<tr class="ligne_chckbx">
				<td>Style des groupes &nbsp</td>
				<td></td>
				<td> 

					<input type="checkbox" name="style" value="blues"><div>Blues</div>
					<input type="checkbox" name="style" value="classique"><div>Classique</div>
					<input type="checkbox" name="style" value="electro"><div>Electro</div>
					<input type="checkbox" name="style" value="experimental"><div>Expérimental</div> <br />
					<input type="checkbox" name="style" value="folk"><div>Folk</div>
					<input type="checkbox" name="style" value="funk"><div>Funk</div>
					<input type="checkbox" name="style" value="hardrock"><div>Hard Rock</div>
					<input type="checkbox" name="style" value="jazz"><div>Jazz</div> <br />
					<input type="checkbox" name="style" value="metal"><div>Metal</div>
					<input type="checkbox" name="style" value="pop"><div>Pop</div>
					<input type="checkbox" name="style" value="punk"><div> Punk</div>
					<input type="checkbox" name="style" value="rnb"><div>R&B</div> <br />
					<input type="checkbox" name="style" value="rap"><div>Rap</div>
					<input type="checkbox" name="style" value="rock"><div>Rock</div>
					<input type="checkbox" name="style" value="soul"><div>Soul</div>
					<input type="checkbox" name="style" value="variete"><div>Variété</div>
  				</td>
			</tr>

			</table>


			<!-- A RETIRER ENSUITE -->
			<hr>


			<table id="radio_groupe"> <!-- RECHERCHE AVANCEE GROUPE -->

  			<tr class="ligne_simple">
  				<td>Note du groupe &nbsp</td>
				<td></td>
				<td>  <select name="nbetoiles">
						<option value="peuimporteEt" selected>- Peu importe -</option>
    					<option value="uneetoile">1 étoile</option>
    					<option value="deuxetoiles">2 étoiles</option>
    					<option value="troisetoiles">3 étoiles</option>
    					<option value="quatreetoiles">4 étoiles</option>
    					<option value="cinqetoiles">5 étoiles</option>
  					</select></td>
  			</tr>
  			<tr class="ligne_simple">
  				<td>Distance &nbsp</td>
				<td></td>
				<td>  <select name="distance">
						<option value="peuimporteDist" selected>- Peu importe -</option>
    					<option value="dixkm">Moins de 10km</option>
    					<option value="trentekm">Moins de 30km</option>
    					<option value="cinquantekm">Moins de 50km</option>
    					<option value="centkm">Moins de 100km</option>
    					<option value="pluscentkm">100km ou plus</option>
  					</select></td>
			</tr>

			<tr class="ligne_chckbx">
  				<td>Niveau du groupe &nbsp</td>
				<td></td>
				<td>
    				<input type="checkbox" name="nivgrp" value="amateur"><div>Amateur</div>
    				<input type="checkbox" name="nivgrp" value="semipro"><div>Semi-Pro</div>
    				<input type="checkbox" name="nivgrp" value="pro"><div>Pro</div>
  				</td>
			</tr>

			<tr class="ligne_chckbx">
				<td>Style du groupe &nbsp</td>
				<td></td>
				<td> 

					<input type="checkbox" name="style" value="blues"><div>Blues</div>
					<input type="checkbox" name="style" value="classique"><div>Classique</div>
					<input type="checkbox" name="style" value="electro"><div>Electro</div>
					<input type="checkbox" name="style" value="experimental"><div>Expérimental</div> <br />
					<input type="checkbox" name="style" value="folk"><div>Folk</div>
					<input type="checkbox" name="style" value="funk"><div>Funk</div>
					<input type="checkbox" name="style" value="hardrock"><div>Hard Rock</div>
					<input type="checkbox" name="style" value="jazz"><div>Jazz</div> <br />
					<input type="checkbox" name="style" value="metal"><div>Metal</div>
					<input type="checkbox" name="style" value="pop"><div>Pop</div>
					<input type="checkbox" name="style" value="punk"><div> Punk</div>
					<input type="checkbox" name="style" value="rnb"><div>R&B</div> <br />
					<input type="checkbox" name="style" value="rap"><div>Rap</div>
					<input type="checkbox" name="style" value="rock"><div>Rock</div>
					<input type="checkbox" name="style" value="soul"><div>Soul</div>
					<input type="checkbox" name="style" value="variete"><div>Variété</div>
  				</td>
			</tr>

			</table>


			<!-- A RETIRER ENSUITE -->
			<hr>


			<table id="radio_orga"> <!-- RECHERCHE AVANCEE ORGA -->
  			<tr class="ligne_simple">
  				<td>Distance &nbsp</td>
				<td></td>
				<td>  <select name="distance">
						<option value="peuimporteDist" selected>- Peu importe -</option>
    					<option value="dixkm">Moins de 10km</option>
    					<option value="trentekm">Moins de 30km</option>
    					<option value="cinquantekm">Moins de 50km</option>
    					<option value="centkm">Moins de 100km</option>
    					<option value="pluscentkm">100km ou plus</option>
  					</select></td>
			</tr>
			</table>




			<!-- A RETIRER ENSUITE -->
			<hr>



			<table id="radio_evt"> <!-- RECHERCHE AVANCEE EVENEMENT -->
  			<tr class="ligne_simple">
  				<td>Distance &nbsp</td>
				<td></td>
				<td>  <select name="distance">
						<option value="peuimporteDist" selected>- Peu importe -</option>
    					<option value="dixkm">Moins de 10km</option>
    					<option value="trentekm">Moins de 30km</option>
    					<option value="cinquantekm">Moins de 50km</option>
    					<option value="centkm">Moins de 100km</option>
    					<option value="pluscentkm">100km ou plus</option>
  					</select></td>
			</tr>
			<tr class="ligne_simple">
  				<td>Date &nbsp</td>
				<td></td>
				<td>
					<input type="date" name="dateevt">
				</td>
			</tr>

			<tr class="ligne_chckbx">
				<td>Style du groupe &nbsp</td>
				<td></td>
				<td> 

					<input type="checkbox" name="style" value="blues"><div>Blues</div>
					<input type="checkbox" name="style" value="classique"><div>Classique</div>
					<input type="checkbox" name="style" value="electro"><div>Electro</div>
					<input type="checkbox" name="style" value="experimental"><div>Expérimental</div> <br />
					<input type="checkbox" name="style" value="folk"><div>Folk</div>
					<input type="checkbox" name="style" value="funk"><div>Funk</div>
					<input type="checkbox" name="style" value="hardrock"><div>Hard Rock</div>
					<input type="checkbox" name="style" value="jazz"><div>Jazz</div> <br />
					<input type="checkbox" name="style" value="metal"><div>Metal</div>
					<input type="checkbox" name="style" value="pop"><div>Pop</div>
					<input type="checkbox" name="style" value="punk"><div> Punk</div>
					<input type="checkbox" name="style" value="rnb"><div>R&B</div> <br />
					<input type="checkbox" name="style" value="rap"><div>Rap</div>
					<input type="checkbox" name="style" value="rock"><div>Rock</div>
					<input type="checkbox" name="style" value="soul"><div>Soul</div>
					<input type="checkbox" name="style" value="variete"><div>Variété</div>
  				</td>
			</tr>
			</table>



			<!-- A RETIRER ENSUITE -->
			<hr>

			<table id="radio_salle"> <!-- RECHERCHE AVANCEE SALLE -->
  			<tr class="ligne_simple">
  				<td>Distance &nbsp</td>
				<td></td>
				<td>  <select name="distance">
						<option value="peuimporteDist" selected>- Peu importe -</option>
    					<option value="dixkm">Moins de 10km</option>
    					<option value="trentekm">Moins de 30km</option>
    					<option value="cinquantekm">Moins de 50km</option>
    					<option value="centkm">Moins de 100km</option>
    					<option value="pluscentkm">100km ou plus</option>
  					</select></td>
			</tr>
			</table>


			<input type="submit" value="Rechercher">

		</form>
	</div>
</div>


<script>
 $(".tooltip").hover(function(){
    $(this).children(".tooltip-message").removeClass('hide');
 }, function(){
        $(this).children(".tooltip-message").addClass('hide');
 });
</script>
	<script type="text/javascript">
	$('input').click(function(){
	var type = $(elementId).attr('type');
    if(type == "radio") {
		var the_id = $(this).attr("id");
		$("table").removeClass("hide");
			$("table").not(the_id).each(function() {
				$(the_id).addClass("hide");
			});
	}
	});
	</script>
