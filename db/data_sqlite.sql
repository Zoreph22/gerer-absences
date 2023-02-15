INSERT INTO Groupe (nom_groupe) VALUES
("Groupe A"),
("Groupe B"),
("Groupe C");

INSERT INTO Apprenant (code_groupe, nom_apprenant, prenom_apprenant) VALUES
(1, "Dupont", "Jean"),
(1, "Durand", "Marie"),
(2, "Martin", "Luc"),
(3, "Petit", "Jacques");

INSERT INTO Absence (code_apprenant, nb_heures_absence, date_absence) VALUES
(1, 4, "2022-12-01"),
(3, 6, "2022-12-03"),
(4, 1, "2022-12-04");