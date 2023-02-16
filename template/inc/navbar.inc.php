<nav class="navBar">
    <section class="firstLine">
        <a href="/"><img src="../../static/image/eWins.png" alt="eWins logo complet"></a>
        <ul>
            <li>

                <a href="inscription"
                    <?php if ($currentPath === 'inscription'): ?>
                        class="backgroundBrown"
                    <?php endif; ?>
                >
                    Inscription
                </a>
            </li>
            <li>
                <a href="connexion"
                    <?php if ($currentPath === 'connexion'): ?>
                        class="backgroundBrown"
                    <?php endif; ?>
                >
                    Connexion
                </a>
            </li>
        </ul>
    </section>
    <section class="secondLine">
        <form>
            <button type="submit"><img src="../../static/image/icon/search.svg" alt="recherche icon"></button>
            <input type="text" placeholder="Rechercher un tournoi..." name="rechercherTournoi">
        </form>
        <ul>
            <li>
                <a href="/"
                    <?php if ($currentPath === ''): ?>
                        class="backgroundBrown"
                    <?php endif;
                    ?>
                >
                    Accueil</a></li>
            <li>
                <a href="tournois"
                    <?php if ($currentPath === 'tournois'): ?>
                        class="backgroundBrown"
                    <?php endif;
                    ?>
                >
                    Tournois
                </a>
            </li>
            <li>
                <a href="contact"
                    <?php if ($currentPath === 'contact'): ?>
                        class="backgroundBrown"
                    <?php endif;
                    ?>
                >
                    Contact</a>
            </li>
        </ul>
    </section>
</nav>