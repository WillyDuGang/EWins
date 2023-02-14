<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" href="static/favicon.ico">
    <title><?= $title ?></title>
    <link href="static/css/style.css" rel="stylesheet"/>
    <meta name="keywords"
          content="eWins, Tournoi en ligne, Belote, Jeu d'échecs, Tennis, Ping-Pong, FIFA, Compétitions en ligne, Stratégie de jeu, Plateforme de jeu en ligne, Défis en ligne, Belote en ligne, Jeux de cartes en ligne, Sports en ligne, Jeux vidéo en ligne">
    <script>
        setTimeout(() => {
            let scroll = localStorage.getItem('scroll');
            if (scroll)
                document.getElementById("background").scrollTo(0, +scroll)
        }, 0)

        setInterval(function() {
            const element = document.getElementById("background");
            const sTop = element.scrollTop;
            console.log(sTop)
            localStorage.setItem('scroll', sTop.toString());
            location.reload();
        }, 3000);
    </script>
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
