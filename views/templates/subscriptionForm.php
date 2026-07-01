<?php
    /**
 * Template pour afficher le formulaire de connexion.
 */
?>
<div class="connectContainer">
    <div class="connection-form">
        <form action="index.php?action=subscribeUser" method="post" class="foldedCorner">
            <h2>Inscription</h2>
            <div class="formGridConnect">
                <label for="name">Pseudo</label>
                <input type="text" name="name" id="name" required>
                <label for="login">Adresse email</label>
                <input type="email" name="login" id="login" required>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
                <button class="submit">S'inscrire</button>
            </div>
        </form>
        <div class="connectRedirect">
            <p>Déjà inscrit ?</p>
            <a href="index.php?action=connectionForm">Connectez-vous</a>
        </div>
    </div>
    <div class="connectImage">
        <img src="./pictures/css/connect.png" alt="Image d'une bibliothèque">
    </div>
</div>
