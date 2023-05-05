<?php $title = "eWins"; ?>
<?php ob_start(); ?>

<main class="homeMain">
    <section class="mainContent">
        <section class="left">
            <img src="static/image/illustration/tournament.svg" alt="tournoi illustration">
        </section>
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
        <img src="static/image/icon/heart.svg" alt="coeur">
        <h2>Notre plateforme a déjà accueilli 45 tournois jusqu'à présent, avec encore plus à venir !</h2>
    </footer>
</main>
<section class="newestTournament">

    <header class="newestTournamentTitle">
        <img src="static/image/icon/right-arrows.svg" alt="flèches droites">
        <h2>Nouveaux tournois</h2>
        <img src="static/image/icon/left-arrows.svg" alt="flèches gauches">
    </header>
    <section class="tournamentsList">
        <?php for($i = 0; $i < 5; $i++){
            require('inc/tournament-article.inc.php');
        } ?>
    </section>
</section>
<section class="joinOurSocial">
    <h2>
        Rejoignez notre communauté en ligne sur les réseaux <br>
        sociaux pour rester connecté et être informé des <br>
        dernières actualités et événements
    </h2>
    <section class="socialIcons">
        <a href="">
        <img src="static/image/icon/facebook.webp" alt="facebook">
        </a>
        <a href="">
            <img src="static/image/icon/twitter.webp" alt="twitter">
        </a>
    </section>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
