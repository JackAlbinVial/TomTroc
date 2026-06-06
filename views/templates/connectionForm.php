<?php
    /**
 * Template pour afficher le formulaire de connexion.
 */
?>

<div class="connection-form">
    <form action="index.php?action=connectUser" method="post" class="foldedCorner">
        <h2>Connexion
            <?php
                if (isset($_SESSION['user'])) {
                    echo ' - connecté';
            }
            ?></h2>
        <div class="formGrid">
            <label for="login">Adresse email</label>
            <input type="email" name="login" id="login" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            <button class="submit">Se connecter</button>
        </div>
    </form>
    <p>Pas de compte ?</p>
    <a href="index.php?action=subscriptionForm">Inscrivez-vous</a>
</div>

