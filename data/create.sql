DROP TABLE Utilisateur;
DROP TABLE Contact;
DROP TABLE Booker;
DROP TABLE Groupe;
DROP TABLE BookerGroupe;
DROP TABLE Organisateur;
DROP TABLE Evenement;
DROP TABLE Lieu;
DROP TABLE Salle;
DROP TABLE Scene;
DROP TABLE Passage;
DROP TABLE Possede;
DROP TABLE Organise;
DROP TABLE SePasseraA;
DROP TABLE EstComposeDe;

CREATE TABLE Utilisateur(
	idUser  	INTEGER(10) PRIMARY KEY AUTOINCREMENT NOT NULL,
	mail	VARCHAR(100) NOT NULL,	--UNIQUE
	motDePasse		VARCHAR(255) NOT NULL,
	imageProfil   VARCHAR(255) NOT NULL,
	banniere		VARCHAR(100) NOT NULL,
	prenom		VARCHAR(255) NOT NULL,
	nom		VARCHAR(255),
	description		VARCHAR(255),
	siteWeb 	VARCHAR(100),
	tel		VARCHAR(10),
	adresse		VARCHAR(100),
	codePostal		VARCHAR(5),
	ville		VARCHAR(100),
	pays		VARCHAR(100)
);

CREATE TABLE Contact(
	idUser1		INTEGER(10) NOT NULL,
	idUser2		INTEGER(10) NOT NULL,
	PRIMARY KEY (idUser1, idUser2),
	FOREIGN KEY (idUser1) REFERENCES Utilisateur(idUser),
	FOREIGN KEY (idUser2) REFERENCES Utilisateur(idUser)
);

CREATE TABLE Booker(
	idUser_Booker	INTEGER(100) PRIMARY KEY NOT NULL,
	pourcentageCom	INTEGER(3),
	tailleGrp	VARCHAR(50),
	stylePref	VARCHAR(255),
	FOREIGN KEY (idUser_Booker) REFERENCES Utilisateur(idUser)
);

CREATE TABLE Groupe(
	idUser_Groupe	INTEGER(10) PRIMARY KEY NOT NULL,
	style 		VARCHAR(255),
	taille 		VARCHAR(255),
	matDispo	VARCHAR(255),
	ficheTech		VARCHAR(255),
	FOREIGN KEY (idUser_Groupe) REFERENCES Utilisateur(idUser)
);

CREATE TABLE BookerGroupe(
	idGroupe	INTEGER(10) NOT NULL,
	idBooker	INTEGER(10) NOT NULL,
	PRIMARY KEY (idGroupe, idBooker),
	FOREIGN KEY (idGroupe) REFERENCES Groupe(idUser_Groupe),
	FOREIGN KEY (idBooker) REFERENCES Booker(idUser_Booker)
);

CREATE TABLE Organisateur(
	idUser_Organisateur 		INTEGER PRIMARY KEY NOT NULL,
	FOREIGN KEY (idUser_Organisateur) REFERENCES Utilisateur(idUser)
);

CREATE TABLE Evenement (
	idEvenement	INTEGER(10) PRIMARY KEY AUTOINCREMENT NOT NULL,
	nom			VARCHAR(255) NOT NULL,
	dateDeb		DATE NOT NULL,
	dateFin		DATE NOT NULL,
	periodeProgDeb DATE,
	periodeProgFin DATE,
	hebergement	VARCHAR(255),
	catering	VARCHAR(255),
	remunerer 	BOOLEAN NOT NULL,
	matosDispo	VARCHAR(255)
);

CREATE TABLE Lieu(
	idLieu 		INTEGER(20) PRIMARY KEY AUTOINCREMENT NOT NULL,
	bar			  BOOLEAN NOT NULL,
	adresse		VARCHAR(255) NOT NULL
);

CREATE TABLE Salle(
	idLieu INTEGER(20) NOT NULL,
	idSalle INTEGER(20) NOT NULL,
	description VARCHAR(255),
	PRIMARY KEY (idLieu, idSalle),
	FOREIGN KEY (idLieu) REFERENCES Lieu(idLieu)
);

CREATE TABLE Scene(
	idScene 	INTEGER(20) PRIMARY KEY AUTOINCREMENT NOT NULL,
	nom VARCHAR(255),
	largeur INTEGER(4) NOT NULL,
	hauteur INTEGER(4) NOT NULL,
	longueur INTEGER(4) NOT NULL,
	avantScene BOOLEAN NOT NULL,
	plan VARCHAR(255),
	capacitePublic INTEGER(10)
);

CREATE TABLE Passage(
	idEvenement INTEGER(20) NOT NULL,
	idScene INTEGER(20) NOT NULL,
	idGroupe INTEGER(10) NOT NULL
	datePassage	DATE,
	dateBalances DATE,
	PRIMARY KEY(idEvenement,idScene,isGroupe),
	FOREIGN KEY (idGroupe) REFERENCES Groupe(idUser_Groupe),
	FOREIGN KEY (idEvenement) REFERENCES Evenement(idEvenement),
	FOREIGN KEY (idScene) REFERENCES Scene(idScene)
);

CREATE TABLE Possede(
	idOrganisateur INTEGER(10) NOT NULL,
	idLieu INTEGER(20) NOT NULL,
	PRIMARY KEY (idOrganisateur,vidLieu),
	FOREIGN KEY (idOrganisateur) REFERENCES Organisateur(idUser_Organisateur),
	FOREIGN KEY (idLieu) REFERENCES Lieu(idLieu)
);

CREATE TABLE Organise(
	idOrganisateur INTEGER(10) NOT NULL,
	idEvenement INTEGER(20) NOT NULL,
	PRIMARY KEY (idOrganisateur, idEvenement),
	FOREIGN KEY (idOrganisateur) REFERENCES Organisateur(idUser_Organisateur),
	FOREIGN KEY (idEvenement) REFERENCES Evenement(idEvenement)
);

CREATE TABLE SePasseraA(
	idEvenement INTEGER(20) NOT NULL,
	idLieu INTEGER(20) NOT NULL,
	PRIMARY KEY (idEvenement, idLieu),
	FOREIGN KEY (idEvenement) REFERENCES Evenement(idEvenement),
	FOREIGN KEY (idLieu) REFERENCES Lieu(idLieu)
);

CREATE TABLE EstComposeDe(
	idScene INTEGER(20) NOT NULL,
	idLieu INTEGER(20) NOT NULL,
	PRIMARY KEY (idScene, idLieu),
	FOREIGN KEY (idScene) REFERENCES Scene(idScene),
	FOREIGN KEY (idLieu) REFERENCES Lieu(idLieu)
);
