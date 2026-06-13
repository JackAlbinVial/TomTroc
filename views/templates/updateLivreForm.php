<?php
    /**
 * Template du formulaire d'update/creation d'un livre.
 */
?>
<a href="index.php?action=userProfile">← Retour</a>
<h2><?php echo $livre->getId() == -1 ? "Création d'un livre" : "Modifier les informations" ?></h2>

<form action="index.php" method="post" enctype="multipart/form-data" class="infoLivre">
    <div class="formGridGauche">
        <img src="./pictures/books/<?php echo $livre->getPhoto(); ?>" style="height:150px;"/>
        <label for="photoLivre" class="edit-link">
            <i class="fi fi-rr-pencil"></i> Modifier la photo
        </label>

        <input type="file" name="photoLivre" id="photoLivre" accept="image/*" >

    </div>

    <div class="formGridDroit">

        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="<?php echo $livre->getTitre() ?>" required>

        <label for="auteur">Auteur</label>
        <input type="text" name="auteur" id="auteur" value="<?php echo $livre->getAuteur() ?>" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" required><?php echo $livre->getDescription() ?></textarea>

        <label for="dispoSelect">Disponibilité</label>
        <select name="dispoSelect" id="dispoSelect">
        <option value="disponible">disponible</option>
        <option value="non dispo.">non dispo.</option>
        </select>

        <input type="hidden" name="action" value="updateLivre">
        <input type="hidden" name="id" value="<?php echo $livre->getId() ?>">
        <button class="submit">Valider</button>
    </div>
</form>