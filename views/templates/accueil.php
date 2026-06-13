<?php

    /** Template de la page d'accueil */

?>

<div class="premierQuart">
    <div class="premierQuartGauche">
        <div class="premierQuartText">
            <h2>Rejoignez nos lecteurs passionnés</h2>
            <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
            <a href="#decouvrir" class="boutonVert">Découvrir</a>
        </div>
    </div>
    <div class="premierQuartDroit">
        <img src=".\pictures\css\accueil1.jpg" alt="Image d'une bibliothèque" class="imageAccueil1"/>
        <p class="greyTxt">Hamza</p>
    </div>
</div>

<div class="deuxiemeQuart">
    <h2>Les derniers livres ajoutés</h2>

    <div class="livreAjouter">
        <?php foreach ($livres as $livre) {?>
            <a href="#">
                <article class="card" style="height:250px;">
                    <img src="./pictures/books/<?php echo $livre->getPhoto() ?>" alt="Image d'un livre"/>
                    <div class="card-content">
                        <div class="card-txt">
                            <h3 class="card-title"><?php echo $livre->getTitre() ?></h3>
                            <p class="card-author"><?php echo $livre->getAuteur() ?></p>
                            <p class="greyTxt">Vendu par : <?php echo $livre->getProprietaireName() ?></p>
                        </div>
                    </div>
                </article>
            </a>
        <?php }?>
    </div>

    <a href="index.php?action=book" class="boutonVert">Voir tous les livres</a>
</div>

<div class="troisiemeQuart">
    <h2 id="decouvrir">Comment ça marche ?</h2>
    <p class="troisiemeQuartText">Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>

    <div class="bloc-content">
        <div class="bloc-txt">
            <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
        </div>
    </div>
    <div class="bloc-content">
        <div class="bloc-txt">
            <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
        </div>
    </div>
    <div class="bloc-content">
        <div class="bloc-txt">
            <p>Parcourez les livres disponibles chez d'autres membres.</p>
        </div>
    </div>
    <div class="bloc-content">
        <div class="bloc-txt">
            <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
        </div>
    </div>

    <a href="index.php?action=book" class="boutonBlancVert">Voir tous les livres</a>
    <img src=".\pictures\css\accueil2.jpg" alt="Image d'une bibliothèque" class="imageAccueil2"/>
</div>

<div class="quatriemeQuart">
    <h2>Nos valeurs</h2>
    <p class="quatriemeQuartText">Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes. Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé. Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
    <div class="sinature">
        <p class="greyTxt">L’équipe Tom Troc</p>
        <img src=".\pictures\css\Coeur.jpg" alt="Image d'un Coeur" class="imageCoeur"/>
    </div>
</div>