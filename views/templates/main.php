<?php
    /**
 *
 */

?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tom Troc</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css">
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Logo</a>
            <a href="index.php">Accueil</a>
            <a href="index.php">Nos Livres à l'échange</a>

            <?php
                // Si aucun utilisateur n'est connecté on affiche le bouton 'connexion',
                // Si un utilisateur est connecté on affiche
                // 'messagerie','mon compte', 'déconnexion'
                if (! isset($_SESSION['user'])) {
                    echo '<a href="index.php">Connexion</a>';
                } else {
                    echo '<a href="index.php"> Messagerie </a>';
                    echo '<a href="index.php"> Mon Compte </a>';
                    echo '<a href="index.php?action=disconnectUser"> Déconnexion </a>';
                }
            ?>
        </nav>
    </header>

    <main>
        <?php echo $content/* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <a href="index.php">Politique de confidentialité</a>
        <a href="index.php">Mentions légales</a>
        <p>TomTroc ©</p>
        <a href="index.php">Logo</a>
    </footer>

</body>
</html>