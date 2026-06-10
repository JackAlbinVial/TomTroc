<?php

    /** Page principale */

?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tom Troc <?php echo $title ?></title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css">

</head>

<body>
    <header>
        <nav>
            <a href="index.php">Logo</a>
            <a href="index.php">Accueil</a>
            <a href="index.php?action=book">Nos Livres à l'échange</a>

            <?php
                // Si aucun utilisateur n'est connecté on affiche le bouton 'connexion',
                // Si un utilisateur est connecté on affiche
                // 'messagerie','mon compte', 'déconnexion'
                if (! isset($_SESSION['user'])) {
                    echo '<a href="index.php?action=connectionForm">Connexion</a>';
                } else {
                    echo '<a href="index.php"> <i class="fi fi-rr-beacon"></i> Messagerie </a>';
                    echo '<a href="index.php?action=userProfile"> <i class="fi fi-rr-user"></i> Mon Compte </a>';
                    echo '<a href="index.php?action=disconnectUser"> Déconnexion </a>';
                }
            ?>
        </nav>
    </header>

    <main>
        <?php echo $content/* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <a href="#">Politique de confidentialité</a>
        <a href="#">Mentions légales</a>
        <p>TomTroc ©</p>
        <a href="index.php">Logo</a>
    </footer>
</body>
</html>