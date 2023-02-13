<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" href="static/favicon.ico">
    <title><?= $title ?></title>
    <link href="static/css/style.css" rel="stylesheet"/>
    <meta name="keywords" content="eWins, Tournoi en ligne, Belote, Jeu d'échecs, Tennis, Ping-Pong, FIFA, Compétitions en ligne, Stratégie de jeu, Plateforme de jeu en ligne, Défis en ligne, Belote en ligne, Jeux de cartes en ligne, Sports en ligne, Jeux vidéo en ligne">
</head>

<body>
<div class="background">

    <nav class="navBar">
        <div class="navLeft">
            <a href="index.php"><img src="static/image/eWins.png" alt="eWins" class="navLogo"></a>
        </div>
        <ul class="navRight">
            <li class="navItem">
                <a href="index.php?action=contact" class="navLink">Contact</a>
            </li>
            <li class="navItem">
                <a href="index.php?action=tournois" class="navLink">Tournois</a>
            </li>
            <li class="navItem">
                <a href="index.php?action=inscription" class="navLink">Inscription</a>
            </li>
            <li class="navItem">
                <a href="index.php?action=connexion" class="navLink">Connexion</a>
            </li>

        </ul>
    </nav>
    <nav class="categoryNav pageContent">
        <ul>
            <li><a href="">Toute</a></li>
            <li><a href="">Belote</a></li>
            <li><a href="">Jeu d'échecs</a></li>
            <li><a href="">Tennis</a></li>
            <li><a href="">Ping-Pong</a></li>
            <li><a href="">Fifa</a></li>
        </ul>
    </nav>

    <footer class="footer">
        <section class="col1">
            <h4>Naviguez vers</h4>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Tournois</a></li>
                <li><a href="">Inscription</a></li>
                <li><a href="index.php?action=post">Connexion</a></li>
                <li><a href="">Belote</a></li>
                <li><a href="">Jeu d'échecs</a></li>
                <li><a href="">Tennis</a></li>
                <li><a href="">Ping-Pong</a></li>
                <li><a href="">Fifa</a></li>
            </ul>
        </section>
        <section class="logoSection">
            <img src="static/image/eW.png" alt="eWins logo">
        </section>
        <section class="descriptionSection">
            <h4>A propose de nous</h4>
            <p>eWins est une plateforme qui permet de consulter des tournois en direct et rapidement. Nous sommes une
                jeune entreprise composés d'une équipe très actif et on repond à tous vos questions dans un délais de
                24h.
            </p>
        </section>
    </footer>
</div>
</body>
</html>
