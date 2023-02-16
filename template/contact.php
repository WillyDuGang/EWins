<?php $title = "eWins | Contact"; ?>
<?php ob_start(); ?>
    <header class="pageHeader">
        <h1>
            Contact
        </h1>
        <img src="../static/image/icon/contact.svg" alt="contact icon">
    </header>

    <section class="imageFormSection">
        <section class="imageSection">
            <img src="../static/image/illustration/contact.svg" alt="contact illustration">
        </section>
        <section class="formSection">
            <header>
                <h2>Contactez-nous</h2>
                <p>Veuillez remplir le formulaire ci-dessous pour nous envoyer un message.</p>
            </header>
            <form action="">

                <section class="formGroup">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </section>

                <section class="formGroup">
                    <label for="subject">Objet</label>
                    <input type="text" id="subject" name="subject" required>
                </section>

                <section class="formGroup">
                    <label for="password">Mot de passe</label>
                    <textarea name="password" id="password" rows="10" ></textarea>
                </section>

                <button type="submit" class="submitButton">Envois de votre message</button>
            </form>
        </section>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>