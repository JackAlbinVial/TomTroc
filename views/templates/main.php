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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<?php
    //Fonction qui compare l'url avec le lien cliqué, la classe change pour le css
    function navClass($action)
    {
    $currentAction = $_GET['action'] ?? '';
    return $currentAction === $action ? 'nav-active' : '';
    }
?>

<body>
    <header>
        <nav>
            <div class="nav-left">
                <a href="index.php?action=home"><img src="./pictures/css/TomTroc.png" alt="Logo du site TomTroc" class="logoTomTroc"></a>
                <a href="index.php?action=home" class="<?php echo navClass('home') ?>">Accueil</a>
                <a href="index.php?action=book" class="<?php echo navClass('book') ?>">Nos Livres à l'échange</a>
            </div>

            <div class="nav-right">
                <?php
                    // Si aucun utilisateur n'est connecté on affiche le bouton 'connexion',
                    // Si un utilisateur est connecté on affiche
                    // 'messagerie','mon compte', 'déconnexion'
                if (! isset($_SESSION['user'])) {?>
                        <a href="index.php?action=connectionForm" class="' . navClass('connectionForm') . '">Connexion</a>
                    <?php } else {?>
                        <a href="index.php?action=message" class="<?php echo navClass('message') ?>"> <i class="fi fi-rr-beacon"></i> Messagerie </a>
                        <a href="index.php?action=userProfile" class="<?php echo navClass('userProfile') ?>"><i class="fi fi-rr-user"></i> Mon Compte </a>
                        <a href="index.php?action=disconnectUser"> Déconnexion </a>
                    <?php }?>
            </div>
        </nav>
    </header>

    <main>
        <?php echo $content/* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <a href="#">Politique de confidentialité</a>
        <a href="#">Mentions légales</a>
        <p>TomTroc ©</p>
        <a href="index.php"><img src="./pictures/css/TT.png" alt="Logo du site TomTroc" class="logoTomTroc"></a>
    </footer>
</body>
</html>