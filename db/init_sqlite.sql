DROP TABLE IF EXISTS Apprenant;
DROP TABLE IF EXISTS Groupe;
DROP TABLE IF EXISTS Absence;

CREATE TABLE Apprenant (
  code_apprenant      INTEGER PRIMARY KEY AUTOINCREMENT,
  code_groupe         INTEGER,
  nom_apprenant       VARCHAR(200) NOT NULL,
  prenom_apprenant    VARCHAR(200) NOT NULL,
  CONSTRAINT FK_GroupeApprenant_Groupe FOREIGN KEY (code_groupe) REFERENCES Groupe(code_groupe)
);

CREATE TABLE Groupe (
  code_groupe         INTEGER PRIMARY KEY AUTOINCREMENT,
  nom_groupe          VARCHAR(200) NOT NULL
);

CREATE TABLE Absence (
  code_absence        INTEGER PRIMARY KEY AUTOINCREMENT,
  code_apprenant      INTEGER,
  nb_heures_absence   INTEGER NOT NULL,
  date_absence        DATE NOT NULL,
  CONSTRAINT FK_ApprenantAbsences_Apprenant FOREIGN KEY (code_apprenant) REFERENCES Apprenant(code_apprenant) ON DELETE CASCADE
);