<?php $title = "eWins"; ?>
<?php ob_start(); ?>

<main class="homeMain">
    <section class="mainContent">
        <img src="../static/image/tournament-illustration.svg" alt="tournoi illustration" class="left">
        <section class="right">
            <h1>Bienvenue sur EWins</h1>
            <h2>
                Inscrivez-vous et participez en ligne à <br>
                nos tournois passionnants dès maintenant!
            </h2>
            <a href="">
                Liste des tournois
            </a>
        </section>
    </section>
    <footer>
        <img src="../static/image/heart.svg" alt="heart">
        <h2>Notre plateforme a déjà accueilli 45 tournois jusqu'à présent, avec encore plus à venir !</h2>
    </footer>
</main>


<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
