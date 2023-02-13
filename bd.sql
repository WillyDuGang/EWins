CREATE TABLE IF NOT EXISTS utilisateur
(
    uid             INT,
    courriel        VARCHAR(255) NOT NULL,
    pseudo          VARCHAR(50)  NOT NULL,
    nom             VARCHAR(50)  NOT NULL,
    prenom          VARCHAR(50)  NOT NULL,
    motDePasse      VARCHAR(255) NOT NULL,
    urlPhoto        VARCHAR(100) NOT NULL,
    estActif        BIT(1) DEFAULT 1,
    estOrganisateur BIT(1) DEFAULT 0,
    PRIMARY KEY (uid)
);

CREATE TABLE IF NOT EXISTS sport
(
    sid INT,
    nom VARCHAR(50) NOT NULL,
    PRIMARY KEY (sid)
);


CREATE TABLE IF NOT EXISTS tournoi
(
    tid                INT,
    nom                VARCHAR(50) NOT NULL,
    PlacesDisponibles  INT                                                                  DEFAULT 2,
    statut             ENUM ('ouvert', 'fermé', 'clôturé', 'généré', 'en-cours', 'terminé') DEFAULT 'ouvert',
    estActif           BIT(1)                                                               DEFAULT 1,
    dateTournoi        DATE        NOT NULL,
    dateFinInscription DATE        NOT NULL,
    sid                INT         NOT NULL,
    uid                INT         NOT NULL,
    PRIMARY KEY (tid),
    FOREIGN KEY (sid) REFERENCES sport (sid),
    FOREIGN KEY (uid) REFERENCES utilisateur (uid)
);

CREATE TABLE IF NOT EXISTS rencontre
(
    rid         INT,
    joueur1     INT NOT NULL,
    joueur2     INT NOT NULL,
    scoreJ1     TINYINT DEFAULT 0,
    scoreJ2     TINYINT DEFAULT 0,
    vainqueur   INT,
    rid_suivant INT,
    tid         INT NOT NULL,
    PRIMARY KEY (rid),
    FOREIGN KEY (tid) REFERENCES tournoi (tid),
    FOREIGN KEY (joueur1) REFERENCES utilisateur (uid),
    FOREIGN KEY (joueur2) REFERENCES utilisateur (uid),
    CHECK (vainqueur = joueur1 OR vainqueur = joueur2)
);

CREATE TABLE IF NOT EXISTS participer
(
    uid             INT  NOT NULL,
    tid             INT  NOT NULL,
    dateInscription DATE NOT NULL,
    FOREIGN KEY (uid) REFERENCES utilisateur (uid),
    FOREIGN KEY (tid) REFERENCES tournoi (tid)
);

INSERT INTO sport (sid, nom)
VALUES (0, 'Belote'),
       (1, 'Jeu d’échecs'),
       (2, 'Tennis'),
       (3, 'Ping-Pong'),
       (4, 'FIFA');