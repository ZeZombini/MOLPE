<?php
// 	/* L'ensemble de donn�es � remplir */
// 	$data['nom']					= "Not Bad";
// 	$data['ville']				= "Grenoble (+- 30km)";
// 	$data['style']					= "Rock";
// 	$data['type']					= "groupe";
// 	$data['groupePref']				= null;
// 	$data['pourcentageCommission']	= null;
// 	$data['desc']					= "Groupe multiculturel ind�pendant fran�ais form� en 2013.<br>Ad�le Christin<br>Bla bla<br>Bla bla bla<br>Bla bla<br>";
// 	$data['matosDispo'] 			= "Batterie";
// 	$data['telephone']				= "06.02.03.05.09";
// 	$data['site']					= "http://www.youtube.com/channel/notbadrecords";
// 	$data['email'] 					= "notbadrecords38@gmail.com";


?>

<div id="content">
	<div id="fiche-contact">
		<img class="banniere_profil" src="$config['project_path']/view/style/img/">
		<div id="fiche-contact-top">
			<img class="img-profil" src="$config['project_path']view/style/img/noimage.jpg"/>
			<h3>Lorem Ipsum</h3>
			<p><?=$data['type']?></p>
			<p>Vous êtes booker de ce groupe</p>
		</div>
		<div id="information-contact">
			<div>
				<h4>Informations</h4>
				<hr>
			<?php if($data['ville']) : ?>
				<p>Ville : <?=$data['ville']?></p>
			<?php endif; if($data['style']) : ?>
				<p>Style musical préféré : <?=$data['style']?></p>
			<?php endif; if($data['site']) :?>
				<p>Site web : <a href="<?=$data['site']?>"><?=$data['site']?></a></p>
			<?php endif; if($data['desc']) :?>
				<p>Description : <?=$data['desc']?></p>
			<?php endif ?>
			
			</div>

		<?php if ($data['type'] == "Organisateur" && $data['evenement'] != null) : ?>
			<div>
				<h4>Evènements</h4>
				<hr>
				<div class="evenement">
					<p><?=$data['evenement']['nom']?></p>
					<p class="data"><?=$data['evenement']['date']?>, à <?=$data['evenement']['ville']?></p>
					<p>Artiste présent : <?=$data['evenement']['artistes']?></p>
					<p>Adresse : <?=$data['evenement']['adresse']?></p>
				</div>
			</div>
		<?php endif; if ($data['type'] == "Organisateur" && $data['salle'] != null) : ?>
			<div>
				<h4>Salle</h4>
				<hr>
				<div class="salle">
					<p><?=$data['salle']['nom']?></p>
					<p class="data"><?=$data['salle']['date']?>, à <?=$data['salle']['ville']?></p>
					<p>Description : <?=$data['salle']['desc']?></p>
				</div>
			</div>

		<?php endif; if ($data['type'] == "Booker" && $data['groupeGéré'] != null) : ?>
			<?php foreach ($data['groupeGéré'] as $grp) {
				echo "<img href=\"".$grp['img']."\"/>";
			} ?>
		<?php endif;?>


			<div id="fiche-contact-contact">
				<h4>Contact</h4>
				<hr>
			<?php if($data['tel']) : ?>
				<p>Telephone : <?=$data['tel']?></p>
			<?php endif; if($data['mail']) : ?>
				<p>Email : <?=$data['mail']?></p>
			<?php endif; ?>
			</div>

		</div>
	</div>
</div>
