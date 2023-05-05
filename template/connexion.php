<?php $title = "eWins | Connexion"; ?>
<?php ob_start(); ?>
    <header class="pageHeader">
        <h1>
            Connexion
        </h1>
        <img src="static/image/icon/login.svg" alt="connexion icon">
    </header>

    <section class="imageFormSection">
        <section class="imageSection">
            <img src="static/image/illustration/tennis.webp" alt="Tennis illustration">
        </section>
        <section class="formSection">
            <header>
                <h2>Connectez-vous</h2>
                <p>Pas encore inscrit ? <a href="inscription"><u>Cliquez ici</u></a> !</p>
            </header>
            <form method="POST" action=".">
                <section class="formGroup">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </section>

                <section class="formGroup">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </section>

                <button type="submit" class="submitButton">Connexion</button>
            </form>
        </section>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>