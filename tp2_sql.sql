DROP DATABASE IF EXISTS tp2db;
CREATE DATABASE tp2db;
USE tp2db;

CREATE TABLE Personne (
                          Identifiant VARCHAR(255) UNIQUE NOT NULL PRIMARY KEY,
                          MotDePasse VARCHAR(255) NOT NULL
);

CREATE TABLE Article (
                         Id INT UNIQUE NOT NULL AUTO_INCREMENT PRIMARY KEY,
                         Entete TEXT,
                         Contenu TEXT,
                         Pied TEXT
);

INSERT INTO Personne (
    Identifiant,
    MotDePasse
) VALUES (
             'admin',
             /* Mot de passe est :    password123    */
             '$2y$10$ip2UVnDZmFR3M0tkpqC2hO1LRSEo7JBdtJgzMXvow12ud0OKW8Lgm'
         );

INSERT INTO Personne (
    Identifiant,
    MotDePasse
) VALUES (
             'pberube',
             /* Mode de passe est :    12345    */
             '$2y$10$el0yqq2Hnl2mydEHrKdO1OEBwMY9/i/V/htXTk.1Rogg9t6zYYZQK'
         );

INSERT INTO Article (
    Entete,
    Contenu,
    Pied
) VALUES (
             'Claudette Colvin',
             'Claudette Colvin, née le 5 septembre 1939 à Montgomery dans l\'État de l\'Alabama, est une Afro-Américaine qui, à l\'âge de 15 ans, est devenue célèbre pour avoir refusé, le 2 mars 1955, de laisser son siège à une Blanche dans un autobus, cela en violation des lois Jim Crow des États du Sud qui imposaient la ségrégation raciale dans les transports publics. ',
             'Source originale : https://fr.wikipedia.org/wiki/Claudette_Colvin'
         );

INSERT INTO Article (
    Entete,
    Contenu,
    Pied
) VALUES (
             'La Commune de Paris',
             'La Commune de Paris est la plus importante des communes insurrectionnelles de France en 1870-1871, qui dura 72 jours, du 18 mars 1871 à la « Semaine sanglante » du 21 au 28 mai 1871. Cette insurrection refusa de reconnaître le gouvernement issu de l\'Assemblée nationale, qui venait d\'être élu au suffrage universel masculin, et choisit d\'ébaucher pour la ville une organisation de type libertaire, basée sur la démocratie directe, qui donnera naissance au communalisme. Ce projet d\'organisation politique visant à unir les différentes communes insurrectionelles ne sera jamais mis en oeuvre du fait de leur écrasement par la campagne de 1871 à l\'intérieur dont la Semaine sanglante constitue l\'épisode parisien et la répression la plus célèbre.',
             'Source originale : https://fr.wikipedia.org/wiki/Commune_de_Paris'
         );