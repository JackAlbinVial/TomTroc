<?php
    /**
 * Template de la page détail d'un livre.
 */
?>
<a href="index.php?action=book">Nos Livres ></a>
<p><?php echo $livre->getTitre() ?></p>

<div>
    <div class="detailLivreDroit">
        <img src="./pictures/books/<?php echo $livre->getPhoto(); ?>" style="height:150px;"/>
    </div>
    <div class="detailLivregauche">
        <h1><?php echo $livre->getTitre() ?></h1>
        <p>par <?php echo $livre->getAuteur() ?></p>
        <hr/>
        <h6>DESCRIPTION</h6>
        <p><?php echo $livre->getDescription() ?></p>
        <h6>PROPRIÉTAIRE</h6>
        <a href="index.php?action=owner&id=<?php echo $user->getId() ?>">
            <img src="./pictures/users/<?php echo $user->getPicture(); ?>" alt="Image d'un utilisateur">
            <p><?php echo $user->getName(); ?></p>
        </a>
        <a href="index.php?action=message&idSender=<?php echo $user->getId() ?>">lololo</a>
    </div>
</div>
