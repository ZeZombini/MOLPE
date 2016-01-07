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
		<form action="" method="post">
			<h3>Recherche</h3>
			<hr>
			<table id="recherche"><!-- RECHERCHE -->


			<tr class="ligne_simple">
				<td>Recherche *</td>
				<td><img src="../../data/img/question58-1.png"/><span>Entrez un ou plusieurs mots-clés.</span></td>
				<td><input id="recherche" type="text" name="recherche"/></td>
			</tr>

			<tr class="ligne_simple">
				<td>Lieu &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Entrez le nom d'une ville, d'une rue,... et sélectionnez votre choix dans la liste.</span></td>
				<td><input id="lieu" type="text" name="lieu"></td>
			</tr>

			<tr class="ligne_radio">
				<td>Vous recherchez un(e) &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Affinez votre recherche en sélecionnant un élément à rechercher. Les champs suivant s'adapteront.</span></td>
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


			<table id="radio_booker" class="hide"> <!-- RECHERCHE AVANCEE BOOKER -->
			
			<tr class="ligne_simple">
				<td>Nombre de groupes &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Nombre de groupes bookés par ce booker.</span></td>
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
				<td><img src="../../data/img/question58-1.png"/><span>Moyenne des notes obtenues par les groupes bookés par ce booker.</span></td>
				<td>  <select name="nbetoiles">
						<option value="peuimporteEt" selected>- Peu importe -</option>
    					<option value="uneetoile">1 étoile</option>
    					<option value="deuxetoiles">2 étoiles</option>
    					<option value="troisetoiles">3 étoiles</option>
    					<option value="quatreetoiles">4 étoiles</option>
    					<option value="cinqetoiles">5 étoiles</option>
  					</select></td>
  			</tr>

			<tr class="ligne_chckbx">
  				<td>Niveau des groupes &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Niveau des groupes bookés par ce booker.</span></td>
				<td>
    				<input type="checkbox" name="nivgrp" value="amateur"><div>Amateur</div>
    				<input type="checkbox" name="nivgrp" value="semipro"><div>Semi-Pro</div>
    				<input type="checkbox" name="nivgrp" value="pro"><div>Pro</div>
  				</td>
			</tr>

  			<tr class="ligne_simple">
  				<td>Distance &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Distance vous séparant du booker recherché (basé sur l'adresse fournie dans le profil)</span></td>
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
				<td><img src="../../data/img/question58-1.png"/><span>Pourcentage maximum récupéré par le booker. Seuls les bookers dont le pourcentage moyen de commission est inférieur ou égal seront affichés.</span></td>
				<td><input type="range" name="commission" min="0" max="100" step="2" value="8" onchange="updateSlider(this.value)"> <span id="sliderAmount">8%</span></td>
			</tr>

			<tr class="ligne_chckbx">
				<td>Style des groupes &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Style des groupes bookés par ce booker. Les styles non présents dans cette liste seront recherchés par défaut.</span></td>
				<td> 

					<input type="checkbox" name="style" value="blues"><div>Blues</div>
					<input type="checkbox" name="style" value="classique"><div>Classique</div>
					<input type="checkbox" name="style" value="electro"><div>Electro</div>
					<input type="checkbox" name="style" value="experimental"><div>Expérimental</div> <br />
					<input type="checkbox" name="style" value="folk"><div>Folk</div>
					<input type="checkbox" name="style" value="funk"><div>Funk</div>
					<input type="checkbox" name="style" value="hardrock"><div>Hard Rock</div>
					<input type="checkbox" name="style" value="jazz"><div>Jazz</div> <br />
					<input type="checkbox" name="style" value="metal"><div>Métal</div>
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


<!-- RECHERCHE AVANCEE GROUPE -->
			<table id="radio_groupe" class="hide"> 

  			<tr class="ligne_simple">
  				<td>Note du groupe &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Note minimale obtenue par le groupe recherché.</span></td>
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
				<td><img src="../../data/img/question58-1.png"/><span>Distance vous séparant du groupe recherché (basé sur l'adresse fournie dans le profil)</span></td>
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
				<td><img src="../../data/img/question58-1.png"/><span>Niveau du groupe recherché.</span></td>
				<td>
    				<input type="checkbox" name="nivgrp" value="amateur"><div>Amateur</div>
    				<input type="checkbox" name="nivgrp" value="semipro"><div>Semi-Pro</div>
    				<input type="checkbox" name="nivgrp" value="pro"><div>Pro</div>
  				</td>
			</tr>

			<tr class="ligne_chckbx">
				<td>Style du groupe &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Style du groupe recherché. Les styles non présents dans cette liste seront recherchés par défaut.</span></td>
				<td> 

					<input type="checkbox" name="style" value="blues"><div>Blues</div>
					<input type="checkbox" name="style" value="classique"><div>Classique</div>
					<input type="checkbox" name="style" value="electro"><div>Electro</div>
					<input type="checkbox" name="style" value="experimental"><div>Expérimental</div> <br />
					<input type="checkbox" name="style" value="folk"><div>Folk</div>
					<input type="checkbox" name="style" value="funk"><div>Funk</div>
					<input type="checkbox" name="style" value="hardrock"><div>Hard Rock</div>
					<input type="checkbox" name="style" value="jazz"><div>Jazz</div> <br />
					<input type="checkbox" name="style" value="metal"><div>Métal</div>
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


<!-- RECHERCHE AVANCEE ORGA -->
			<table id="radio_orga" class="hide"> 
  			<tr class="ligne_simple">
  				<td>Distance &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Distance vous séparant de l'organisateur recherché (basé sur l'adresse fournie dans le profil)</span></td>
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


<!-- RECHERCHE AVANCEE EVENEMENT -->
			<table id="radio_evt" class="hide"> 
  			<tr class="ligne_simple">
  				<td>Distance &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Distance vous séparant de l'évènement recherché (basé sur l'adresse fournie dans le profil)</span></td>
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
				<td><img src="../../data/img/question58-1.png"/><span>Date à laquelle l'évènement recherché aura ou a eu lieu.</span></td>
				<td>
					<input type="date" name="dateevt">
				</td>
			</tr>

			<tr class="ligne_chckbx">
				<td>Style de l'évènement &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Style de l'évènement recherché. Les styles non présents dans cette liste seront recherchés par défaut.</span></td>
				<td> 

					<input type="checkbox" name="style" value="blues"><div>Blues</div>
					<input type="checkbox" name="style" value="classique"><div>Classique</div>
					<input type="checkbox" name="style" value="electro"><div>Electro</div>
					<input type="checkbox" name="style" value="experimental"><div>Expérimental</div> <br />
					<input type="checkbox" name="style" value="folk"><div>Folk</div>
					<input type="checkbox" name="style" value="funk"><div>Funk</div>
					<input type="checkbox" name="style" value="hardrock"><div>Hard Rock</div>
					<input type="checkbox" name="style" value="jazz"><div>Jazz</div> <br />
					<input type="checkbox" name="style" value="metal"><div>Métal</div>
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




 <!-- RECHERCHE AVANCEE SALLE -->
			<table id="radio_salle" class="hide">
  			<tr class="ligne_simple">
  				<td>Distance &nbsp</td>
				<td><img src="../../data/img/question58-1.png"/><span>Distance vous séparant de la salle recherchée (basé sur l'adresse fournie dans le profil)</span></td>
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

 <script type="text/javascript">
 $('input').click(function(){
  var type = $(this).attr('type');
     if(type == "radio") {
   var the_id = $(this).attr("id");
   if(the_id == 'radio_tous') {
    $("table").each(function() {
    	if($(this).attr("id") == "recherche"){
     		$(this).removeClass("hide");
     		$(this).addClass("show");
     	}else{
     		$(this).removeClass("show");
     		$(this).addClass("hide");
     	}
    });
   } else {
    $("table").not(the_id).each(function() {
    	if($(this).attr("id") == "recherche"){
     		$(this).removeClass("hide");
     		$(this).addClass("show");
     	}else{
     		$(this).removeClass("show");
     		$(this).addClass("hide");
     	}
    });
    $("table#"+the_id).removeClass("hide");
    $("table#"+the_id).addClass("show");
   }
  }
 });
 </script>