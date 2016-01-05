--Fichier d'insert d'organisateurs/groupes/bookers pour tester les fonctionnalites

--inserer dans utilisateur, puis recuperer l'ID en fonction de l'adresse mail et inserer dans la sous-classe de l'utilisateur



INSERT INTO utilisateur values (1, "zezombini@gmail.com", "blbl", "img-0", "banniere-0", "Corentin", "Bersot",
	"Ablblbl", "www.boostcraft.fr", "0646730186", "0473850080", "82 rue de salins","73000"," chambery", "France");
INSERT INTO utilisateur values (2, "zezombini@gmail.com", "blbl", "img-0", "banniere-0", "Corentin", "Bersot",
	"Ablblbl", "www.boostcraft.fr", "0646730186", "0473850080", "82 rue de salins","73000"," chambery", "France");
INSERT INTO utilisateur values (3, "zezombini@gmail.com", "blbl", "img-0", "banniere-0", "Corentin", "Bersot",
	"Ablblbl", "www.boostcraft.fr", "0646730186", "0473850080", "82 rue de salins","73000"," chambery", "France");




INSERT INTO booker values (1, 85, "Moyen", "Rock");
INSERT INTO groupe values (2, "Blues", "moyen", "Batterie", "");
INSERT INTO organisateur values (3);


INSERT INTO evenement(idEvenement, nom) values (1, "Fête de la musique");

INSERT INTO lieu(idLieu, description) values (1, "La boite à Dudulle");
INSERT INTO possede values (3,1);




