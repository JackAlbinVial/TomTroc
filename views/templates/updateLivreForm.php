<?php
    /**
 * Template du formulaire d'update/creation d'un livre.
 */
?>
<h2><?php echo $livre->getId() == -1 ? "Création d'un livre" : "Modification les informations" ?></h2>

<form action="index.php" method="post" class="foldedCorner" class="infoLivre">
    <div class="formGridGauche">
        <img src="./pictures/books/<?php echo $livre->getPhoto(); ?>" style="height:150px;"/>
        <label for="photo" class="edit-link">
            <i class="fi fi-rr-pencil"></i> Modifier la photo
        </label>

        <input type="file" name="photo" id="photo" accept="image/*" required>
        <button type="submit" >Valider</button>
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
        <option value="1">disponible</option>
        <option value="0">non dispo.</option>
        </select>

        <input type="hidden" name="action" value="updateLivre">
        <input type="hidden" name="id" value="<?php echo $livre->getId() ?>">
        <button class="submit">Valider</button>
    </div>
</form>