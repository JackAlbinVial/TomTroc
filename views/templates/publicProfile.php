<?php
    /**
 * Template de la page profile
 */
?>
<div class="ComptePublic">
    <div class="upperSection">
        <div class="blocDroit">
            <div class="image">
                <img src="./pictures/users/<?php echo $user->getPicture(); ?>"/>
            </div>

            <div class="info">
                <h2><?php echo $user->getName(); ?></h2>
                <p class="seniority"><?php echo $userDate ?></p>
                <h6>BIBLIOTHEQUE</h6>
                <p class="totalLivre">
                    <i class="fi fi-rr-books"></i>
                    <?php echo $countLivre; ?> Livres
                </p>
            </div>

            <a href="index.php?action=message&idSender=<?php echo $user->getId(); ?>" class="boutonBlancVert">Écrire un message</a>
        </div>


        <div class="lowerSection" >
            <table class="userBooks">
                <thead>
                    <tr>
                        <th>PHOTO </th>
                        <th>TITRE</th>
                        <th>AUTEUR</th>
                        <th>DESCRIPTION</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($livres as $livre) {?>
                        <tr>
                            <td class="col-picture"><img src="./pictures/books/<?php echo $livre->getPhoto(); ?>"/></td>
                            <td class="col-title"><?php echo $livre->getTitre(); ?></td>
                            <td class="col-author"><?php echo $livre->getAuteur(); ?></td>
                            <td class="col-description"><?php echo mb_strimwidth($livre->getDescription(), 0, 82, '...'); ?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
