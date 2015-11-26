<!DOCTYPE html>

<html>
  <head>
    <title>MOLPE - Moteur d'Organisation, Listing et Partage d'Evénementiels </title>
	 <link rel="stylesheet" href="style/style.css"> 
  </head>
  
  <body>
   <?php include("header.view.php") ; ?>
   
	<div id="content">
		<div id="content-connexion">
			<h2>Connexion</h2>
			
			<form action="../controler/connexion.ctrl" method="get">
				<p>Adresse e-mail :</p>
				<input type="text" name="email"/>
				<p>Mot de passe</p>
				<input type="password" name="mdp"/>
				
				<p><a href="#">Mot de passe oublié ?</a></p>
				
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
	
	<footer>
	
	
	</footer>
  </body>
</html>