DROP TABLE IF EXISTS PanierVisiteurAchat ;
DROP TABLE IF EXISTS PanierClientAchat ;
DROP TABLE IF EXISTS PanierVisiteur ;
DROP TABLE IF EXISTS PanierClient ;
DROP TABLE IF EXISTS SessionV ;
DROP TABLE IF EXISTS Compte ;
DROP TABLE IF EXISTS Stock ;
DROP TABLE IF EXISTS Produit ;
DROP TABLE IF EXISTS Categorie ;
DROP TABLE IF EXISTS Role ;




CREATE TABLE Categorie(
	NumCategorie Integer primary key auto_increment,
	NomCategorie VarChar(50)
);

CREATE TABLE Role(
	NumRole Integer primary key auto_increment,
	NomRole VarChar(50)
);

Create Table Produit (
	NumProduit Integer primary key auto_increment,
	NomPRoduit Varchar(40) NOT NULL,
	Prix Decimal ,
	NumCategorie Integer NOT NULL,
	Stock Integer NOT NULL,
	Foreign Key (NumCategorie) references Categorie(NumCategorie)
);
CREATE Table Stock (
	NumProduit Integer ,
	Stock Integer,
	DateStock DATE,
	primary key (NumProduit, DateStock),
	Foreign Key (NumProduit) references Produit(NumProduit)
);


CREATE Table Compte(
	NumCompte integer primary key auto_increment,
	Nom Varchar(40),
	Email Varchar(50),
	MotDePasse Varchar(256),
	NumRole integer,
	FOREIGN KEY (NumRole) references Role (NumRole)
);
CREATE Table SessionV(
	NumSession integer primary key,
	NumCompte integer DEFAULT NULL,
	FOREIGN KEY (NumCompte) references Compte (NumCompte)
);

 CREATE Table PanierClient(
	NumPanier integer primary key auto_increment,
	NumCompte integer,
	Valide boolean not null default 0,
	Foreign key (NumCompte) references Compte(NumCompte)
 );
CREATE Table PanierVisiteur(
	NumPanier integer primary key auto_increment,
	NumSession integer,
	Foreign key (NumSession) references SessionV(NumSession)
 );

CREATE Table PanierVisiteurAchat(
	NumPanier integer,
	NumProduit integer,
	Quantite integer,
	primary key (NumPanier, NumProduit),
	Foreign key (NumPanier) references PanierVisiteur(NumPanier),
	Foreign key (NumProduit) references Produit(NumProduit)		
 );

CREATE Table PanierClientAchat(
	NumPanier integer,
	NumProduit integer,
	Quantite integer,
	primary key (NumPanier, NumProduit),
	Foreign key (NumPanier) references PanierClient (NumPanier),
	Foreign key (NumProduit) references Produit(NumProduit)
 );