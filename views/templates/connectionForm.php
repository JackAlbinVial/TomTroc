<?php
    /**
 * Template pour afficher le formulaire de connexion.
 */
?>
<div class="connectContainer">
    <div class="connection-form">
        <form action="index.php?action=connectUser" method="post" class="foldedCorner">
            <h2>Connexion</h2>
            <div class="formGridConnect">
                <label for="login">Adresse email</label>
                <input type="email" name="login" id="login" required>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
                <button class="submit">Se connecter</button>
            </div>
        </form>
        <div class="connectRedirect">
            <p>Pas de compte ?</p>
            <a href="index.php?action=subscriptionForm">Inscrivez-vous</a>
        </div>
    </div>
    <div class="connectImage">
        <img src="./pictures/css/connect.png" alt="Image d'une bibliothèque">
    </div>
</div>
