CREATE TABLE IF NOT EXISTS user
(
    uid               INT,
    email             VARCHAR(255) NOT NULL UNIQUE,
    pseudo            VARCHAR(50)  NOT NULL UNIQUE,
    name              VARCHAR(50)  NOT NULL,
    firstName         VARCHAR(50)  NOT NULL,
    password          VARCHAR(255) NOT NULL,
    salt          VARCHAR(255) NOT NULL,
    profilePictureUrl VARCHAR(100) NOT NULL,
    isActive          BIT(1) DEFAULT 1,
    isAdmin           BIT(1) DEFAULT 0,
    PRIMARY KEY (uid)
);

CREATE TABLE IF NOT EXISTS sport
(
    sid  INT,
    name VARCHAR(50) NOT NULL UNIQUE,
    PRIMARY KEY (sid)
);


CREATE TABLE IF NOT EXISTS tournament
(
    tid                 INT,
    name                VARCHAR(50) NOT NULL,
    place               INT     DEFAULT 2,
    status              TINYINT DEFAULT 0,
    isActive            BIT(1)  DEFAULT 1,
    startDate           DATE        NOT NULL,
    endRegistrationDate DATE        NOT NULL,
    sid                 INT         NOT NULL,
    uid                 INT         NOT NULL,
    PRIMARY KEY (tid),
    FOREIGN KEY (sid) REFERENCES sport (sid),
    FOREIGN KEY (uid) REFERENCES user (uid)
);

CREATE TABLE IF NOT EXISTS `match`
(
    mid     INT,
    player1 INT NOT NULL,
    player2 INT NOT NULL,
    score1  TINYINT DEFAULT 0,
    score2  TINYINT DEFAULT 0,
    winner  INT,
    nextMid INT,
    tid     INT NOT NULL,
    PRIMARY KEY (mid),
    FOREIGN KEY (tid) REFERENCES tournament (tid),
    FOREIGN KEY (player1) REFERENCES user (uid),
    FOREIGN KEY (player2) REFERENCES user (uid),
    CHECK (winner = player1 OR winner = player2)
);

CREATE TABLE IF NOT EXISTS participate
(
    uid  INT  NOT NULL,
    tid  INT  NOT NULL,
    date DATE NOT NULL,
    FOREIGN KEY (uid) REFERENCES user (uid),
    FOREIGN KEY (tid) REFERENCES tournament (tid)
);

INSERT INTO sport (sid, name)
VALUES (0, 'Belote'),
       (1, 'Jeu d’échecs'),
       (2, 'Tennis'),
       (3, 'Ping-Pong'),
       (4, 'FIFA');