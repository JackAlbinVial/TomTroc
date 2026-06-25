<?php
    /**
 * Template de la page détail d'un livre.
 */
?>
<div class="breadcrumb">
    <a href="index.php?action=book">Nos Livres >&nbsp;</a> <p> <?php echo $livre->getTitre() ?></p>
</div>

<div class="detailLivreContainer">
    <div class="detailLivreGauche">
        <img src="./pictures/books/<?php echo $livre->getPhoto(); ?>"/>
    </div>
    <div class="detailLivreDroit">
        <h1><?php echo $livre->getTitre() ?></h1>
        <p class="auteur">par <?php echo $livre->getAuteur() ?></p>
        <hr/>
        <h6>DESCRIPTION</h6>
        <p class="text"><?php echo nl2br($livre->getDescription()) ?></p>
        <h6>PROPRIÉTAIRE</h6>
        <a href="index.php?action=owner&id=<?php echo $user->getId() ?>" class="proprietaireLink">
            <img src="./pictures/users/<?php echo $user->getPicture(); ?>" alt="Image d'un utilisateur">
            <p><?php echo $user->getName(); ?></p>
        </a>
        <a href="index.php?action=message&idSender=<?php echo $user->getId() ?>" class="boutonVert fullWidth">Envoyer un Message</a>
    </div>
</div>
