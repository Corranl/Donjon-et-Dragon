#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        id_u               Int NOT NULL ,
        nom_u              Char (5) NOT NULL ,
        mot_de_passe_u     Char (5) NOT NULL ,
        email_u            Char (5) NOT NULL ,
        personnage_final_u Char (5) NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (id_u)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sort
#------------------------------------------------------------

CREATE TABLE sort(
        id_s  Int NOT NULL ,
        nom_s Char (5) NOT NULL
	,CONSTRAINT sort_PK PRIMARY KEY (id_s)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Objet
#------------------------------------------------------------

CREATE TABLE Objet(
        id_o  Int NOT NULL ,
        nom_o Char (5) NOT NULL
	,CONSTRAINT Objet_PK PRIMARY KEY (id_o)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Skin
#------------------------------------------------------------

CREATE TABLE Skin(
        id_sk  Int NOT NULL ,
        nom_sk Char (5) NOT NULL
	,CONSTRAINT Skin_PK PRIMARY KEY (id_sk)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: caracteristique personnage
#------------------------------------------------------------

CREATE TABLE caracteristique_personnage(
        id_cp                   Int NOT NULL ,
        nom_cp                  Char (5) NOT NULL ,
        niveau_cp               Int NOT NULL ,
        age_cp                  Int NOT NULL ,
        taille_cp               Float NOT NULL ,
        poids_cp                Float NOT NULL ,
        histoire_cp             Char (5) NOT NULL ,
        trait_supplementaire_cp Char (50) NOT NULL ,
        nom_joueur_cp           Char (5) NOT NULL ,
        force_cp                Int NOT NULL ,
        dexterite_cp            Int NOT NULL ,
        constitution_cp         Int NOT NULL ,
        arme_cp                 Char (5) NOT NULL ,
        sagesse_cp              Int NOT NULL ,
        rapidite_cp             Int NOT NULL ,
        soutien_cp              Int NOT NULL ,
        endurance_cp            Int NOT NULL ,
        magie_cp                Int NOT NULL ,
        charisme_cp             Int NOT NULL ,
        intelligence_cp         Int NOT NULL ,
        id_s                    Int NOT NULL ,
        id_o                    Int NOT NULL
	,CONSTRAINT caracteristique_personnage_PK PRIMARY KEY (id_cp)

	,CONSTRAINT caracteristique_personnage_sort_FK FOREIGN KEY (id_s) REFERENCES sort(id_s)
	,CONSTRAINT caracteristique_personnage_Objet0_FK FOREIGN KEY (id_o) REFERENCES Objet(id_o)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: personnage final
#------------------------------------------------------------

CREATE TABLE personnage_final(
        id_pf            Int NOT NULL ,
        Personnage_final Char (5) NOT NULL ,
        nom_pf           Char (5) NOT NULL ,
        date_creation_pf Date NOT NULL ,
        id_u             Int NOT NULL ,
        id_cp            Int NOT NULL
	,CONSTRAINT personnage_final_PK PRIMARY KEY (id_pf)

	,CONSTRAINT personnage_final_utilisateur_FK FOREIGN KEY (id_u) REFERENCES utilisateur(id_u)
	,CONSTRAINT personnage_final_caracteristique_personnage0_FK FOREIGN KEY (id_cp) REFERENCES caracteristique_personnage(id_cp)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        id_ro  Int NOT NULL ,
        nom_ro Char (5) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (id_ro)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: attribut3
#------------------------------------------------------------

CREATE TABLE attribut3(
        id_pf Int NOT NULL ,
        id_sk Int NOT NULL
	,CONSTRAINT attribut3_PK PRIMARY KEY (id_pf,id_sk)

	,CONSTRAINT attribut3_personnage_final_FK FOREIGN KEY (id_pf) REFERENCES personnage_final(id_pf)
	,CONSTRAINT attribut3_Skin0_FK FOREIGN KEY (id_sk) REFERENCES Skin(id_sk)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contien
#------------------------------------------------------------

CREATE TABLE contien(
        id_u  Int NOT NULL ,
        id_ro Int NOT NULL
	,CONSTRAINT contien_PK PRIMARY KEY (id_u,id_ro)

	,CONSTRAINT contien_utilisateur_FK FOREIGN KEY (id_u) REFERENCES utilisateur(id_u)
	,CONSTRAINT contien_role0_FK FOREIGN KEY (id_ro) REFERENCES role(id_ro)
)ENGINE=InnoDB;