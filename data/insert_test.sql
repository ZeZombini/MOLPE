--Fichier d'insert d'organisateurs/groupes/bookers pour tester les fonctionnalites

--inserer dans utilisateur, puis recuperer l'ID en fonction de l'adresse mail et inserer dans la sous-classe de l'utilisateur


delete from utilisateur;
delete from booker;
delete from groupe;
delete from organisateur;
delete from evenement;
delete from lieu;
delete from scene;
delete from possede;
delete from bookergroupe;
delete from organise;
delete from sepasseraa;
delete from estcomposede;

BEGIN;

INSERT INTO utilisateur values (1, 'zezombini@gmail.com', 'blbl', 'img-0', 'banniere-0', 'Corentin', 'Bersot','Ablblbl', 'www.boostcraft.fr', '0646730186', '0473850080', '82 rue de salins','73000',' chambery', 'France');
INSERT INTO utilisateur values (2, 'zombini@gmail.com', 'blbl', 'img-0', 'banniere-0', 'Corentin', 'Bersot','Ablblbl', 'www.boostcraft.fr', '0646730186', '0473850080', '82 rue de salins','73000',' chambery', 'France');
INSERT INTO utilisateur values (3, 'blbl@gmail.com', 'blbl', 'img-0', 'banniere-0', 'Corentin', 'Bersot','Ablblbl', 'www.boostcraft.fr', '0646730186', '0473850080', '82 rue de salins','73000',' chambery', 'France');

INSERT INTO booker values (1, 85, 'Moyen', 'Rock');
INSERT INTO groupe(iduser_groupe, style, taille, matdispo) values (2, 'Blues', 'moyen', 'Batterie');
INSERT INTO organisateur values (3);


INSERT INTO evenement(idEvenement, nom) values (1, 'Fête de la musique');
INSERT INTO lieu(idLieu, description) values (1, 'La boite à Dudulle');
INSERT INTO scene(idScene,nom,largeur,hauteur,longueur,avantScene,CapacitePublic) values (1,'Scene 1', 50, 60, 20, 1, 50);


INSERT INTO possede(idorganisateur, idlieu) values (3,1);
INSERT INTO bookergroupe(idGroupe, idBooker) values (2,1);
INSERT INTO organise(idorganisateur, idEvenement) values (3,1);
INSERT INTO SePasseraA(idEvenement, idLieu) values (1,1);
INSERT INTO EstComposeDe(idscene, idlieu) values (1,1);

COMMIT;