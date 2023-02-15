<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" href="static/favicon.ico">
    <title><?= $title ?></title>
    <link href="static/css/style.css" rel="stylesheet"/>
    <meta name="keywords"
          content="eWins, Tournoi en ligne, Belote, Jeu d'échecs, Tennis, Ping-Pong, FIFA, Compétitions en ligne, Stratégie de jeu, Plateforme de jeu en ligne, Défis en ligne, Belote en ligne, Jeux de cartes en ligne, Sports en ligne, Jeux vidéo en ligne">

</head>

<body>
<div class="background" id="background">

    <?php require('inc/navbar.inc.php') ?>

    <section class="pageContent">
        <?= $content ?>
    </section>

    <?php require('inc/footer.inc.php') ?>
</div>
</body>
</html>
