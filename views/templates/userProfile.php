<?php
    /**
 * Template de la page profile
 */
?>

<h1>Mon Compte </h1>

<div class="Compte">
    <div class="upperSection">
        <div class="blocDroit">
            <div class="image">
                <img src="./pictures/users/<?php echo $user->getPicture(); ?>" style="height:150px;"/>

                <form action="index.php?action=updateUserPhoto" method="POST" enctype="multipart/form-data" class="photo">
                    <label for="photo" class="edit-link">
                        <i class="fi fi-rr-pencil"></i>Modifier
                    </label>
                    <input type="file" name="photo" id="photo" accept="image/*" required>
                    <button type="submit" >Valider</button>
                </form>
            </div>

            <div class="info">
                <h2><?php echo $user->getName(); ?></h2>
                <p class="seniority"><?php echo $userDate ?></p>
                <h6>BIBLIOTHEQUE</h6>
                <p class="totalLivre">
                    <i class="fi fi-rr-books"></i>
                    <?php echo $countLivre ?> Livres
                </p>
            </div>
        </div>
        <div class="blocGauche">
            <h3>Vos Information Personnelles</h3>
            <form action="index.php?action=editUser" method="post" class="foldedCorner">
                <div class="formGrid">
                    <label for="login">Adresse email</label>
                    <input type="email" name="login" id="login" value="<?php echo $user->getLogin(); ?>">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="········">
                    <label for="name">Pseudo</label>
                    <input type="text" name="name" id="name" value="<?php echo $user->getName(); ?>">
                    <button class="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <div class="lowerSection" >
        <table class="userBooks">
            <thead>
                <tr>
                    <th>PHOTO </th>
                    <th>TITRE</th>
                    <th>AUTEUR</th>
                    <th>DESCRIPTION</th>
                    <th>DISPONIBILITE</th>
                    <th class="col-actions"> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livres as $livre) {?>
                    <tr>
                        <td class="col-picture"><img src="./pictures/books/<?php echo $livre->getPhoto() ?>" style="height:150px;"/></td>
                        <td class="col-title"><?php echo $livre->getTitre() ?></td>
                        <td class="col-author"><?php echo $livre->getAuteur() ?></td>
                        <td class="col-description"><?php echo mb_strimwidth($livre->getDescription(), 0, 82, '...') ?></td>
                        <td class="col-available"><?php echo $livre->getDisponibilite() ?></td>
                        <td class="col-actions">
                            <a class="submit" id="edit" href="index.php">
                                <i class="fi fi-rr-pencil"></i>
                            </a>
                            <a class="submit" id="delete" href="index.php"
                                <?php echo Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?>>
                                <i class="fi fi-rr-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    <a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>
    </div>
</div>
