<?php $title = "eWins | Inscription"; ?>
<?php ob_start(); ?>
<header class="pageHeader">
    <h1>
        Inscription
    </h1>
    <img src="../static/image/icon/register.svg" alt="inscription icon">
</header>

<section class="imageFormSection">
    <section class="imageSection">
        <img src="../static/image/illustration/welcome.svg" alt="bienvenue">
    </section>
    <section class="formSection">
        <header>
            <h2>Complétez le formulaire pour vous inscrire</h2>
            <p>Déjà inscrit ? <a href="connexion"><u>Cliquez ici</u></a> !</p>
        </header>
        <form action="" class="registerForm">

            <section class="formGroup">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required>
            </section>

            <section class="formGroup">
                <label for="firstName">Prénom</label>
                <input type="text" id="firstName" name="firstName" required>
            </section>

            <section class="formGroup">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </section>

            <section class="formGroup">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" required>
            </section>

            <section class="formGroup">
                <label for="password">Mot de passe</label>
                <input type="text" id="password" name="password" required>
            </section>

            <section class="formGroup">
                <label for="confirmPassword">Confirmez votre mot de passe</label>
                <input type="text" id="confirmPassword" name="confirmPassword" required>
            </section>

            <section class="formGroup">
                <label for="profilePicture">Photo de profil</label>
                <input type="file" id="profilePicture" name="profilePicture" required>
            </section>
            <button type="submit" class="submitButton">Inscription</button>
        </form>
    </section>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>