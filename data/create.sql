DROP TABLE Utilisateur;
DROP TABLE Contact;
DROP TABLE Booker;
DROP TABLE Groupe;
DROP TABLE BooGroupe;
DROP TABLE Organisateur;
DROP TABLE Evenement;
DROP TABLE Lieu;
DROP TABLE Salle;
DROP TABLE Scene;
DROP TABLE Passage;

CREATE TABLE Utilisateur(
	idUser  	INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	libelle 	VARCHAR(100) NOT NULL,
	description	VARCHAR(100),
	siteWeb 	VARCHAR(100),
	tel			VARCHAR(100),
	mail 		VARCHAR(100)
	-- zoneGeo
);

CREATE TABLE Contact(
	idUser1		INTEGER,
	idUser2		INTEGER,
	PRIMARY KEY (idUser1, idUser2),
	FOREIGN KEY (idUser1) REFERENCES Utilisateur(idUser),
	FOREIGN KEY (idUser2) REFERENCES Utilisateur(idUser)
);

CREATE TABLE Booker(
	idBooker	INT PRIMARY KEY NOT NULL,
	pourceCom	INTEGER,
	tailleGrp	VARCHAR(100),
	stylePref	VARCHAR(100),
	FOREIGN KEY (idBooker) REFERENCES Utilisateur(idUser)
);

CREATE TABLE Groupe(
	idGroupe	INT PRIMARY KEY NOT NULL,
	style 		VARCHAR(100),
	taille 		VARCHAR(100),
	matDispo	VARCHAR(100),
	FOREIGN KEY (idGroupe) REFERENCES Utilisateur(idUser)
);

CREATE TABLE BooGroupe(
	idGroupe	INTEGER,
	idBooker	INTEGER,
	PRIMARY KEY (idGroupe, idBooker),
	FOREIGN KEY (idGroupe) REFERENCES Groupe(idGroupe),
	FOREIGN KEY (idBooker) REFERENCES Booker(idBooker)
);



CREATE TABLE Organisateur(
	idOrga 		INTEGER PRIMARY KEY NOT NULL,
	nom			VARCHAR(100),
	prenom		VARCHAR(100),
	FOREIGN KEY (idOrga) REFERENCES Utilisateur(idUser)
);


CREATE TABLE Evenement (
	idEvenement	INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	idOrga		INTEGER NOT NULL,
	nom			VARCHAR(100),
	dateDeb		DATE,
	dateFin		DATE,
	periodeProg VARCHAR(100),
	hebergement	VARCHAR(100),
	catering	VARCHAR(100),
	remunerer 	BOOLEAN,
	matosDispo	VARCHAR(100)
	FOREIGN KEY (idOrga) REFERENCES Organisateur(idOrga)
);

CREATE TABLE Lieu(
	idLieu 		INTEGER,
	bar			  BOOLEAN,
	adresse		VARCHAR(100)
);


CREATE TABLE Salle(
	idDuLieu	INTEGER,
	idProprio	INTEGER,
	carte 		VARCHAR(100),
	description	VARCHAR(100),
	FOREIGN KEY (idProprio) REFERENCES Organisateur(idOrga),
	FOREIGN KEY (idDuLieu) REFERENCES Lieu(idLieu)

)

CREATE TABLE Scene(
	idScene 	INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	idProprio	INTEGER,
	idLieu		INTEGER,
	nomScene	VARCHAR(100),
	largeur		INTEGER,
	hauteur		INTEGER,
	longueur 	INTEGER,
	avantScene	BOOLEAN,
	plan		VARCHAR(100),
	capaPub		INTEGER,
	FOREIGN KEY (idProprio) REFERENCES Organisateur(idOrga),
	FOREIGN KEY (idLieu) REFERENCES Lieu(idLieu)
);

CREATE TABLE Passage(
	idGroupe	INTEGER,
	idEvenement	INTEGER,
	idScene		INTEGER,
	datePassage	DATE,
	dateBalance DATE,
	PRIMARY KEY(idGroupe, idEvenement, idScene),
	FOREIGN KEY (idGroupe) REFERENCES Groupe(idGroupe),
	FOREIGN KEY (idEvenement) REFERENCES Evenement(idEvenement),
	FOREIGN KEY (idScene) REFERENCES Scene(idScene)

);
